<?php
echo $this->Html->css('jcarousel.connected-carousels');
echo $this->Html->script('jquery.jcarousel.min');
echo $this->Html->script('jcarousel.connected-carousels');
pr($proData);
?>
<!--Middle Container Start-->                
<div class="mid_container">
    <div class="product_info">
        <div class="pro_slider">
            <div id="products">

                <div class="connected-carousels">
                    <div class="stage">
                        <div class="carousel carousel-stage">
                            <ul>
                                <?php
                                $i = 0;
                                //pr($proData);
                                foreach ($proData[0]['Images'] as $pro_image) {
                                    //pr($pro_image);
                                    ?>
                                    <li>
                                    <div class="slider_imgDiv">    
                                    <?php echo $this->Image->resize('uploads/' . $pro_image['image_name'],400,500); //echo $this->Html->image('uploads/' . $pro_image['image_name'], array('width' => 300, 'height' => 200)); ?>
                                    </div>
                                    </li>
                                    
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                        </div>
                        <p class="photo-credits">
                        <!--  Photos by <a href="">Dharm Bagrecha</a>-->
                        </p>
                        <a href="#" class="prev prev-stage"><span>&lsaquo;</span></a>
                        <a href="#" class="next next-stage"><span>&rsaquo;</span></a>
                    </div>

                    <div class="navigation">
                        <a href="#" class="prev prev-navigation">&lsaquo;</a>
                        <a href="#" class="next next-navigation">&rsaquo;</a>
                        <div class="carousel carousel-navigation">
                            <ul>
                                <?php
                                $i = 0;
                                //pr($proData);
                                foreach ($proData[0]['Images'] as $pro_image) {
                                    //pr($pro_image);
                                    ?>
                                    <li><?php 
                                    echo $this->Image->resize('uploads/' . $pro_image['image_name'],80,80);
                                    ?></li>
                                    <?php
                                    $i++;
                                }
                                ?>    </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pro_info">
            <div class="pro_i_name">
            <?php echo $proData[0]['Product']['name']; ?>
            </div>
            <div class="pro_i_desc">
                <?php echo $proData[0]['Product']['descp']; ?>
            </div>
            <div class="pro_share">
                <h4 class="siteheading"> <span style="padding-left:20px;"> Share It </span> </h4>
                <?php
                $ShareProductUrl = $this->webroot . "Product/view" . $proData[0]['Product']['id'] ;
                $ShareImagePath  = "";
                $productTitle = "";
                $fbDescription = "";
                echo $this->General->fbShareButtonLink('s_facebook.png',$ShareProductUrl,$ShareImagePath,$productTitle,$fbDescription);
                echo $this->Html->image('s_twitter.png',array('class'=>'footer_s_img'));
                echo $this->Html->image('s_google_plus.png',array('class'=>'footer_s_img'));
                //echo $this->Html->image('s_pinterest.png',array('class'=>'footer_s_img'));
                //echo $this->Html->image('s_email.png',array('class'=>'footer_s_img'));
                ?>
            </div>
        </div>
    </div>


    <div class="productContect">
        <h4 class="siteheading"> <span style="padding-left:20px;">Make A Review </span> </h4>
        <?php
        echo $this->Form->create("Review");
        echo $this->Form->input("name", array('label' => false, 'placeholder' => ' Name (required)'));
        echo $this->Form->input("email", array('label' => false, 'placeholder' => ' Email (required)'));
        echo $this->Form->textarea("review", array('rows' => 6, 'label' => false, 'placeholder' => ' Message (required)'));
        echo $this->Form->submit("Save");
        echo $this->Form->end();
        ?>
    </div>
</div>
<!--Middle Container End-->

<style>

</style>

<script>
    $(function(){
        $('#products').slides({
            preload: true,
            preloadImage: 'img/loading.gif',
            effect: 'slide, fade',
            crossfade: true,
            slideSpeed: 350,
            fadeSpeed: 500,
            generateNextPrev: true,
            generatePagination: false
        });
    });
</script>