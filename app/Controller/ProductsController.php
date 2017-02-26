<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController {

    public $components = array('Paginator');
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
// Allow users to register and logout.
        $this->Auth->allow();
    }

    public function index($id = null) {
        $this->set('title_for_layout', 'Samrudh Exports - Products Page');

        $this->loadModel('Category');
        $this->loadModel('Image');
        $this->loadModel('SubCategory');
        $this->loadModel('Message');

        $paginateCond = array();
        $paginateCond['Product.status !='] = array(0, 2);

        if (!empty($id)) {
            $paginateCond['Product.sub_category_id'] = $id;
        } else {
            $paginateCond['Product.sub_category_id !='] = 0;
        }


        // $conditions = array('Products.category_id' => $category);
        $this->Paginator->settings = array(
            'conditions' => array($paginateCond),
            'limit' => 12,
            'order' => array('title'),
                //'options' => $options,
        );

        $allProducts = $this->Paginator->paginate('Product');
        $this->set('allProducts', $allProducts);

        $subCateName = $this->SubCategory->find('all', array(
            'conditions' => array('SubCategory.id' => $id),
            'fields' => 'title',
            'recursive' => -1));
        $this->set('subCateName', $subCateName);
        //prd($subCateName);
        $subCateName = $this->SubCategory->find('all', array(
            'conditions' => array('SubCategory.id' => $id),
            'fields' => 'title',
            'recursive' => -1));
        $this->set('subCateName', $subCateName);
    }

    public function categories($id = null) {
        $this->set('title_for_layout', 'Samrudh Exports - Products Categories');
        $this->loadModel('Product');
        $this->loadModel('Category');
        $flag = 0;
        $cond = array();
        $cond['Product.status'] = 1;
        if (isset($id) && !empty($id)) {
            $cond['Product.category_id'] = $id;
            $flag = 1;
        }
        else{
            $flag = 2;
        }
        if($flag == 1){
             $this->Paginator->settings = array(
            'conditions' => array($cond),
            'limit' => 12,
            'order' => array('title'),
                 'fields' => array('id','title','status','product_code'),
           // 'recursive' => 1,
                //'options' => $options,
        );
            $cateName = $this->Category->find('all',array(
                 'conditions'=>array('Category.id'=>$id,'Category.status'=>1),
                 'fields'=>'title',
                'recursive'=> -1)
                     );
            $this->set('cateName',$cateName);

                    
        $allSubCateProd = $this->Paginator->paginate('Product');
        $this->set('allSubCateProd', $allSubCateProd);
        }
        elseif($flag == 2){
            echo 'No Data Found';
            $this->flash_msg(2, 'Invalid request.');
            $this->redirect(array('controller'=>'pages','action'=>'index'));
        }
       // prd($allSubCateProd);
        
    }

    public function view($id = null) {
        $this->set('title_for_layout', 'Samrudh Exports - Products View');
//prd($this->request);
        $this->loadModel('Category');
        $this->loadModel('Image');
        $this->loadModel('SubCategory');
        $this->loadModel('Message');
        if (!$id) {
            $this->flash_msg(2, 'Invalid Reqeust.');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }

        $singleProduct = $this->Product->find('all', array(
            'conditions' => array('Product.id' => $id)
        ));
        $this->set('singleProduct', $singleProduct);
        // prd($singleProduct);
        @$currentSubCateId = $singleProduct[0]['Product']['sub_category_id'];

        $relatedProducts = $this->Product->find('all', array(
            'conditions' => array('Product.status' => 1, 'Product.id !=' => $id, 'sub_category_id' => $currentSubCateId),
            'limit' => 4,
            'order' => array('rand()'),
        ));

        $this->set('relatedProducts', $relatedProducts);

        $imagesAll = $this->Image->find('all', array(
            'conditions' => array('Image.product_id' => $id)
        ));

        $singleProduct = $this->Product->find('all', array(
            'conditions' => array('Product.id' => $id)
        ));
        $this->set('singleProduct', $singleProduct);
        $this->set('imagesAll', $imagesAll);
        $cateId = $singleProduct[0]['Product']['category_id'];

        $cateName = $this->Category->find('all', array(
            'conditions' => array('Category.id' => $cateId)
        ));
        $this->set('cateName', $cateName);

        //  prd($singleProduct);
        if (isset($singleProduct) && !empty($singleProduct)) {
            $updateViewCount = array();
            $updateViewCount['id'] = $id;
            $updateViewCount['view_count'] = $singleProduct[0]['Product']['view_count'] + 1;
            $this->Product->save($updateViewCount);


            $data = array();
            if (isset($this->request->data) && !empty($this->request->data)) {
                $data['product_code'] = $this->data['Message']['product_code'];
                $data['name'] = $this->data['Message']['name'];
                $data['email'] = $this->data['Message']['email'];
                $data['mobile'] = $this->data['Message']['mobile'];
                $data['message'] = $this->data['Message']['message'];
                $data['type'] = 2;
                $data['product_id'] = $id;
                $this->Message->save($data);
                $this->Session->setFlash('Thanks for Enquiry, We will contact you soon.');
                $this->redirect(array('controller' => 'products', 'action' => 'view', $id));
            }
        } else {
            $this->flash_msg(2, 'Invalid Reqeust.');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }
    }

    public function admin_ajaxData() {
        $this->modelClass = "Product";
        $this->autoRender = false;
        $output = $this->Product->GetData();
        prd($output);
        echo json_encode($output);
        // $this->set('output',$output);
    }

    public function admin_datatable() {
        $allProducts = $this->Product->find('all');
        $this->set('allProducts', $allProducts);

        //$allProducts = $this->Product->find('all');
        //$this->set('allProducts', $allProducts);
        //prd($allProducts);
    }

    public function admin_index() {
        $this->set('title_for_layout', 'Samrudh Exports - Admin Products');
        $this->loadModel('SubCategory');
        //
        // prd($this->request->ajax);


        $allProducts = $this->Product->find('all', array(
            'conditions' => array('Product.status' => array(0, 1),)
        ));
        $this->set('allProducts', $allProducts);



        $allProId = $this->Product->find('all', array(
            'conditions' => array('Product.status' => array(0, 1))
            , 'fields' => array('id'),));
        // $this->set('allProducts', $allProducts);
        // prd($allProducts);
        $totalProducts = count($allProId);
        $this->set('totalProducts', $totalProducts);
        // prd($totalProducts);

        $subCate = $this->SubCategory->find('all', array(
            'fields' => array('id', 'title'),
        ));
        $this->set('subCate', $subCate);
        // prd($subCate);
    }

    public function admin_valchange() {
        if ($this->request->is('ajax')) {
            $data = $this->request->data['showVal'];
            if ($this->params->paging->Product['limit'] == $data) {
                echo '1';
            } else {
                echo '0';
            }
        } else {
            
        }
    }

    public function admin_add() {
        // prd($this->request);
        $this->set('title_for_layout', ' Samrudh Exports - Add Products');
        $this->loadModel("Category");
        $this->loadModel('Image');

        if (!empty($this->request->data)) {
            //prd($this->data);
            $data = $this->request->data;

            if ($this->Product->save($data)) {
                $productId = $this->Product->getLastInsertId();

                $this->Image->updateAll(
                        array('Image.product_id' => $productId), array('Image.product_id' => 0)
                );

                //$this->flash_msg(1,'Product Saved.');
                $this->redirect(array('controller' => 'products', 'action' => 'edit', $productId));
            } else {
                $this->Session->setFlash('Data Not Saved.');
            }
        }

        $imageList = $this->Image->find('all', array('conditions' => array(
                'Image.status' => 1,
                'Image.product_id' => 0,
        )));
        $this->set('imageList', $imageList);
        $cateList = $this->Category->find('all');

        $this->set('cateList', $cateList);

        $lastItem = $this->Product->find('first', array(
            'order' => array('Product.id DESC'),
            'recursive' => -1,
            'fields' => array('id', 'product_code'),
        ));

        $itemSplite = explode('-', $lastItem['Product']['product_code']);
        if ($itemSplite[2] == 0) {
            $itemSplite[2] = 1000;
        }
        $newCode = $itemSplite[2] + 1;
        //prd($newCode);\
        $this->set('newCode', $newCode);
    }

    public function admin_edit($id) {
        $this->set('title_for_layout', ' Samrudh Exports - Edit Products');
        $this->loadModel("Category");
        $this->loadModel('Image');
        $this->loadModel('SubCategory');
        //  prd($this->request);
        if (!empty($this->request->data)) {
            // prd($this->data);
            $data = $this->request->data;
            //prd($data);
            if (isset($data['imageTemp']['uploadfile']) && !empty($data['imageTemp']['uploadfile'])) {
                $fileSize = $data['imageTemp']['uploadfile']['size'];
                //  prd($fileSize);
                if ($fileSize > 100000) {
                    echo "<script>alert('File size more then 100kb.');</script>";
                } else {
                    $file = $data['imageTemp']['uploadfile'];
                    if (!empty($file['name'])) {
                        $ext = $this->get_extension($file['name']);
                        $file_extension = array('png', 'gif', 'jpeg', 'jpg', 'bmp');

                        if (in_array($ext, $file_extension)) {
                            $newFileName = date("mY") . "_" . rand(1000, 9999) . '.' . $ext;
//prd(Router::url('/', true));
//$destination = Router::url('/', true) . 'blog/wp-content/uploads/'.$newFileName;
                            $destination = 'img/uploads/' . $newFileName;
                            $moved = move_uploaded_file($file['tmp_name'], $destination);
                            if ($moved) {
                                $this->loadModel('Image');
                                $saveImgData['Image']['product_id'] = $id;
                                $saveImgData['Image']['image_name'] = $newFileName;
                                $saveImgData['Image']['status'] = 1;
                                $this->Image->save($saveImgData);
//echo $newFileName;
//exit;
                            } else {
//echo "1";
//exit;
                            }
                        }
                    }
                }
            } else {

                if ($this->Product->save($data)) {
                    $productId = $this->Product->getLastInsertId();

                    $this->Image->updateAll(
                            array('Image.product_id' => $productId), array('Image.product_id' => 0)
                    );

                    $this->flash_msg(1, 'Product Saved.');
                    $this->redirect(array('controller' => 'products', 'action' => 'add'));
                } else {
                    $this->Session->setFlash('Data Not Saved.');
                }
            }
        }

        $productData = $this->Product->find('first', array('conditions' => array(
                'Product.id' => $id,
        )));

        $this->request->data = $productData;
        //prd($productData);

        $imageList = $this->Image->find('all', array('conditions' => array(
                'Image.status' => 1,
                'Image.product_id' => $id,
        )));
        $this->set('imageList', $imageList);
//pr($imageList);
        $cateList = $this->Category->find('all');
        $this->set('cateList', $cateList);

        $subCateData = $this->SubCategory->find('all', array(
            'conditions' => array(
                'SubCategory.category_id' => $productData['Product']['category_id'], 'status' => 1),
            'fields' => array('id', 'title')));
        //prd($subCateData);
        // $this->request->data = $subCateData;
        $this->set('subCateData', $subCateData);
    }

    public function admin_slider($pdcode = null){
        prd($this->request);
        $product = $this->Product->find('all',array(
            'conditions'=>array('Product.product_code' => $pdcode,'Product.status'=>1)
        ));
        //prd($product);
                
        
    }
    
    public function admin_changeStatus() {

        if ($this->request->is('ajax')) {
            $data = array();
            $data['Product']['id'] = $this->request->data['id'];
            $data['Product']['status'] = $this->request->data['status'] == 1 ? 0 : 1;

            if ($data['Product']['status'] == 0) {
                $data['Product']['is_show'] = 0;
            }

            if ($this->Product->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } else {
            $this->flash_msg(2, 'Unauthorized Access');
            $this->redirect(array('controller' => 'products', 'action' => 'index'));
        }
    }

    public function admin_makefront() {

        if ($this->request->is('ajax')) {

            $data['Product']['id'] = $this->request->data['id'];

            if ($this->request->data['is_show'] == 0) {
                /* FIND COUNT FOR 8 */
                $proCount = $this->Product->find('count', array(
                    'conditions' => array('Product.is_show' => 1)
                ));

                if ($proCount >= 8) {
                    echo '2';
                    exit;
                } else {
                    $data['Product']['is_show'] = 1;
                }
            } else {
                $data['Product']['is_show'] = 0;
            }


            if ($this->Product->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } else {
            
        }
    }

    public function admin_changeShow() {
        if ($this->request->is('ajax')) {
            $data = array();
            $isShowData = $this->Product->find('count', array(
                'conditions' => array('Product.is_show' => 1)
            ));

            if ($this->request->data['status'] == 1) {
                $data['Product']['id'] = $this->request->data['id'];

                if ($this->request->data['is_show'] == 1) {
                    $data['Product']['is_show'] = 0;

                    if ($this->Product->save($data)) {
                        echo '1';
                    }
                } else {
                    if ($isShowData < 8) {
                        $data['Product']['is_show'] = 1;
                        if ($this->Product->save($data)) {
                            echo '1';
                        }
                    } else {
                        echo "2";
                    }
                }
            } else {
                echo '0';
            }

            exit;
        } else {
            $this->flash_msg(2, 'Unauthorized Access');
            $this->redirect(array('controller' => 'products', 'action' => 'index'));
        }
    }

    public function admin_deleteProduct() {
        if ($this->request->is('ajax')) {
            $data = array();
            $data['Product']['id'] = $this->request->data['id'];
            $data['Product']['status'] = '2';
            $data['Product']['is_show'] = '0';

            if ($this->Product->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } else {
            $this->flash_msg(2, 'Unauthorized Access');
            $this->redirect(array('controller' => 'products', 'action' => 'index'));
        }
    }

    public function admin_removeImage() {
        if ($this->request->is('ajax')) {
            $this->loadModel('Image');
            $data = array();
            $imageId = $this->request->data['id'];
            $ImageName = $this->Image->find('all', array(
                'conditions' => array('Image.id' => $imageId),
                'fields' => 'Image.image_name'
            ));
            unlink('img/uploads/' . $ImageName[0]['Image']['image_name']);
            if ($this->Image->delete($imageId)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } else {
            $this->flash_msg(2, 'Unauthorized Access');
            $this->redirect(array('controller' => 'products', 'action' => 'index'));
        }
    }

    public function search($searchData = null) {
        //prd($this->request);
        $this->set('title_for_layout', 'Samrudh Exports - Search');
        $this->loadModel('SearchResult');
        $flag = 0;
        $cond = array();
        $cond['Product.id !='] = 2;



        // Requesting Keyword from search box
        if (!empty($this->request->data)) {
            $searchData = $this->request->data['s'];
        }
        if (isset($searchData)) {
            // Checking Keyword and setting condition for search
            if (isset($searchData) && !empty($searchData)) {
                $cond['or'][] = array('Product.title LIKE' => "%$searchData%");
                $cond['or'][] = array('Product.keywords LIKE' => "%$searchData%");
                //$cond['Product.title LIKE'] = "%$data['s']%";
            }


            $this->Paginator->settings = array(
                'conditions' => array($cond, 'Product.status ' => 1),
                'fields' => array('id', 'title', 'product_code', 'specification', 'category_id', 'keywords'),
                'limit' => 9,
                    //'paramType' => 'querystring',
            );


            // Setting all required Variables
            $prdData = $this->Paginator->paginate('Product');
            $paginationQuery = $this->params->paging; // This variable storing pagination information. Which is useful in pagination
            $this->set('prdData', $prdData);
            $this->set('searchData', $searchData);
        }



        if (!empty($searchData)) {

            $allWords = $this->SearchResult->find('all', array(
                'fields' => array(
                    'SearchResult.id',
                    'SearchResult.search_words',
                    'SearchResult.hits'),
            ));
            //  prd($allWords);
            $searchResult = array();
            foreach ($allWords as $words) {

                if ($words['SearchResult']['search_words'] == $searchData) {
                    $flag = 1;
                    //  echo $words['SearchResult']['search_words'];
                    $searchId = $words['SearchResult']['id'];
                    $searchHits = $words['SearchResult']['hits'];
                    break;
                } else {
                    $flag = 2;
                }
            }
            if ($flag == 1) {
                // echo 'found';
                //  echo $searchId;
                //  echo $searchHits;
                $data = array(
                    'id' => $searchId,
                    'hits' => $searchHits + 1,
                );
                $this->SearchResult->save($data);
                //echo 'Sucess';
            }
            if ($flag == 2) {
                // echo 'not found';
                //echo $this->Session->setFlash('No result found.');
                $searchResult['search_words'] = $searchData;
                $searchResult['hits'] = 1;
                $this->SearchResult->save($searchResult);
            }
        }
        if (!empty($this->params->pass[0])) {
            $searchData1 = $this->params->pass[0];
            $this->request->data['s'] = $searchData1;
            $this->params->paging = $paginationQuery;
            $this->set('searchData', $this->request->data['s']);
        }
    }

    public function get_extension($file_name) {
        $ext = explode('.', $file_name);
        $ext = array_pop($ext);
        return strtolower($ext);
    }

}
