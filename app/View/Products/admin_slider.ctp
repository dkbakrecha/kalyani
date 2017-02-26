
<div class="span9">
    <div class="module message">
        <div class="module-head">
            <h3 style="display: inline-block">Slider Images</h3>
          
        </div>
        <?php
            echo $this->Form->create('Product');
            echo $this->Form->input('product_code');
           // echo $this->Form->end();
            echo $this->Form->submit('Add');
        
        ?>

        <div class="module-body table">
            <table class="table table-message" id="example">
               
                <thead class="heading">
                        <th class="cell-check">
                            ID
                        </th>
                        <th class="cell-author hidden-phone hidden-tablet">
                            Product Name
                        </th>
                        <th class="cell-author hidden-phone hidden-tablet">
                            Product Code
                        </th>
                        <th class="cell-time align-left">
                            Image
                        </th>
                        <th class="cell-time align-right">
                            Action
                        </th>
                    </thead>
                <tbody>

                    

                    <?php
                    foreach ($subCatList as $cate) {
                        ?>
                        <tr class="unread">
                            <td class="cell-check">

                                <?php echo $cate['SubCategory']['id']; ?>

                            </td>
                            <td class="cell-author hidden-phone hidden-tablet">
                                <?php echo $cate['SubCategory']['title']; ?>
                            </td>
                           
                                <td class="cell-author hidden-phone hidden-tablet">
                                    <?php echo $cate['category']['title']; ?>
                                </td>
                               

                            <td class="cell-time align-right">
                                <?php echo $cate['SubCategory']['created']; ?>
                            </td>
                            <td class="cell-time align-right">

                                <a href="<?php echo $this->Html->url(array('admin' => false,'controller' => 'products', 'action' => 'index', $cate['SubCategory']['id'])); ?>" target="_BLANK"><i class="fa fa-eye fa-2x"></i></a> 
                                --
                                <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'sub_cat_edit', $cate['SubCategory']['id'])); ?>"><i class="fa fa-edit fa-2x"></i></a> 
                               --
                                <a href="<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'sub_cat_delete', $cate['SubCategory']['id'])); ?>" 

                                   onclick='if (confirm(["All the products realated to this sub category will be also deleted , Are you sure?"])) {
                                               return true;
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
      
    </div>
</div>
