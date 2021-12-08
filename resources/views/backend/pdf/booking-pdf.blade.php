<html>

<head>
    <title>Booking</title>
    <style>
        .underline {
            border-bottom: 1px dotted rgb(0, 0, 0);
            width: 100%;
            display: block;
            margin-top: 5px;
        }

        .title {
            width: 20%;
            padding: 8px;
            margin: 0 auto;
            background: #343434;
            color: white;
            font-size: 16px;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
        }

        .m_table td,
        th {
            border: 1px solid black;
        }

        .m_table {
            border-collapse: collapse;
            width: 100%;
        }

        .m_table th {
            height: 30px;
            background: rgb(209, 205, 205);
        }
    </style>
</head>

<body>
    <table style="width: 100%">
        <tr>
            <td style="width: 50%">
                <img src="{{ asset('assets/images/logo-bg.png') }}" alt="" style="width: 2in; height: 1.5in;">
            </td>
            <td style="width: 50%; text-align: right;">
                Bashundhara Extension Road <br>
                (Saudi Mosque Road), Ka-30/2/1 <br>
                Jagannathpur, Nadda, Dhaka <br> <br>

                Tel: 01784397842 <br>
                Email: motorcorporation@gmail.com
            </td>
        </tr>
    </table>
    <div class="title"> BOOKING </div>
    <div style="width: 100%; text-align: right; margin-top: 10px; margin-bottom: 10px;">
        Date: {{ $invoice->created_at->format('d M Y') }}
    </div>
    <div class="underline">
        <b>Booking No. : {{ $invoice->id }}</b>
    </div>
    <div class="underline">
        <b>Mr/Mrs/M/s : {{ $invoice->customer->name ?? '#' }}</b>
    </div>
    <div class="underline">
        <b>Address : {{ $invoice->customer->address ?? '#' }}</b>
    </div>
    <div class="underline">
        <b>Phone : {{ $invoice->customer->phone ?? '#' }}</b>
    </div>
    <table class="m_table" style="margin-top: 50px; width:100%; border-collapse: collapse;">
        <tr>
            <th style="width: 75%; text-align:center;">Description</th>
            <th style="width: 25%; text-align:center;">Unit</th>
        </tr>
        <tr>
            <td style="height: 5in; vertical-align: top;">
                <br>
                <b>Category:</b> {{ $invoice->car->category->name }} <br>
                <b>Name:</b> {{ $invoice->car->name }} <br>
                <b>Brand:</b> {{ $invoice->car->brand }} <br>
                <b>Model:</b> {{ $invoice->car->model }} <br>
                <b>Registration:</b> {{ $invoice->car->registration }} <br>
                <b>Mileages:</b> {{ $invoice->car->mileages }} <br>
                
            </td>
            <td style="text-align: right; vertical-align: top;">
                <br>
                <b>Price: </b> {{ $invoice->price }} BDT <br>
                <b>VAT: &nbsp;</b> {{ $invoice->vat_percentage }} % <br>
                <b>Discount:</b> {{ $invoice->discount_percentage }} % <br> <br> <br>
                <b>PAID:</b> {{ $invoice->payments->sum('amount') }} BDT<br>
                <b>DUE:</b> {{  round($invoice->price + (($invoice->price / 100) * $invoice->vat_percentage) - (($invoice->price / 100) * $invoice->discount_percentage)  - $invoice->payments->sum('amount'), 2) }} BDT
            </td>
        </tr>
        <tr>
            <td style="text-align: center;"> <b>Total</b> </td>
            <td style="text-align: right;"> <b>{{ round($invoice->price + (($invoice->price / 100) * $invoice->vat_percentage) - (($invoice->price / 100) * $invoice->discount_percentage), 2) }} BDT</b> </td>
        </tr>
    </table>
    <table style="margin-top: 100px; width:100%;">
        <tr>
            <td style="width: 50%;">
                __________________________ <br>
                    <b>Client's Signature</b>
            </td>
            <td style="width: 50%; text-align: right;">
                __________________________ <br>
                    <b>Authorised Signature</b>
            </td>
        </tr>
    </table>
</body>

</html>