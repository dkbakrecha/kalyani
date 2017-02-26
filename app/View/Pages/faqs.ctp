<?php 
//prd($faqs);
?>
<!-- BEGIN .section -->
<div class="section top-margin2">

    <ul class="columns-content page-content clearfix">

        <!-- BEGIN .full-width -->
        <li class="full-width">

<!--            <h2 class="page-title page-title-full">FAQ'S</h2>-->
            <div class="clearfix">
                <h2>FAQ'S</h2>
               
                <div class="one-full last-col">
                    <div role="tablist" class="accordion ui-accordion ui-widget ui-helper-reset ui-accordion-icons">
                        <?php  foreach($faqs as $faq)
                        {                        
                            ?>
                            <h4 tabindex="0" aria-selected="true" aria-expanded="true" role="tab" class="ui-accordion-header ui-helper-reset ui-state-active ui-corner-top"><span class="ui-icon ui-icon-triangle-1-s"></span><?php echo $faq['Faq']['title'];?></h4>
                        
                        <div style="display: block;margin-left: -30px; overflow: visible; padding-top: 0px; padding-bottom: 20px;" role="tabpanel" class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active">
                       
                            <?php echo $faq['Faq']['content'];?>
                        </div>
                        <?php
                        }
                        ?>
                        

                    </div>
                </div>
               
                
               
               
               
               
            </div>

        </li>
    </ul>

    <!-- END .section -->
</div>
