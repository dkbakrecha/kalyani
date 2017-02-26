<?php

?>
<?php
 //prd($this->request);
?>

<section class="content">
    <header class="main-header clearfix">
        <h1 class="main-header__title">
            <i class="fa fa-file"></i>
            CMS Edit
        </h1>
        <div class="main-header__date">
            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'cmspages', 'action' => 'index')); ?>" class="btn btn-light pull-right">Back</a>
        </div>
    </header>

    <div class="row">

        <div class="col-md-12">
            <article class="widget">

                <div class="widget__content">
                    <?php echo $this->Form->create('Cmspage'); ?>
                    

                    
                
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Title</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            echo $this->Form->input('title', array(
                                'label' => false,
                                'placeholder' => 'Title',
                                'class' => 'input-text',
                                'required'));
                            ?>
                        </div>   
                    </div>


                    <?php
                    echo $this->Form->hidden('id');
                    ?>

                    <br>

                    <div class="form-group">

                        <div class="col-lg-11">
                            <?php
                            echo $this->Form->input('description', array(
                                'label' => false,
                                'type' => 'textarea',
                                'placeholder' => 'Specifications',
                                'class' => 'input-text',
                            ));
                            ?>
                        </div> 
                    </div>




                  
                  



                    <div class="form-group">

                        <div class="col-lg-11">
                            <?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary ')); ?>
                        </div>   
                    </div>


                    <?php echo $this->Form->end(); ?>
                    <div class="clearfix"></div>
                </div>

            </article>
        </div>
    </div>
</section> <!-- /content -->




<script>
    function imageTrigger() {
        document.getElementById("newImage").click();
    }

    function imagesubmitTrigger() {
        $('#imageTempAdminEditForm').submit();
    }
</script>


<script type="text/javascript">

    $(document).ready(function() {
        //$('#keyWords').tagsinput();


        $('textarea#CmspageDescription').ckeditor();
        
     
    });

    



    function validateCKEDITORforBlank(field)
    {
        var vArray = new Array();
        vArray = field.split("&nbsp;");
        var vFlag = 0;
        for (var i = 0; i < vArray.length; i++)
        {
            if (vArray[i] == '' || vArray[i] == "")
            {
                continue;
            }
            else
            {
                vFlag = 1;
                break;
            }
        }
        if (vFlag == 0)
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
        if (validateCKEDITORforBlank($.trim(CKEDITOR.instances.description.getData().replace(/<[^>]*>|\s/g, ''))))
        {
            $("#" + description).parent().append('<div class="error-message">This field is required.</div>');
            CKEDITOR.instances.description.setData("");
            return false;
        }
        return true;
    }
</script>     
