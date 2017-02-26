<?php
///prd($subCateData);
?>

<section class="content">
    <header class="main-header clearfix">
        <h1 class="main-header__title">
            <i class="icon pe-7s-menu"></i>
           EDIT Category
        </h1>
        <div class="main-header__date">
            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categories', 'action' => 'index')); ?>" class="btn btn-light pull-right">Back</a>
        </div>
    </header>

    <div class="row">

        <div class="col-md-12">
           
            
             <article class="widget">
                <header class="widget__header">
                    <h3 class="widget__title">Edit Sub Category</h3>
                </header>

                <div class="widget__content">
                    <?php echo $this->Form->create('SubCategory'); ?>
                    <?php
                    
                    
                    
                    
                    
                    
                    
                    
                        $cateData = array();
                       // $values = array();
                        //$values[0] = 'Select';
                        $selVal = 0;
                        foreach($parent_category as $cates){
                            /* FIND SELECT VALUE FROM $productData */
                                    //foreach($subCateData as $pOpt){
                                      // pr($pOpt);
                                        if($cates['Category']['id'] == $subCateData['SubCategory']['category_id']  )
                                        {
                                            $selVal = $cates['Category']['id'];
                                           //break;
                                        }
                                  //  }
                            $cateData[$cates['Category']['id']] = $cates['Category']['title']; 
                        }
                        
                    ?>
                    
                    <?php 
                        echo $this->Form->hidden('id');
                    echo $this->Form->input('category_id', array(
                        'label' => false, 
                        'placeholder' => 'Sub Category Title', 
                        'class' => 'input-text',
                        'options' =>$cateData,
                        'selected' => $selVal,
                        )); ?>
                    
                    <?php echo $this->Form->input('title', array('label' => false, 'placeholder' => 'Sub Category Title', 'class' => 'input-text')); ?>
                   <?php // echo $this->Form->input('product_code_keyword', array(
                       // 'label' => false, 
                       // 'placeholder' => 'Product Code Keyword - As small as possible', 
                       // 'class' => 'input-text',
                       // 'required',
                       //  ));  ?>
                     <?php echo $this->Form->submit('Save', array('class' => 'btn btn-light pull-right')); ?>
                    <?php echo $this->Form->end(); ?>
                    <div class="clearfix"></div>
                </div>

            </article>
        </div>
    </div>
</section> <!-- /content -->
