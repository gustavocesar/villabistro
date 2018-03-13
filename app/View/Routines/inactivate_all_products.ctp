<?php
echo $this->Form->create('InactivateProducts',[
    'inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]],
    'onsubmit' => "return confirm(\"Confirma a inativação de todos os produtos?\");"
]);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-info">
            <i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>Importante</strong>
            <p>Essa ação irá inativar todos os produtos cadastrados.</p>
            <p>Os registros vinculados aos produtos (como Pedidos e Estoque) serão mantidos como histórico.</p>
            <p>Além disso, os produtos podem ser Ativados novamente a qualquer momento, através do menu Configurações -> Produtos.</p>
        </div>
    </div>
</div>

<div class="form-actions text-right pal">
    <?php echo $this->Form->submit(__('Proceed'), ['value' => __('Proceed'), 'class' => 'pull-left btn btn-red']); ?>
    <?php echo $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>
</div>
<div class="clearfix"></div>
<?php echo $this->Form->end(); ?>
