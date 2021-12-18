<html>

<head>
    <title>purchaseOrder</title>
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
    <div class="title"> PO </div>
    <div style="width: 100%; text-align: right; margin-top: 10px; margin-bottom: 10px;">
        Date: {{ $purchaseOrder->created_at->format('d M Y') }}
    </div>
    <div class="underline">
        <b>PO No. : {{ $purchaseOrder->id }}</b>
    </div>
    <div class="underline">
        <b>Vendor : {{ $purchaseOrder->vendor->name ?? '#' }}</b>
    </div>
    <div class="underline">
        <b>Address : {{ $purchaseOrder->vendor->address ?? '#' }}</b>
    </div>
    <div class="underline">
        <b>Phone : {{ $purchaseOrder->vendor->phone ?? '#' }}</b>
    </div>
    <table class="m_table" style="margin-top: 50px; width:100%; border-collapse: collapse; height: 4.5in;">
        <tr>
            <th style="width: 70%; text-align:center;">Description</th>
            <th style="width: 10%; text-align:center;">Unit</th>
            <th style="width: 20%; text-align:center;">Price</th>
        </tr>
        @foreach ($purchaseOrder->poItems as $item)
        <tr>
            <td>
                {{ $item->work_description }} &nbsp; Job finish date: {{ $item->job_finish_date }}
            </td>
            <td style="text-align: center;">
                   1
            </td>
            <td style="text-align: right;">
                   {{ $item->amount }} BDT
            </td>
        </tr>
        @endforeach
        <tr>
            <td style="text-align: center;"> <b>Total</b> </td>
            <td style="text-align: center;"> <b>{{ $purchaseOrder->poItems->count() }}</b> </td>
            <td style="text-align: right;"> <b>{{ round($purchaseOrder->poItems->sum('amount'), 2) }} BDT</b> </td>
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
