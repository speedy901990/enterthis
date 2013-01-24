<?php
// app/Controller/NewsletterController.php
App::uses('CakeEmail', 'Network/Email');

class NewslettersController extends AppController {

    public function beforeFilter() {
    	parent::beforeFilter();
        $this->Auth->deny();
        $this->Auth->allow('index');
	}

    public function index() {
       if ($this->request->is('post')) {
		    if ($this->Newsletter->save($this->request->data)) {
		        $this->Session->setFlash('Email: '.$this->request->data['Newsletter']['email'].'. You have signed into the Newsletter.');
		        $this->redirect(array('controller' => 'newsletters', 'action' => 'index'));
		    }
		} 
    }
    
    public function displayEmailList() {
        $emails = $this->Newsletter->find('all');
        $this->set('emails', $emails);
    }
    
    public function delete($id) {
		  if ($this->request->is('post')) {
		      throw new MethodNotAllowedException();
		  }
		  if ($this->Newsletter->delete($id)) {
		      $this->Session->setFlash('The email with id: ' . $id . ', has been deleted from newsletter.');
		      $this->redirect(array('controller' => 'newsletters', 'action' => 'displayEmailList'));
		  }
	}
    
    public function send() {
        $emails = $this->Newsletter->find('all');
        foreach ($emails as $email){
            $emailList[] = $email['Newsletter']['email'];
        }
        
        $newEmail = new CakeEmail();
        $newEmail->config('gmail');
        $newEmail->from(array('enterthiscake@gmail.com' => 'EnterThisCake'));
        $newEmail->to($emailList);
        $newEmail->subject('EnterThis Newsletter');
        $newEmail->send($this->prepareMessage());
        
        $this->Session->setFlash('Newsletter has been sent.');
        $this->redirect(array('controller'=>'adminpages', 'action'=>'index'));
    }
    
    public function prepareMessage() {
        $this->loadModel('Post');
        $this->loadModel('Article');
        $posts = $this->Post->find('all');
        $articles = $this->Article->find('all');
        
        $postsCount = 2;
        $articlesCount = 2;
        
        $message[] = '<div class="article">';
        $message[] = '<h1>Last Posts</h1>';
        foreach (array_reverse($posts) as $post ){
            if ($postsCount <= 0)
                break;
            $message[] = '<h3>'.$post['Post']['title'].'</h3>';
            $message[] = '<small><u><i>'.$post['Post']['created'].'</i></u></small><br/>';
            $message[] = $post['Post']['body'];
         
            $postsCount--;
        }
        $message[] = '<hr />';
        
        $message[] = '<h1>Last Articles</h1>';
        foreach (array_reverse($articles) as $article ){
            if ($articlesCount <= 0)
                break;
            $message[] = '<h3>'.$article['Article']['title'].'</h3>';
            $message[] = '<small><u><i>'.$article['Article']['created'].'</i></u></small><br/>';
            $message[] = $article['Article']['shortText'];
         
            $articlesCount--;
        }
        $message[] = '<hr />';
        $message[] = '</div">';

        return $message;
    }
    
	public function isAuthorized($user = null) {
		if ($this->action === 'send' || $this->action === 'delete'){
			if (isset($this->request->params['admin']))
            	return (bool)($user['role'] === 'admin');
		}

		return parent::isAuthorized($user);
	}
	
	public function authError($user){
		echo $this->Session->flash();
		echo $this->Session->flash('auth');
	}
}
