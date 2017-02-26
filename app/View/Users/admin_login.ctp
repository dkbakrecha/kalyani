<div class="wrapper login-page">

		<div class="row mtop-100">
                    
                        <div class="col-md-3 col-md-offset-3 clearfix bg--dark">
                            <?php echo $this->Html->image('classylogo.png',array('class'=>'img-responsive')); ?>
                        </div>
			<div class="col-md-3 col-md-offset-0 clearfix bg--dark">
				
				<div class="main-logo">SAMRUDH EXPORTS <span>LOGIN</span>
				</div>
                                <?php echo $this->Form->create('User'); ?>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <?php 
                                            echo $this->Form->input('username',array(
                                                'label'=>false,
                                                'class'=>'input-text form-control',
                                                'placeholder'=>'username')); 
                                        ?>
				</div>
				<div class="input-group mtop-25">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <?php 
                                            echo $this->Form->input('password',array(
                                                'label'=>false,
                                                'class'=>'input-text form-control',
                                                'placeholder'=>'password')); 
                                        ?>

				</div>
				<div class="clearfix"></div>
                                <?php echo $this->Form->submit("LOGIN",array('class'=>'btn btn-skyblue pull-right')); ?>
			        <?php echo $this->Form->end(); ?>
			</div>
		</div>

	</div> <!-- /wrapper -->

<!--<section class="container">
    <div class="login">
      <h1>Admin Login</h1>
      <?php //echo $this->Form->create('User'); ?>
        <?php //echo $this->Form->input('username');
        //echo $this->Form->input('password');
        ?>
        <?php //echo $this->Form->end(__('Login')); ?>
      <?php //echo $this->Session->flash('auth'); ?>
    </div>

  </section>-->