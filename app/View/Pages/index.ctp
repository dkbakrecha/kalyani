<?php
//prd($navData);
?>


   
      
            <div class="row">
                 <div class="col-md-6">
                    <span class="front_1">Categories</span>
                </div>
                

            </div>
            <hr>
            <div class="row">
                
                <div class="col-md-4 col-lg-4  ">
                    <div class="thumbnail_1">
                        <div class="row">
                            <div class="col-lg-12 a_class" ><span>Wooden Furniture </span></div>
                            <div class="col-lg-12">
                                <a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'categories',2))?>">
                                    <?php echo $this->Html->image('wooden.jpg'); ?>  </a>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-md-4 col-lg-4  ">
                    <div class="thumbnail_1">
                        <div class="row">
                            <div class="col-lg-12 a_class" ><span>Industrial Furniture </span></div>
                            <div class="col-lg-12">
                                <a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'categories',1))?>">
                                    <?php echo $this->Html->image('industrial.jpg'); ?>  </a>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-md-4 col-lg-4  ">
                    <div class="thumbnail_1">
                        <div class="row">
                            <div class="col-lg-12 a_class" ><span>Home Furnishing </span></div>
                            <div class="col-lg-12">
                                <a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'categories',3))?>">
                                    <?php echo $this->Html->image('home.jpg', array('width' => '50', 'height' => '40')); ?>  </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="thumbnail_1">
                        <div class="row">
                            <div class="col-lg-12 a_class" ><span>Wall Decor</span></div>
                            <div class="col-lg-12">
                                <a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'categories',5))?>">
                                    <?php echo $this->Html->image('wall.jpg', array('width' => '50', 'height' => '40')); ?>  </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4  ">
                    <div class="thumbnail_1">
                        <div class="row">
                            <div class="col-lg-12 a_class" ><span>Gifts & Accessories </span></div>
                            <div class="col-lg-12">
                                <a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'categories',4))?>">
                                    <?php echo $this->Html->image('gifts.jpg', array('width' => '50', 'height' => '40')); ?>  </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4  ">
                    <div class="thumbnail_1">
                        <div class="row">
                            <div class="col-lg-12 a_class" ><span>Flooring </span></div>
                            <div class="col-lg-12">
                                <a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'categories',6))?>">
                                    <?php echo $this->Html->image('flooring.jpg', array('width' => '50', 'height' => '40')); ?>  </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                


            </div>
            <hr>





            <div class="row">
                <div class="col-md-6">
                    <span class="front_1">Featured Products</span>
                </div>
            </div>
            <hr>
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <?php
                        $i = 0;
                        foreach ($frontProdcuts as $front) {
                            if ($i == 4) {
                                echo "</div><div class='row'>";
                            }
                            ?>
                            <div class="col-sm-3 col-lg-3 col-md-3">
                                <div class="thumbnail">
                                    <div class="boxtitle">
                                        <h2>
                                            <a title="<?php echo $front['Product']['title'] ?>" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $front['Product']['id'])); ?>"><?php echo $front['Product']['title'] ?></a>
                                        </h2>
                                    </div>
                                    <div class="boximage">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $front['Product']['id'])); ?>">
                                            <?php echo $this->Html->image('uploads/' . $front['Images'][0]['image_name'], array('class' => 'productshot', 'alt' => $front['Product']['title'], 'title' => $front['Product']['title'])); ?>
                                        </a>
                                    </div>

                                    <div class="pricetab clearfix">
                                        <span class="oldprice">
                                            Code :   <?php echo $front['Product']['product_code'] ?>
                                        </span>
    <!--                                        <span class="prodetail">
                                            <a href="<?php //echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $front['Product']['id']));  ?>">Details</a>
                                        </span>-->
                                    </div>

                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>   
       
        





