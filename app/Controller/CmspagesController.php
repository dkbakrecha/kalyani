<?php

App::uses('AppController', 'Controller');

class CmspagesController extends AppController {
    
      //public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        $this->set('title_for_layout', 'FAQ');

        
    }
    public function admin_edit($id = null){
        $this->set('title_for_layout', 'Samrudh Exports - CMS Edit ');
        
          $data = $this->request->data;
          if(isset($data) && !empty($data)){
              if($this->Cmspage->save($data)){
                  $this->flash_msg(1,'CMS Page Updated.');
                  $this->redirect(array('controller'=>'cmspages','action'=>'index'));
              }
                $this->flash_msg(2,'CMS Page Update Failed.');
                  $this->redirect(array('controller'=>'cmspages','action'=>'index'));
          }
         
          $data = $this->Cmspage->findById($id);
          $this->request->data = $data;
    }

    public function admin_index() {
        $this->set('title_for_layout', 'Samrudh Exports - CMS Page ');
        
        $cmsData = $this->Cmspage->find('all');
        $this->set('cmsData',$cmsData);
        //prd($cmsData);
       
    }


}
