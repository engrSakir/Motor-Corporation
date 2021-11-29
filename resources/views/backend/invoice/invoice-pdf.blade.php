<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
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
                    <div class="to">INVOICE TO:</div>
                    <h2 class="name">{{ $invoice->client_name }}</h2>
                    <div class="address">{{ $invoice->client_phone }}</div>
                    <div class="email"><a href="mailto:{{ $invoice->client_email }}">{{ $invoice->client_email }}</a></div>
                </div>
                <div id="invoice" style="width: 45%;">
                    <h1>INVOICE #{{ $invoice->id }}</h1>
                    <div class="date">Date of Invoice: {{ $invoice->created_at->format('d/m/Y') }}</div>
                    {{-- <div class="date">Due Date: 30/06/2014</div> --}}
                </div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">DESCRIPTION</th>
                    <th class="unit">UNIT PRICE</th>
                    <th class="qty">QUANTITY</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->items as $item)
                <tr>
                    <td class="no">{{ $loop->iteration }}</td>
                    <td class="desc">
                        <h3> {{ $item->car->name ?? 'No Name' }} </h3> Model: {{ $item->car->model ?? '#' }} <br> Brand: {{ $item->car->brand ?? '#' }} <br> VAT ({{ $item->car->vat_percentage }}%): {{ $item->vat }}
                    </td>
                    <td class="unit">{{ $item->price }}</td>
                    <td class="qty">{{ $item->quantity }}</td>
                    <td class="total">{{ $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>{{ $invoice->price() }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">VAT</td>
                    <td>{{ $invoice->vat() }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>{{ $invoice->priceIncludeVat() }}</td>
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
    <pagebreak> 
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
                    <div class="to">DELIVERY CHALLAN TO:</div>
                    <h2 class="name">{{ $invoice->client_name }}</h2>
                    <div class="address">{{ $invoice->client_phone }}</div>
                    <div class="email"><a href="mailto:{{ $invoice->client_email }}">{{ $invoice->client_email }}</a></div>
                </div>
                <div id="invoice" style="width: 45%;">
                    <h1>DELIVERY CHALLAN #{{ $invoice->id }}</h1>
                    <div class="date">Date of Invoice: {{ $invoice->created_at->format('d/m/Y') }}</div>
                    {{-- <div class="date">Due Date: 30/06/2014</div> --}}
                </div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">DESCRIPTION</th>
                    <th class="unit">UNIT PRICE</th>
                    <th class="qty">QUANTITY</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->items as $item)
                <tr>
                    <td class="no">{{ $loop->iteration }}</td>
                    <td class="desc">
                        <h3> {{ $item->car->name ?? 'No Name' }} </h3> Model: {{ $item->car->model ?? '#' }} <br> Brand: {{ $item->car->brand ?? '#' }} <br> VAT ({{ $item->car->vat_percentage }}%): {{ $item->vat }}
                    </td>
                    <td class="unit">{{ $item->price }}</td>
                    <td class="qty">{{ $item->quantity }}</td>
                    <td class="total">{{ $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>{{ $invoice->price() }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">VAT</td>
                    <td>{{ $invoice->vat() }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>{{ $invoice->priceIncludeVat() }}</td>
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
        Delivery chalan was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
