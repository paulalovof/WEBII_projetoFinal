<x-app-layout >
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Gráfico de Eixos
            </h1>
            
            <div class="max-w-8xl sm:px-6 lg:px-8">
                <a href="{{route('eixo.index')}}">
                    <x-secondary-button class="ms-3" >
                            Voltar
                    </x-secondary-button>
                </a>
            </div>

        </div>
        
    </x-slot>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="{{ asset('js/google-chart-loader.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <div class="flex justify-center p-5">

        <div class="col text-center" id="barra" style="width: 420px; height: 280px;"></div>
        <div class="col text-center" id="pizza" style="width: 420px; height: 280px;"></div>
        <div class="col text-center" id="coluna" style="width: 420px; height: 280px;"></div>
 
    
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
    </div>
    
</x-app-layout >