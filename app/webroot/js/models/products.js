$(document).ready(function () {

    handleStockable();
    $("#ProductStockable").change(function() {
        handleStockable();
    });

});

function handleStockable() {
    if ($("#ProductStockable").val() == 'Sim') {
        $('#ProductMinimumStock').parent().show(300);
    } else {
        $('#ProductMinimumStock').parent().hide(300);
    }
}