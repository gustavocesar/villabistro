$(document).ready(function () {

    $('#EntryNoteItemQuantity').mask('000.000.000,000', {
        reverse: true,
        onChange: function (value) {
            updateUnit();
            updateTotal();
        }
    });

    $('#EntryNoteItemUnitCost').mask('000.000.000,000', {
        reverse: true,
        onChange: function (value) {
            updateTotal();
        }
    });

    $('#EntryNoteItemTotalCost').mask('000.000.000,000', {
        reverse: true,
        onChange: function (value) {
            updateUnit();
        }
    });

});


function updateUnit() {
    var inputQuantity = $("#EntryNoteItemQuantity");
    var inputUnitCost = $("#EntryNoteItemUnitCost");
    var inputTotalCost = $("#EntryNoteItemTotalCost");

    if (inputQuantity.val() && inputTotalCost.val()) {
        var quantity = parseBigNumber(inputQuantity.val());
        var total = parseBigNumber(inputTotalCost.val());
        var unit = total.divide(quantity);

        inputUnitCost.val(parseCurrency(unit));
    } else {
        inputUnitCost.val();
    }
}

function updateTotal() {
    var inputQuantity = $("#EntryNoteItemQuantity");
    var inputUnitCost = $("#EntryNoteItemUnitCost");
    var inputTotalCost = $("#EntryNoteItemTotalCost");

    if (inputQuantity.val() && inputUnitCost.val()) {

        var quantity = parseBigNumber(inputQuantity.val());
        var unit = parseBigNumber(inputUnitCost.val());
        var total = unit.multiply(quantity);

        inputTotalCost.val(parseCurrency(total));
    } else {
        inputTotalCost.val();
    }
}
