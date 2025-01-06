@extends('layouts.app')

@section('content')
<div class="container">
    <h1>KPIs de Productos</h1>

    <h2>Productos en SQL Server</h2>
    <canvas id="sqlsrv-products-chart" style="background-color: white;"></canvas>

    <h2>Productos en Oracle</h2>
    <canvas id="oracle-products-chart" style="background-color: white;"></canvas>

    <h2>Productos en PostgreSQL</h2>
    <canvas id="pgsql-products-chart" style="background-color: white;"></canvas>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function fetchKpiData() {
        $.ajax({
            url: "{{ route('kpi') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                updateChart(sqlsrvChart, data.sqlsrvProducts);
                updateChart(oracleChart, data.oracleProducts);
                updateChart(pgsqlChart, data.pgsqlProducts);
            }
        });
    }

    function updateChart(chart, data) {
        const labels = data.map(item => item.nombre);
        const values = data.map(item => item.total);

        chart.data.labels = labels;
        chart.data.datasets[0].data = values;
        chart.update();
    }

    const ctxSqlsrv = document.getElementById('sqlsrv-products-chart').getContext('2d');
    const sqlsrvChart = new Chart(ctxSqlsrv, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Total',
                data: [],
                backgroundColor: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxOracle = document.getElementById('oracle-products-chart').getContext('2d');
    const oracleChart = new Chart(ctxOracle, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Total',
                data: [],
                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxPgsql = document.getElementById('pgsql-products-chart').getContext('2d');
    const pgsqlChart = new Chart(ctxPgsql, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Total',
                data: [],
                backgroundColor: 'rgba(153, 102, 255, 0.8)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Fetch KPI data every 5 seconds
    setInterval(fetchKpiData, 5000);
    // Fetch KPI data on page load
    fetchKpiData();
</script>
@endsection
