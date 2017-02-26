<?php
//prd($totProducts);
?>

<style>
    .dashIcon{
        margin: 25px auto;
        display: table;
    }
</style>

<!--<section class="content">-->
<header class="main-header clearfix">
    <h1 class="main-header__title">
<!--					<i class="fa fa-dashboard"></i>-->
        Dashboard 
    </h1>
</header>

<div class="row">
    <div class="col-md-12">
        <div class="widget__content">
            <i class="fa fa-cogs fa-4x dashIcon"></i>
        </div>
    </div>
    <div class="col-md-12">
        <article class="widget1 clearfix">
            <div class="col-md-3 box-size">
                <div class="fa_icon">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="fa_text">
                    <p>Total Products : <span class="redcolor"><?php echo @$totProducts; ?> </span> </p>
                </div>
            </div>
            <div class="col-md-3 box-size">
                <div class="fa_icon">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="fa_text">
                    <p>Enabled Products : <span class="redcolor"><?php echo @$totEnabledPro; ?> </span> </p>
                </div>

            </div>
            <div class="col-md-3 box-size">
                <div class="fa_icon">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="fa_text">
                    <p>Disabled Products : <span class="redcolor"><?php echo @$totDisabledPro; ?> </span> </p>
                </div>

            </div>
            <div class="col-md-3 box-size">
                <div class="fa_icon">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="fa_text">
                    <p>Total categories : <span class="redcolor"><?php echo @$totCategory; ?> </span> </p>
                </div>

            </div>
            <div class="col-md-3 box-size">
                <div class="fa_icon">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="fa_text">
                    <p>Total Sub Categories : <span class="redcolor"><?php echo @$totSubCategory; ?> </span> </p>
                </div>

            </div>
            <div class="col-md-3 box-size">
                <div class="fa_icon">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="fa_text">
                    <p>Enabled Products : <span class="redcolor"><?php echo @$totDisabledPro; ?> </span> </p>
                </div>

            </div>

        </article>
    </div>


</div>

<div class="row marginLR">
    <div class="col-md-5 with_auto_scroll ">
        <article class="widget2 clearfix">


            <div class="span9">
                <div class="module message">
                    <div class="module-head">
                        <h3 style="display: inline-block">SubCategory Product Count</h3>

                    </div>

                    <div class="module-body table">
                        <table class="table table-message" id="example">

                            <thead class="thead_a">
                            <th class="cell-check " width="75">
                                S.No
                            </th>
                            <th class="cell-author hidden-phone hidden-tablet" width="350">
                                Sub cate Name
                            </th>
                            <th class="cell-time align-left" width="150">
                                Total 
                            </th>

                            </thead>


                            <tbody>



                                <?php
                                $i = 1;
                                foreach ($totData as $Tdata) {
                                    ?>
                                    <tr class="unread">
                                        <td class="cell-check" width="75">

                                            <?php echo $i; ?>

                                        </td>
                                        <td class="cell-author hidden-phone hidden-tablet" width="350">
                                            <?php echo $Tdata['SubCategory']['title']; ?>
                                        </td>

                                        <td class="cell-time align-right" width="100">


                                            <?php
                                         
                                             
                                            echo count($Tdata['Product']);
                                           // echo @$c;  
                                           
                                           
                                            ?>
                                        </td>

                                    </tr>

                                    <?php
                                    $i++;
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </article>
    </div>  
    
    
    <div class="col-md-6 with_auto_scroll ">
        <article class="widget2 clearfix">


            <div class="span9">
                <div class="module message">
                    <div class="module-head">
                        <h3 style="display: inline-block">15 Most Searched Products</h3>

                    </div>

                    <div class="module-body table">
                        <table class="table table-message" id="example">

                            <thead class="thead_a">
                            <th class="cell-check " width="75">
                                S.No
                            </th>
                              <th class="cell-check " width="75">
                                Pro.ID
                            </th>
                            <th class="cell-author hidden-phone hidden-tablet" width="350">
                                Product Name
                            </th>
                            <th class="cell-time align-left" width="150">
                                Total
                            </th>

                            </thead>


                            <tbody>



                                <?php
                                $i = 1;
                              
                                foreach ($topViewed as $Tdata) {
                                    ?>
                                    <tr class="unread">
                                        <td class="cell-check" width="75">

                                            <?php echo $i; ?>

                                        </td>
                                        <td class="cell-author hidden-phone hidden-tablet" width="350">
                                            <?php echo $Tdata['Product']['id']; ?>
                                        </td>

                                        <td class="cell-author hidden-phone hidden-tablet" width="350">
                                            <?php echo $Tdata['Product']['title']; ?>
                                        </td>

                                        <td class="cell-time align-right" width="100">


                                            <?php
                                         echo $Tdata['Product']['view_count'];
                                            ?>
                                        </td>

                                    </tr>

                                    <?php
                                    $i++;
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </article>
    </div> 
</div>