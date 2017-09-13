<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-file-text"></span>&nbsp' . __('Sales by Period'), ['controller' => 'reports', 'action' => 'received_payments'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
    </div>
</div>

