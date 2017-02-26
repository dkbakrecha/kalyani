<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

    public $uses = array();
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow();
    }

    public function index() {
        
    }

    public function view() {
        
    }

    public function admin_index() {
        $this->set('title_for_layout', ' Samrudh Exports - Add Category');
        //prd($this->request);
        $this->loadModel('SubCategory');
        // Saving Parent Category Data
        @$parendCateData = $this->request->data['Category'];
        if (isset($parendCateData) && !empty($parendCateData)) {
            //prd($this->data);
            //$data = $this->request->data;
            $parendCateData['status'] = 1;
            if ($this->Category->save($parendCateData)) {
                $this->flash_msg(1, 'Data Saved.');
                $this->redirect(array('controller' => 'Categories', 'action' => 'index'));
            } else {
                $this->flash_msg(2, 'Data Not Saved.');
            }
        }

        $parent_category = $this->Category->find('all', array(
            'conditions' => array('Category.status' => 1),
        ));
        $this->set('parent_category', $parent_category);
        //prd($parent_category);
        // Saving Sub Category Data
        @$subCateData = $this->request->data['SubCategory'];
        //prd($subCateData);
        if (isset($subCateData) && !empty($subCateData)) {
            $subCateData['status'] = 1;
            if ($this->SubCategory->save($subCateData)) {
                $this->flash_msg(1, 'Sub Category Saved.');
                $this->redirect(array('controller' => 'categories', 'action' => 'index'));
            }
            $this->flash_msg(2, 'Sub Category not saved.');
        }
    }

    public function admin_add() {
//        $this->set('title_for_layout', 'Add Category');
//        //prd($this->request);
//        $this->loadModel('SubCategory');
//        // Saving Parent Category Data
//        @$parendCateData = $this->request->data['Category'];
//        if (isset($parendCateData) && !empty($parendCateData)) {
//            //prd($this->data);
//            //$data = $this->request->data;
//            if ($this->Category->save($parendCateData)) {
//                $this->flash_msg(1, 'Data Saved.');
//                $this->redirect(array('controller' => 'Categories', 'action' => 'add'));
//            } else {
//                $this->flash_msg(2, 'Data Not Saved.');
//            }
//        }
//
//        $parent_category = $this->Category->find('all', array(
//            'conditions' => array('Category.status' => 1),
//        ));
//        $this->set('parent_category', $parent_category);
//        //prd($parent_category);
//        // Saving Sub Category Data
//        @$subCateData = $this->request->data['SubCategory'];
//        //prd($subCateData);
//        if (isset($subCateData) && !empty($subCateData)) {
//            $subCateData['status'] = 1;
//            if ($this->SubCategory->save($subCateData)) {
//                $this->flash_msg(1, 'Sub Category Saved.');
//                $this->redirect(array('controller' => 'categories', 'action' => 'add'));
//            }
//            $this->flash_msg(2, 'Sub Category not saved.');
//        }
    }

    public function admin_categorygrid() {

        $page = $this->request->query['page'];
        $limit = $this->request->query['rows'];
        $sidx = $this->request->query['sidx'];
        $sord = $this->request->query['sord'];

        if (!$sidx)
            $sidx = 1;

        $order_by = "Category." . $sidx . ' ' . $sord;

        $conditions = array();
        $conditions['Category.status !='] = 2;

        $count = $this->Category->find('count', array(
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

        $cateList = $this->Category->find('all', array(
            'conditions' => $conditions,
            'order' => $order_by,
            'limit' => $limit,
            'offset' => $start
                )
        );

        $temp = array();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;

        $i = 0;
        //prd($productList);
        if (is_array($cateList)) {
            $temp = array();
            foreach ($cateList as $cData): {
                    //pr($cData);
                    $title = $cData['Category']['title'];
                    $proCount = count($cData['Products']) . " Products";

                    $action = '';
                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/categories/edit/' . $cData['Category']['id'] . '" ><i class="fa fa-edit"></i></a> ';
                    $action .= '&nbsp;&nbsp;&nbsp;<i title="Click to delete item" class="pointer fa fa-times-circle" onclick="deleteCategory(' . $cData['Category']['id'] . ')"></i>';

                    $responce->rows[$i]['id'] = $cData['Category']['id'];
                    $responce->rows[$i]['cell'] = array($title, $proCount, $action);
                    $i++;
                }
            endforeach;
        }

        echo json_encode($responce);
        exit;
    }

    public function admin_delete($id) {
        $this->Category->id = $id;
        if ($this->Category->saveField('status', '0')) {
            $this->flash_msg(1, 'Category Delete');
            $this->redirect(array('controller' => 'categories', 'action' => 'view'));
        }
    }

    public function admin_view() {
        $this->set('title_for_layout', 'Samrudh Exports - View Category');

        $this->Paginator->settings = array(
            'limit' => 10,
            'conditions' => array('Category.status' => array(0, 1)),
            'group' => 'Category.id',
                //'options' => array('controller' => 'products', 'action' => 'index', $id)
        );

        $cateData = $this->Paginator->paginate('Category');
        $this->set('cateData', $cateData);

        $totalCate = count($cateData);
        $this->set('totalCate', $totalCate);
//        $cateData = $this->Category->find('all', array(
//            'conditions' => array('Category.status' => 1),
//        ));
//        $this->set('cateData', $cateData);
        //prd($cateData);
    }

    public function admin_edit($id) {
        $this->set('title_for_layout', 'Samrudh Exports - Edit Category');
        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            if ($this->Category->save($data)) {
                $this->flash_msg(1, 'Data Updated');
                $this->redirect(array('controller' => 'categories', 'action' => 'view'));
            }
            $this->flash_msg(2, 'Data Updation Faild');
        }
        $data = $this->Category->findById($id);
        $this->request->data = $data;
    }

    public function admin_subcategory() {
        $this->set('title_for_layout', 'Samrudh Exports - View Sub Category');
        $this->loadModel('SubCategory');

        $this->Paginator->settings = array(
            'conditions' => array('SubCategory.status' => 1),
            'joins' => array(
                array(
                    'table' => 'categories',
                    'alias' => 'category',
                    'type' => 'INNER',
                    'conditions' => array(
                        'SubCategory.Category_id = category.id'
                    ))
            ),
            'fields' => '*',
            'group' => 'SubCategory.id',
            'limit' => 10);

        $subCatList = $this->Paginator->paginate('SubCategory');
        $this->set('subCatList', $subCatList);

        $totalSubCate = count($subCatList);
        $this->set('totalSubCate', $totalSubCate);


//        $subCatList = $this->SubCategory->find('all', array(
//            'conditions' => array('SubCategory.status' => 1),
//            'joins' => array(
//                array(
//                    'table' => 'categories',
//                    'alias' => 'category',
//                    'type' => 'INNER',
//                    'conditions' => array(
//                        'SubCategory.Category_id = category.id'
//                    ))
//            ),
//            'fields' => '*',
//            'group' => 'SubCategory.id'));
//      
        //prd($subCatList);
    }

    public function admin_sub_cat_edit($id = null) {
        //prd($this->request);
        $this->set('title_for_layout', 'Samrudh Exports - Edit Sub Category');
        //prd($this->request);
        $this->loadModel('SubCategory');
        // $this->loadModel('Product');
//        $subCateData = $this->SubCategory->findById($id,array(
//            'fields'=>array(
//                'id','category_id','title')));
//        prd($subCateData);

        $parent_category = $this->Category->find('all', array(
            'fields' => array('id', 'title'),
            'conditions' => array('Category.status' => 1),
        ));
        // prd($parent_category);
        $this->set('parent_category', $parent_category);

        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            if ($this->SubCategory->save($data)) {
                $this->flash_msg(1, 'Sub Category Update');
                $this->redirect(array('controller' => 'categories', 'action' => 'subcategory'));
            }
            $this->flash_msg(2, 'Sub Category Updation Failed');
        }

        $subCateData = $this->SubCategory->findById($id);
        // prd($subCateData);
        $this->request->data = $subCateData;
        $this->set('subCateData', $subCateData);
    }

    public function admin_sub_cat_delete($id) {
        $this->loadModel('SubCategory');
        $this->loadModel('Product');
        $flag = 0;
       // $this->Product->sub_category_id = $id;
        
       $update = $this->Product->updateAll(
               array('Product.status'=>2),
               array('Product.sub_category_id'=>$id));
        
       if($update){
           $flag = 1;
       }else{
           $flag = 0;
       }

       
        if ($flag == 1) {
            $this->SubCategory->id = $id;
            if ($this->SubCategory->saveField('status', 2)) {
                $this->flash_msg(1, 'Sub Category Delete');
                $this->redirect(array('controller' => 'categories', 'action' => 'subcategory'));
            }
        }
        elseif($flag == 0){
            $this->flash_msg(2, 'Something went wrong, Pleae try again.');
                $this->redirect(array('controller' => 'categories', 'action' => 'subcategory'));
        }
    }

    public function admin_makesubcate($cateID) {
        //prd($cateID) ;
        $hData = "";
        $this->loadModel('SubCategory');
        if (!empty($cateID)) {
            $cateData = $this->SubCategory->find('all', array(
                'conditions' => array('SubCategory.category_id' => $cateID, 'status' => 1)
            ));
            // prd($cateData);

            $hData .= "<option value='0'>SELECT</option>";
            //prd($cateData);
            foreach ($cateData as $data) {
                $hData .= "<option value=" . $data['SubCategory']['id'] . "> " . $data['SubCategory']['product_code_keyword'] . ': ' . $data['SubCategory']['title'] . "</option>";
            }

            //<option value="4">Dell</option>
            echo $hData;
            //echo json_encode($cateData);
        }
        exit;
    }

}
