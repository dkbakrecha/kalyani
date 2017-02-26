<?php ?>
<style>
    dl
    {
        padding: 10px;
        //min-width: 960px;
    }
    a.ie { background: transparent; text-decoration: none; }
    dl dt
    {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-bottom: 1px solid #8dbf41;
        margin-bottom: 5px;
    }
    dl dt a,
    dl a.ie dt
    {
        color: #000;
        font-weight: bold;
        text-decoration: none;
        padding: 10px;
        display: block;
        font-size: 16px;
    }
    dl dd
    {
        color: #222;
        margin: 0;
        height: 0;
        overflow: hidden;
        -webkit-transition: height 1s ease;
    }
    dl dd p
    {
        padding: 10px;
        margin: 0;
        line-height: 30px;
    }
    dl dd:target
    {
        height: auto;
    }
    dl a.ie:hover dd,
    dl a.ie:focus dd
    {
        height: auto;
        color: #cccccc !important;
    }
</style>



<div class="row">

    <div class="col-md-12">
        <div class="post clearfix" id="post-383">
            <div class="title1" style="text-align: left;">
                <h2><a href="">FAQ'S</a></h2>
            </div>



            <div class="entry_1">
                <dl>
                    <?php
                    //  pr($faqs);
                    $i = 1;
                    foreach ($faqs as $faq) {
                        ?>
                        <dt><a href="#Section<?php echo $i; ?>"><?php echo $faq['Faq']['title']; ?></a></dt>
                        <dd id="Section<?php echo $i; ?>">

                            <?php echo $faq['Faq']['content']; ?>

                        </dd>

                        <?php
                        $i++;
                    }
                    ?>




                    <!--		<dt><a href="#Section2">Section 2</a></dt>
                                    <dd id="Section2">
                                            <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consectetur, ante non iaculis suscipit, massa tortor dictum massa, mattis iaculis massa odio sit amet ipsum. Integer posuere enim ac felis feugiat auctor. Ut urna dui, mollis hendrerit fermentum non, lacinia non enim. Vestibulum lacus risus, tempor vel egestas at, laoreet id tortor. Cras augue sapien, cursus in facilisis id, bibendum a enim. Curabitur semper ligula et ligula aliquet scelerisque. Nunc quis aliquet sem. Duis a rhoncus enim. Integer lacinia, mi.
                                            </p>
                                    </dd>
                                    <dt><a href="#Section3">Section 3</a></dt>
                                    <dd id="Section3">
                                            <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consectetur, ante non iaculis suscipit, massa tortor dictum massa, mattis iaculis massa odio sit amet ipsum. Integer posuere enim ac felis feugiat auctor. Ut urna dui, mollis hendrerit fermentum non, lacinia non enim. Vestibulum lacus risus, tempor vel egestas at, laoreet id tortor. Cras augue sapien, cursus in facilisis id, bibendum a enim. Curabitur semper ligula et ligula aliquet scelerisque. Nunc quis aliquet sem. Duis a rhoncus enim. Integer lacinia, mi.
                                            </p>
                                    </dd>
                                    <dt><a href="#Section4">Section 4</a></dt>
                                    <dd id="Section4">
                                            <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consectetur, ante non iaculis suscipit, massa tortor dictum massa, mattis iaculis massa odio sit amet ipsum. Integer posuere enim ac felis feugiat auctor. Ut urna dui, mollis hendrerit fermentum non, lacinia non enim. Vestibulum lacus risus, tempor vel egestas at, laoreet id tortor. Cras augue sapien, cursus in facilisis id, bibendum a enim. Curabitur semper ligula et ligula aliquet scelerisque. Nunc quis aliquet sem. Duis a rhoncus enim. Integer lacinia, mi.
                                            </p>
                                    </dd>-->
                </dl>


                <div class="clear"></div>

            </div>

        </div>


    </div>
    <div class="clear"></div>	

</div>

