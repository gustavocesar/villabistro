$(document).ready(function () {
    $('#PaymentPaydValue').mask('000.000.000,00', {
        reverse: true,
        onChange: function (value) {
            updatePayback();
        }
    });

    $("#mark-all").click(function () {
        $(".list-group-item").click();
    });
});


function updatePayback() {

    var hiddenPaydValue = $("#PaymentPaydValue");
    var inputSubtotal = $("#PaymentSubtotal");

    var inputPayback = $("#PaymentPayback");
    var labelPayback = $("#PaymentLabel-payback");

    if (hiddenPaydValue.val() && parseFloat(inputSubtotal.val()) > 0) {
        var payd = parseBigNumber(hiddenPaydValue.val());
        var subtotal = parseBigNumber(inputSubtotal.val());
        var payback = payd.subtract(subtotal);
        var signal = "";

        payback = payback.valueOf();

        if (payback < 0) {
            signal = "-";
            payback = payback.replace("-", "");
        }

        inputPayback.val(signal + parseCurrency(payback, 2));
        labelPayback.val(signal + parseCurrency(payback, 2));
    } else {
        inputPayback.val('0,00');
        labelPayback.val('0,00');
    }
}
