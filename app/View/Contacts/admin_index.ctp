
<?php
//prd($allMessages);
echo $this->Html->css('admin/jquery.dataTables');
echo $this->Html->script('admin/jquery.dataTables.min');
?>
<div class="span9">
    <div class="module message">
        <div class="module-head">
            <h3 style="display: inline-block">Messages</h3>

        </div>

        <div class="module-body table">
            <table class="table table-message" id="example">
                <thead class="heading">
                <th class="cell-check">
                    ID
                </th>
                <td class="cell-author hidden-phone hidden-tablet" width="150">
                    Name
                    </th>
                <td class="cell-time align-left" width="150">
                    email
                    </th>
                    <td class="cell-time align-left" width="150">
                    Contact
                    </th>
                <td class="cell-time align-left" width="300">
                    Description
                    </th>

                <th class="cell-time align-right">
                    Action
                </th>
                </thead>
                <tbody>

                    <?php
                    foreach ($allContacts as $contacts) {
                        ?>
                        <tr class="">
                            <td class="cell-check">

                                <?php echo $contacts['Contact']['id']; ?>

                            </td>
                            <td class="cell-author hidden-phone hidden-tablet ">

                                
                               <?php echo $contacts['Contact']['name']; ?>
                                
                            </td>
                            <td class="cell-time align-right">
                               <?php echo $contacts['Contact']['email']; ?>
                            </td>
                            <td class="cell-time align-right">

                                <?php echo $contacts['Contact']['contact']; ?>
                            </td>
                            <td class="cell-time align-right">

                                <?php echo $contacts['Contact']['description']; ?>
                            </td>
                            
                            <td class="cell-time align-right">



                               
                                <a href="<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'delete', $contacts['Contact']['id'])); ?>" 

                                   onclick='if (confirm(["Are you sure?"])) {
                                                       return true;
                                                   }
                                                   return false;'>
                                    <i class="fa fa-remove fa-2x"></i>

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
                    "targets": [3]
                },
            ],
            "order": [[0, 'asc']],
        });


    });


</script>

