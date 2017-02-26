<?php ?>
<style>
    #contact-info {
        box-sizing: border-box;
        height: 100%;
        padding: 10px 15px;
    }
    #contact-info dt {
        color:#62ac20;
        font-size: 15px;
        font-variant: small-caps;
        //font-weight: 600;
        letter-spacing: 2px;
        margin-bottom: 5px
    }
    #contact-info dd {
        color: black;
        margin-bottom: 25px;
    }

    #contact-info a {
        color:black;
    }
    .getin
    {
        color: black;
        font-size: 20px;
        font-variant: small-caps;
        padding: 10px 12px 15px;
    }

</style>


<div class="row">

    <div class="col-md-12">
        <div class="post clearfix" id="post-383">

            <div class="col-md-8">
                <form action="" method="post" class="smart-green">
                    <h1>Contact us 
                        <!--<span>Please fill all the texts in the fields.</span>-->
                    </h1>
                    <?php echo $this->Form->create('Message'); ?>
                    <label>
                        <span>Your Name :</span>
                        <?php echo $this->Form->input('name', array('div' => false, 'label' => false)); ?>

                    </label>

                    <label>
                        <span>Your Email :</span>
                        <?php echo $this->Form->input('email', array('div' => false, 'label' => false)); ?>
                    </label>
                    <label>
                        <span>Contact Number :</span>
                        <?php echo $this->Form->input('mobile', array('div' => false, 'label' => false)); ?>

                    </label>

                    <label>
                        <span>Message :</span>
                        <?php echo $this->Form->input('message', array('div' => false, 'label' => false, 'rows' => 25, 'cols' => '25')); ?>
                    </label> 
                    <label>
                        <span>&nbsp;</span> 
                        <?php echo $this->Form->Submit('Send', array('class' => 'button')); ?>

                    </label>    
                </form>
            </div>

            <div class="col-md-4">
                <h3 class="getin">Get in touch with us </h3>
                <aside id="contact-info">
                    <dl>
                        <dt>Email</dt>
                        <dd>
                            <a title="Click to send us an email" href="mailto:contact@rayenergy.in"><?php echo Configure::read('Site.email'); ?></a>
                        </dd>
                        <dt>Telephone</dt>
                        <dd>
                            <i class="fa fa-phone-square fa-lg greencolor"></i>  <a title="Click to call us"> : +91 <?php echo Configure::read('Site.mobile'); ?></a>
                        </dd>
                        <dt>Social LInks</dt>
                        <dd>

                            <i class="fa fa-skype fa-lg greencolor "></i> <a title="Click to call us on Skype" href="skype:acbc?call"> : <?php echo Configure::read('Site.email'); ?></a><br>
                            <i class="fa fa-facebook fa-lg greencolor"></i> <a title="facebook" href="skype:acbc?call"> : <?php echo Configure::read('Site.facebook'); ?></a><br>
                            <i class="fa fa-twitter fa-lg greencolor"></i> <a title="twitter" href="skype:acbc?call"> : <?php echo Configure::read('Site.twitter'); ?></a><br>
                            <i class="fa fa-linkedin fa-lg greencolor"></i> <a title="linkedin" href="skype:acbc?call"> : <?php echo Configure::read('Site.linkedin'); ?></a><br>
                        </dd>
                        <dt>Address</dt>
                        <dd>
                            <address>
                                <?php echo Configure::read('Site.address'); ?>
                            </address>
                        </dd>
                        <dt>Registered Office</dt>
                        <dd>
                            <address>
                                <?php echo Configure::read('Site.registeredaddress'); ?>

                            </address>
                        </dd>

                    </dl>
                </aside>

            </div>

        </div>

    </div>

</div>

