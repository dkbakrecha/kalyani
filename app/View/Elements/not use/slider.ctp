<?php ?>


<!-- BEGIN .slider -->

<div class="slider clearfix">

    <!-- END .slider -->
    <div style="overflow: hidden; position: relative; width:" class="flex-viewport ">
        <ul style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-2880px, 0px, 0px);" class="slides">

            <li style="width: 960px; float: left; display: block;" class="clone">			

                <?php echo $this->Html->image('rh1.jpg'); ?>

                <div class="flex-caption"><p>We believe in a fair deal</p>
                    <div class="clearboth"></div>
                    <p>which is why all our products are fair trade</p></div>

            </li>



            <li class="" style="width: 960px; float: left; display: block;">			

                <?php echo $this->Html->image('slide2.jpg'); ?>
                <div class="flex-caption"><p>Only the finest organic materials</p>
                    <div class="clearboth"></div>
                    <p>are used in our products</p></div>

            </li>



            <li class="" style="width: 960px; float: left; display: block;">			

                <?php echo $this->Html->image('slide3.jpg'); ?>
                <div class="flex-caption"><p>Endless summer deals</p>
                    <div class="clearboth"></div>
                    <p>Don't miss out!</p></div>

            </li>

        </ul>
    </div>
    <ul class="flex-direction-nav">
        <li>
            <a class="flex-prev" href="#">Previous</a>
        </li>
        <li><a class="flex-next" href="#">Next</a>
        </li>
    </ul>

</div>
