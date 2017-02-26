	<section class="content">
			<header class="main-header clearfix">
				<h1 class="main-header__title">
					<i class="fa fa-cog"></i>
					Site Settings
				</h1>
				<div class="main-header__date">
                                    <a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'index')); ?>" class="btn btn-light pull-right">Back</a>
                                    <a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'music')); ?>" class="btn btn-light pull-right">Music</a>
                                    <a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'seostatus')); ?>" class="btn btn-light pull-right">SEO Status</a>
                                    <a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'prostatus')); ?>" class="btn btn-light pull-right">Site Status</a>
                                    <a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'support')); ?>" class="btn btn-light pull-right">Support</a>
				</div>
			</header>

		<div class="row">

			<div class="col-md-12">
				<article class="widget">

                <?php
                echo $this->Form->create('Sitesetting', array('class' => 'form-horizontal row-fluid'));
                $i = 0;
                foreach($allSettings as $settings){
                    
                ?>
            <div class="control-group">
                <label class="control-label" for="basicinput">    
                <?php    
                    echo $this->Form->input("Sitesetting.$i.id",array('value'=>$settings['Sitesetting']['id'],'type'=>'hidden'));
                    echo $settings['Sitesetting']['title'];
                ?>
                </label>
                <div class="controls">
                <?php   echo $this->Form->input("Sitesetting.$i.value",array('value'=>$settings['Sitesetting']['value'],'label'=>false,'type'=>'text','class'=>'input-text'));  ?>
                </div>
            </div>
                <?php    
                    $i++;
                   // pr($this->request);
                }
                ?>
            <div class="control-group">
                <div class="controls">    
                <?php
                echo $this->Form->submit('UPDATE',array('class'=>'btn btn-skyblue'));
                ?>
                </div>
            </div>    
                <?php
                echo $this->Form->end();
                ?>
                                    </article>
			</div>
		</div>
	</section> <!-- /content -->
	