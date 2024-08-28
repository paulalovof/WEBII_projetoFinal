<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="{{ asset('js/google-chart-loader.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Gráfico Eixo</title>
</head>
<body>
    <header>Gráfico Eixo</header>
    <div class="row">
        <div class="col text-center" id="barra" style="width: 420px; height: 280px;"></div>
        <div class="col text-center" id="pizza" style="width: 420px; height: 280px;"></div>
    </div>

    <div class="row mt-2">
        <div class="col text-center" id="coluna" style="width: 420px; height: 280px;"></div>
        <div class="col text-center" id="linha" style="width: 420px; height: 280px;"></div>
    </div>

    <script type="text/javascript">
        // Converte o array PHP para JSON para uso no JavaScript
        var data_graph = {!! $data !!};

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            data_graph.unshift(['Eixo', 'Inscrições']);
            let data = google.visualization.arrayToDataTable(data_graph);

            // GRÁFICO DE BARRAS
            let optionsBar = {
                title: 'Inscrições por Eixo',
                colors: ['#198754'],
                legend: 'none',
                hAxis: {
                    title: 'Eixos',
                    titleTextStyle: {
                        fontSize: 12,
                        bold: true,
                    }
                },
                vAxis: {
                    title: 'Número de Inscrições',
                    titleTextStyle: {
                        fontSize: 12,
                        bold: true,
                    }
                }
            };
            let barChart = new google.visualization.BarChart(document.getElementById('barra'));
            barChart.draw(data, optionsBar);

            // GRÁFICO DE PIZZA
            let optionsPie = {
                title: 'Distribuição de Inscrições por Eixo',
                is3D: true
            };
            let pieChart = new google.visualization.PieChart(document.getElementById('pizza'));
            pieChart.draw(data, optionsPie);

            // GRÁFICO DE COLUNA
            let optionsColumn = {
                title: 'Inscrições por Eixo',
                colors: ['#198754'],
                legend: 'none',
                hAxis: {
                    title: 'Eixos',
                    titleTextStyle: {
                        fontSize: 12,
                        bold: true,
                    }
                },
                vAxis: {
                    title: 'Número de Inscrições',
                    titleTextStyle: {
                        fontSize: 12,
                        bold: true,
                    }
                }
            };
            let columnChart = new google.visualization.ColumnChart(document.getElementById('coluna'));
            columnChart.draw(data, optionsColumn);

        }
    </script>
</body>
</html>