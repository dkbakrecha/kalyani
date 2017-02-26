<?php
// prd($searchData);
?>
<!--/* MUSIC HERE */-->
<?php if (Configure::read('Site.play') == '0') { ?>
    <audio autoplay loop>
        <source src="<?php echo $this->webroot; ?>files/<?php echo Configure::read('Site.musicfile'); ?>.mp3" type="audio/mpeg">

        <p>If you are reading this, it is because your browser does not support the audio element.</p>
    </audio>
<?php } ?>
<!--/* MUSIC HERE */-->

<div class="container">
    <div id="masthead">
        <div id="topbar">
            <div class="col-lg-6 col-sm-12">
                <div id="blogLOGO" class="col-sm-12">
                    <h1 class="logo">
                        <a title="Samrudh Exports" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>">
                            <?php echo $this->Html->image('logo.jpg', array('class' => 'img-responsive')); ?>
                        </a>
                    </h1>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 pull-right">
                <div class="top-contact">

                    <div class="row pull-right ">
                        <i class="fa fa-envelope fa-lg greencolor "> </i>  <?php echo Configure::read('Site.email'); ?>
                        &nbsp;<i class="fa fa-phone fa-lg greencolor "> </i> +91- <?php echo Configure::read('Site.mobile'); ?> 
                    </div>


                </div>
                <div id="search" >
                    <form id="searchform" action="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'search')); ?>" method="post" role="search">
                        <div>
                            <input id="s" type="text" name="s" required="required"  value="<?php echo @$searchData ?>">
                            <input id="searchsubmit" type="submit" value="Search" >
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <nav class="navbar yamm navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'index')); ?>">Home</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        $cont = $this->request->params['controller'];
                        $act = $this->request->params['action'];

                        //pr($cont . "" . $act);

                        $mnuProduct = $mnuAbout = $mnuFaq = $mnuContact = "";

                        if ($cont == "products") {
                            $mnuProduct = 'active';
                        } else if ($cont == "pages" && $act == "aboutus") {
                            $mnuAbout = 'active';
                        } else if ($cont == "pages" && $act == "contact") {
                            $mnuContact = 'active';
                        } else if ($cont == "faqs") {
                            $mnuFaq = 'active';
                        }
                        ?>
<style>
    .mnu-subheader{
        color: #538507;
        line-height: 20px;
        font-size: 12px;
        font-weight: 600;
        min-width: 160px;
        
    }
    
    .mnu-subtitle{
        font-size: 12px;
        font-weight: 400;
        margin: 4px 0px;
    }
    </style>
                        <li class="dropdown <?php echo $mnuProduct; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                        <?php
                                        //pr($cateData);
                                        foreach ($cateData as $cate) {
                                            ?>
                                            <div class="col-lg-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mnu-subheader">
                                                        <?php echo $cate['Category']['title'] ?>
                                                        </div>
                                                        <?php 
                                                        if(!empty($cate['SubCategory'])){
                                                            foreach($cate['SubCategory'] as $subCat){
                                                                ?>
                                                        <div class="mnu-subtitle">
                                                                    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index', $subCat['id'])); ?>"><?php echo $subCat['title']; ?></a>
                                                        </div>
                                                                <?php
                                                            }
                                                        } 
                                                        ?>
                                                </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </li>

                        <li class="<?php echo $mnuAbout; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'aboutus')); ?>">About Us</a></li>
                        <li class="<?php echo $mnuFaq; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index')); ?>">FAQ</a></li>
                        <li class="<?php echo $mnuContact; ?>"><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact')); ?>">Contact Us</a></li>
                    </ul>


                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

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