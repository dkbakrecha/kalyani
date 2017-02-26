<?php
   // echo 'Hello';
?>
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
            <h3 style="display: inline-block">CMS Pages</h3>
<!--            <div class="pull-right">
                <a href="<?php //echo $this->Html->url(array('admin' => true, 'controller' => 'cmspages', 'action' => 'add')); ?>" class="btn btn-large btn-primary">Add</a>   
            </div>-->
        </div>

        <div class="module-body table">
            <table class="table table-message" id="example">

                <thead>
                <th class="cell-check " width="75">
                    ID
                </th>
                <th class="cell-author hidden-phone hidden-tablet" width="150">
                   Title
                </th>
                <th class="cell-time align-left" width="400">
                    Description
                </th>
                
                <th class="cell-time align-right" width="100">
                    Action
                </th>
                </thead>


                <tbody>



                    <?php
                    foreach ($cmsData as $cms) {
                        ?>
                        <tr class="unread">
                            <td class="cell-check" width="75">

                                <?php echo $cms['Cmspage']['id']; ?>

                            </td>
                            <td class="cell-author hidden-phone hidden-tablet" width="150">
                                <?php echo $cms['Cmspage']['title']; ?>
                            </td>
                            <td class="cell-time align-right" width="400">
                                <?php echo $this->General->short_msg($cms['Cmspage']['description'],200) ;?>
                            </td>
                           
                            <td class="cell-time align-right" width="100">

                               
                                
                                <a href="<?php echo $this->Html->url(array('controller' => 'cmspages', 'action' => 'edit', $cms['Cmspage']['id'])); ?>"><i class="fa fa-edit fa-2x"></i></a> 
                               

                                <a   href="<?php //echo $this->Html->url(array('controller'=>'products','action'=>'delete', $products['Product']['id']));         ?>" 

                                     onclick='if (confirm(["Are you sure?"])) {
                                                     deleteProduct(<?= $cms['Cmspage']['id']; ?>,<?= $cms['Cmspage']['id']; ?>)
                                                     //  return true;
                                                 }
                                                 return false;'><i class="fa fa-remove fa-2x"></i>

                                </a> 
                           
                                
                            </td>
                        </tr>

                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
        <!--        <div class="module-foot">
                    <div class="totalrecords">
                        <p> Total Records : <?php echo $totalProducts; ?></p>
        
                    </div>
                    <div class="paginate_right pull-right">
                        <div class="paginate_right">
        <?php
        /*  echo $this->Html->div(
          null, $this->paginator->prev(
          'Previous  ', array(
          'class' => 'PrevPg'
          ), null, array(
          'class' => 'PrevPg DisabledPgLk'
          )
          ) .
          $this->paginator->numbers() .
          $this->paginator->next(
          ' Next', array(
          'class' => 'NextPg'
          ), null, array(
          'class' => 'NextPg DisabledPgLk'
          )
          ), array(
          'style' => 'width: 100%;'
          )
          ); */
        ?>
                        </div>
        
        <div style="width: 100%;"><span class="PrevPg DisabledPgLk">&lt;&lt; Previous  </span><span class="NextPg DisabledPgLk"> Next &gt;&gt;</span></div>    
        
                    </div>
                </div>-->
    </div>

</div>

<script>

//    $('#recordchange').change(function() {
//
//            //alert('Hello');
//            var showVal ;
//            showVal  = $('#recordchange').val();
//            URL = '<?php //echo $this->Html->url(array('controller'=>'products','action'=>'valchange'));       ?>';
//             //alert(URL);
//           $.ajax({
//               url : URL,
//               method :'POST',
//                data : ({ showVal: showVal}),
//                complete: function(XMLHttpRequest, textStatus) {
//                //location.reload();
//            }
//               
//           });
//           
//          
//    });

    $(document).ready(function() {

        var myTable = $('#example').dataTable({
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [3]
                },
            ],
            "order": [[0, 'asc']],
        });



    });

  function changeShow(id, is_show)
    {
        URL = '<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'changeShow')); ?>';
        //  alert(URL);
        $.ajax({
            url: URL,
           type: "POST",
            data: ({id: id, is_show: is_show}),
            beforeSend: function(XMLHttpRequest) {

            },
            complete: function(XMLHttpRequest, textStatus) {
                  location.reload;  
            },
            success: function(data) {
                if (data === 1) {
                    alert("Ok");
                } else {
                    //$("#list").trigger("reloadGrid");
                }
            },
            error: function() {
                alert('Something goes wrong!');
            }

        });

    }
    ;;





    function deleteProduct(id, status) {
        URL = '<?php echo $this->Html->url(array('admin' => true, 'controller' => 'products', 'action' => 'deleteProduct')); ?>';

        $.ajax({
            url: URL,
            method: 'POST',
            data: ({id: id, status: status}),
            complete: function(XMLHttpRequest, textStatus) {
                location.reload();
            },
            success: function(data) {
                if (data == 1) {
                    alert("On the front max 8 item will be show.");
                } else {
                    //$("#list").trigger("reloadGrid");
                }
            }

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
            },
            success: function(data) {
                if (data == 1) {
                    alert("Ok");
                } else {
                    //$("#list").trigger("reloadGrid");
                }
            },
            error: function() {
                alert('Something goes wrong!');
            }

        });

    }
    ;

</script>

