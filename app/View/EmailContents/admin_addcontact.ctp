	<section class="content">
			<header class="main-header clearfix">
				<h1 class="main-header__title">
					<i class="fa fa-user"></i>
					Contact Add
				</h1>
				<div class="main-header__date">
					<a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'email_contents','action'=>'contacts')); ?>" class="btn btn-light pull-right">Back</a>
				</div>
			</header>

		<div class="row">

			<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Add new Contact</h3>
					</header>

					<div class="widget__content">
                                            <?php echo $this->Form->create('Contact'); ?>
                                            <?php 
                                            echo $this->Form->input('name',array(
                                                'label'=>false,
                                                'placeholder'=>'Enter name',
                                                'class'=>'input-text')); 
                                            ?>
                                            
                                            <?php 
                                            echo $this->Form->input('email',array(
                                                'label'=>false,
                                                'placeholder'=>'Enter email address',
                                                'class'=>'input-text')); 
                                            ?>
                                            
                                            <?php 
                                            echo $this->Form->input('contact',array(
                                                'label'=>false,
                                                'placeholder'=>'Enter contact no',
                                                'class'=>'input-text')); 
                                            ?>
                                            
                                            
                                            
                                            <?php 
                                            echo $this->Form->input('description',array(
                                                'label'=>false,
                                                'type'=>'textarea',
                                                'placeholder'=>'Some description (optional)',
                                                'class'=>'input-text',
                                                )); 
                                            ?>
                                            
                                        	<?php echo $this->Form->submit('Save',array('class'=>'btn btn-light pull-right')); ?>
                                                <?php echo $this->Form->end(); ?>
						<div class="clearfix"></div>
					</div>

				</article>
			</div>
		</div>
	</section>