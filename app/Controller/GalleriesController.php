<?php
    class GalleriesController extends AppController {
        var $helpers = array('Html'); 
        
        public function index() {
            $this->set('gallery', $this->Gallery->find('all'));
        }
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('logout');
    	}
    }
?>
