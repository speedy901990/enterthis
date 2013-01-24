<?php
class PostsController extends AppController {
    public $components=array('Search');
    public $helpers = array('Html', 'Form');
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Post.created' => 'desc'
        )
    );
    
    public function beforeFilter() {
    	parent::beforeFilter();
        $this->Auth->allow('logout');
	}
    
    public function index() {
        $this->Post->recursive = 0;
        $this->set('posts', $this->paginate());
        $this->loadModel('User');
        $users = $this->User->find('all');
        $this->set('users', $users);
    }
    
    //:TODO
    public function indexOwnPosts() {
        $this->set('posts', $this->Post->find('all'));
        $this->loadModel('User');
        $users = $this->User->find('all');
        $this->set('users', $users);
    }
    //~!
    
    public function view($id = null) {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }
    
     public function add() {
		if ($this->request->is('post')) {
		    $this->request->data['Post']['user_id'] = $this->Auth->user('id'); //Added this line
		    if ($this->Post->save($this->request->data)) {
		        $this->Session->setFlash('Your post has been saved.');
		        $this->redirect(array('controller' => 'posts', 'action' => 'index'));
		    }
		}
	}
    
    public function edit($id = null) {
		  $this->Post->id = $id;
		  if ($this->request->is('get')) {
		      $this->request->data = $this->Post->read();
		  } else {
		      if ($this->Post->save($this->request->data)) {
		          $this->Session->setFlash('Your post has been updated.');
		          $this->redirect(array('controller' => 'posts', 'action' => 'index'));
		      } else {
		          $this->Session->setFlash('Unable to update your post.');
		      }
    	}
    }
    
    public function delete($id) {
		  if ($this->request->is('get')) {
		      throw new MethodNotAllowedException();
		  }
		  if ($this->Post->delete($id)) {
		      $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
		      $this->redirect(array('controller' => 'posts', 'action' => 'index'));
		  }
	}
    
    public function manageUsers() {
        $this->redirect(array('controller'=>'users', 'action'=>'index'));
    }
	
	public function isAuthorized($user) {
		// All registered users can add posts
		
		if ($this->action === 'add') {
		    return true;
		}
		if ($this->action === 'index'){
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete', 'logout', 'view', 'indexOwnPosts'))) {
		    $postId = $this->request->params['pass'][0];
		    if ($this->Post->isOwnedBy($postId, $user['id'])) {
		        return true;
		    }
            else{
                $this->Session->setFlash("You are not allowed");
            }
		}
        
        if ($this->action === 'manageUsers' || $this->action === 'reindex') {
			if (isset($this->request->params['admin']))
            	return (bool)($user['role'] === 'admin');
            else  {
                //$this->Session->setFlash("You are not allowed");
            }
        }

		return parent::isAuthorized($user);
	}
	
	public function authError($user){
		echo $this->Session->flash();
		echo $this->Session->flash('auth');
	}
    
    public function logout() {
		$this->redirect($this->Auth->logout());
	}
    
    function search() { 
        $this->set('results',$this->Post->search($this->data['Post']['q'])); 
    } 
    
    function reindex() { 
		$this->Post->reindexAll();
        $this->redirect(array('controller'=>'adminpages', 'action'=>'index'));
		die(); 
    }
}

