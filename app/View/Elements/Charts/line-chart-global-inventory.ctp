<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div id="line_top_x"></div>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Quantidade X Dia');

        $.ajax({
            async: false,
            data: [],
            dataType: "json",
            type: "POST",
            url: "<?php echo $this->Html->url(['controller' => 'stocks', 'action' => 'drawLineChartGlobalInventory'])?>",
            error: function (data, textStatus, errorThrown) {
                alert('Erro: ' + errorThrown);
            },
            success: function (json, textStatus) {

                if (json.success) {

                    $.each(json.arrComuns, function(index, value) {
                        data.addColumn('number', value);
                    });

                    $.each(json.arrData, function( index, value ) {
                        for (i = 0; i < $(value).length; i++) {

                            if (value[i].search('/') > 0) {
                                // nop (it is a date, the first column!)
                            } else {
                                value[i] = parseFloat(value[i]);
                            }
                        }
                    });
                    data.addRows(json.arrData);
                }
            }
        });
        var options = {
            chart: {
                title: 'Posição Semanal do Almoxarifado (Estoque Físico)',
//                subtitle: ''
            },
//            width: 900,
            height: 400,
            axes: {
                x: {
                    0: {side: 'bottom'}
                }
            },
            hAxis: {format:'none'},
            vAxis: {format:'none'},
            explorer: { actions: ['dragToZoom', 'rightClickToReset'] }
        };
                var formatter1 = new google.visualization.NumberFormat({pattern:'###,###'});
//                formatter1.format(data, 8);
//                formatter1.format(data, 7);
//                formatter1.format(data, 6);
//                formatter1.format(data, 5);
//                formatter1.format(data, 4);
//                formatter1.format(data, 3);
//                formatter1.format(data, 2);
//                formatter1.format(data, 1);
        var chart = new google.charts.Line(document.getElementById('line_top_x'));
        chart.draw(data, options);
    }
</script>