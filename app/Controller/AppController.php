<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth',
    );
    public $helpers = array(
        'Image',
    );

    public function beforeFilter() {
        parent::beforeFilter();
        if (isset($this->request->params['admin'])) {
           // $this->Auth->allow('view','index');
            $this->layout = 'admin';

            // to check session key if we not define this here then is will check with 'Auth.User' so dont remove it
            AuthComponent::$sessionKey = 'Auth.Admin';
            $this->Auth->loginAction = array('admin' => true, 'controller' => 'users', 'action' => 'admin_login');
            $this->Auth->loginRedirect = array('admin' => true, 'controller' => 'users', 'action' => 'admin_index');
            $this->Auth->logoutRedirect = array('admin' => true, 'controller' => 'users', 'action' => 'admin_login');
        }

        $this->Auth->allow('index');
        $this->SiteSettings();
        $this->commonData();
    }

    protected function SiteSettings() {
        $this->loadModel('Sitesetting');
        $site_settings = $this->Sitesetting->find('all', array(
            'fields' => array('key', 'value'),
                )
        );

        foreach ($site_settings as $each_setting) {
            Configure::write($each_setting['Sitesetting']['key'], $each_setting['Sitesetting']['value']);
        }
        $adminEmail = Configure::read('Site.email');
        Configure::write('ADMIN_MAIL', $adminEmail);
    }

    public function commonData() {
        $this->loadModel('Product');
        $this->loadModel('Category');
        $this->loadModel('Subcategory');
        $this->loadModel('Message');

        $cateData = $this->Category->find('all');
        $this->set('cateData', $cateData);
        $totalCategory = count($cateData);
        $this->set('totalCategory', $totalCategory);

        $proCondition = array();
        $proCondition['Product.status !='] = 2;
        $proData = $this->Product->find('all', array(
            'conditions' => $proCondition,
        ));
        $proCount = count($proData);
        $this->set('totalProducts', $proCount);
        
        $msgData = $this->Message->find('all',array(
            'conditions'=>array('Message.status'=>0)
        ));
         $unreadMsg = count($msgData);
         $this->set('unreadMsg',$unreadMsg);
        $navData = $this->Category->find('all',array(
            'conditions'=>array('Category.status'=>1),
            ));
        $this->set('navData',$navData);
        
    }
   


    public function flash_msg($flag = NULL, $msg) {
        if ($flag == 1) {
            $this->Session->setFlash($msg, 'default', array('class' => 'alert alert-success'));
        } elseif ($flag == 2) {
            $this->Session->setFlash($msg, 'default', array('class' => 'alert alert-danger'));
        }
    }

}
