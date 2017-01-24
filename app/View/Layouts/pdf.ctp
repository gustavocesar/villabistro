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
//        echo $this->Html->meta('favicon.ico', '/favicon2.ico', array(
//            'type' => 'icon'
//        ));

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
    <?= $this->fetch('content'); ?>
    </body>

    <script type="text/javascript">
        function printPage() {
            window.print();
            return false;
        }
    </script>

</html>
