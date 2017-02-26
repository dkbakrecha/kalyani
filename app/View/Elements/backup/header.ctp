<?php
//prd($cateData);
?>

<div class="container">
<div id="masthead">
    <div id="topbar">
        <div id="blogname">
            <h1 class="logo">
                <a title="zenshop" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>">
                    <?php echo $this->Html->image('logo.jpg'); ?>
                </a>
            </h1>
        </div>
        <div id="search" >
            <form id="searchform" action="#" method="get" role="search">
                <div>
                    <input id="s" type="text" name="s" value="">
                    <input id="searchsubmit" type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>
    
    <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php
                            foreach ($cateData as $cate) {
                                ?>
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller'=>'products','action' => 'index',$cate['Category']['id'])); ?>"><?php echo $cate['Category']['title']?></a>
                                </li>
                                <?php
                            }
            ?>
           
            
          </ul>
        </li>
        <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'showroom')); ?>">Showroom</a></li>
        <li class="active"><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact')); ?>">About Us</a></li>
        <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact')); ?>">Contact Us</a></li>
      </ul>
      <form class="navbar-form navbar-left pull-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div id="head" class="clearfix">

        <div id="botmenu" class="clearfix">

            <div id="submenu" class="menu-primary-container">
                <ul id="menu-primary" class="sfmenu sf-js-enabled sf-shadow">
                    <li id="menu-item-403" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-home menu-item-403">
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>">Home</a>
                    </li>
                    <li id="menu-item-400" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-400">
                        <a class="sf-with-ul" href="<?php //echo $this->Html->url(array('controller' => 'products', 'action' => 'index'));   ?>">
                            Products

                        </a>
                        <ul class="sub-menu" style="display: none; visibility: hidden;">
                            <?php
                            foreach ($cateData as $cate) {
                                ?>
                                <li id="menu-item-392" class="menu-item menu-item-type-taxonomy menu-item-object-product-category menu-item-392">
                                    <a href="<?php echo $this->Html->url(array('controller'=>'products','action' => 'index',$cate['Category']['id'])); ?>"><?php echo $cate['Category']['title']?></a>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                    </li>
                    <li id="menu-item-357" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-357">
                        <a class="sf-with-ul" href="#">
                            Store

                        </a>
                        <ul class="sub-menu" style="display: none; visibility: hidden;">
                            <li id="menu-item-384" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-384">
                                <a href="#">Express</a>
                            </li>
                            <li id="menu-item-385" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-385">
                                <a href="#">Receipt</a>
                            </li>
                            <li id="menu-item-362" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-362">
                                <a href="#">IPN</a>
                            </li>
                            <li id="menu-item-358" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-358">
                                <a href="#">Checkout</a>
                            </li>
                            <li id="menu-item-359" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-359">
                                <a href="#">Cart</a>
                            </li>
                        </ul>
                    </li> 
                    <li id="menu-item-386" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-386">
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'showroom')); ?>">Showroom</a>
                    </li>
                    <li id="menu-item-405" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-405">
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'aboutus')); ?>">About us</a>
                    </li>
                    <li id="menu-item-405" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-405">
                        <a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact')); ?>">Contact</a>
                    </li>
                </ul>
            </div>
        </div>


    </div>
</div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {

        /* Banner class */
        jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');
        jQuery('ul#shelf li:nth-child(4n)').addClass('lastbox');
        jQuery('ul#shelf li:nth-child(4n)').after('<div class="clear"></div>');

        /* Navigation */
        jQuery('#submenu ul.sfmenu').superfish({
            delay: 500, // 0.1 second delay on mouseout 
            animation: {opacity: 'show', height: 'show'}, // fade-in and slide-down animation 
            dropShadows: true								// disable drop shadows 
        });


        /* Slider */

        jQuery('.flexslider').flexslider({
            controlNav: true,
            directionNav: false
        });


        /* Fancy that	 */
        jQuery(".propic").fancybox({
            'titleShow': false,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'easingIn': 'easeOutBack',
            'easingOut': 'easeInBack'
        });

    });
</script>