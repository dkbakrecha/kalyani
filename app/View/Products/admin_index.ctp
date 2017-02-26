<?php
//echo $totalProducts;
//prd($allProducts);

echo $this->Html->css('admin/jquery.dataTables');
echo $this->Html->script(array(
    //'jQueryv1.11.1',
    'admin/jquery.dataTables.min'));
?>


<div class="span9">
    <div class="module message">
        <div class="module-head">
            <h3 style="display: inline-block">Categories List</h3>
            <div class="pull-right">
                <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'products', 'action' => 'add')); ?>" class="btn btn-large btn-primary">Add</a>        </div>
        </div>

        <div class="module-body table">
            <table class="table table-message" id="example">

                <thead>
                <th class="cell-check " width="75">
                    ID
                </th>
                <th class="cell-author hidden-phone hidden-tablet" width="250">
                    Product Name
                </th>
                <th class="cell-time align-left" width="250">
                    Code
                </th>
                <th class="cell-time align-right" width="250">
                    Sub Cate
                </th>
                <th class="cell-time align-right" width="200">
                    Action
                </th>
                </thead>


                <tbody>



                    <?php
                    foreach ($allProducts as $products) {
                        ?>
                        <tr class="unread">
                            <td class="cell-check" width="75">

                                <?php echo $products['Product']['id']; ?>

                            </td>
                            <td class="cell-author hidden-phone hidden-tablet" width="200">
                                <?php echo $products['Product']['title']; ?>
                            </td>
                            <td class="cell-time align-right" width="250">
                                <?php echo$products['Product']['product_code']; ?>
                            </td>
                            <td class="cell-time align-right" width="250">


                                <?php
                                foreach ($subCate as $cate) {
                                    if ($products['Product']['sub_category_id'] == $cate['SubCategory']['id']) {
                                        echo $cate['SubCategory']['title'];
                                    }
                                }



                                // echo$products['Product']['sub_category_id'];
                                ?>
                            </td>
                            <td class="cell-time align-right" width="300">

                                <a target="_blank" href="<?php echo $this->Html->url(array('admin' => false, 'controller' => 'products', 'action' => 'view', $products['Product']['id'])); ?>" target="_BLANK"><i class="fa fa-eye fa-2x"></i></a> 
                                
                                <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'edit', $products['Product']['id'])); ?>"><i class="fa fa-edit fa-2x"></i></a> 
                                

                                <a   href="<?php //echo $this->Html->url(array('controller'=>'products','action'=>'delete', $products['Product']['id']));         ?>" 

                                     onclick='if (confirm(["Are you sure?"])) {
                                                     deleteProduct(<?= $products['Product']['id'] ?>,<?= $products['Product']['status'] ?>)
                                                     //  return true;
                                                 }
                                                 return false;'>
                                    <i class="fa fa-remove fa-2x"></i>

                                </a>
                                <span  id="<?php echo $products['Product']['id']; ?>" class="btnstatus pointer" 
									data-status="<?php echo $products['Product']['status']; ?>" 
									data-show="<?php echo $products['Product']['is_show']; ?>" 
									>

                                    <?php
                                    if ($products['Product']['is_show'] == 0) {
                                        ?>
                                        <i class="fa fa-heart fa-2x "></i>
                                        <?php
                                    } elseif ($products['Product']['is_show'] == 1) {
                                        ?>
                                        <i class="fa fa-heart fa-2x greencolor"></i>
                                        <?php
                                    }
                                    ?>
                                </span>
								
                                <a   href="" onclick="changeStatus(<?= $products['Product']['id'] ?>,<?= $products['Product']['status'] ?>)">    

                                    <?php
                                    if ($products['Product']['status'] == 0) {
                                        ?>
                                        <i class="fa fa-square fa-2x redcolor"></i>
                                        <?php
                                    } elseif ($products['Product']['status'] == 1) {
                                        ?>
                                        <i class="fa fa-square fa-2x greencolor"></i>
                                        <?php
                                    }
                                    ?>     


                                </a> 
                            </td>
                        </tr>

                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
      
    </div>

</div>

<script>


    $(document).ready(function() {

        var myTable = $('#example').dataTable({
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [4]
                },
            ],
            
            "order": [[0, 'asc']],
        });



    });
	
	
	$('.btnstatus').click(function(){
		var pro_id = $(this).attr('id');
		var status = $( this ).data( "status");
		var show = $( this ).data( "show");
		
		URL = '<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'makefront')); ?>';
		
		if(status == 0){
			alert("Please select active product to front.");
		}else{
			$.ajax({
            url: URL,
            method: 'POST',
            data: ({id: pro_id, is_show :show}),
            success: function(data) {
			    if (data == 2) {
                    alert("Front product full. please unshow some product before");
                }else if(data == 0){
                    alert("Some problem occur. Please try again");
                }else if(data == 1){
				console.log($(this));
					//$( "#" + pro_id ).find('.fa-heart').toggleClass("greencolor");
					location.reload();
                }
            }
		});
		}
		
	});

//  function changeShow(id, is_show ,status)
//    {
 //      URL = '<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'changeShow')); ?>';
        //  alert(URL);
	//	console.log($(this));
	//	return;
    //    $.ajax({
    //        url: URL,
//            method: 'POST',
//            data: ({id: id, is_show :is_show}),
//            success: function(data) {
//                if (data == 2) {
//                    alert("Front product full. please unshow some product before");
//                }else if(data == 0){
//                    alert("Inactive product cannot show to front.");
//                }else if(data == 1){
 //                  location.reload();
//                }else{
//                    alert("Some problum occur. Please try again");
//                }
//            }
//            ,
//            error: function() {
//                alert('Something goes wrong!');
//            }

//        });

//    }





    function deleteProduct(id, status) {
        URL = '<?php echo $this->Html->url(array('admin' => true, 'controller' => 'products', 'action' => 'deleteProduct')); ?>';

        $.ajax({
            url: URL,
            method: 'POST',
            data: ({id: id, status: status}),
            complete: function(XMLHttpRequest, textStatus) {
                location.reload();
            }
         //   ,
//            success: function(data) {
//                if (data == 1) {
//                    alert("On the front max 8 item will be show.");
//                } else {
//                    //$("#list").trigger("reloadGrid");
//                }
//            }

        });

    }
    ;

    function changeStatus(id, status)
    {
        URL = '<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'changeStatus')); ?>';
        //  alert(URL);
        $.ajax({
            url: URL,
            method: 'POST',
            data: ({id: id, status: status}),
            complete: function(XMLHttpRequest, textStatus) {
                location.reload();
            }
//            success: function(data) {
//                if (data == 1) {
//                   // alert("Ok");
//                } else {
//                    //$("#list").trigger("reloadGrid");
//                }
//            },
//            error: function() {
//                alert('Something goes wrong!');
//            }

        });

    }
    ;

</script>

