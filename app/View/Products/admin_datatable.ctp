<?php
//echo $totalProducts;
//sprd($output);

echo $this->Html->css('admin/jquery.dataTables');
echo $this->Html->script(array(
    //'jQueryv1.11.1',
    'admin/jquery.dataTables.min'));
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo $this->Html->url(array('admin' => true, 'controller' => 'products', 'action' => 'ajaxData')); ?>",
           
        });
    });
</script>

 <button class="eng_btn " data-toggle="modal" 
                                data-target="#myModal">
                            Enquiry
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
                                            Enquiry For Product : <strong class="greencolor"><?php echo $singleProduct[0]['Product']['product_code'] ?></strong>
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        echo $this->Form->create('Message', array('role' => 'form'));
                                        ?>

                                        <?php
                                        echo $this->Form->input('product_code', array('label' => false, 'value' => $singleProduct[0]['Product']['product_code'], 'type' => 'hidden'));
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->input('name', array('label' => False, 'placeholder' => 'Enter Your Name', 'class' => 'form-control'));
                                                ?>   
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                echo $this->Form->input('email', array('label' => False, 'placeholder' => 'Enter Email Id', 'class' => 'form-control'));
                                                ?>
                                            </div>

                                        </div>
                                        <?php
                                        echo '<br>';
                                        echo $this->Form->input('mobile', array('label' => False, 'placeholder' => 'Enter Mobile Number', 'class' => 'form-control'));
                                       
                                        echo '<br>';
                                        echo $this->Form->input('message', array('label' => False, 'placeholder' => 'Your Enquiry', 'class' => 'form-control', 'row' => 25, 'cols' => 25));
                                        ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" 
                                                data-dismiss="modal">Close
                                        </button>
                                        <?php echo $this->Form->Submit('Submit', array('class' => 'btn btn-primary', 'div' => false)); ?>
                                        <!--                <button type="button" class="btn btn-primary">
                                                                    Submit changes
                                                        </button>-->
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>

<h1>Browser List</h1>

<table id="example">
    <thead>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>CODE </th>  


        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4" class="dataTables_empty">Loading data from server...</td>
        </tr>
    </tbody>
</table>



<br><br><br><br><br><br><br>



<!--
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Product Code</th>
            
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Product Code</th>
        </tr>
    </tfoot>

    <tbody>
         <tr>
                <td><?php //echo $products['Product']['id'];  ?></td>
               
                
            </tr>
<?php
//foreach($allProducts as $products) {
?>
           
<?php
// }
?>

    </tbody>
</table>-->
