<?php
//prd($this->request);
?>

<section class="content">
    <header class="main-header clearfix">
        <h1 class="main-header__title">
            <i class="fa fa-file"></i>
            Products Edit
        </h1>
        <div class="main-header__date">
            <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'products', 'action' => 'index')); ?>" class="btn btn-light pull-right">Back</a>
        </div>
    </header>

    <div class="row">

        <div class="col-md-12">
            <article class="widget">

                <div class="widget__content">
                    <?php echo $this->Form->create('Product'); ?>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Select Category</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            $cate = array();
                            $cate[0] = 'SELECT';
                            foreach ($cateList as $category) {
                                $cate[$category['Category']['id']] = $category['Category']['title'];
                            }
                            echo $this->Form->input('category_id', array(
                                'label' => false,
                                // 'placeholder'=>'Products Title',
                                'class' => 'input-text',
                                'options' => @$cate,
                                'required',
                                    //'empty' => '(choose one)'
                            ));
                            ?>
                        </div>   
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Select Sub Category</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            /*
                              $cate1 = array();
                              if (!empty($cateSub)) {
                              foreach ($cateSub as $subCate) {
                              $cate1[$subCate['Category']['id']] = $subCate['Category']['category'];
                              }
                              }

                              echo $this->form->input('category_sub_id', array(
                              'label' => false,
                              'options' => $cate1,
                              'required'
                              ));
                             */
                            ?>

                            <?php
                            $options = array();
                            foreach ($subCateData as $cates) {

                                $options[$cates['SubCategory']['id']] = $cates['SubCategory']['title'];
                            }
                            // pr($options);
                            //if($subCateData['SubCategory']['id']   )
                            // $subcate = array();
                            echo $this->Form->input('sub_category_id', array(
                                'label' => false,
                                // 'placeholder'=>'Products Title',
                                'class' => 'input-text',
                                'required',
                                'options' => $options,
                                    //'selected' => $subCateData['SubCategory']['title'],
                                    // 'options' => $subcate,
                            ));
                            ?>
                        </div>   
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Product Code</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
//@$prdCode = 'LAP'.'-'.'100'.'-'.uniqid() ;

                            echo $this->Form->input('product_code', array(
                                'label' => false,
                                'placeholder' => 'Product Code',
                                'class' => 'input-text',
                                'required',
                                'readonly' => 'readonly'));
                            ?>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Product Title</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            echo $this->Form->input('title', array(
                                'label' => false,
                                'placeholder' => 'Products Title',
                                'class' => 'input-text',
                                'required'));
                            ?>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Dimension / Size </label>
                        </div>
                        <div class="col-lg-8">
                            <?php
//@$prdCode = 'LAP'.'-'.'100'.'-'.uniqid() ;

                            echo $this->Form->input('features', array(
                                'label' => false,
                                'placeholder' => 'Dimension / Size',
                                'class' => 'input-text',
                                    //'required',
                                    //'value' => @$prdCode,
                            ));
                            ?>
                        </div>   
                    </div>

                    <?php
                    echo $this->Form->hidden('id');
                    ?>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">keywords</label>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            echo $this->Form->input('keywords', array(
                                'type' => 'text',
                                'id' => 'keyWords',
                                'label' => false,
                                'placeholder' => 'Enter Keywords',
                                'class' => 'input-text'));
                            ?>
                        </div>   
                    </div>


                    <div class="form-group">

                        <div class="col-lg-11">
                            <?php
                            echo $this->Form->input('specification', array(
                                'label' => false,
                                'type' => 'textarea',
                                'placeholder' => 'Specifications',
                                'class' => 'input-text',
                            ));
                            ?>
                        </div> 
                    </div>



                    <?php /*
                      echo $this->Form->input('specification', array(
                      'label' => false,
                      'type' => 'textarea',
                      'placeholder' => 'Specifications',
                      'class' => 'input-text',
                      )); */
                    ?>

                    <div class="form-group ">
                        <div class="col-lg-11 bottom-margin2">
                            <span onclick="imageTrigger()" class="btn btn-light">Upload Product image</span>
                            <hr>
                            <?php
                            if (!empty($imageList)) {
                                foreach ($imageList as $image) {
                                    //pr($image);
                                    echo $this->Html->image('uploads/' . $image['Image']['image_name'], array(
                                        'class' => 'img_margin',
                                        'height' => 80,
                                        'width' => 100,
                                        'required'));
                                    ?>

                                    <i class="fa fa-remove  image_remove" onclick='if (confirm(["Are you sure?"])) {
                                                        removeImage(<?= $image['Image']['id']; ?>)
                                                        //  return true;
                                                    }
                                                    return false;'>
                                    </i>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>



                    <!--                    <div class="form-group">
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">In Stock</label>
                                            </div>
                                            <div class="col-lg-8">
                    <?php
                    /*  echo $this->Form->input('in_stock', array(
                      'label' => false,
                      'placeholder' => 'Select Stock',
                      'class' => 'input-text',
                      'options' => array('0' => 'On order', '1' => 'In stock')
                      )); */
                    ?>
                    
                                            </div>   
                                        </div>-->

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


<div style="opacity:0; height:0px !important; width:0px !important;">
    <?php
    echo $this->Form->create('imageTemp', array('type' => 'file'));
    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Product']['id']));
    ?>
    <?php echo $this->Form->input('uploadfile', array('id' => 'newImage', 'type' => 'file', 'label' => false, 'onchange' => 'imagesubmitTrigger()', 'class' => '')); ?>
    <?php echo $this->Form->end(); ?>
</div>	

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


        $('textarea#ProductSpecification').ckeditor();


        $('#ProductCategoryId').change(function() {

            //alert('Hello');
            $('#ProductProductCode').val('');
        });

        $('#ProductSubCategoryId').change(function() {
            var cateVal;
            cateVal = $('#ProductSubCategoryId').val();



            cateVal = $('#ProductSubCategoryId option:selected').text();
            // alert(cateVal);
            var c = cateVal.replace(/\s/g, "");  // Remove white spaces
            var r = Math.floor(Math.random() * 1000000); // generates random numbers
            //alert(r);
            // alert(c);
            var pcode = 'LAP-' + c + '-' + r;
            //alert(pcode);
            $('#ProductProductCode').val(pcode);





        });
    });

    function removeImage(id) {

        URL = '<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'removeImage')); ?>';
        // alert(id);

        $.ajax({
            url: URL,
            method: 'POST',
            data: ({id: id}),
            complete: function(XMLHttpRequest, textStatus) {
                location.reload();
            }
        });

    }

    $('#ProductCategoryId').change(function()
    { // when dropdown value gets changed function executes
        var url = '<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'makesubcate')); ?>';

        //Adding Selected Category value at the end of url.

        url = url + '/' + $("#ProductCategoryId option:selected").val();
        //alert(url);
        //return;
        $.ajax({
            type: "POST",
            //url: myBaseUrl + ('/deals/populateSubcat') + '?q=' + $("#ProductCategoryId option:selected").val(), //pass query string to server
            url: url,
            success: function(opt) {
                //alert(opt);
                $('#ProductSubCategoryId').html(opt);
                // document.getElementById('DealSubcatId').innerHTML = opt;   // assign the output to another dropdown
            }
        })
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
