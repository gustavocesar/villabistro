<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            Villa Bistrô: Login
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('animate');
        echo $this->Html->css('main');
        echo $this->Html->css('style-responsive');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <style type="text/css" id="holderjs-style"></style>
    </head>
    <body class="login-block">
        <?php echo $this->Flash->render(); ?>
        <br />
        <?= $this->fetch('content'); ?>
        
        <?= $this->element('google-analytics'); ?>
        
    </body>
</html>
