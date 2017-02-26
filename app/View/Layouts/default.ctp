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
//$cakeDescription = __d('cake_dev', 'SAMRUDH EXPORTS');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php //echo $cakeDescription  ?>
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->element('meta');
        echo $this->Html->css(array(
            'bootstrap/bootstrap.min',
            'yamm',
            'fa/font-awesome.min',
            'front',
            'front-boot'
        ));

        echo $this->Html->script(array(
            'jquery',
            'jquery-1.11.1.min',
            'jquery-migrate.min',
            'bootstrap/bootstrap.min',
            'superfish',
            'jquery.flexslider-min',
            'jquery.fancybox-1.3.4.pack',
            'jquery.easing.1.3',
        ));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <?php //echo $this->element('topbar'); ?>
        <?php echo $this->element('header'); ?>
        <div class="wrapper">
            <div class="container"> 
                <?php //prd($this->request); ?>
                <?php 
                    if($this->request->params['controller'] == 'pages' && $this->request->params['action'] == 'index'){
                            
                         echo $this->element('mainslider');
                    }
                
                ?>
                <div id="home-content">   
                    <?php echo $this->element('message'); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <?php echo $this->element('footer'); ?>
        <?php echo $this->element('footerbottom'); ?>

    </body>
</html>
