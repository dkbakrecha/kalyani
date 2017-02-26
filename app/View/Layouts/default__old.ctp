<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>

<html>
    <head>


        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">



        <?php echo $this->Html->charset(); ?>
        <title>
            <?php //echo $cakeDescription  ?>
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->Css(array(
            'front/style',
            'fa/font-awesome.min',
            'bootstrap/bootstrap.min',
            'front/style_nav',
            'front/green',
            'front/css',
            'front/flexslider',
            'front/front',
            'front/prettyPhoto',
            'front/responsive',
            // 'front/superfish',
            'front/woocommerce',
        ));
        echo $this->Html->script(array(
            'jQueryv1.11.1',
            'front/jquery',
            //'front/script_nav',
            'front/jquery-ui',
            'front/hoverIntent',
            'front/superfish',
            'front/jquery_004',
            'front/jquery_003',
            'front/jquery_002',
            'front/scripts',
            'front/add-to-cart',
            'front/jquery-plugins',
           // 'front/woocommerce',
            'bootstrap/bootstrap.min'
        ));
        ?>

        <style type="text/css">

            h1, h2, h3, h4, h5, h6, #ui-datepicker-div .ui-datepicker-title, .dropcap, .ui-tabs .ui-tabs-nav li, 
            #title-wrapper h1, #main-menu li, #main-menu li span, .caption, .accommodation_img_price {
                font-family: 'Cardo', serif;
            }

            #site-title {
                width: 220px;
            }
        </style>

    </head>
    <body class="home page page-id-14 page-template page-template-template-homepage-php theme-organicshop">

        <div class="container">
            <div class="wrapper">

                <?php echo $this->Element('header') ?>
                <?php // echo $this->Element('topmenu') ?>
                <?php echo $this->Element('flaxnav'); ?>
                <div class="section  paddingLR">
                    <?php echo $this->Element('flash_msg'); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
                <?php // echo $this->Session->flash(); ?>

                <?php echo $this->Element('footer') ?>


            </div>
        </div>

    </body>




</html>
