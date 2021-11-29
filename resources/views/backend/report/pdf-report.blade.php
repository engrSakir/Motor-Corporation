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
            <h3>Date: {{ $start->format('d-m-Y') }} to {{ $end->format('d-m-Y') }}</h3>
    </div>

    @foreach ($count_items as $count_item)
        <div class=" @if ($loop->odd) info @else success @endif">
            <p> {{ $count_item['title'] }}: &nbsp; <strong>{{ $count_item['count'] }}</strong></p>
        </div>
    @endforeach
    <hr>
    @php
        $total_investment = 0;
        $total_settlementt = 0;
        foreach($investors as $investor){
            $total_investment += $investor->totalInvestmentWithInterest();
            $total_settlementt += $investor->totalSettlement();
        }
    @endphp
    <div class="info">
        <p> Total Investment include interest: &nbsp; <strong>{{  $total_investment }} BDT</strong></p>
    </div>
    <div class=" success">
        <p> Total Settlement include interest: &nbsp; <strong>{{  $total_settlementt }} BDT</strong></p>
    </div>
    <hr>
    @foreach($investors as $investor)
    <div class=" @if ($loop->odd) info @else success @endif">
        <p> {{ $investor->name }}: &nbsp; <strong>{{  round($investor->investmentPercentage(), 2) }}%</strong></p>
    </div>
    @endforeach
    <hr>
    <h3>Invoice</h3>
    <table class="table color-bordered-table primary-bordered-table first">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Amount</th>
                                   
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $invoice->id }}</td>
                                        <td>
                                            {{ $invoice->price() }}
                                        </td>
                                        
                                        <td>{{ $invoice->created_at->format('d/m/Y h:i A') }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <hr>
                        <h3>Expense</h3>
                        <table class="table color-bordered-table primary-bordered-table second">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->category->name ?? '#' }}</td>
                                    <td>{{ $expense->created_at->format('d/m/Y') }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                

</body>

</html>
