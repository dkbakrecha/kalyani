	<section class="content">
			<header class="main-header clearfix">
				<h1 class="main-header__title">
					<i class="fa fa-mail-forward"></i>
					Compose Mail
				</h1>
				<div class="main-header__date">
                                    <a href="<?php echo $this->Html->url(array('admin'=>true,'controller'=>'email_contents','action'=>'index')); ?>" class="btn btn-light pull-right">Back</a>
				</div>
			</header>

		<div class="row">

			<div class="col-md-12">
				<article class="widget">

			

			<div id="box_bg" class="row-fluid" style="display:block;">
				<div id="content_admin" class="admin_content_block">
					<?php
						echo $this->Form->create("EmailContent", array(
							'autocomplete' => 'off',
							'class'=>'form-horizontal',
							'onsubmit'=>'return validate()'
							)
						);
						echo $this->Form->input('id', array('type' => 'hidden'));
					?>
				
					<div class="control-group">
					
					<?php
					echo $this->Form->input('to', array(
							'type' => 'text',
							'placeholder' => 'To address',
							'id' => 'mailIds',
							'class' => 'input-text',
							'label' => false,
						)
					);
					?>
					</div>
					
					<div class="control-group">
					
					<?php
					echo $this->Form->input('subject', array(
							'type' => 'text',
							'required' => true,
							'placeholder' => 'Subject',
							'class' => 'input-text',
							'label' => false,
						)
					);
					?>
					</div>
					
					<div class="control-group">
					
					<?php
					echo $this->Form->input('content', array(
							'type' => 'textarea',
							'placeholder' => 'Email Body',
							'rows' => '6',
							'cols' => '120',
							'label' => false,
							'required' => false,
                                                        'class' => 'input-text'
						)
					);
					echo $this->Form->error('content');
					?>
					</div>
					
					<div class="control-group">
					<label class="control-label"></label>
					<?php
					echo $this->Form->submit("SEND", array(
						'label' => false,
						'class' => 'btn btn-primary',
						'div'=>false,
						'onclick'=>'return validate()'
						)
					);
					?>
					<a href="<?php echo $this->Html->url(array('admin'=>TRUE,'controller'=>'email_contents','action'=>'index')); ?>" class="btn">Back</a>
						
					</div>
					<?php
					echo $this->Form->end();
					?>
				</div>
				
			</div>
		
                                    
                                    </article>
			</div>
		</div>
	</section> <!-- /content -->
	

<script type="text/javascript">
$(function(){
	$( 'textarea#EmailContentContent' ).ckeditor( {filebrowserUploadUrl:"<?php echo $this->Html->url(array('action'=>'ckupload')) ?>"} );
	
	$('#mailIds').tagsinput();
	
	<?php if(isset($user_email) && !empty($user_email)){ ?>
			$('#mailIds').tagsinput('add', '<?php echo $user_email; ?>');
	<?php } ?>
});

function validateCKEDITORforBlank(field)
{
	var vArray = new Array();
	vArray = field.split("&nbsp;");
	var vFlag = 0;
	for(var i=0;i<vArray.length;i++)
	{
		if(vArray[i] == '' || vArray[i] == "")
		{
			continue;
		}
		else
		{
			vFlag = 1;
			break;
		}
	}
	if(vFlag == 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}	

function validate()
{
	description	=	'EmailContentContent';
	$(".error-message").remove();
	if(validateCKEDITORforBlank($.trim(CKEDITOR.instances.EmailContentContent.getData().replace(/<[^>]*>|\s/g, ''))))
	{
		$("#"+description).parent().append('<div class="error-message">This field is required.</div>');
		//CKEDITOR.instances.description.setData("");
		return false;
	}
	return true;
}
</script>