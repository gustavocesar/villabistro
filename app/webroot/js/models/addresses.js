$(document).ready(function () {

    $('#AddressZipCode').change(function(){
        updateLocation();
    });

    $('#AddressZipCode').mask('00000-000', {
        reverse: false
    });
});

function updateLocation() {

    $.ajax({
        async: false,
        data: {zip_code: $('#AddressZipCode').val()},
        type: "POST",
        url: $('#url-get-location').val(),
        dataType: "json",
        error: function (data, textStatus, errorThrown) {
            console.log('Erro: ' + errorThrown);
        },
        success: function (data, textStatus) {
            if (data.success == true) {
                $('#AddressPublicPlace').val(data.location.logradouro);
                $('#AddressCity').val(data.location.localidade);
                $('#AddressNeighborhood').val(data.location.bairro);
                $('#AddressNumber').val("");
                $('#AddressReference').val("");
                $('#AddressObservation').val("");
            } else {
                console.log('Erro: ' + data.message);
            }
        }
    });
}