$(document).ready(function () {

    setInputMask();

    if (myDataTable) {
        myDataTable.destroy();
    }

    var myDataTable = $('.datatable').DataTable({
        retrieve: true,
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

});

function parseBigNumber(string) {
    var number = string;

    if (number instanceof BigNumber) {
        //nop
    } else {
        number = number.replace(".", "");
        number = number.replace(",", ".");
    }

    return new BigNumber(number, 3, BigNumber.ROUND_HALF_UP);
}

function parseCurrency(valor, casas, separdor_decimal, separador_milhar) {
    if (typeof (valor) == 'BigNumber') {
        valor = valor.valueOf();
    }

    valor = new String(valor);

    if (!casas) {
        casas = 3;
    }

    if (!separdor_decimal) {
        separdor_decimal = ',';
    }

    if (!separador_milhar) {
        separador_milhar = '.';
    }

    var inteiros = parseInt(parseInt(valor * (Math.pow(10, casas))) / parseFloat(Math.pow(10, casas)));
    var centavos = parseInt(parseInt(valor * (Math.pow(10, casas))) % parseFloat(Math.pow(10, casas)));

    if (centavos % 10 == 0 && centavos + "".length < 2) {
        centavos = centavos + "0";
    } else if (centavos < 10) {
        centavos = "0" + centavos;
    }

    var milhares = parseInt(inteiros / 1000);
    inteiros = inteiros % 1000;

    var retorno = "";

    if (milhares > 0) {
        retorno = milhares + "" + separador_milhar + "" + retorno;
        if (inteiros == 0) {
            inteiros = "000";
        } else if (inteiros < 10) {
            inteiros = "00" + inteiros;
        } else if (inteiros < 100) {
            inteiros = "0" + inteiros;
        }
    }
    retorno += inteiros + "" + separdor_decimal + "" + centavos;


    return retorno;
}

function setInputMask() {

    var options = {
        reverse: true,
        onComplete: function (cep) {
//            alert('CEP Completed!:' + cep);
        },
        onKeyPress: function (cep, event, currentField, options) {
//            console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField, ' options: ', options);
        },
        onChange: function (cep) {
//            console.log('cep changed! ', cep);
        },
        onInvalid: function (val, e, f, invalid, options) {
//            var error = invalid[0];
//            console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
        }
    };

    $('.threeDigitsDouble').mask('000.000.000,000', options);
    $('.twoDigitsDouble').mask('000.000.000,00', options);
}

function hideReturnMessage() {
    $(".responseModalMessage").hide('fast');
    $(".responseModalMessage").html("");

    $(".responseParentMessage").hide('fast');
    $(".responseParentMessage").html("");
}
