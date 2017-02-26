<div class="main">
        <!-- START : PAGE CONTENT -->
        

<div class="section ">
<div class="row">
<div class="column small-12">
<h1 class="amber">My Account</h1>	
<div class="col-lg-6 col-lg-offset-3">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Existing Users'); ?></legend>
        <?php 
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->submit('Login',array('class'=>'btn btn-default red_btn'));
    ?>
        
        <a href="<?php echo $this->Html->url(array('controller'=>'users', 'action'=> 'signup')); ?>" class="btn btn-default red_btn">SIGNUP</a>
    </fieldset>
<?php 
    
    echo $this->Form->end(); 
?>
</div>
</div>
        </div>
	</div>
</div>