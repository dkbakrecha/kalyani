<aside class="sidebar">
    <ul class="main-nav">
        <li class="main-nav--active">
            <a class="main-nav__link" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'users', 'action' => 'index')) ?>">
                <span class="main-nav__icon"><i class="fa fa-dashboard"></i></span>
                Dashboard 
            </a>
        </li>
        <li>
            <a class="main-nav__link" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'products', 'action' => 'index')) ?>">
                <span class="main-nav__icon"><i class="fa fa-book"></i></span>
                Products <span class="badge main-nav__badge badge--red"><?php echo $totalProducts; ?></span>
            </a>
        </li>

        

        <li>
            <a class="main-nav__link" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'Cmspages', 'action' => 'index')); ?>">
                <span class="main-nav__icon"><i class="fa fa-file"></i></span>
                CMS Content
            </a>
        </li>
        <?php if ($this->Session->read("Auth.Admin.role") == 'admin') { ?>

        <li class="main-nav--nav__link">
                <a class="main-nav__link" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'products', 'action' => 'slider')) ?>">
                    <span class="main-nav__icon"><i class="fa fa-inbox"></i></span>
                   Slider Images

            </li>
            <li class="main-nav--collapsible">
                <a class="main-nav__link" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categories', 'action' => 'index')) ?>">
                    <span class="main-nav__icon"><i class="fa fa-edit"></i></span>
                    Category<span class="badge main-nav__badge badge--red"><?php echo $totalCategory; ?></span>
                </a>
                <ul class="main-nav__submenu">
                    <li><a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categories', 'action' => 'view')) ?>"><i class="fa fa-users"></i><span>Category View</span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categories', 'action' => 'subcategory')) ?>"><i class="fa fa-mail-forward"></i><span>Sub Category View</span></a></li>
                </ul>
            </li>
            <li class="main-nav--collapsible">
                <a class="main-nav__link" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'messages', 'action' => 'index')) ?>">
                    <span class="main-nav__icon"><i class="fa fa-inbox"></i></span>
                    Mails<span class="badge main-nav__badge badge--red"><?php echo $unreadMsg; ?></span>
                </a>
                <ul class="main-nav__submenu">
                    <li><a href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'contacts', 'action' => 'index')) ?>"><i class="fa fa-users"></i><span>Contacts</span></a></li>

                </ul>
            </li>

            <li class="main-nav--nav__link">
                <a class="main-nav__link" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'faqs', 'action' => 'index')) ?>">
                    <span class="main-nav__icon"><i class="fa fa-inbox"></i></span>
                    Faqs

            </li>

            <li>
                <a class="main-nav__link" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'users', 'action' => 'settings')); ?>">
                    <span class="main-nav__icon"><i class="fa fa-cog"></i></span>
                    Settings
                </a>
            </li>
        <?php } ?>

    </ul>
</aside> <!-- /main-nav -->
