
<?php
//prd($data);
?>

<section class="content">
    <header class="main-header clearfix">
        <h1 class="main-header__title">
            <i class="fa fa-file"></i>
            Message From - <?php echo $data['Message']['name']; ?> 
        </h1>
        <div class="main-header__date">
            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'messages', 'action' => 'index')); ?>" class="btn btn-light pull-right">Back</a>
        </div>
    </header>

    <div class="row">

        <div class="col-md-12">
            <article class="widget">

                <div class="widget__content">
                   



                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Name</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            //@$prdCode = 'LAP'.'-'.'100'.'-'.uniqid() ;

                            echo $this->Form->input('product_code', array(
                                'label' => false,
                                'placeholder' => 'Product Code',
                                'class' => 'input-text',
                               'value'=>$data['Message']['name']
                                ));
                            ?>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Email ID</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            echo $this->Form->input('title', array(
                                'label' => false,
                                'placeholder' => 'Products Title',
                                'class' => 'input-text',
                              
                                'value'=>$data['Message']['email']));
                            ?>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Contact</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            echo $this->Form->input('title', array(
                                'label' => false,
                                'placeholder' => 'Products Title',
                                'class' => 'input-text',
                                'value'=>$data['Message']['mobile']));
                            ?>
                        </div>   
                    </div>
                    <?php
                        if(!empty($data['Message']['product_id'])&& isset($data['Message']['product_id'])){
                            ?>
                       <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Product Link</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                            <?php
                                echo $this->Html->link('Clink Here',array('admin'=>false,'controller'=>'products','action'=>'view',$data['Message']['product_id']));
                             ?>
                        </div>   
                        </div>
                    <?php
                        }
                    ?>

                        <br>
                     <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Message</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            echo $this->Form->input('title', array(
                                'label' => false,
                                'placeholder' => 'Products Title',
                                'class' => 'input-text resized',
                                'type'=>'textarea',
                                'div'=>false,
                                'value'=>$data['Message']['message'],
                                'rows' => 10));
                            ?>
                        </div>   
                    </div>
                    <br>

                   


                  
                    <div class="clearfix"></div>
                </div>

            </article>
        </div>
    </div>
</section> <!-- /content -->



