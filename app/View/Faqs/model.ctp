<?php
echo $this->Html->css('bootstrap/bootstrap.min');
echo $this->Html->script(
        array(
            'bootstrap/bootstrap.min'
));
?>

<h2>Example of creating Modals with Twitter Bootstrap</h2>
<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" 
        data-target="#myModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Enquiry Form
                </h4>
            </div>
            <div class="modal-body">
                 <?php
                   echo $this->Form->create('Message',array('role'=>'form'));
                 ?>
                   
                 <?php
                   echo $this->Form->input('product_code',array('label'=>'Product Code : ','value'=>'ABCD','readonly'=>'readonly','class'=>'form-control'));
                  echo '<br>';
                   echo $this->Form->input('name',array('label'=>'Name','placeholder'=>'Enter Name','class'=>'form-control'));
                   echo '<br>';
                   echo $this->Form->input('email',array('label'=>'Email','placeholder'=>'Enter Name','class'=>'form-control'));
                   echo '<br>';
                   echo $this->Form->input('mobile',array('label'=>'Phone Number','placeholder'=>'Enter Name','class'=>'form-control'));
                   echo '<br>';
                   echo $this->Form->input('message',array('label'=>'Your Message','placeholder'=>'Enter Name','class'=>'form-control','row'=>25,'cols'=>25));
                  
                
                ?>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Close
                </button>
                <?php echo $this->Form->Submit('Submit',array('class'=>'btn btn-primary','div'=>false));?>
<!--                <button type="button" class="btn btn-primary">
                    Submit changes
                </button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->

    <script type="text/javascript">

       
        



    </script>