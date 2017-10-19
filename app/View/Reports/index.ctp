<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-usd"></span>&nbsp&nbsp' . __('Received Payments'), ['controller' => 'reports', 'action' => 'received_payments'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-sort-numeric-desc"></span>&nbsp&nbsp' . __('Quantity Sold'), ['controller' => 'reports', 'action' => 'quantity_sold'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
    </div>
</div>

