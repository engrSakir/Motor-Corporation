<html>

<head>
    <title>Car Spacification</title>
    <style>
        @page {
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
    <div class="title" style="margin-top: 50px;">Car Details </div>
    <div style="width: 100%; text-align: right; margin-top: 10px; margin-bottom: 10px;">
        Date: {{ date('d M Y') }}
    </div>
    <article class="tm-section-1-r tm-bg-color-8 image_spacification">
        <h2 class="tm-mb-2 tm-title-color">
            <tr>
                <td><strong>Car Name: </strong> </td>
                <td>{{ $car->name ?? 'Not Found'}}</td>
            </tr>
        </h2>
        <p>
            <tr>
                <td><strong>Car Brand: </strong> </td>
                <td>{{ $car->brand ?? 'Not Found'}}</td>
            </tr>
        </p>
        <p>
            <tr>
                <td><strong>Car Cateogry: </strong></td>
                <td>{{ $car->category->name ?? 'Not Found'}}</td>
            </tr>
        </p>
        <p>
            <tr>
                <td><strong>Car Papers Up-to-Date: </strong></td>
                <td>{{ $car->papers_up_to_date ? 'Yes' : 'No'}}</td>
            </tr>
        </p>
        <p>
            <tr>
                <td><strong>Car Name Transfer Documents: </strong></td>
                <td>{{ $car->name_transfer_documents ? 'yes' : 'No'}}</td>
            </tr>
        </p>
        <p>
            <tr>
                <td><strong>Car Registration: </strong></td>
                <td>{{ $car->registration ?? 'Not Found'}}</td>
            </tr>
        </p>
        <p>
            <tr>
                <td><strong>Car Mileages: </strong></td>
                <td>{{ $car->mileages ?? 'Not Found'}}</td>
            </tr>
        </p>
        <p>
            <tr>
                <td><strong>Car Chassis Number: </strong></td>
                <td>{{ $car->chassis_number ?? 'Not Found'}}</td>
            </tr>
        </p>
        <p>
            <tr>
                <td><strong>Car Number: </strong></td>
                <td>{{ $car->car_number ?? 'Not Found'}} </td>
            </tr>
        </p>
        <p>
            <tr>
                <td><strong>Status: </strong></td>
                <td>{{ $car->placement ?? 'Not Found'}}</td>
            </tr>
        </p>
    </article>
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