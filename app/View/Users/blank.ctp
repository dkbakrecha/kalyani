<?php
echo $this->Html->script(
        array(
            'sliderengine/jquery',
            'sliderengine/amazingslider',
            'sliderengine/initslider-1',
));
?>

<div style="margin:30px auto;max-width:800px;">
    <div id="amazingslider-1" style="display:block;position:relative;margin:16px auto 92px;">
        <ul class="amazingslider-slides" style="display:none;">

            <?php
            foreach ($eventData as $img) {
                ?>

                <li><img src="<?php echo $this->webroot . "img/event_img/" . $img['evtimgs']['image_name']; ?>" alt="IMG-20140907-WA0002" /></li>
                <?php
            }
            ?>


        </ul>
        <ul class="amazingslider-thumbnails" style="display:none;">
            <?php
            foreach ($eventData as $img) {
                ?>
                <li><img src="<?php echo $this->webroot . "img/event_img/" . $img['evtimgs']['image_name']; ?>" /></li>
            <?php
            }
            ?>

        </ul>

    </div>

</div>