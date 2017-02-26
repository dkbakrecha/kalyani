<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public $name = 'Pages';

    // var $components = array('Captcha');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow();
    }

    public function index() {
        $this->set('title_for_layout', 'Welcome to Samrudh Exports');
        $this->loadModel('Product');

        $proCond = array();
        $proCond['Product.status !='] = 2;


        $this->set('forSlider', $this->Product->find('all', array(
                    'conditions' => $proCond,
                    'limit' => 5,
                    'fields' => '*'
                )));

        $proCond['Product.is_show'] = 1;

        $frontProduct = $this->Product->find('all', array(
                    'limit' => 8,
                    'conditions' => $proCond,
                    'fields' => '*'
                        )
        );
        //pr(count($frontProduct));
        //prd($frontProduct);
        $this->set('frontProdcuts', $frontProduct);
    }

    public function index2() {
        
    }

    public function products() {
        $this->set('title_for_layout', 'Samrudh Exports - Products');
    }

    public function contact() {
        $this->set('title_for_layout', 'Samrudh Exports - Contact Us');
        $this->loadModel('Message');
        
        if (!empty($this->request->data)) {
            // $this->Message->set($this->request->data);
            
            //prd($this->request->data);
            
            if($this->Message->validates()){
                $this->Message->save($this->request->data);  
                
                $data = $this->request->data;
                
                $userName	= $data['Message']['name'];
		$userEmail      = $data['Message']['email'];
                $contactNo      = $data['Message']['mobile'];
		$message	= $data['Message']['message'];
		
                $this->loadModel('EmailContent');
		$emailObj = new EmailContent();
		$emailObj->contactUsMail($userName,$userEmail,$message,$contactNo);
                                
                echo $this->flash_msg(1,'Thanks form your message, We will contact you soon');
                
            }else{
                 echo $this->flash_msg(2,'Data not save due to lack of valid information. Please try again');
               
            }
        }       
    }

    public function aboutus() {
        $this->set('title_for_layout', 'Samrudh Exports - About Us');
        $this->loadModel('Cmspage');
        $cmsData = $this->Cmspage->find('all');
        $this->set('cmsData', $cmsData);
        // prd($cmsData);
    }

    public function model() {
        // prd($this->request);
        $this->loadModel('Message');
        $data = array();
        if (!empty($this->request->data)) {
            $data['product_code'] = $this->data['Message']['product_code'];
            $data['name'] = $this->data['Message']['name'];
            $data['email'] = $this->data['Message']['email'];
            $data['mobile'] = $this->data['Message']['mobile'];
            $data['message'] = $this->data['Message']['message'];
            $data['type'] = 1;
            $this->Message->save($data);
            $this->Session->setFlash('Thanks for Enquiry, We will contact you soon.');
            $this->redirect(array('controller' => 'pages', 'action' => 'model'));
        }
    }

}
