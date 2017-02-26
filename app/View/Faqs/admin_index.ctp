<?php
//echo $totalProducts;

?>
<!--    <header class="main-header clearfix">
        <h1 class="main-header__title">
            <i class="fa fa-book"></i>
            Products
        </h1>
        <div class="main-header__date">
            <a href="<?php  //echo $this->Html->url(array('admin' => true, 'controller' => 'products', 'action' => 'add')); ?>" class="btn btn-light pull-right">Add Product</a>
        </div>
    </header>-->


<div class="span9">
    <div class="module message">
        <div class="module-head">
            <h3 style="display: inline-block">FAQ List</h3>
            <div class="pull-right">
                <a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'faqs', 'action' => 'add')); ?>" class="btn btn-large btn-primary">Add</a>    
            
            </div>
        </div>

        <div class="module-body table">
            <table class="table table-message">
                <tbody>

                    <tr class="heading">
                        <td class="cell-check " width="75">
                            ID
                        </td>
                        <td class="cell-author hidden-phone hidden-tablet" width="250">
                            FAQ Title
                        </td>
                        <td class="cell-time align-left" >
                            Content
                        </td>
                        
                        <td class="cell-time align-right" >
                            Action
                        </td>
                    </tr>

                    <?php
                    foreach ($allFaqs as $faqs) {
                        ?>
                        <tr class="unread">
                            <td class="cell-check" width="75">

                                <?php echo $faqs['Faq']['id'];?>

                            </td>
                            <td class="cell-author hidden-phone hidden-tablet" width="250">
                                <?php echo $faqs['Faq']['title'];?>
                            </td>
                            <td class="cell-time align-right" >
                            
                                
                                <?php 
                               echo  $this->General->short_msg(  $faqs['Faq']['content'] ,50 );
                                ?>
                            </td>

                            <td class="cell-time align-right" >

                                <a href="<?php echo $this->Html->url(array('controller'=>'faqs','action'=>'view', $faqs['Faq']['id']));?>" target="_BLANK"><i class="fa fa-user fa-2x"></i></a> 
                                --
                                <a href="<?php echo $this->Html->url(array('controller'=>'faqs','action'=>'edit', $faqs['Faq']['id']));?>"><i class="fa fa-edit fa-2x"></i></a> 
                                --
                                <a   href="<?php //echo $this->Html->url(array('controller'=>'products','action'=>'delete', $products['Product']['id']));?>" 

                                   onclick='if (confirm(["Are you sure?"])) {
                                         deleteFaq(<?= $faqs['Faq']['id'] ?>,<?=  $faqs['Faq']['status'] ?>)        
                                        //  return true;
                                           }
                                           return false;'><i class="fa fa-remove fa-2x"></i>

                                </a>-- 
                                <a   href="#" onclick="changeStatus(<?= $faqs['Faq']['id'] ?>,<?=  $faqs['Faq']['status'] ?>)" >    
                                        
                                      <?php
                                      if( $faqs['Faq']['status'] == 0)
                                          {
                                          ?>
                                    <i class="fa fa-square fa-2x redcolor"></i>
                                    <?php
                                          }
                                      elseif($faqs['Faq']['status'] == 1)
                                          {
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
        <div class="module-foot">
                <div class="totalrecords">
                    <p> Total Records : <?php echo $totalFaqs ;?></p>
                    
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

<script>
        function deleteFaq(id,status){
            URL = '<?php echo $this->Html->url(array('admin'=>true,'controller'=>'faqs','action'=>'deleteFaq'));?>';
            
            $.ajax({
               url : URL,
               method : 'POST',
               data : ({id:id,status:status}),
               complete: function (XMLHttpRequest, textStatus){
                   location.reload();
               }
                
            });
            
        };
        
        function changeStatus(id,status)
        {
            URL = '<?php echo $this->Html->url(array('controller'=>'faqs','action'=>'changeStatus'));?>';
          //  alert(URL);
             $.ajax({
               url : URL,
               method : 'POST',
               data : ({id:id,status:status}),
               complete: function (XMLHttpRequest, textStatus){
                   location.reload();
               }
                
            });
            
        };

</script>

