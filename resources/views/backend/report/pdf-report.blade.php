<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        div {
            margin-bottom: 15px;
            padding: 4px 12px;
        }

        .danger {
            background-color: #ffdddd;
            border-left: 6px solid #f44336;
        }

        .success {
            background-color: #ddffdd;
            border-left: 6px solid #04AA6D;
        }

        .info {
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
        }


        .warning {
            background-color: #ffffcc;
            border-left: 6px solid #ffeb3b;
        }

        #center-section {
            width: 100%;
            display: flex;
            justify-content: space-around;
        }
        .primary-bordered-table{
            width: 100%;
        }
        .first{
            border:1px solid #2196F3;

        }
        .first th{
            background-color:#E7F3FE;
            color:#000000;
            font-weight:bold;
        }
        .first td{
            border:1px solid #E7F3FE;
        }
        .second{
            border:1px solid #04AA6D;
        }
        .second th{
            background-color:#DDFFDD;
            color:#000000;
            font-weight:bold;
        }
        .second td{
            border:1px solid #DDFFDD;
        }

    </style>
</head>

<body>
    <div  style="width: 100%; text-align: center; " >
            <h2>Report <br> {{ config('app.name') }}</h2>
            <h3>Date: {{ $starting_date->format('d-m-Y') }} to {{ $ending_date->format('d-m-Y') }}</h3>
    </div>
    <hr>
    <h2 style="width: 100%; text-align:center;">Invoice</h2>
    <div class="info"><p>Price: &nbsp; <strong>{{  $report_data_set['invoice']['price'] }} BDT</strong></p></div>
    <div class="success"><p>Paid: &nbsp; <strong>{{  $report_data_set['invoice']['paid'] }} BDT</strong></p></div>
    <div class="danger"><p>Due: &nbsp; <strong>{{  $report_data_set['invoice']['due'] }} BDT</strong></p></div>
    <table class="table color-bordered-table primary-bordered-table first">
        <thead>
            <tr>
                <th style="text-align: right;">#</th>
                <th style="text-align: right;">ID</th>
                <th style="text-align: right;">Price</th>
                <th style="text-align: right;">Paid</th>
                <th style="text-align: right;">Due</th>
                <th style="text-align: right;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report_data_set['invoice']['list'] as $invoice)
                <tr>
                    <td scope="row"  style="text-align: right;">{{ $loop->iteration }}</td>
                    <td style="text-align: right;">{{ $invoice->id }}</td>
                    <td style="text-align: right;">{{ $invoice->totalPrice() }}</td>
                    <td style="text-align: right;">{{ $invoice->payments->sum('amount', 2) }}</td>
                    <td style="text-align: right;">{{ $invoice->due() }}</td>
                    <td style="text-align: right;">{{ $invoice->created_at->format('d/m/Y h:i A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <pagebreak>
    <h2 style="width: 100%; text-align:center;">Expense</h2>
    <div class="info"><p>Total: &nbsp; <strong>{{  $report_data_set['expense']['total'] }} BDT</strong></p></div>
    <table class="table color-bordered-table primary-bordered-table first">
        <thead>
            <tr>
                <th style="text-align: right;">#</th>
                <th style="text-align: right;">ID</th>
                <th style="text-align: right;">Note</th>
                <th style="text-align: right;">Amount</th>
                <th style="text-align: right;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report_data_set['expense']['list'] as $expense)
                <tr>
                    <td scope="row"  style="text-align: right;">{{ $loop->iteration }}</td>
                    <td style="text-align: right;">{{ $expense->id }}</td>
                    <td style="text-align: right;">{{ $expense->description }}</td>
                    <td style="text-align: right;">{{ $expense->amount }}</td>
                    <td style="text-align: right;">{{ $expense->created_at->format('d/m/Y h:i A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <pagebreak>
    <h2 style="width: 100%; text-align:center;">Car Expense</h2>
    <div class="info"><p>Total: &nbsp; <strong>{{  $report_data_set['car_expense']['total'] }} BDT</strong></p></div>
    <table class="table color-bordered-table primary-bordered-table first">
        <thead>
            <tr>
                <th style="text-align: right;">#</th>
                <th style="text-align: right;">ID</th>
                <th style="text-align: right;">Name</th>
                <th style="text-align: right;">Amount</th>
                <th style="text-align: right;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report_data_set['car_expense']['list'] as $car_expense)
                <tr>
                    <td scope="row"  style="text-align: right;">{{ $loop->iteration }}</td>
                    <td style="text-align: right;">{{ $car_expense->id }}</td>
                    <td style="text-align: right;">{{ $car_expense->name }}</td>
                    <td style="text-align: right;">{{ $car_expense->amount }}</td>
                    <td style="text-align: right;">{{ $car_expense->created_at->format('d/m/Y h:i A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
