<?php
App::uses('CakeEmail', 'Network/Email');
class ContactmesController extends AppController {
    public function index() {
            
    }
     
    public function send() {            
        if ($this->request->is('post')) {
            $this->Contactme->create();
            if ($this->Contactme->save($this->request->data)) {        
            
                $email = new CakeEmail();
                $email->config('gmail');
                $email->from(array('enterthiscake@gmail.com' => 'EnterThisCake'));
                $email->to('enterthiscake@gmail.com');
                $email->subject($this->request->data['Contactme']['subject']);
                $email->sender($this->request->data['Contactme']['senderEmail'], 'ContactMe user');
                $email->send("Message from: ".$this->request->data['Contactme']['senderEmail']."\n".$this->request->data['Contactme']['message']);
       
                $this->Session->setFlash(__('The email has been sent'));
                $this->redirect(array('controller' => 'contactmes', 'action' => 'index'));
            } 
        }
    }
        
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout');
        $this->Auth->allow('send');
    }
}
?>
