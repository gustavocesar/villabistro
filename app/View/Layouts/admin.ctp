<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            Villa Bistrô: <?php echo __($this->fetch('title')); ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
        -->
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('jquery-ui-1.10.4.custom.min');
        echo $this->Html->css('main');
//        echo $this->Html->css('main-min');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('simple-line-icons');
//        echo $this->Html->css('animate');
        echo $this->Html->css('style-responsive');
        echo $this->Html->css('zabuto_calendar.min');
        echo $this->Html->css('pace');
        echo $this->Html->css('jquery.news-ticker');
        echo $this->Html->css('custom');
        echo $this->Html->css('datepicker');
        echo $this->Html->css('/jquery-timepicker/jquery.timepicker');

        //datatable
        echo $this->Html->css('/DataTables-1.10.13/media/css/jquery.dataTables.min');
        echo $this->Html->css('/DataTables-1.10.13/media/css/dataTables.bootstrap4.min');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <style type="text/css" id="holderjs-style"></style>

        <?php
        echo $this->Html->script('jquery-1.10.2.min');
        echo $this->Html->script('jquery-migrate-1.2.1.min');
//        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('jquery-ui-min');
        ?>
    </head>
    <body class="pace-done">
        <?php
        if (isset($isProduction) && $isProduction == true) {
            ?>
            <div class="text-center" style="overflow: hidden; top:0;position: fixed; z-index: 999!important; width: 100%;background-color: #666;color: white">
                { Ambiente de Testes }
            </div>
            <br>
            <?php
        }
        ?>

        <div class="pace  pace-inactive">
            <div data-progress="99" data-progress-text="100%" style="width: 100%;" class="pace-progress">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>

        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>

        <?php
        echo $this->element('topbar', [], [
            'cache' => true
        ]);
        ?>

        
        <div id="wrapper">

            <?php
            echo $this->element('sidebar', [], [
//                'cache' => true
            ]);
            ?>

            <div id="page-wrapper">

                <?= $this->element('breadcrumb'); ?>

                <?php echo $this->Flash->render(); ?>
                <?php echo $this->Flash->render('auth', ['element' => 'Flash/authError']); ?>

                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <?= $this->fetch('content'); ?>
                        </div>
                    </div>
                </div>

                <?php
                echo $this->element('footer', [], [
                    'cache' => true
                ]);
                ?>

            </div>

        </div>

        <div id="audit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div id="modal-content" class="modal-content">
                </div>
            </div>
        </div>

        <!--CORE JAVASCRIPT-->
        <?php
        echo $this->Html->script('main');

        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('bootstrap-hover-dropdown');
        echo $this->Html->script('html5shiv');
        echo $this->Html->script('respond.min');
        echo $this->Html->script('jquery.metisMenu');
        echo $this->Html->script('jquery.slimscroll');
        echo $this->Html->script('jquery.cookie');
        echo $this->Html->script('icheck.min');
        echo $this->Html->script('custom.min');
        echo $this->Html->script('jquery.menu');
        echo $this->Html->script('pace.min');
        echo $this->Html->script('holder');
        echo $this->Html->script('responsive-tabs');
//        echo $this->Html->script('zabuto_calendar.min');
//        echo $this->Html->script('index');
        echo $this->Html->script('jQuery-Mask-Plugin/jquery.mask');
        echo $this->Html->script('bignumber/bignumber');
        echo $this->Html->script('/jquery-timepicker/jquery.timepicker');

        //datatable
        echo $this->Html->script('/DataTables-1.10.13/media/js/jquery.dataTables.min');

        echo $this->Html->script('admin');
        ?>

        <div style="display: none; position: absolute; background: rgb(255, 255, 255) none repeat scroll 0% 0%; z-index: 1040; padding: 0.4em 0.6em; border-radius: 0.5em; font-size: 0.8em; border: 1px solid rgb(17, 17, 17); white-space: nowrap;" id="flotTip"></div>
    </body>
    
    <?php
    echo $this->element('google-analytics', [], [
        'cache' => true
    ]);
    ?>

    <?= $this->element('google-analytics'); ?>
</html>
