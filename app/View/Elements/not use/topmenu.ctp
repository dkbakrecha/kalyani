<?php ?>

<!-- BEGIN .main-menu-wrapper -->
<div id="main-menu-wrapper" class="clearfix">

    <ul id="main-menu" class="fl clearfix sf-js-enabled">
        <li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-14 current_page_item menu-item-25">
            <a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'index'));?>">Home</a>
        </li>

        <li id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83">
            <a class="sf-with-ul" href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'products'));?>">Products
                <span class="sf-sub-indicator"> »</span>
            </a>
            <ul style="display: none; visibility: hidden;" class="sub-menu">
                <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="#">Typography</a></li>
                <li id="menu-item-98" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-98">
                    <a class="sf-with-ul" href="#">Industrial Furniture
                        <span class="sf-sub-indicator"> »</span>
                    </a>
                    <ul style="display: none; visibility: hidden;" class="sub-menu">
                        <li id="menu-item-116" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-116"><a href="#">Test </a></li>
                        <li id="menu-item-122" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-122"><a href="#">Alerts &amp; Messages</a></li>
                        <li id="menu-item-127" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-127"><a href="#">Buttons, Dropcaps &amp; Lists</a></li>
                        <li id="menu-item-134" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-134"><a href="#">Googlemap</a></li>
                        <li id="menu-item-144" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-144"><a href="#">Video</a></li>
                    </ul>
                </li>
               
            
                <li id="menu-item-97" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-97"><a href="#">Left Sidebar</a></li>

            </ul>
        </li>
        
        <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'faqs'));?>">FAQ'S</a></li>
        <li id="menu-item-24" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'aboutus'));?>">About Us</a></li>
        <li id="menu-item-22" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'contactus'));?>">Contact</a></li>

    </ul>


   
    <form method="get" action="#" id="menu-search" class="fr">
        <input name="s" type="text">
        <button class="btnsearch">Search</button>
    </form>
    

    <!-- END .main-menu-wrapper -->	



</div>