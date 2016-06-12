<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger">
            <div id="<?php echo h($key) ?>Message" class="<?php echo h($class) ?>">
                <i class="fa fa-info-circle"></i>&nbsp;<?php echo h($message) ?>
            </div>
        </div>
    </div>
</div>
