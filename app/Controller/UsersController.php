<?php
// app/Controller/UsersController.php
class UsersController extends AppController {
    public $paginate = array(
        'limit' => 20,
        'order' => array(
            'User.created' => 'desc'
        )
    );

    public function beforeFilter() {
    	parent::beforeFilter();
    	//$this->Auth->allow('*'); // Letting users register themselves
        $this->Auth->deny('index');
	}

    public function index() {
        //$this->User->recursive = 0;
        $this->set('users', $this->paginate());
        //$users = $this->User->find('all');
        //$this->set('users', $users);
    }
    
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('controller' => 'users', 'action' => 'index'));
    }
    
	public function login() {
		if ($this->request->is('post')) {
		    if ($this->Auth->login()) {
		        $this->redirect(array('controller' => 'articles', 'action' => 'index'));
		    } else {
		        $this->Session->setFlash(__('Invalid username or password, try again'));
		    }
		}
	}

	public function logout() {
		$this->redirect($this->User->login());
	}
	
	public function isAuthorized($user = null) {
		// All registered users can add posts
		if ($this->action === 'add' || $this->action === 'edit' || $this->action === 'delete' || $this->action === 'reindex') {
			if (isset($this->request->params['admin']))
            	return (bool)($user['role'] === 'admin');
		}
        
		if ($this->action === 'logout'){
			return true;
		}

		return parent::isAuthorized($user);
	}
	
	public function authError($user){
		echo $this->Session->flash();
		echo $this->Session->flash('auth');
	}
    
    function search() { 
        $this->set('results',$this->User->search($this->data['User']['q'])); 
    } 

    function reindex() { 
        $this->User->reindexAll();
        $this->redirect(array('controller'=>'adminpages', 'action'=>'index'));
        die(); 
    }
}
