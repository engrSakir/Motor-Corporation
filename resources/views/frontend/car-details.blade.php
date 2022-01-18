@extends('layouts.frontend.app')
@push('title') Details @endpush
@section('content')

<div class="content">
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2 style="color:white;">Details </h2>
                    </div>
                </div>
                <!--col-xs-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>
    <div class="main-container col1-layout wow bounceInUp animated">
    <div class="main">
      <div class="col-main">
        <!-- Endif Next Previous Product -->
        <div class="product-view wow bounceInUp animated" itemscope="" itemtype="http://schema.org/Product" itemid="#product_base">
          <div id="messages_product_view"></div>
          <!--product-next-prev-->
          <div class="product-essential container">
            <div class="row">
              <form action="#" method="post" id="product_addtocart_form">
                <!--End For version 1, 2, 6 -->
                <!-- For version 3 -->
                <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                  <div class="new-label new-top-left">Hot</div>
                  <div class="sale-label sale-top-left"> -{{ $car->discount_percentage }}%</div>
                  <div class="product-image">
                    <div class="product-full"> <img id="product-zoom1" src="{{ asset($car->image ?? 'uploads/images/no_image.png') }}" data-zoom-image="products-images/p46.jpg" alt="product-image"/> </div>

                  </div>
                   <div class="toll-free"><a href="#"><i class="fa fa-phone"></i> {{ get_static_option('mobile') }} </a></div>
                </div>
                <div class="product-shop col-lg- col-sm-7 col-xs-12">
                  <div class="brand">{{ $car->brand }}</div>
                  <div class="product-name">
                    <h1> {{ $car->name }} </h1>
                  </div>
                  <div class="ratings">
                    <div class="rating-box">
                    </div>
                  </div>
                  <div class="price-block">
                    <div class="price-box">

                      <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price">৳{{ $car->selling_price }}</span> </p>
                    </div>
                  </div>

                  <div class="spec-row" id="summarySpecs">
                  <h2>Specifications</h2>
                    <table width="100%">
                      <tbody>
                        <tr class="odd">
                          <td class="label-spec"> Mileage <span class="coln">:</span></td>
                          <td class="value-spec"> {{ $car->mileages }} </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Model <span class="coln">:</span></td>
                          <td class="value-spec"> {{ $car->model }} </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Chassis number <span class="coln">:</span></td>
                          <td class="value-spec"> {{ $car->chassis_number }} </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="social">
                    <ul class="link">
                      <li class="fb"><a href="#"></a></li>
                      <li class="tw"><a href="#"></a></li>
                      <li class="googleplus"><a href="#"></a></li>
                      <li class="rss"><a href="#"></a></li>
                      <li class="pintrest"><a href="#"></a></li>
                      <li class="linkedin"><a href="#"></a></li>
                      <li class="youtube"><a href="#"></a></li>
                    </ul>
                  </div>
                  <ul class="shipping-pro">
                    <li>Free Servicing</li>
                    <li>Free Monthly Checkup</li>
                    <li>Extended Warrenty</li>
                  </ul>
                </div>
                <!--product-shop-->
                <!--Detail page static block for version 3-->
              </form>
            </div>
          </div>
          <!--product-essential-->
          <div class="product-collateral container">
            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
              <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Vehicle Overview </a> </li>
              <li><a href="#product_tabs_tags" data-toggle="tab">Technical Specification</a></li>
             <!-- <li> <a href="#product_tabs_custom" data-toggle="tab">Accessories</a> </li>
              <li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>
              <li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li>-->
            </ul>
            <div id="productTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="product_tabs_description">
                <div class="std">
                {{ $car->description }}
                </div>
              </div>
              <div class="tab-pane fade" id="product_tabs_tags">
                <div class="spec-row" id="summarySpecs">
                    <table width="100%">
                      <tbody>
                        <tr class="odd">
                          <td class="label-spec"> Mileage <span class="coln">:</span></td>
                          <td class="value-spec"> {{ $car->mileages }} </td>
                        </tr>


                        <tr class="odd">
                          <td class="label-spec"> Model <span class="coln">:</span></td>
                          <td class="value-spec"> {{ $car->model }} </td>
                        </tr>


                      </tbody>
                    </table>
                  </div>
              </div>
              <div class="tab-pane fade" id="product_tabs_custom1">
                <div class="product-tabs-content-inner clearfix">
                <p> </p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!--col-main-->
  </div>
  @endsection
