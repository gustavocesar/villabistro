<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-3">
            <p>
                <?php
                echo $this->Html->link(
                        '<span class="fa fa-bomb"></span>&nbsp&nbsp' . __('Inactivate All Products'), ['controller' => 'routines', 'action' => 'inactivate_all_products'], ['class' => 'btn btn-primary btn-lg btn-block', 'escape' => false]
                )
                ?>
            </p>
        </div>
    </div>
</div>

