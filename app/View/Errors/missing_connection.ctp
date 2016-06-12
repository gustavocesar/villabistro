<div class="row text-center">

    <div class="col-lg-12">
        <?php
        echo $this->Html->image('/images/robot.png', array('alt' => 'Erro'));
        ?>
        <h2>Falha na conexão com o banco de dados!</h2>

        <div class="panel-group text-left" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="details">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDetails" aria-expanded="false" aria-controls="collapseDetails">
                            Detalhes do Erro
                        </a>
                    </h4>
                </div>
                <div id="collapseDetails" class="panel-collapse collapse" role="tabpanel" aria-labelledby="details">
                    <div class="panel-body">
                        <h4><?php echo $message; ?></h4>
                        <?php echo $this->element('exception_stack_trace'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
