<div class="responseParentMessage">
</div>

<div class="responseShowItems">
</div>

<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div id="modal-content" class="modal-content">

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        showItems();
    });


    function showItems() {
        $.ajax({
            async: false,
            data: {
                table: $("table").val()
            },
            dataType: "html",
            type: "POST",
            url: "<?php echo $this->Html->url(['controller' => 'payments', 'action' => 'list_orders', $table['Table']['id']]) ?>",
            error: function (data, textStatus, errorThrown) {
                alert('Erro: ' + errorThrown);
            },
            success: function (data, textStatus) {
                $(".responseShowItems").html(data);
            }
        });

    }
</script>

