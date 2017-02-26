	<section class="content">
			<header class="main-header clearfix">
				<h1 class="main-header__title">
					<i class="icon pe-7s-menu"></i>
					Add Category
				</h1>
				<div class="main-header__date">
                                    <a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'categories','action'=>'index')); ?>" class="btn btn-light pull-right">Back</a>
				</div>
			</header>

		<div class="row">

			<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Add New Category</h3>
					</header>

					<div class="widget__content">
                                            <?php echo $this->Form->create('Category'); ?>
                                            <?php echo $this->Form->input('title',array('label'=>false,'placeholder'=>'Category Title','class'=>'input-text')); ?>
                                            <?php echo $this->Form->submit('Save',array('class'=>'btn btn-light pull-right')); ?>
                                            <?php echo $this->Form->end(); ?>
						<div class="clearfix"></div>
					</div>

				</article>
			</div>
		</div>
	</section> <!-- /content -->
	