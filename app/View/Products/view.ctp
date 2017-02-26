<?php
echo $this->Html->script(array(
    'sliderengine/amazingslider',
    'sliderengine/initslider-1',
));
?>
<style>
    .amazingslider-img-0 > img {
        margin-left: 25%;
        width: 50% !important;
    }
</style>

        <div class="row">


            <div id="contenta" class="col-md-8">


                <div class="post" id="post-396">
                    <div class="prodmeta clearfix">
                        <span class="procategori"> Product Categories: <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index', $cateName[0]['Category']['id'])); ?> " rel="tag"> <?php echo $cateName[0]['Category']['title'] ?></a>   </span>
                    </div>

                    <div>
                        <div id="amazingslider-1" style="display:block;position:relative;margin:16px auto 56px;">
                            <ul class="amazingslider-slides" style="display:none;">
                                <?php
                                foreach ($imagesAll as $imgs) {
                                    ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php echo $this->Html->Image('uploads/' . $imgs['Image']['image_name'], array('alt' => 'antique-chair', 'class' => 'img-responsive')); ?>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>


                            </ul>
                        </div>

                    </div>


                    <a class="propic" href=""> <img class="productimg" src="" alt=""></a>
                    <div class="title">
                        <h2><a href="" rel="bookmark" title=""><?php echo $singleProduct[0]['Product']['title'] ?></a> </h2>
                        <h3>Product Code : <?php echo $singleProduct[0]['Product']['product_code'] ?></h3>
                    </div>

                    <div class="entry">


                        <p><?php echo $singleProduct[0]['Product']['specification']; ?></p>

                        
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" 
                                                data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            Enquiry For Product : <strong class="greencolor"><?php echo $singleProduct[0]['Product']['product_code'] ?></strong>
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        echo $this->Form->create('Message', array('role' => 'form'));
                                        ?>

                                        <?php
                                        echo $this->Form->input('product_code', array('label' => false, 'value' => $singleProduct[0]['Product']['product_code'], 'type' => 'hidden'));
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->input('name', array('label' => False, 'placeholder' => 'Enter Your Name', 'class' => 'form-control'));
                                                ?>   
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->input('email', array('label' => False, 'placeholder' => 'Enter Email Id', 'class' => 'form-control'));
                                                ?>
                                            </div>

                                        </div>
                                        <?php
                                        echo '<br>';
                                        echo $this->Form->input('mobile', array('label' => False, 'placeholder' => 'Enter Mobile Number', 'class' => 'form-control'));

                                        echo '<br>';
                                        echo $this->Form->input('message', array('label' => False, 'placeholder' => 'Your Enquiry', 'class' => 'form-control', 'row' => 25, 'cols' => 25));
                                        ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" 
                                                data-dismiss="modal">Close
                                        </button>
                                        <?php echo $this->Form->Submit('Submit', array('class' => 'btn btn-primary', 'div' => false)); ?>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>

                <!-- Comments not enabled -->

            </div>

            <div id="righta" class="col-md-4">
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-lg eng_btn " data-toggle="modal" 
                                data-target="#myModal">
                            Enquiry
                        </button>
                    </div>
                </div>
                <!-- Sidebar widgets -->
                <div class="sidebar">
                    <ul>
                        <li class="sidebox widget_categories"><h3 class="sidetitl">Categories</h3>
                            <ul>
                                <?php foreach ($cateData as $cate) {
                                    ?>
                                    <li class="cat-item cat-item-4"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index', $cate['Category']['id'])); ?>"><?php echo $cate['Category']['title']; ?></a></li>
                                <?php  
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
 