<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PO</title>
    <link rel="stylesheet" href="{{ asset('assets/pdf-inv/style.css') }}" media="all" />
</head>

<body>
    <header class="clearfix">
        <div style="width: 100%;">
            <div id="logo" style="width: 50%;">
                <img width="150" src="{{ asset('assets/pdf-inv/company-logo.jpg') }}">
            </div>
            <div id="company" style="width: 50%;">
                <h2 class="name"><b>Motor Corporation</b></h2>
                <div>Bashundhara extension road, Ka - 30, 2/1 Kuwaiti Mosque Rd, Dhaka-1212</div>
                <div>8801762522594</div>
                <div><a href="mailto:motorcorporation.bd@gmail.com">motorcorporation.bd@gmail.com</a></div>
            </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div style="width: 100%;">
                <div id="client" style="width: 50%; ">
                    <div class="to">PO TO:</div>
                    <h2 class="name">{{ $purchaseOrder->vendor_name }}</h2>

                </div>
                <div id="invoice" style="width: 45%;">
                    <h1>PO #{{ $purchaseOrder->id }}</h1>
                    <div class="date">Date of PO: {{ $purchaseOrder->created_at->format('d/m/Y') }}</div>
                    <div class="date">Job Finish Date: {{ $purchaseOrder->job_finish_date }}</div>
                </div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="desc">DESCRIPTION</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="desc">
                            <pre>{!! $purchaseOrder->work_description !!}</pre>
                        </td>
                    </tr>
            </tbody>
            <tfoot>
                <tr>
                    {{-- <td colspan="1">AMOUNT</td> --}}
                    <td>AMOUNT: {{ $purchaseOrder->amount }}</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Thank you!</div>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
