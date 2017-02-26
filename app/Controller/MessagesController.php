<?php


App::uses('AppController', 'Controller');
 
class MessagesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view','faqs','index','contactus','aboutus');
    }

    public function admin_index(){
        $this->set('title_for_layout','Samrudh Exports - Messages');
        
        $allMessages = $this->Message->find('all',array(
            'conditions'=>array('Message.status'=>array(0,1)),
            'order' => array( 'Message.id ASC'),
        ));
        $this->set('allMessages',$allMessages);
       // prd($allMessages);
        
    }
    

        public function admin_delete($id = null){
        
        $data = $this->Message->findById($id);
        $data['Message']['id'] = $id;
        $data['Message']['status'] = 2;
        if($this->Message->save($data)){
            $this->flash_msg(1,'Messages Deleted');
            $this->redirect(array('controler'=>'messages','action'=>'index'));
        }
        else{
            $this->flash_msg(2,'Messages could not deleted, Please try again letter');
            $this->redirect(array('controler'=>'messages','action'=>'index'));
            
        }
        
    }

        public function admin_view($id = null){
        $this->set('title_for_layout','Samrudh Exports - Messages View');
        
        $data = $this->Message->findById($id);
        if($data['Message']['status'] == 0)
        {
            $data['Message']['id'] = $id;
            $data['Message']['status'] = 1;
            $this->Message->save($data);
        }
        $this->set('data',$data);
       // prd($data);
        
    }
    
    
    
}
