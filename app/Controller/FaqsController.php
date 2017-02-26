<?php

App::uses('AppController', 'Controller');

class FaqsController extends AppController {
    
      public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        $this->set('title_for_layout', 'Samrudh Exports - FAQ');

        $conditions['Faq.status'] = '1';
        //$this->loadModel('Faq');
        $Faq = $this->Faq->find('all', array('conditions' => $conditions));

        $this->set('faqs', $Faq);
    }

    public function admin_index() {
        $this->set('title_for_layout', 'Samrudh Exports - Faq ');

        $this->Paginator->settings = array(
            'limit' => 10,
            'conditions' => array('Faq.status' => array(0, 1)),
            'group' => 'Faq.id',
               
        );

        $allFaqs = $this->Paginator->paginate('Faq');
      

//        $allFaqs = $this->Faq->find('all', array(
//            'conditions' => array('Faq.status' => array(0, 1)
//        )));
        $this->set('allFaqs', $allFaqs);
        //prd($allFaqs);

        $totalFaqs = count($allFaqs);
        $this->set('totalFaqs', $totalFaqs);
    }

    public function admin_add() {

        $this->set('title_for_layout', 'Samrudh Exports - Add Faq');

        if ($this->request->is('post')) {

            $data = $this->request->data;
            //prd($data);
            $data['Faq']['created'] = date("Y-m-d H:i:s");
            $data['Faq']['modified'] = '';

            if ($this->Faq->save($data)) {
                $this->flash_msg(1, 'FAQ Successfully saved.');
                $this->redirect(array('action' => 'admin_index', @$faqCatId));
            } else {
                $this->flash_msg(2, 'FAQ could not be saved. Please, try again.');
            }
        }
    }

    public function admin_edit($id = NULL) {

        $this->set('title_for_layout', ' Samrudh Exports - Update Faq');

        if (!empty($this->request->data)) {

            $data = $this->request->data;

            $data['Faq']['updated'] = date("Y-m-d H:i:s");

            if ($this->Faq->save($data)) {
                $this->flash_msg(1,'Faq has been updated.');
                //$this->Session->setFlash('Faq has been updated.', 'default', array('class' => 'success'));
                $this->redirect(array('admin' => true, 'controller' => 'Faqs', 'action' => 'index', @$faqCatId));
            } else {
                 $this->flash_msg(2,'Faq could not be updated. Please, try again.');
                //$this->Session->setFlash('Faq could not be updated. Please, try again.', 'default', array('class' => 'error'));
            }
        }

        if (empty($this->request->data)) {

            $FaqRow = $this->Faq->read(null, $id);

            if (count($FaqRow) > 0) {

                $this->request->data = $FaqRow;
            } else {
                $this->Session->setFlash('Invalid request of Faq', 'default', array('class' => 'error'));
                $this->redirect(array('admin' => true, 'controller' => 'Users', 'action' => 'dashboard'));
            }
        }
    }

    public function admin_FaqListGrid() {
        $page = $this->request->query['page'];
        $limit = $this->request->query['rows'];
        $sidx = $this->request->query['sidx'];
        $sord = $this->request->query['sord'];

        if (!$sidx)
            $sidx = 1;

        $order_by = $sidx . ' ' . $sord;

        $conditions = array();
        $conditions['Faq.status != '] = '2';

        if (isset($this->request->query['filters'])) {
            if (!empty($this->request->query['filters'])) {
                $filters = json_decode($this->request->query['filters'], true);

                foreach ($filters['rules'] as $each_filter) {

                    if ($each_filter['field'] == 'Faq.id') {
                        $conditions['Faq.id ='] = Sanitize::clean($each_filter['data']);
                    }
                    if ($each_filter['field'] == 'Faq.title') {
                        $conditions['Faq.title LIKE'] = '%' . Sanitize::clean($each_filter['data']) . '%';
                    }
                    if ($each_filter['field'] == 'Faq.order') {
                        $conditions['Faq.order LIKE'] = '%' . Sanitize::clean($each_filter['data']) . '%';
                    }
                    if ($each_filter['field'] == 'Faq.created') {
                        $conditions['Faq.created LIKE'] = '%' . Sanitize::clean($each_filter['data']) . '%';
                    }
                    if ($each_filter['field'] == 'FaqCategory.title') {
                        $conditions['FaqCategory.title LIKE'] = '%' . Sanitize::clean($each_filter['data']) . '%';
                    }
                }
            }
        }

        $count = $this->Faq->find('count', array(
            'conditions' => $conditions,
                )
        );


        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) {
            $page = $total_pages;
        }

        $start = $limit * $page - $limit;

        $FaqList = $this->Faq->find('all', array(
            'conditions' => $conditions,
            'fields' => array('*'),
            'order' => $order_by,
            'limit' => $limit,
            'offset' => $start
                )
        );


        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;

        $i = 0;

        if (is_array($FaqList)) {

            foreach ($FaqList as $Faqs): {

                    App::import('Helper', 'Time');
                    App::import('Helper', 'View');

                    $title = $Faqs['Faq']['title'];
                    $content = $Faqs['Faq']['content'];

                    $action = '';
                    if ($Faqs['Faq']['status'] == 0) {
                        $action .= '<i title="Click to change status" class="pointer fa fa-circle-o" onclick="changeFaqStatus(' . $Faqs['Faq']['id'] . ',0)"></i>';
                    } else if ($Faqs['Faq']['status'] == 1) {
                        $action .= '<i title="Click to change status" class="pointer fa fa-circle" onclick="changeFaqStatus(' . $Faqs['Faq']['id'] . ',1)"></i>';
                    }

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/faqs/edit/' . $Faqs['Faq']['id'] . '" ><i class="fa fa-edit"></i></a> ';
                    $action .= '&nbsp;&nbsp;&nbsp;<i title="Click to delete item" class="pointer fa fa-times-circle" onclick="deleteFaq(' . $Faqs['Faq']['id'] . ')"></i>';

                    $responce->rows[$i]['id'] = $Faqs['Faq']['id'];
                    $responce->rows[$i]['cell'] = array($Faqs['Faq']['id'], $title, $content, $action);
                    $i++;
                }
            endforeach;
        }
        echo json_encode($responce);
        exit;
    }

    public function admin_changeStatus() {

        if ($this->request->is('ajax')) {

            $data['Faq']['id'] = $this->request->data['id'];
            $data['Faq']['status'] = $this->request->data['status'] == 1 ? 0 : 1;

            //prd($data);
            if ($this->Faq->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } else {
            
        }
    }

    public function admin_deleteFaq() {

        if ($this->request->is('ajax')) {

            $data['Faq']['id'] = $this->request->data['id'];
            $data['Faq']['status'] = '2';

            if ($this->Faq->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } else {
            
        }
    }

}
