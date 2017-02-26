<!--Middle Container Start-->                
<div class="mid_container">
    <h2 class="siteheading"> <span style="padding-left:20px;"> PRODUCTS </span></h2>
    <div class="product_row">
        <?php
        
        foreach ($proList as $list) {
            //pr($list);
            ?>
            <div class="boxgrid slidedown"  style="cursor: pointer;" onclick="window.location='<?php echo $this->webroot; ?>Products/view/ <?php echo $list['Product']['id'] ?>'">
                <a href="<?php echo $this->Html->url(array('controller'=>'Products','action'=>'view',$list['Product']['id'])); ?>" title="Accessories" class="cover">
                    <?php 
                    echo $this->Image->resize('uploads/' . $list['Image']['image_name'],224,230)
                    ////echo $this->Html->image('uploads/' . $list['Image']['image_name'], array('class' => 'product-photo')); ?>             
                </a>
                <div class="product-info">

                    <h4 class="title">
                        <a href="<?php echo $this->Html->url(array('controller'=>'Products','action'=>'view',$list['Product']['id'])); ?>"><?php echo $list['Product']['name']; ?></a>
                        <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    </h4
                    

                    <a href="<?php echo $this->Html->url(array('controller'=>'Products','action'=>'view',$list['Product']['id'])); ?>"><div class="product-desc">
                            <?php echo $list['Product']['descp']; ?>
                        </div></a>
                </div>

            </div>
        <?php } ?>
        
        <?php  /*  
        <div class="col_1_of_3 span_1_of_3"> 
			   <a href="http://w3layouts.com/demos/leoshop/web/single.html">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="Free%20Leoshop%20Website%20Template%20_%20Home%20%20%20w3layouts_files/pic.jpg" alt="">
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
				</div>
        
        <div class="col_1_of_3 span_1_of_3"> 
			   <a href="http://w3layouts.com/demos/leoshop/web/single.html">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="Free%20Leoshop%20Website%20Template%20_%20Home%20%20%20w3layouts_files/pic.jpg" alt="">
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">New</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Lorem Ipsum simply</p>
							<div class="price1">
							  <span class="actual">$12.00</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
				</div>
         * **/  ?>
         
    </div>
    <div class="clr"></div>

</div>
<!--Middle Container End -->