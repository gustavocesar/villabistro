$(document).ready(function () {

    var originTable = $("#table_selected_id").val();

    if (originTable && originTable > 0 && originTable != '') {
        $("#table_id").val($("#table_selected_id").val());
    } else {
        $("#table_id").val("");
    }

    $("input.customQuantityDouble").each(function () {
        $(this).val(0);
    });

    $("input.hiddenSubtotal").each(function () {
        $(this).val(0);
    });

    $('#rootwizard').bootstrapWizard({onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('#rootwizard .progress-bar').css({width: $percent + '%'});

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('#rootwizard').find('.pager .next').hide();
                $('#rootwizard').find('.pager .finish').show();
                $('#rootwizard').find('.pager .finish').removeClass('disabled');

                updateFinishStep();
            } else {
                $('#rootwizard').find('.pager .next').show();
                $('#rootwizard').find('.pager .finish').hide();
            }
        }});
    window.prettyPrint && prettyPrint();

    $("#previous").click(function () {
        $("#totop").click();
    });

    $("#next").click(function () {
        $("#totop").click();
    });

    $("#tab1 button").click(function () {
        $("#tab1 button").removeClass('active');
        $("#" + this.id).addClass('active');
        $("#table_id").val(this.id);

        $("#next").click();
        $("#totop").click();
    });

    $('#rootwizard .finish').click(function () {

        if (!$("#table_id").val()) {
            alert('ae');
            return false;
        }

        $("#OrderOrderWizardForm").submit();
        $("#totop").click();
    });

    $('.customQuantityDouble').mask('000.000.000,000', {
        reverse: true,
        onChange: function (value, event, currentField) {

            //FIX-ME: bug em que o value do campo permanece em zero
//                $(currentField).val(value);

            updateSubtotal(null, null, currentField);
        }
    });

    if (originTable && originTable > 0 && originTable != '') {
        $("#" + originTable).click();
    }

    if (orderDataTable) {
        orderDataTable.destroy();
    }
    
    var titleColumn = 2;

    var orderDataTable = $('.order-datatable').DataTable({
        retrieve: true,
        "bPaginate": false,
        initComplete : function() {
            $(".dataTables_filter input").detach().appendTo('#DataTables_Table_0_filter');
            $(".dataTables_filter input").parent().css("width", "100%");
            $(".dataTables_filter input").css("width", "100%");

            $(".dataTables_filter input").addClass("form-control");
        },
        "columnDefs": [
            { "visible": false, "targets": [titleColumn] }
        ],
        "columns": [
            {"orderable": false},
            {"orderable": false},
            {"orderable": false},
            {"orderable": false},
            {"orderable": false},
            {"orderable": false}
        ],
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(titleColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group text-center"><td colspan="5"><strong>'+group+'</strong></td></tr>'
                    );

                    last = group;
                }
            } );
        },
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "",
            "searchPlaceholder": "Pesquisar...",
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
    
    $(".tdSetObservation").click(function () {
        var productId = $(this).attr('value');
        
        // Set the options for the effect type chosen
        var options = { direction: 'up' };

        // Set the duration (default: 400 milliseconds)
        var duration = 500;

        $('#textarea_'+productId).toggle('slide', options, duration, function(){
            $(this).val('');
        });
    });
    
    $("textarea").each(function () {
        $(this).val('');
    });
    
});

function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function decrease(subcategory, input_id) {
    var input = $("#input_" + subcategory + "_" + input_id);

    var qtd = input.val();

    if (isNumeric(qtd)) {

        qtd--;

        if (qtd <= 0) {
            qtd = 0;
        }

        input.val(qtd);

        updateSubtotal(subcategory, input_id, $(input));

    } else {
        input.val(0);
    }
}

function increase(subcategory, input_id) {
    var input = $("#input_" + subcategory + "_" + input_id);

    var qtd = input.val();

    if (isNumeric(qtd)) {

        qtd++;

        if (qtd < 0) {
            qtd = 0;
        }

        input.val(qtd);

        updateSubtotal(subcategory, input_id, $(input));

    } else {
        input.val(0);
    }
}

function updateSubtotal(subcategory, input_id, currentField) {

    if (!subcategory) {
        var $id = $(currentField).attr("id");
        var $arrId = $id.split('_');
        subcategory = $arrId[1];
    }

    if (!input_id) {
        var $id = $(currentField).attr("id");
        var $arrId = $id.split('_');
        input_id = $arrId[2];
    }

    var sellPrice = $("#hiddenSellPrice_" + subcategory + "_" + input_id);
    var input = $("#input_" + subcategory + "_" + input_id);
    var spanSubtotal = $("#spanSubtotal_" + subcategory + "_" + input_id);
    var hiddenSubtotal = $("#hiddenSubtotal_" + subcategory + "_" + input_id);

    var v = 0;
    var quantity = parseFloat(input.val());
    if (quantity > 0) {
        var a = parseFloat(sellPrice.val()).toFixed(2);
        var b = parseFloat(quantity).toFixed(2);

        v = a * b;
        spanSubtotal.html(parseCurrency(v.toFixed(2), 2));
        hiddenSubtotal.val(parseFloat(v.toFixed(2)));
    } else {
        spanSubtotal.html("0.00");
        hiddenSubtotal.val('');
    }
}

function updateFinishStep() {

    var $activeTable = $("#tab1 button.active");

    if (!$activeTable.attr("id")) {
        alert('Selecione a mesa');
        return false;
    }

    var tableName = $activeTable.attr("name");
    if (tableName !== 'Balcão') {
        tableName = "MESA " + tableName;
    }

    var html = '';

    html += '<table class="table table-hover table-condensed">';

    html += '<thead>';
    html += '<tr>';
    html += '<th colspan="3" class="text-center" id="confirmTable">' + tableName + '</th>';
    html += '</tr>';
    html += '</thead>';

    html += '<tbody>';

    var total = 0;

    $("input.hiddenSubtotal").each(function () {
        if ($(this).val() && $(this).val() > 0) {

            var $tableRow = $(this).parent().parent().html();

            var arrProduct = $($tableRow).find('.spnProductName').html().split('-');
            
            var productId = parseInt(arrProduct[0].trim());
            var productName = arrProduct[1].trim();
            
            var observation = '';
            
            var textArea = $('#tab2').find('#textarea_'+productId);
            if (textArea) {
                observation = '<br />'+textArea.val().replace(/\n/g,"<br>");
            }

            var sellPrice = $($tableRow).find("input[id*='hiddenSellPrice_']").val();

            var subtotal = $($tableRow).find('.hiddenSubtotal').val();
            var subtotalFormatted = parseCurrency(subtotal, 2);

            total += parseFloat(subtotal);

            var quantity = subtotal / sellPrice;

            html += '<tr>';
            html += '<td class="text-right">' + quantity.toFixed(2) + '</td>';
            html += '<td class="text-left">' + productName + observation + '</td>';
            html += '<td class="text-right">' + subtotalFormatted + '</td>';
            html += '</tr>';
        }
    });

    html += '<tr>';
    html += '<td colspan="2" class="text-right"><strong>Total:&nbsp;</strong></td>';
    html += '<td class="text-right"><strong>R$ <span id="spanTotal">'+parseCurrency(total, 2)+'</span></strong></td>';
    html += '</tr>';

    html += '</tbody>';

    html += '</table>';

    $("#itemsConfirmOrder").html("");
    $("#itemsConfirmOrder").html(html);
}