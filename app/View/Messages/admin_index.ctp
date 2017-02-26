
<?php
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
                        <td class="cell-time align-left" width="300">
                            Message
                        </th>
                        <th class="cell-time align-right">
                            Msg Type
                        </th>
                        <th class="cell-time align-right">
                            Date
                        </th>
                        <th class="cell-time align-right">
                            Action
                        </th>
                    </thead>
                <tbody>
                    <?php
                    foreach ($allMessages as $msg) {
                        $mStatus = $msg['Message']['status'];

                        //echo $mStatus;
                        if ($mStatus == 0) {
                            ?>
                            <tr class="font_bold">
                                <td class="cell-check">

                                    <?php echo $msg['Message']['id']; ?>

                                </td>
                                <td class="cell-author hidden-phone hidden-tablet ">

                                    <?php
                                    echo $this->Html->link($msg['Message']['name'], array('controller' => 'messages', 'action' => 'view', $msg['Message']['id']));
                                    ?>
                                </td>
                                <td class="cell-time align-right">
                                    <?php echo $this->General->short_msg($msg['Message']['message'], 40); ?>
                                </td>
                                <td class="cell-time align-right">

                                    <?php
                                    if ($msg['Message']['type'] == 1) {
                                        ?>
                                        <span>Enquiry</span>
                                        <?php
                                    } elseif ($msg['Message']['type'] == 0) {
                                        ?>
                                        <span>Contact</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td class="cell-time align-right">
                                    <?php echo $msg['Message']['created']; ?>
                                </td>
                                <td class="cell-time align-right">



                                    <a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'view', $msg['Message']['id'])); ?>"><i class="fa fa-envelope-square fa-2x"></i></a> 
                                    --
                                    <a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'delete', $msg['Message']['id'])); ?>" 

                                       onclick='if (confirm(["Are you sure?"])) {                                                    return true;
                                                   }
                                                   return false;'>
                                        <i class="fa fa-remove fa-2x"></i>

                                    </a> 
                                </td>
                            </tr>
        <?php
    }
    else 
        {
        ?>
                            <tr class="">
                                <td class="cell-check">

                            <?php echo $msg['Message']['id']; ?>

                                </td>
                                <td class="cell-author hidden-phone hidden-tablet ">

                                    <?php
                                     echo $this->Html->link($msg['Message']['name'], array('controller' => 'messages', 'action' => 'view', $msg['Message']['id']));
                                   
                                    ?>
                                </td>
                                <td class="cell-time align-right">
                                    <?php echo $this->General->short_msg($msg['Message']['message'], 40); ?>
                                </td>
                                <td class="cell-time align-right">

                                    <?php
                                    if ($msg['Message']['type'] == 1) {
                                        ?>
                                        <span>Enquiry</span>
                                        <?php
                                         }
                                        elseif ($msg['Message']['type'] == 0) {
                                            ?>
                                        <span>Contact</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td class="cell-time align-right">
                                    <?php echo $msg['Message']['created']; ?>
                                </td>
                                <td class="cell-time align-right">



                                    <a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'view', $msg['Message']['id'])); ?>"><i class="fa fa-envelope-square fa-2x"></i></a> 
                                    --
                                    <a href="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'delete', $msg['Message']['id'])); ?>" 

                                       onclick='if (confirm(["Are you sure?"])) {                                                    return true;
                                                   }
                                                   return false;'>
                                        <i class="fa fa-remove fa-2x"></i>

                                    </a> 
                                </td>
                            </tr>
        <?php
    }
    ?>



    <?php
}
?>


                </tbody>
            </table>
        </div>
       
    </div>
</div>
<script>

    $(document).ready(function(){
        
         var myTable = $('#example').dataTable({
			"columnDefs": [
				{
					"searchable": false,
					"orderable": false,
					"targets": [3]
				},
			],
			"order": [[0, 'desc']],
		});
        
        
    });


</script>

