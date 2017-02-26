	<header class="top-bar">
		<a class="mobile-nav" href="#"><i class="pe-7s-menu"></i></a>
		<div class="main-logo">SAMRUDH EXPORTS <span>ADMINISTRATOR</span></div>
		<input id="s-logo" class="sw" type="checkbox">
		
		<ul class="profile">
			<li>
				<a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'index')); ?>" onclick="return false;">
					<span class="profile__name">
						Admin <span>User</span> <i class="fa fa-angle-down"></i>
					</span>
				</a>
				<ul class="dropdown-menu pull-right">
                                    <?php if( $this->Session->read("Auth.Admin.role") == 'admin'){ ?>
					<li><a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'profile')); ?>"><i class="fa fa-info"></i> Edit Profile</a></li>
                                    <?php } ?>   
				        <li><a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'users','action'=>'logout')); ?>"><i class="fa fa-lock"></i> Log Out</a></li>
				</ul>
			</li>
		</ul>

	</header> <!-- /top-bar -->