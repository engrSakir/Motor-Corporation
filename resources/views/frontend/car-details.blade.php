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
                  <!-- end: more-images --> 
                   <div class="toll-free"><a href="#"><i class="fa fa-phone"></i> {{ get_static_option('mobile') }} </a></div>
                  <!--<div class="ask-question"><a href="#" onClick="ShowMe();"><i class="fa fa-question"></i> Ask a Question</a></div>
                  <div class="request-call"><a href="#" onClick="ShowMe1();"><i class="fa fa-money"></i> Finance Calculator</a></div>-->
                </div>
                <!--End For version 1,2,6--> 
                <!-- For version 3 -->
                <div class="product-shop col-lg- col-sm-7 col-xs-12">
                  <div class="brand">{{ $car->brand }}</div>
                  <div class="product-name">
                    <h1> {{ $car->name }} </h1>
                  </div>
                  <div class="ratings">
                    <div class="rating-box">
                      <div style="width:60%" class="rating"></div>
                    </div>
                  <!--  <p class="rating-links"> <a href="#">1 Review</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>-->
                  </div>
                  <div class="price-block">
                    <div class="price-box">
                     
                      <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price">{{ $car->selling_price }}</span> </p>
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
                          <td class="label-spec"> Transmission <span class="coln">:</span></td>
                          <td class="value-spec"> Automatic </td>
                        </tr>
                       
                        <tr class="odd">
                          <td class="label-spec"> Model <span class="coln">:</span></td>
                          <td class="value-spec"> {{ $car->model }} </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Power Windows <span class="coln">:</span></td>
                          <td class="value-spec"> Yes </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Airbags <span class="coln">:</span></td>
                          <td class="value-spec"> Available </td>
                        </tr>
                         <tr class="odd">
                          <td class="label-spec"> ABS <span class="coln">:</span></td>
                          <td class="value-spec"> Yes </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Central Locking <span class="coln">:</span></td>
                          <td class="value-spec"> Yes </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Fog Lamps <span class="coln">:</span></td>
                          <td class="value-spec"> Front </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                 <!-- <div class="email-addto-box">
                    <ul class="add-to-links">
                      <li> <a class="link-wishlist" href="wishlist.html"><span>Add to Wishlist</span></a></li>
                      <li><a class="link-compare" href="compare.html"><span>Add to Compare</span></a></li>
                    </ul>
                    <p class="email-friend"><a href="#" class=""><span>Email to a Friend</span></a></p>
                  </div>-->
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
             <li> <a href="#product_tabs_custom" data-toggle="tab">Accessories</a> </li>
              <!-- <li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>
              <li> <a href="#product_tabs_custom1" data-toggle="tab">Custom Tab1</a> </li>-->
            </ul>
            <div id="productTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="product_tabs_description">
                <div class="std">

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
                          <td class="label-spec"> Transmission <span class="coln">:</span></td>
                          <td class="value-spec"> Automatic </td>
                        </tr>
                        
                        <tr class="odd">
                          <td class="label-spec"> Model <span class="coln">:</span></td>
                          <td class="value-spec"> {{ $car->model }} </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Power Windows <span class="coln">:</span></td>
                          <td class="value-spec"> Yes </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Airbags <span class="coln">:</span></td>
                          <td class="value-spec"> Available </td>
                        </tr>
                         <tr class="odd">
                          <td class="label-spec"> ABS <span class="coln">:</span></td>
                          <td class="value-spec"> Yes </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Central Locking <span class="coln">:</span></td>
                          <td class="value-spec"> Yes </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Fog Lamps <span class="coln">:</span></td>
                          <td class="value-spec"> Front </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            <!--  <div class="tab-pane fade" id="reviews_tabs">
                <div class="woocommerce-Reviews">
                  <div>
                    <h2 class="woocommerce-Reviews-title">2 reviews for <span>Bacca Bucci Men's Running Shoes</span></h2>
                    <ol class="commentlist">
                      <li class="comment">
                        <div> <img alt="" src="images/member1.png" class="avatar avatar-60 photo">
                          <div class="comment-text">
                            <div class="ratings">
                              <div class="rating-box">
                                <div style="width:100%" class="rating"></div>
                              </div>
                            </div>
                            <p class="meta"> <strong>John Doe</strong> <span>–</span> April 19, 2018 </p>
                            <div class="description">
                              <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                              <p>Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lorem ut libero malesuada feugiat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="comment">
                        <div> <img alt="" src="images/member2.png" class="avatar avatar-60 photo">
                          <div class="comment-text">
                            <div class="ratings">
                              <div class="rating-box">
                                <div style="width:100%" class="rating"></div>
                              </div>
                            </div>
                            <p class="meta"> <strong>Stephen Smith</strong> <span>–</span> June 02, 2018 </p>
                            <div class="description">
                              <p>Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ol>
                  </div>
                  <div>
                    <div>
                      <div class="comment-respond"> <span class="comment-reply-title">Add a review </span>
                        <form action="#" method="post" class="comment-form" novalidate>
                          <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                          <div class="comment-form-rating">
                            <label id="rating">Your rating</label>
                            <p class="stars"> <span> <a class="star-1" href="#">1</a> <a class="star-2" href="#">2</a> <a class="star-3" href="#">3</a> <a class="star-4" href="#">4</a> <a class="star-5" href="#">5</a> </span> </p>
                          </div>
                          <p class="comment-form-comment">
                            <label>Your review <span class="required">*</span></label>
                            <textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
                          </p>
                          <p class="comment-form-author">
                            <label for="author">Name <span class="required">*</span></label>
                            <input id="author" name="author" type="text" value="" size="30" required>
                          </p>
                          <p class="comment-form-email">
                            <label for="email">Email <span class="required">*</span></label>
                            <input id="email" name="email" type="email" value="" size="30" required>
                          </p>
                          <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                          </p>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>-->
              <div class="tab-pane fade" id="product_tabs_custom">
                <div class="spec-row" id="summarySpecs">
                    <table width="100%">
                      <tbody>
                        <tr class="odd">
                          <td class="label-spec"> Air Conditioner <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> AntiLock Braking System <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Power Steering <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Power Windows <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> CD Player <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Leather Seats <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Central Locking <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                         <tr class="odd">
                          <td class="label-spec"> Power Door Locks <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Brake Assist <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                        <tr class="odd">
                          <td class="label-spec"> Driver Airbag <span class="coln">:</span></td>
                          <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
              <div class="tab-pane fade" id="product_tabs_custom1">
                <div class="product-tabs-content-inner clearfix">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                </div>
              </div>
            </div>
          </div>
          
          
        <!--box-additional--> 
        <!--product-view--> 
      </div>
    </div>
    <!--col-main--> 
  </div>
  @endsection
