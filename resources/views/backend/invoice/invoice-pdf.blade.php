<html>

<head>
    <title>Invoice</title>
    <style>
        .underline {
            border-bottom: 1px dotted rgb(0, 0, 0);
            width: 100%;
            display: block;
            margin-top: 5px;
        }

        .title {
            width: 15%;
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
                <img src="{{ asset('assets/images/logo-bg.png') }}" alt="" style="width: 3in; height: 1in;">
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
    <div class="title"> INVOICE </div>
    <div style="width: 100%; text-align: right; margin-top: 10px; margin-bottom: 10px;">
        Date: _____________________
    </div>
    <div class="underline">
        <b>Invoice No. :</b>
    </div>
    <div class="underline">
        <b>Mr/Mrs/M/s :</b>
    </div>
    <div class="underline">
        <b>Address :</b>
    </div>
    <div class="underline">
        <b>Phone :</b>
    </div>
    <table class="m_table" style="margin-top: 50px; width:100%; border-collapse: collapse;">
        <tr>
            <th style="width: 80%; text-align:center;">Description</th>
            <th style="width: 20%; text-align:center;">Unit</th>
        </tr>
        <tr>
            <td style="height: 5in; vertical-align: top;">Des</td>
            <td style="text-align: right;" style="vertical-align: top;">12</td>
        </tr>
        <tr>
            <td style="text-align: center;">Total</td>
            <td>100</td>
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