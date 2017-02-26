<?php
//echo $this->Session->flash();
//prd($prdData);
//prd($this->request);
@$recordCount = $this->request->params['paging']['Product']['count'];
?>


<?php
if (isset($prdData) && !empty($prdData)) {
    ?>
    <div class="row">
        <div class="col-md-6">
            <span>Total Records Found : <?php echo $recordCount; ?></span>
        </div>
        <div class="col-md-6">
            <span class="pull-right"><?php
                echo $this->paginator->counter(
                        'Page {:page} of {:pages}, Total records {:count}'
                );
                ?></span>
        </div>
    </div>
    <hr>
    <?php
} elseif (empty($prdData)) {
    ?>
    <div class="alert alert-danger" role="alert">
        <span> No Record found <?php //echo $recordCount ;           ?></span>
    </div>
    <?php
}
?>

<?php
// }
?>



<div class="row ">


    <div class="col-md-12">


        <?php
        if (isset($prdData) && !empty($prdData)) {
            foreach ($prdData as $prd) {
                ?>

                <div class="col-sm-4 col-lg-4 col-md-4 ">
                    <div class="thumbnail">
        <!--                            <span class="salebadge"></span>-->
                        <div class="col-sm-12 col-lg-12 col-md-12   ">
                            <div class="boximage">
                                <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $prd['Product']['id'])); ?>">
                                    <?php echo $this->Html->image('uploads/' . $prd['Images'][0]['image_name'], array('class' => 'productshot', 'alt' => '')); ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-12 col-md-12 paddingLR">
                            <div class="boxtitle">
                                <h2>
                                    <a title="<?php echo $prd['Product']['title'] ?>" rel="bookmark" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $prd['Product']['id'])); ?>"><?php echo $prd['Product']['title'] ?></a>
                                </h2>
                            </div>

                            <div class="pricetab clearfix">
                                <!--                            
                                                                 <span class="oldprice">
                                                                <del> $600 </del>
                                                            </span>
                                                            <span class="price">$500</span>-->
                                <span class="prodetail">
                                    <a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $prd['Product']['id'])); ?>"><?php echo $prd['Product']['product_code'] ?></a>
                                </span>
                            </div>

                            <!--                                <div class="boxtitle">
                            
                            <?php // echo $this->General->short_msg($prd['Product']['specification'],150);  ?>
                            
                                                            </div>-->
                        </div>
                    </div>
                </div>


                <?php
            }
        }
        ?>    



        <div class="clear"></div>







    </div>
</div>
<?php
if ($recordCount >= 9) {
    ?>
    <div class="row ">
        <div class="paginate_right wp-pagenavi pull-right ">
    <?php
    $options = array(
        'url' => array(
            'controller' => 'products',
            'action' => 'search', $searchData
        )
    );

    echo $this->Paginator->options($options);
    echo $this->Paginator->first(
            ' First ', array(), null, array('class' => '')
    );
    echo $this->Paginator->numbers(
    );
    echo $this->Paginator->last(
            ' LAST ', array(), null, array('class' => '')
    );
    ?>
        </div>

    </div>
    <?php
}
?>
        


