<?php
$this->Html->css('admin/theme');
?>
<div class="span9">
    <div class="module message">
        <div class="module-head">
            <h3 style="display: inline-block">Categories List</h3>
<!--            <div class="pull-right">   // Ready to use but disabled
                <a href="<?php //echo $this->Html->url(array('admin' => true, 'controller' => 'categories', 'action' => 'index')); ?>" class="btn btn-large btn-primary">Add</a>   
            
            </div>-->
        </div>

        <div class="module-body table">
            <table class="table table-message">
                <tbody>

                    <tr class="heading">
                        <td class="cell-check">
                            ID
                        </td>
                        <td class="cell-author hidden-phone hidden-tablet">
                            Product Name
                        </td>
                        <td class="cell-time align-left">
                            Date
                        </td>
                        <td class="cell-time align-right">
                            Action
                        </td>
                    </tr>

                    <?php
                    foreach ($cateData as $cate) {
                        ?>
                        <tr class="unread">
                            <td class="cell-check">

                                <?php echo $cate['Category']['id'];?>

                            </td>
                            <td class="cell-author hidden-phone hidden-tablet">
                                <?php echo $cate['Category']['title'];?>
                            </td>
                            <td class="cell-time align-right">
                            <?php echo $cate['Category']['created'];?>
                            </td>
                            <td class="cell-time align-right">

                                
                                <a href="<?php echo $this->Html->url(array('controller'=>'categories','action'=>'edit', $cate['Category']['id']));?>"><i class="fa fa-edit fa-2x"></i></a> 
                               
                        <!--       <a href="<?php // echo $this->Html->url(array('controller'=>'categories','action'=>'delete', $cate['Category']['id']));?>" 

                                   onclick='if (confirm(["Are you sure?"])) {
                                               return true;
                                           }
                                           return false;'><i class="fa fa-remove fa-2x"></i>

                                </a> -->
                            </td>
                        </tr>

                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
         <div class="module-foot">
                <div class="totalrecords">
                    <p> Total Records : <?php echo $totalCate ;?></p>
                    
            </div>
            <div class="paginate_right pull-right">
                   <div class="paginate_right">
            <?php
            echo $this->Html->div(
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
            );
            ?>
        </div>
                
                <!--<div style="width: 100%;"><span class="PrevPg DisabledPgLk">&lt;&lt; Previous  </span><span class="NextPg DisabledPgLk"> Next &gt;&gt;</span></div>-->    
            
            </div>
        </div>
    </div>
</div>

