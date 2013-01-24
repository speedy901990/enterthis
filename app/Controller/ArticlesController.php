<?php
    class ArticlesController extends AppController {
        public $components=array('Search');
        public $helpers = array('Html', 'Form');
        public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Article.createds' => 'desc'
        )
    );
        
        public function beforeFilter() {
            parent::beforeFilter();
        }
        
        public function index() {
           $this->Article->recursive = 0;
           $this->set('articles', $this->paginate());
        }
        
        public function add() {
            if ($this->request->is('post')) {
                if ($this->Article->save($this->request->data)) {
                    $this->Session->setFlash('Your Article has been saved.');
                    $this->redirect(array('controller' => 'articles', 'action' => 'index'));
                }
            }
        }
        
        public function addComment() {
            if ($this->request->is('post')) {
                if ($this->Comment->save($this->request->data)) {
                    $this->Session->setFlash('Your comment has been saved.');
                    $this->redirect(array('controller' => 'articles', 'action' => 'index'));
                }
            }
        }
        
        public function view($id=null) {
            $this->Article->id = $id;
            $this->set('article', $this->Article->read());
            $this->loadModel('Comment');
            $this->set('comments', $this->Comment->find('all'));
            $this->loadModel('User');
            $this->set('users', $this->User->find('all'));
        }
    
        public function isAuthorized($user) {
            if ($this->action === 'add' || $this->action === 'reindex') {
                if (isset($this->request->params['admin']))
                    return (bool)($user['role'] === 'admin');
                else  {
                    //$this->Session->setFlash("You are not allowed");
                }
            }

            return parent::isAuthorized($user);
        }
        
        function search() { 
            $this->set('results',$this->Article->search($this->data['Article']['q'])); 
        } 

        function reindex() { 
            $this->Article->reindexAll();
            $this->redirect(array('controller'=>'adminpages', 'action'=>'index'));
            die(); 
        }
        
    }
?>
