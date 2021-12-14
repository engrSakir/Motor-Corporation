<div>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <a href="{{ url('/') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Website </a>
        </div>
    </div>
</div>
<div class="row">
    <!-- Column -->
    @foreach ($investors as $investor)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3>{{ $investor->investmentPercentage() }}%</h3>
                        <h6 class="card-subtitle">{{ $investor->name }}</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $investor->investmentPercentage() }}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-md-6 col-lg-3 col-xlg-2">
        <div class="card">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ monthly_income() }}</h1>
                <h6 class="text-white">Income of {{ date('F-Y') }}</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-2">
        <div class="card">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ monthly_expense() }}</h1>
                <h6 class="text-white">Expense of {{ date('F-Y') }}</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-2">
        <div class="card">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ monthly_expense_budget() }}</h1>
                <h6 class="text-white">Expense budget of {{ date('F-Y') }}</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xlg-2">
        <div class="card">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ amount_in_hand() }}</h1>
                <h6 class="text-white">In hand of {{ date('F-Y') }}</h6>
            </div>
        </div>
    </div>
    {{-- Income expense chart --}}
    <div class="col-md-12">
        <div class="card">
            <div class="box bg-secondary text-center">
                <style>
                    .highcharts-figure,
                    .highcharts-data-table table {
                    min-width: 310px;
                    max-width: 800px;
                    margin: 1em auto;
                    }

                    #yearly_income_expense_chart {
                    height: 400px;
                    }

                    .highcharts-data-table table {
                    font-family: Verdana, sans-serif;
                    border-collapse: collapse;
                    border: 1px solid #ebebeb;
                    margin: 10px auto;
                    text-align: center;
                    width: 100%;
                    max-width: 500px;
                    }

                    .highcharts-data-table caption {
                    padding: 1em 0;
                    font-size: 1.2em;
                    color: #555;
                    }

                    .highcharts-data-table th {
                    font-weight: 600;
                    padding: 0.5em;
                    }

                    .highcharts-data-table td,
                    .highcharts-data-table th,
                    .highcharts-data-table caption {
                    padding: 0.5em;
                    }

                    .highcharts-data-table thead tr,
                    .highcharts-data-table tr:nth-child(even) {
                    background: #f8f8f8;
                    }

                    .highcharts-data-table tr:hover {
                    background: #f1f7ff;
                    }
                </style>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                <div id="yearly_income_expense_chart"></div>
                </figure>
                <script>
                    Highcharts.chart('yearly_income_expense_chart', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Monthly Income Review of {{ date('Y') }}'
                    },
                    subtitle: {
                        text: 'Developed by iciclecorporation.com'
                    },
                    xAxis: {
                        categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                        text: 'Amount in BDT'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} BDT</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'Sale',
                        data: {{ collect($sale_data_of_this_year) }}

                    }, {
                        name: 'Paid',
                        data: {{ collect($paid_data_of_this_year) }}

                    }, {
                        name: 'Due',
                        data: {{ collect($due_data_of_this_year) }}

                    },{
                        name: 'Expense budget',
                        data: {{ collect($expense_budget_data_of_this_year) }}

                    },{
                        name: 'Expense',
                        data: {{ collect($expense_data_of_this_year) }}

                    },{
                        name: 'Profit',
                        data: {{ collect($profit_data_of_this_year) }}

                    }, {
                        name: 'In hand',
                        data: {{ collect($in_hand_data_of_this_year) }}

                    }]
                    });
                </script>
            </div>
        </div>
    </div>
    {{-- Investment chart --}}
    <div class="col-md-12">
        <div class="card">
            <div class="box bg-secondary text-center">
                <style>
                    .highcharts-figure,
                    .highcharts-data-table table {
                    min-width: 310px;
                    max-width: 800px;
                    margin: 1em auto;
                    }

                    #investment_chart {
                    height: 400px;
                    }

                    .highcharts-data-table table {
                    font-family: Verdana, sans-serif;
                    border-collapse: collapse;
                    border: 1px solid #ebebeb;
                    margin: 10px auto;
                    text-align: center;
                    width: 100%;
                    max-width: 500px;
                    }

                    .highcharts-data-table caption {
                    padding: 1em 0;
                    font-size: 1.2em;
                    color: #555;
                    }

                    .highcharts-data-table th {
                    font-weight: 600;
                    padding: 0.5em;
                    }

                    .highcharts-data-table td,
                    .highcharts-data-table th,
                    .highcharts-data-table caption {
                    padding: 0.5em;
                    }

                    .highcharts-data-table thead tr,
                    .highcharts-data-table tr:nth-child(even) {
                    background: #f8f8f8;
                    }

                    .highcharts-data-table tr:hover {
                    background: #f1f7ff;
                    }
                </style>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/series-label.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                
                <figure class="highcharts-figure">
                  <div id="investment_chart"></div>
                  <p class="highcharts-description">
                </figure>
                <script>
                    Highcharts.chart('investment_chart', {
                    title: {
                        text: 'Combination chart'
                    },
                    xAxis: {
                        categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
                    },
                    labels: {
                        items: [{
                        html: 'Total fruit consumption',
                        style: {
                            left: '50px',
                            top: '18px',
                            color: ( // theme
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                            ) || 'black'
                        }
                        }]
                    },
                    series: [{
                        type: 'column',
                        name: 'Jane',
                        data: [3, 2, 1, 3, 4]
                    }, {
                        type: 'column',
                        name: 'John',
                        data: [2, 3, 5, 7, 6]
                    }, {
                        type: 'column',
                        name: 'Joe',
                        data: [4, 3, 3, 9, 0]
                    }, {
                        type: 'spline',
                        name: 'Average',
                        data: [3, 2.67, 3, 6.33, 3.33],
                        marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                        }
                    }, {
                        type: 'pie',
                        name: 'Total consumption',
                        data: [{
                        name: 'Jane',
                        y: 13,
                        color: Highcharts.getOptions().colors[0] // Jane's color
                        }, {
                        name: 'John',
                        y: 23,
                        color: Highcharts.getOptions().colors[1] // John's color
                        }, {
                        name: 'Joe',
                        y: 19,
                        color: Highcharts.getOptions().colors[2] // Joe's color
                        }],
                        center: [100, 80],
                        size: 100,
                        showInLegend: false,
                        dataLabels: {
                        enabled: false
                        }
                    }]
                    });
                </script>
            </div>
        </div>
    </div>
</div>


</div>
