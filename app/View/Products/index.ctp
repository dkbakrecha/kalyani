<?php
//prd($allProducts);
?>


        <div class="row">
            <div class="col-md-6">
 <span>Category - <?php echo @$subCateName[0]['SubCategory']['title'];?></span>
            </div>
            <div class="col-md-6">
                <span class="pull-right"><?php
                    echo $this->paginator->counter(
                            'Page {:page} of {:pages}, Total records {:count}'
                    );
                    ?></span>
            </div>


        </div>
        <hr>
        <div class="row">

            <div class="col-md-12">
                <?php
                foreach ($allProducts as $prd) {
                    ?>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <div class="boxtitle">
                                <h2>
                                    <a title="<?php echo $prd['Product']['title'] ?>" rel="bookmark" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $prd['Product']['id'])); ?>"><?php echo $prd['Product']['title'] ?></a>
                                </h2>
                            </div>
                            <div class="boximage">
                                <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $prd['Product']['id'])); ?>">
                                    
                                    <?php 
                                        if(isset($prd['Images'][0]['image_name'])&& !empty($prd['Images'][0]['image_name'])){
                                            echo $this->Html->image('uploads/' . $prd['Images'][0]['image_name'], array('class' => 'productshot', 'alt' => $prd['Product']['title']));
                                        }
                                        else{
                                             echo $this->Html->image('uploads/', array('class' => 'productshot', 'alt' => $prd['Product']['title']));
                                        }
                                    
                                    
                                    
                                     ?>
                                </a>
                            </div>
                             <div class="pricetab clearfix">
                                        <span class="oldprice">
                                            Code :   <?php echo $prd['Product']['product_code'] ?>
                                        </span>
    <!--                                        <span class="prodetail">
                                            <a href="<?php //echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $front['Product']['id']));  ?>">Details</a>
                                        </span>-->
                                    </div>
                            
                            
<!--                            <div class="pricetab clearfix">
                                <span class="prodetail">
                                    <a href="<?php// echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $prd['Product']['id'])); ?>">Details</a>
                                </span>
                            </div>-->

                        </div>
                    </div>
                    <?php
                }
                ?>    

                <div class="clear"></div>


                <div class="paginate_right wp-pagenavi pull-right">
                    <?php
                    echo $this->Paginator->first(
                            ' First ', array(), null, array('class' => '')
                    );
                    echo $this->Paginator->numbers(array('modulus'=>4)
                    );
                    echo $this->Paginator->last(
                            ' LAST ', array(), null, array('class' => '')
                    );
                    ?>
                </div>
            </div>
        </div>
 