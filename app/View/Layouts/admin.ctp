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

//$cakeDescription = __d('cake_dev', 'LARIYA ART - ADMIN');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
                
                echo $this->Html->css(array(
                    'admin/jquery-ui',
                    'bootstrap/bootstrap',
                    'admin/bootstrap-tagsinput',
                    'fa/font-awesome',
                    'admin/jqGrid/ui.jqgrid',
                    'admin/style',
                    'admin/admin'
                    ));
                
                echo $this->Html->script(array(
                    //'jquery_004',
                    //'jquery-1',
                    'admin/jquery-1.11.1.min',
                    //'jquery-ui',
                    'admin/ckeditor/ckeditor',
                    'admin/ckeditor/adapters/jquery',
                    //'jquery-ui.min',
                    'admin/jqGrid/i18n/grid.locale-en',
                    'admin/jqGrid/jquery.jqGrid.min',
                    'bootstrap/bootstrap.min',
                    
                    
                    //'main'
                    ));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <?php echo $this->element('admin/header'); ?>
    
    <div class="wrapper">
        <?php echo $this->element('admin/sidebar'); ?>
       
        <section class="content">
             <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
            </section>
       
    </div>
     <?php echo $this->element('admin/footer'); ?>
			
	
</body>
</html>
