<?php
//prd($forSlider);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 " >
            <div id="featured"> 
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        foreach ($forSlider as $slider) {
                            ?>
                            <li>
                                <div class="col-md-4 slider-bg1">


                                    <div class="flex-caption">
                                        <h2>
                                            <a title="" href=""><?php echo $slider['Product']['title'] .' - ' . $slider['Product']['product_code'] ; ?></a>
                                        </h2>
                                        <p class="for_p_tag"><?php echo $this->General->short_msg($slider['Product']['specification'], 400) ?></p>

                                        <div class="slidetab">
<!--                                            <span class="sprice">$500</span>-->
                                            <span class="spdetails">
                                                <a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'view', $slider['Product']['id']));?>">Product Details</a>
                                            </span>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-8 slider-bg2">


                                    <a href="">
                                        <?php echo $this->Html->image('uploads/' . $slider['Images'][0]['image_name'], array('class' => 'slideimg')); ?>
                                    </a>


                                </div>


                            </li>
                            <?php
                        }
                        ?>
                    </ul>

                </div>

            </div>

        </div>
    </div>