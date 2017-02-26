<div class="main">
    <section class="nav-page-content" role="main">
        <div class="form_heading">
            <h2>New Cmspage add</h2>
            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'CmsPages', 'action' => 'index')); ?>" class="linkBtn"> Back </a>
        </div>
        <div class="common-form">
            <?php
            $data = $this->request->data;
            echo $this->Form->create("Cmspage", array('class' => 'form-content'));
            //echo $this->Form->input('id',array('type'=>'hidden'));
            echo $this->Form->input('title', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Product Title', 'required'));
            echo $this->Form->input('description', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Description', 'required', 'id' => 'cmsdescp'));
            echo $this->Form->input('unique_name', array('class' => 'form-control', 'label' => false, 'placeholder' => 'unique_name', 'type' => 'text'));
            echo $this->Form->submit('SAVE', array('class' => 'btn-info'));
            echo $this->Form->end();
            ?>
    </section>
</div> <!-- .main -->

<script>
   $( document ).ready( function() {
	$( '#cmsdescp' ).ckeditor();
} );
</script>