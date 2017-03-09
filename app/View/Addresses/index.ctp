<div class="panel panel-blue" style="background:#fff;">
    <div class="panel-heading">
        <?php echo '<i class="fa fa-map-marker"></i>&nbsp;' . __('Addresses'); ?>

        <?php
        echo $this->Html->link(
                '<span class="fa fa-plus-square"></span>&nbsp' . __('Add'), $this->Html->url([
                    'controller' => 'addresses',
                    'action' => 'add',
                    $userId
                        ], true), [
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'class' => 'btn btn-info btn-sm pull-right',
            'escape' => false
                ]
        );
        ?>
    </div>
    <div class="panel-body pan">

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th><?php echo __('name'); ?></th>
                        <th><?php echo __('zip_code'); ?></th>
                        <th><?php echo __('state_id'); ?></th>
                        <th><?php echo __('city'); ?></th>
                        <th><?php echo __('public_place_id'); ?></th>
                        <th><?php echo __('number'); ?></th>
                        <th><?php echo __('neighborhood'); ?></th>
                        <th><?php echo __('is_primary'); ?></th>
                        <th><?php echo __('created'); ?></th>
                        <th><?php echo __('modified'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($addresses as $address): ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                if ($address['Address']['status_address_id'] == Address::ATIVO) {

                                    echo $this->Html->link(
                                            '<i class="fa fa-pencil"></i>', $this->Html->url([
                                                'controller' => 'addresses',
                                                'action' => 'edit',
                                                $address['Address']['id']
                                                    ], true), [
                                        'class' => 'editItem',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#modal',
                                        'escape' => false,
                                        'title' => __('Edit')
                                            ]
                                    );
                                    ?>

                                    &nbsp;

                                    <?php
                                    echo $this->Html->tag('a', '<i class="fa fa-trash-o"></i>', [
                                        'onclick' => "javascript:ajaxDelete('" . $address['Address']['id'] . "', '" . $this->Html->url(['controller' => 'addresses', 'action' => 'delete', $address['Address']['id']], true) . "');",
                                        'title' => __("Inactivate"),
                                        'class' => 'deleteItem'
                                    ]);
                                }
                                ?>
                            </td>
                            <td><?php echo h($address['Address']['name']); ?></td>
                            <td><?php echo h($address['Address']['zip_code']); ?></td>
                            <td><?php echo h($address['State']['name']); ?></td>
                            <td><?php echo h($address['Address']['city']); ?></td>
                            <td><?php echo trim(h($address['PublicPlace']['name'])).' '.trim(h($address['Address']['public_place_name'])); ?></td>
                            <td><?php echo h($address['Address']['number']); ?></td>
                            <td><?php echo h($address['Address']['neighborhood']); ?></td>
                            <td><?php echo h($address['Address']['is_primary']); ?></td>
                            <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($address['Address']['created']))); ?></td>
                            <td><?php echo h(date(Configure::read('ShowDateTimeFormat'), strtotime($address['Address']['modified']))); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function ajaxDelete(id, url) {

        hideReturnMessage();

        if (confirm("Tem certeza que deseja inativar este endereço?")) {

            $.ajax({
                async: false,
                data: id,
                dataType: "html",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8", //Não Mudar !!!
                type: "POST",
                url: url,
                error: function (data, textStatus, errorThrown) {
                    showReturnMessage(false, errorThrown);
                },
                success: function (data, textStatus) {

                    var retorno = JSON.parse(data);

                    if (retorno.success === true) {

                        showItems();

                        showReturnMessageDelete(true, retorno.message);

                    } else {
                        showReturnMessageDelete(false, retorno.message);
                    }
                }
            });
        }
    }
</script>