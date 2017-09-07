<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            Villa Bistrô: <?php echo __($this->fetch('title')); ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('jquery-ui-1.10.4.custom.min');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('simple-line-icons');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('animate');
        echo $this->Html->css('main');
        echo $this->Html->css('style-responsive');
        echo $this->Html->css('zabuto_calendar.min');
        echo $this->Html->css('pace');
        echo $this->Html->css('jquery.news-ticker');
        echo $this->Html->css('custom');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <style type="text/css" id="holderjs-style"></style>

        <?= $this->Html->script('jquery-1.10.2.min'); ?>
        <?= $this->Html->script('jquery-migrate-1.2.1.min'); ?>
        <?= $this->Html->script('jquery-ui'); ?>

    </head>
    <body class="">
        
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>

        <div class="page-content">
            <div id="tab-general">
                <div class="row mbl">
                    <?= $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <?= $this->element('footer'); ?>

        <!--CORE JAVASCRIPT-->
        <?= $this->Html->script('main'); ?>

        <?= $this->Html->script('bootstrap.min'); ?>
        <?= $this->Html->script('bootstrap-hover-dropdown'); ?>
        <?= $this->Html->script('html5shiv'); ?>
        <?= $this->Html->script('respond.min'); ?>
        <?= $this->Html->script('jquery.metisMenu'); ?>
        <?= $this->Html->script('jquery.slimscroll'); ?>
        <?= $this->Html->script('jquery.cookie'); ?>
        <?= $this->Html->script('icheck.min'); ?>
        <?= $this->Html->script('custom.min'); ?>
        <?= $this->Html->script('jquery.menu'); ?>
        <?= $this->Html->script('pace.min'); ?>
        <?= $this->Html->script('holder'); ?>
        <?= $this->Html->script('responsive-tabs'); ?>
        <?= $this->Html->script('zabuto_calendar.min'); ?>
        <?= $this->Html->script('index'); ?>


        <div style="display: none; position: absolute; background: rgb(255, 255, 255) none repeat scroll 0% 0%; z-index: 1040; padding: 0.4em 0.6em; border-radius: 0.5em; font-size: 0.8em; border: 1px solid rgb(17, 17, 17); white-space: nowrap;" id="flotTip"></div>
    </body>

    <?= $this->element('google-analytics'); ?>

</html>
