
<section class="content">
    <header class="main-header clearfix">
        <h1 class="main-header__title">
            <i class="fa fa-file"></i>
            FAQ Edit
        </h1>
        <div class="main-header__date">
            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'faqs', 'action' => 'index')); ?>" class="btn btn-light pull-right">Back</a>
        </div>
    </header>

    <div class="row">

        <div class="col-md-12">
            <article class="widget">
               

                <div class="widget__content">



                    <?php
                    echo $this->Form->create("Faq", array('class' => 'form-content'));
                   echo $this->Form->input('id',array('type'=>'hidden'));
                    ?>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">FAQ Title</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            echo $this->Form->input('title', array(
                                'label' => false,
                                'placeholder' => 'Title',
                                'class' => 'input-text',
                                'required'
                                
                            ));
                            ?>

                        </div>   
                    </div>
                    
                      <div class="form-group">

                        <div class="col-lg-11">
                            <?php
                            echo $this->Form->input('content', array(
                                'label' => false,
                                'type' => 'textarea',
                                'placeholder' => 'Specifications',
                                'class' => 'input-text',
                                'required', 'id' => 'cmsdescp'
                            ));
                            ?>
                        </div> 
                    </div>

                    <div class="form-group">
                        
                        <div class="col-lg-8">
                            <?php
                             echo $this->Form->submit('SAVE', array('class' => 'btn btn-default'));
                            ?>

                        </div>   
                    </div>
                    
                    <?php
                   // echo $this->Form->input('title', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Product Title', 'required'));
                   // echo $this->Form->input('content', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Description', 'required', 'id' => 'cmsdescp'));
                   // echo $this->Form->submit('SAVE', array('class' => 'btn-info'));
                    echo $this->Form->end();
                    ?>

                    <div class="clearfix"></div>
                </div>

            </article>
        </div>
    </div>
</section> <!-- /content -->













<script>
    $(document).ready(function() {
        $('#cmsdescp').ckeditor();
    });
</script>