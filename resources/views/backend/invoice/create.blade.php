<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="{{ url('/') }}">
    <meta charset="utf-8" />
    <title>POS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <!--begin::Fonts-->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> -->
    <!--end::Fonts-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="pos-assets/css/stylec619.css?v=1.0" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <link href="pos-assets/api/pace/pace-theme-flat-top.css" rel="stylesheet" type="text/css" />
    <link href="pos-assets/api/mcustomscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <style>
        .productCard {
            padding: 10px;
            margin: 2px;
            text-align: center;
            background: rgb(46, 46, 46);
            border-radius: 15px;
            cursor: pointer;
        }
        .productCard:hover {
            background: linear-gradient(to top, #cca356 0%, #ff99cc 100%);
        }
        .productContent a {
            color: white;
        }
        .select2 {
            background: linear-gradient(to top, #cca356 0%, #ff99cc 100%);
            margin: 5px;
            width: 90%;
            height: 40px;
            border: 5px solid #dee0dc;
            border-radius: 14px;
            font-size: 16px;
            overflow: hidden;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="tc_body" class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed">
    <!-- Paste this code after body tag -->
    {{-- <div class="se-pre-con">
        <div class="pre-loader">
            <img class="img-fluid" src="pos-assets/images/loadergif.gif" alt="loading">
        </div>
    </div> --}}
    <!-- pos header -->

    <header class="pos-header bg-white">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="greeting-text">
                        <h3 class="card-label mb-0 font-weight-bold text-primary">POS
                        </h3>
                        <a href="{{ route('dashboard') }}">
                            <h3 class="card-label mb-0 ">
                                {{ config('app.name') }}
                            </h3>
                        </a>
                    </div>

                </div>
                <div class="col-xl-4 col-lg-5 col-md-6  clock-main text-center">
                    <b> Developed by
                        <a href="https://www.iciclecorporation.com/" target="_blank"><b>Icicle Corporation</b></a></b>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-12 order-lg-last order-second">
                    <div class="topbar justify-content-end">
                        <div class="topbar-item folder-data">
                            <div class="btn btn-icon  w-auto h-auto btn-clean d-flex align-items-center py-0 mr-3"
                                data-toggle="modal" data-target="#folderpop">
                                {{-- <span class="badge badge-pill badge-primary">5</span> --}}
                                <span class="symbol symbol-35  symbol-light-success">
                                    <span class="symbol-label bg-warning font-size-h5 ">
                                        <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" fill="blackf"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z">
                                            </path>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="dropdown">
                            <div class="topbar-item" data-toggle="dropdown" data-display="static">
                                <div class="btn btn-icon w-auto h-auto btn-clean d-flex align-items-center py-0">

                                    <span class="symbol symbol-35 symbol-light-success">
                                        <span class="symbol-label font-size-h5 ">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16"
                                                class="bi bi-person-fill" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                                </path>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="dropdown-menu dropdown-menu-right" style="min-width: 150px;">


                                <a href="javascript:void(0)" class="dropdown-item logout-btn">
                                    <span class="svg-icon svg-icon-xl svg-icon-primary mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-power">
                                            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                            <line x1="12" y1="2" x2="12" y2="12"></line>
                                        </svg>
                                    </span>
                                    Logout
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="contentPOS">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 order-xl-first order-last">
                    <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between colorfull-select">
                                <div class="selectmain col-12">
                                    <select class="style-select select2" id="item_category">
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="All">All Category</option>
                                        @foreach ($itemCategories as $itemCategory)
                                            <option value="{{ $itemCategory->id }}">{{ $itemCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="product-items">
                            <div class="row" id="item_area">
                                @foreach ($items as $item)
                                    <div class="col-6 item_card" id="item_id_{{ $item->id }}">
                                        <input type="hidden" class="item_id" value="{{ $item->id }}">
                                        <input type="hidden" class="item_name" value="{{ $item->name }}">
                                        <input type="hidden" class="item_price"
                                            value="{{ $item->selling_price }}">
                                        <input type="hidden" class="item_vat_percentage"
                                            value="{{ $item->vat_percentage }}">
                                        <div class="productCard">
                                            <div class="">
                                                <img style="" class="img-fluid product_card_image"
                                                    src="{{ asset($item->image ?? 'assets/images/no_car.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="productContent">
                                                <a href="javascript:void(0)">
                                                    {{ $item->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-8">

                    <div class="card card-custom gutter-b bg-white border-0 table-contentpos">
                        <div class="card-body">
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    {{-- <fieldset class="form-group mb-0 d-flex barcodeselection"> --}}
                                        {{-- <h3 class="text-danger">Client Information</h3><br> --}}
                                        <input type="text" placeholder="Client Name" name="client_name" id="client_name" style="width: 100%;"><br>
                                        <input type="text" placeholder="Client Phone" name="client_phone" id="client_phone" style="width: 100%;"><br>
                                        <input type="text" placeholder="Client Email" name="client_email" id="client_email" style="width: 100%;">
                                    {{-- </fieldset> --}}
                                </div>
                            </div>
                        </div>
                        <div class="table-datapos">
                            <div class="table-responsive" id="printableTable">
                                <table id="orderTable" class="display" style="width:100%" >
                                    <thead style="color: white;">
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Vat/1</th>
                                            <th>Price/1</th>
                                            <th>Subtotal</th>
                                            <th class=" text-right no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: white;">
                                    {{-- Assign by ajax --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 btn-submit d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger mr-2 confirm-delete"
                                        onClick="window.location.reload();">
                                        <i class="fas fa-trash-alt mr-2"></i>
                                        Refresh Everything
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-body">
                            <div class="resulttable-pos">
                                <table class="table right-table" id="counter_table">
                                    <tbody>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-light">
                                                Total Price
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-light font-size-base"
                                                id="total_price">00</td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 ">
                                                <div
                                                    class="d-flex align-items-center font-size-h5 mb-0 font-size-bold text-light">
                                                    Dis. % &nbsp;
                                                </div>
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-light font-size-base"
                                                id="">
                                                <input type="number" value="0"
                                                    class="form-control border-dark w-100px discount discount_percentage"
                                                    id="discount_percentage" title="Discount percentage" placeholder="">

                                            </td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 ">
                                                <div
                                                    class="d-flex align-items-center font-size-h5 mb-0 font-size-bold text-light">
                                                    Dis. fixed &nbsp;
                                                </div>
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-light font-size-base"
                                                id="">
                                                <input type="number" value="0"
                                                    class="form-control border-dark w-100px discount discount_fixed_amount"
                                                    id="discount_fixed_amount" title="Discount fixed amount"
                                                    placeholder="">
                                            </td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-light">
                                                Price after discount
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-light font-size-base"
                                                id="price_after_discount">00
                                            </td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-light">
                                                Total Vat
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-light font-size-base"
                                                id="total_vat">00</td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-light">
                                                Paid Amount
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-light font-size-base"
                                                id="payment_amount">00</td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between item-price">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-danger">
                                                DUE AMOUNT
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-primary font-size-base"
                                                id="due_amount">00</td>
                                        </tr>
                                        <tr class="d-flex align-items-center justify-content-between item-price">
                                            <th class="border-0 font-size-h5 mb-0 font-size-bold text-primary">
                                                TOTAL INCLUDE VAT
                                            </th>
                                            <td class="border-0 justify-content-end d-flex text-primary font-size-base"
                                                id="total_price_include_vat">00</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end align-items-center flex-column buttons-cash">
                                <div>
                                    <select name="payment_method" id="payment_method" class="form-control select2"
                                        required="">
                                        <option value="" selected disabled>Please choose a Payment Method</option>
                                        @foreach ($paymentmethods as $paymentMethod)
                                            <option value="{{ $paymentMethod->id }}">
                                                {{ $paymentMethod->name ?? '#' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" class="btn btn-primary white mb-2 mt-2"
                                        id="save_invoice">
                                        <i class="fas fa-money-bill-wave mr-2"></i>
                                        SAVE INVOICE
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inv show Modal -->
    <div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Invoice</h5>
                </div>
                <div class="modal-body" id="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" class="btn btn-primary mdal_close_a" id="modal_close_btn">Close</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('pos-assets/js/bootstrap.bundle.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Custom JavaScript helper -->
    <script src="{{ asset('assets/helper/helper.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        $("#item_category").change(function() {
            var category = this.value;
            // alert(category);
            $('#item_area').html('');
            var new_html = '';
            $.ajax({
                method: "get",
                url: "/backend/ajax/get-items-by-category/" + category,
                success: function(data) {
                    // console.log(data);
                    $.each(data, function(key, value) {
                        console.log(value)
                        item_image = value.image;
                        if (item_image == null) {
                            item_image = 'assets/images/no_car.png';
                        }
                        new_html +=
                            `<div class="col-6 item_card" id="item_id_` +
                            value.id + `">
                        <input type="hidden" class="item_id" value="` + value.id +
                            `"><input type="hidden" class="item_name" value="` + value.name +
                            `"><input type="hidden" class="item_price" value="` + value
                            .selling_price + `">
                            <input type="hidden" class="item_vat_percentage" value="` + value.vat_percentage + `">
                        <div class="productCard">
                        <div class="">
                        <img style="" class="img-fluid product_card_image" src="` + item_image + `" alt="">
                        </div>
                        <div class="productContent">
                        <a href="javascript:void(0)">` + value.name + `</a></div></div></div>`;
                    });
                    $('#item_area').html(new_html);
                }
            });
        });
        $('#item_area').on('click', '.item_card', function() {
            var item_id = $(this).find('.item_id').val();
            var item_name = $(this).find('.item_name').val();
            var item_price = $(this).find('.item_price').val();
            var item_vat_percentage = $(this).find('.item_vat_percentage').val();
            // alert(item_name);
            if ($("#selected_item_for_" + item_id).length > 0) {
                // update price with incease quantity
                Swal.fire({
                    position: 'top-end',
                    icon: 'info',
                    title: 'Already add',
                    showConfirmButton: false,
                    timer: 1500
                })
                // $("#selected_item_qty_for_" + item_id).val(parseInt($("#selected_item_qty_for_" + item_id).val()) +
                //     1);
                // inner_calculation();
            } else {
                //jQuery append row in table
                table_tr = `<tr id="selected_item_for_` + item_id + `">
                            <input type="hidden" readonly class="selected_item" name="selected_items[]" value="` + item_id + `">
                            <td id="selected_item_name_for_` + item_id + `">` + item_name +
                    `</td>
                            <td> <input type="number" readonly value="1" class="form-control border-dark w-100px selected_item_qty" id="selected_item_qty_for_` +
                    item_id + `" placeholder=""> </td>
                            <td id="selected_item_vat_for_` + item_id + `" class="selected_item_vat">` +
                    item_vat_percentage + `% </td>
                            <td> <input type="number" id="selected_item_price_for_` + item_id + `" class="selected_item_price" value="`+item_price+`"/></td>
                            <td class="selected_item_total_price">000</td>
                            <td>
                            <div class="card-toolbar text-right">
                            <a href="javascript:void(0)" class="item_remover" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
                            </div>
                            </td>
                            </tr>`;
                $('#orderTable  > tbody').append(table_tr);
                inner_calculation();
            }
        });
        $('#orderTable').on('click', '.item_remover', function() {
            $(this).closest("tr").remove();
            inner_calculation();
        });
        $('#orderTable').on('keyup change', function() {
            inner_calculation();
        });
        $('#counter_table').on('keyup change', function() {
            discount_calculate();
            // console.log('%'+$('#discount_percentage').val());
            // console.log('F'+$('#discount_fixed_amount').val());
        });
        function inner_calculation() {
            let total_price = 0;
            let total_vat = 0;
            $('#orderTable tbody tr').each(function(i, element) {
                var qty = parseInt($(this).find('.selected_item_qty').val());
                var price = parseFloat($(this).find('.selected_item_price').val());
                // var vat = parseFloat($(this).find('.selected_item_vat').text());
                var vat = parseFloat((price / 100) * parseFloat($(this).find('.selected_item_vat').text()));
                $(this).find('.selected_item_total_price').text((qty * (price + vat)).toFixed(2));
                total_price += qty * price;
                total_vat += qty * vat;
            });
            $('#total_price').text((total_price).toFixed(2));
            $('#total_vat').text((total_vat).toFixed(2));
            discount_calculate();
        }
        function discount_calculate() {
            let price = $('#total_price').text();
            let discount_percentage = parseFloat($('#discount_percentage').val());
            let discount_fixed_amount = parseFloat($('#discount_fixed_amount').val());
            discount_amount = ((price / 100) * discount_percentage) + discount_fixed_amount;
            price_after_discount = price - discount_amount;
            $('#price_after_discount').text((price_after_discount).toFixed(2));
            let vat = parseFloat($('#total_vat').text());
            let payment_amount = parseFloat($('#payment_amount').text());
            $('#due_amount').text((price_after_discount + vat - payment_amount).toFixed(2));
            $('#total_price_include_vat').text((price_after_discount + vat).toFixed(2));
        }
        $('.mdal_close_a').click(function() {
            $('#modal').modal('hide');
            location.reload();
        });
        $('#save_invoice').click(function() {
            var services = document.getElementsByName('services[]');
            const service_data_set = [];
            $('#orderTable tbody tr').each(function(i, element) {
                service_data_set.push({
                    'service': parseInt($(this).find('.selected_item').val()),
                    'quantity': parseInt($(this).find('.selected_item_qty').val()),
                    'price': parseFloat($(this).find('.selected_item_price').val()),
                    // 'vat': parseFloat($(this).find('.selected_item_vat').text()),
                    'vat': parseFloat((parseFloat($(this).find('.selected_item_price').val()) / 100) * parseFloat($(this).find('.selected_item_vat').text())),
                });
            });
            let pass = true;
            if(service_data_set.length <= 0){
                alert('Please select a car.');
                pass = false;
            }
            if($('#client_name').val() == null || $('#client_phone').val() == null || $('#client_email').val() == null){
                alert('Please input customer name, phone and email address.');
                pass = false;
            }
            if($('#payment_method').val().length < 1){
                alert('Please select a payment method.');
                pass = false;
            }
            if (pass == true) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('backend.invoice.store') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        service_data_set: service_data_set,
                        payment_method: $('#payment_method').val(),
                        discount_percentage: $('#discount_percentage').val(),
                        fixed_discount: $('#discount_fixed_amount').val(),
                        payment_amount: parseFloat($('#payment_amount').text()),
                        client_name: $('#client_name').val(),
                        client_email: $('#client_email').val(),
                        client_phone: $('#client_phone').val(),
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                    },
                    complete: function() {
                    },
                    success: function(data) {
                        console.log(data)
                        if (data.type == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your invoice has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#modal').modal('show');
                            $('#modal-body').html(`<iframe src="` + data.invoice_url +
                                `" width="100%" height="400"></iframe>`);
                            $(".mdal_close_a").attr("href", data.btn_url)
                        } else {
                            Swal.fire({
                                icon: data.type,
                                title: 'Oops...',
                                text: data.message,
                                footer: 'We are sorry for unable.'
                            })
                        }
                    },
                    error: function(error) {
                        console.log(error.responseText);
                        $.each(error.responseJSON.responseText, function(key, value) {
                            console.log(value)
                        });
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-center p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(error.responseJSON.errors, function(key, value) {
                            errorMessage += ('' + value + '<br>');
                        });
                        errorMessage += '</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            html: errorMessage,
                        })
                    },
                });
            }
        });
    </script>

</body>
<!--end::Body-->

</html>