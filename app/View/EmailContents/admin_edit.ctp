<section id="formElement" class="utopia-widget utopia-form-box section">
	<div id="admin_body">
		<div id="admin_inner_flp">
			<div class="utopia-widget-title">
				<span>Email Contents - Update</span>
			</div>

			<div id="box_bg" class="row-fluid" style="display:block;">
				<div id="content_admin" class="admin_content_block">
					<?php
						echo $this->Form->create("EmailContent", array(
							'action' => 'admin_edit',
							'autocomplete' => 'off',
							'class'=>'form-horizontal',
							'onsubmit'=>'return validate("content")'
							)
						);
						echo $this->Form->input('id', array('type' => 'hidden'));
					?>
				
					<div class="control-group">
					<label class="control-label">Title</label>
					<?php
					echo $this->Form->input('title', array(
						'type' => 'text',
						'required' => true,
						'placeholder' => 'Title',
						'class' => 'control',
						'label' => false,
						)
					);
					?>
					</div>
					
					<div class="control-group">
					<label class="control-label">Subject</label>
					<?php
					echo $this->Form->input('subject', array(
						'type' => 'text',
						'required' => true,
						'placeholder' => 'Title',
						'class' => 'control',
						'label' => false,
						)
					);
					?>
					</div>
					
					<div class="control-group">
					<label class="control-label">Body</label>
					<?php
					echo $this->Form->input('content', array(
						'type' => 'textarea',
						'required' => true,
						'placeholder' => 'Email Body',
						'rows' => '6',
						'cols' => '120',
						'label' => false
						)
					);
					?>
					</div>
					<div class="control-group">
					<?php
					echo $this->Form->submit("Save", array(
						'label' => false,
						'class' => 'btn btn-primary',
						'div'=>false
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
		</div>
	</div>
</section>

<script type="text/javascript">
$( document ).ready( function() {
	$( 'textarea#EmailContentContent' ).ckeditor();
} );


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

function validate(description)
{

	$(".error-message").remove();
	if(validateCKEDITORforBlank($.trim(CKEDITOR.instances.description.getData().replace(/<[^>]*>|\s/g, ''))))
	{
		$("#"+description).parent().append('<div class="error-message">This field is required.</div>');
		CKEDITOR.instances.description.setData("");
		return false;
	}
	return true;
}
</script>