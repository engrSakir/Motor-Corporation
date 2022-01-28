<html>

<head>
    <title>Delivery Chalan</title>
    <style>
        @page{
            margin-top: 1cm;
            margin-bottom: 1cm;
        }
        .underline {
            border-bottom: 1px solid rgb(0, 0, 0);
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
    <div class="title" style="margin-top: 50px;"> Delivery Challan </div>
    <div style="width: 100%; text-align: right; margin-top: 10px; margin-bottom: 10px;">
        Date: {{ date("d-m-Y", strtotime($chalan['date'])) }}
    </div>
    <div class="underline">
        <b>Invoice No. : {{ $chalan['no'] }}</b>
    </div>
    <div class="underline">
        <b>Mr/Mrs/M/s : {{ $chalan['customer_name'] ?? '#' }}</b>
    </div>
    <div class="underline">
        <b>Address : {{ $chalan['address'] ?? '#' }}</b>
    </div>
    <div class="underline">
        <b>Phone : {{ $chalan['phone'] ?? '#' }}</b>
    </div>
    <table class="m_table" style="margin-top: 50px; width:100%; border-collapse: collapse;">
        <tr>
            <th style="width: 75%; text-align:center;">Description</th>
            <th style="width: 25%; text-align:center;">Unit</th>
        </tr>
        <tr>
            <td style="height: 4.5in; vertical-align: top;">
                <br>
                <b>Category:</b> {{ $chalan['category'] }} <br>
                <b>Name:</b> {{ $chalan['car_name'] }} <br>
                <b>Brand:</b> {{ $chalan['brand'] }} <br>
                <b>Model:</b> {{ $chalan['model'] }} <br>
                <b>Registration:</b> {{ $chalan['registration'] }} <br>
                <b>Mileages:</b> {{ $chalan['mileages'] }} <br>
                <b>Chassis number:</b> {{ $chalan['chassis_number'] }} <br>

            </td>
            <td style="text-align: center;">
                {{ $chalan['unit'] }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;"> <b>Total</b> </td>
            <td style="text-align: center;"> <b>{{ $chalan['unit'] }}</b> </td>
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
