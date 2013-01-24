<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 */
class CommentsController extends AppController {

    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Comment.created' => 'desc'
        )
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->deny('index');
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($articleId = null) {
		if ($this->request->is('post')) {
			$this->Comment->create();
            $this->request->data['Comment']['article_id'] = $articleId;
            $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved'));
				$this->redirect(array('controller'=>'articles', 'action' => 'view/'.$articleId));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
        $this->set('articleTitle', $this->Comment->Article->read('title', $articleId));
		$this->set(compact('articles', 'users'));
        $this->set('articleId', $articleId);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Comment->read(null, $id);
		}
		$articles = $this->Comment->Article->find('list');
		$users = $this->Comment->User->find('list');
		$this->set(compact('articles', 'users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('Comment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Comment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function isAuthorized($user) {
		// All registered users can add posts
		
		if ($this->action === 'add') {
		    return true;
		}
        
        if ($this->action === 'index' || $this->action === 'view' || $this->action === 'edit') {
			if (isset($this->request->params['admin']))
            	return (bool)($user['role'] === 'admin');
            else  {
                //$this->Session->setFlash("You are not allowed");
            }
        }

		return parent::isAuthorized($user);
	}
}