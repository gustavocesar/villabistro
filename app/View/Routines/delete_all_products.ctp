<?php
echo $this->Form->create('ReceivedPayments',[
    'inputDefaults' => ['error' => ['attributes' => ['class' => 'alert alert-danger custom-required']]],
    'onsubmit' => "return confirm(\"Confirma a exclusão de todos os produtos?\");"
]);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-info">
            <i class="fa fa-exclamation-triangle"></i>&nbsp;<strong>Importante</strong>
            <p>Essa ação irá excluir todos os produtos cadastrados.</p>
            <p>Os registros vinculados aos produtos (como Pedidos e Estoque) serão mantidos, mas todos os locais que listam produtos (como Impressão de Conta e Relatórios) só vão exibir informações dos novos produtos cadastrados após a execução dessa operação.</p>
        </div>
    </div>
</div>

<div class="form-actions text-right pal">
    <?php echo $this->Form->submit(__('Proceed'), ['value' => __('Proceed'), 'class' => 'pull-left btn btn-red']); ?>
    <?php echo $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>
</div>
<div class="clearfix"></div>
<?php echo $this->Form->end(); ?>
