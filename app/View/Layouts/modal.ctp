<?= $this->fetch('content'); ?>

<script type="text/javascript">
    $(document).ready(function () {

        var myModal = $('#modal');

        $("#modal").on('hidden.bs.modal', function () {
            $(this).data('bs.modal', null);
        });

        var myModalForm = $("#modal form").first();

        var formAction = $("#modal form").first().prop('action');

        var btnSave = $('#btnSaveModal');

        btnSave.removeAttr('disabled');
        myModalForm.trigger("reset");

        hideReturnMessage();

        myModalForm.bind("submit", function (event) {

            btnSave.attr('disabled', 'disabled');

            event.preventDefault();
            event.stopImmediatePropagation();

            $.ajax({
                async: false,
                data: myModalForm.serialize(),
                dataType: "html",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8", /* Não Mudar !!!*/
                type: "POST",
                url: formAction,
                error: function (data, textStatus, errorThrown) {
                    showReturnMessage(false, errorThrown);
                },
                success: function (data, textStatus) {
                    var response = JSON.parse(data);

                    if (response.success === true) {

                        showItems();
                        myModal.modal('toggle');

                        showReturnMessage(true, response.message);

                    } else {
                        showReturnMessage(false, response.message);
                    }
                }
            })
                    .always(function () {
                        btnSave.removeAttr('disabled');
                    });

            return false;
        });

    });

    /**
     * Retorno dos métodos ADD e EDIT, que podem enviar o retorno da operação para
     * o modal, ou para o 'parent'
     * @param boolean success
     * @param string message
     * @returns void
     */
    function showReturnMessage(success, message) {
        if (success) {
            var html = "";
            html += "<div class='alert alert-success'>";
            html += "<i class='fa fa-check-circle'></i>&nbsp;" + message;
            html += "</div>";

            $(".responseParentMessage").html(html);
            $(".responseParentMessage").show('fast');
        } else {
            var html = "";
            html += "<div class='alert alert-danger'>";
            html += "<i class='fa fa-exclamation-triangle'></i>&nbsp;" + message;
            html += "</div>";

            $(".responseModalMessage").html(html);
            $(".responseModalMessage").show('fast');
        }
    }

    /**
     * Retorno do método DELETE, que envia o retorno sempre para o 'parent'
     * @param boolean success
     * @param string message
     * @returns void
     */
    function showReturnMessageDelete(success, message) {

        var html = "";

        if (success) {
            html += "<div class='alert alert-success'>";
            html += "<i class='fa fa-check-circle'></i>&nbsp;" + message;
            html += "</div>";
        } else {
            html += "<div class='alert alert-danger'>";
            html += "<i class='fa fa-exclamation-triangle'></i>&nbsp;" + message;
            html += "</div>";
        }

        $(".responseParentMessage").html(html);
        $(".responseParentMessage").show('fast');
    }
</script>
