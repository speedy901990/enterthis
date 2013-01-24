<?php
// app/Controller/AdminpageController.php
class AdminpagesController extends AppController {

    public function beforeFilter() {
    	parent::beforeFilter();
        $this->Auth->deny();
	}

    public function index() {
        
    }
    
	public function isAuthorized($user = null) {
		// All registered users can add posts
		if ($this->action === 'index' ){
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
}
