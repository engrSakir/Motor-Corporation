@extends('layouts.frontend.app')
@push('title') Motor Corporation @endpush
@section('content')

        
			<!--
			************************************************************
			* INTRO-SECTION
			************************************************************ -->
			<div class="section ckav-section pd-0 flex-bl bg-cover bg-cc typo-light" data-bg="{{ asset('assets/frontend/images/6.jpg') }}" data-tsection="sdark">

				
<!--=================================
= SLIDE SHOW
==================================-->
<div class="full-wh nc-bgeffect">
  <div class="bgslider nc-bgeffect bg-cc bg-cover full-wh" data-bgslider="{{ asset('assets/frontend/images/6.jpg')}}|{{ asset('assets/frontend/images/5.jpg') }}"></div>
</div>
<!-- ======= END : SLIDE SHOW =======  -->


<!-- OVERLAY -->
<div class="ckav-section--overlay full-wh" data-bgcolor="rgba(34,34,34,0.2)"></div>
<!-- / OVERLAY -->


<!--=================================
= CONTENT
==================================-->
<div class="ckav-section--content z9 pd-80 animated s008" data-animIn="fadeInUp|0.0" data-animOut="fadeOutUp|0.0" data-ckav-sm="pd-40">
  
  <!-- INTRO-TEXT -->
  <div class="ckav-title">
    <h1 class="title f-3 italic bold-1 with-sep sep-right sep-light mr-b-0 animated s008" data-animIn="fadeInUp|0.1" data-ckav-sm="fs20">
      <span>Creative</span>
    </h1>
    <h1 class="title xxlarge f-1 bold-4 mr-b-0 animated s008" data-animIn="fadeInUp|0.2" data-ckav-md="fs60" data-ckav-sm="fs30">
      Fashion Agency
    </h1>
  </div><!-- INTRO-TEXT -->


  <a href="#subscribe-section" title="subscribe" data-tosection="subscribe-section" class="scroll-to small btn btn-default solid f-1 txt-upper bold-4 mr-t-30 animated s008" data-animIn="fadeInUp|0.3">
    Subscribe
  </a>

</div>
<!-- ======= END : CONTENT =======  -->

</div>
<!-- ************** END : INTRO-SECTION **************  -->



    <!-- ABOUT-SECTION -->
<div class="section ckav-section pd-0" data-tsection="sdark">

<!-- CONTENT -->
<div class="ckav-section--content container-fluid z9">
  <div class="row flex-eqh min-vh-h100">
    
    <!-- LEFT -->
    <div class="col-lg-7 flex-cc align-c" data-ckav-md="pd-60" data-ckav-sm="pd-40">
      <div class="inner-wrapper w60 mr-auto animated s008" data-animIn="fadeInUp|0.0" data-animOut="fadeOutUp|0.0">
        
        <h1 class="title small f-3 italic animated s008" data-animIn="fadeInUp|0.2">
          About
        </h1>
        <h2 class="title f-1 bold-1 small animated s008" data-animIn="fadeInUp|0.3">
          We are an independent creative company specialise in web services. Effective design is mixture of strategy & creativity that focus on requirement to achieve goals. We produce designs to capture and engage audience with powerful digital experience.
        </h2>
        <hr class="px-w200 mr-auto mr-tb-tiny animated s008" data-animIn="fadeInUp|0.4">
        <p class=" animated s008" data-animIn="fadeInUp|0.5">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

      </div>
    </div><!-- / LEFT -->

    <!-- RIGHT -->
    <div class="col-lg-5 flex-cc bg-cover bg-cc" data-ckav-sm="min-px-h300" data-bg="{{ asset('assets/frontend/images/3.jpg') }}">
      
      <!-- OVERLAY -->
      <div class="full-wh" data-bgcolor="rgba(0,0,0,0.2)"></div>
      <!-- / OVERLAY -->

    </div><!-- / RIGHT -->

  </div>
</div><!-- / CONTENT -->

</div><!-- / ABOUT-SECTION -->



    <!-- CONTACT-SECTION -->
<div class="section ckav-section pd-0" data-tsection="sdark">

<!-- CONTENT -->
<div class="ckav-section--content container-fluid z9">
  <div class="row flex-eqh min-vh-h100">
    
    <!-- LEFT -->
    <div class="col-lg-7 flex-cc align-c pd-0" data-ckav-sm="min-px-h300">
      
      <!-- GOOGLE MAP -->
      <div class="gmap-widget w100 h100" 
        data-map-latitude="-37.817136" 
        data-map-longitude="144.955652" 
        data-map-markerhd="Envato" 
        data-map-markerhtml='<div class="pd-10 align-c"><h2 class="fs18 mr-b-10">Envato</h2><p class="fs16 mr-0">PO Box 16122, Collins Street West,<br>Victoria 8007, Australia</p></div>'>		
      </div>
      <!-- / GOOGLE MAP -->

    </div><!-- / LEFT -->

    <!-- RIGHT -->
    <div class="col-lg-5 typo-light flex-cl dark-bg" data-ckav-md="pd-60" data-ckav-sm="pd-40">
      <div class="inner-wrapper w60 pd-l-80 animated s008" data-animIn="fadeInUp|0.0" data-animOut="fadeOutUp|0.0" data-ckav-md="pd-0" data-ckav-sm="pd-0">
        
        <!-- TITLE -->
        <div class="ckav-title mr-b-60 inline-block">
          <h1 class="title small f-3 italic bold-1 with-sep sep-right sep-light mr-b-0 animated s008" data-animIn="fadeInUp|0.1" data-ckav-sm="fs20">
            <span>
              Find location
            </span>
          </h1>
          <h1 class="title f-1 bold-4 mr-b-0 animated s008" data-animIn="fadeInUp|0.2" data-ckav-md="fs60" data-ckav-sm="fs30">Contact us</h1>
        </div><!-- TITLE -->

        <!-- INFO-BOX -->	
        <div class="info-obj img-l g10 tiny align-c mr-b-20 animated s008" data-animIn="fadeInUp|0.3">
          <div class="img txt-white">
            <span class="iconwrp">
              <i class="pe-7s-map-marker"></i>
            </span>
          </div>
          <div class="info align-l">
            <h3 class="title f-1 txt-upper mini bold-4">
              Our mission
            </h3>
            <p class="mr-0">
              PO Box 16122, Collins Street West, Victoria 8007, Australia
            </p>
          </div>
        </div>
        <!-- / INFO-BOX -->

        <hr class="light animated s008" data-animIn="fadeInUp|0.4">

        <!-- INFO-BOX -->	
        <div class="info-obj img-l g10 tiny align-c mr-b-20 animated s008" data-animIn="fadeInUp|0.5">
          <div class="img txt-white">
            <span class="iconwrp">
              <i class="pe-7s-call"></i>
            </span>
          </div>
          <div class="info align-l">
            <h3 class="title txt-upper f-1 mini bold-4">
              Phone
            </h3>
            <p class="mr-0">
              <span><strong>Office : </strong>1-123-456-7890</span>
              <br>
              <span><strong>FAX : </strong>1-123-456-7890</span>
            </p>
          </div>
        </div>
        <!-- / INFO-BOX -->

        <!-- BUTTON -->
        <a href="#" title="subscribe" data-popup="contact-form" class="ckav-trigger small btn btn-default solid f-1 txt-upper bold-4 mr-t-30 animated s008" data-animIn="fadeInUp|0.6">
          Drop us line
        </a>
        <!-- BUTTON -->

      </div>
    </div><!-- / RIGHT -->

  </div>
</div><!-- / CONTENT -->

</div><!-- / CONTACT-SECTION -->



    <!-- SUBSCRIBE-SECTION -->
<div class="section ckav-section pd-0 flex-cc" data-tsection="slight">

<!-- CONTENT -->
<div class="ckav-section--content container z9 animated s008" data-animIn="fadeInUp|0.0" data-animOut="fadeOutUp|0.0" data-ckav-md="pd-60" data-ckav-sm="pd-40">
  <div class="row">
    <div class="col-md-12 align-c">
      
      <!-- TITLE -->
      <div class="ckav-title align-c">
        <h1 class="title f-1 bold-4 animated s008" data-animIn="fadeInUp|0.1">
          Newsletter Subscribe
        </h1>
        <hr class="px-w100 mr-auto mr-tb-30 bdr-dark animated s008" data-animIn="fadeInUp|0.2">
        <p class="f-2 px-w500 mr-auto animated s008" data-animIn="fadeInUp|0.3" data-ckav-sm="w100">
          Subscribe for our newsletter and get the latest updates. Be the first one to know about the special offers and latest news.
        </p>
      </div><!-- / TITLE -->

      <!-- FORM -->
      <div class="subscribe-block _1 block mr-b-20 mr-t-mini mr-auto px-w500 animated s008" data-ckav-sm="subscribe-reset w100" data-animIn="fadeInUp|0.3" data-ckav-md="w100">
        <form action="http://pinak.c-kav.com/demos/form-data/notify-me.php" class="form-widget" data-formtype="newsletter" novalidate="novalidate">
          <div class="form-group">
            <input class="form-control w100" data-label="Email" data-msg="Please enter email." type="email" name="email" placeholder="Enter your email">
            <button type="submit" data-loading-text="Pleae wait.." class="btn btn-dark hov-btn-default solid"><i class="far fa-envelope fs26"></i></button>
          </div>
        </form>
      </div><!-- / FORM -->

    </div>
  </div>
</div><!-- / CONTENT -->

</div><!-- / SUBSCRIBE-SECTION -->



    <!-- FOOTER-SECTION -->
<div class="section ckav-section pd-0 flex-cc dark-bg" data-tsection="sdark">

<!-- CONTENT -->
<div class="ckav-section--content container z9 animated s008" data-animIn="fadeInUp|0.0" data-animOut="fadeOutUp|0.0">
  <div class="row">
    <div class="col-md-12 align-c">
      <a href="#" target="_blank" class="sq120 fs30 mr-20 rd-4 iconbox btn-white animated s008" data-animIn="fadeInUp|0.1">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" target="_blank" class="sq120 fs30 mr-20 rd-4 iconbox btn-white animated s008" data-animIn="fadeInUp|0.2">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" target="_blank" class="sq120 fs30 mr-20 rd-4 iconbox btn-white animated s008" data-animIn="fadeInUp|0.3">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="#" target="_blank" class="sq120 fs30 mr-20 rd-4 iconbox btn-white animated s008" data-animIn="fadeInUp|0.4">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
  </div>

  <p class="mr-t-30 align-c txt-white op-07 fs12">copyright <i class="far fa-copyright"></i> C.Kav.Art <span class="copyright-year"></span></p>
</div><!-- / CONTENT -->

</div><!-- / FOOTER-SECTION -->


</div><!-- / SECTION SCROLL -->


<!-- CONTACT-FORM -->
<div id="contact-form" class="ckav-popup ckav-popup-effect1 flex-cc">
<div class="ckav-popup-content bg-white ckav-scrollbar pd-80 px-w700" data-ckav-md="pd-60" data-ckav-sm="pd-40 w100">
<div class="inner-wrapper w100">

  <!-- CLOSE -->
  <div class="ckav-popup-close flex-cc sq30 fs30 txt-dark btn-color1 rd absolute top right pd-30">
    <i class="pe-7s-close-circle"></i>
  </div><!-- / CLOSE -->

  <!-- HEADER -->
  <div class="ckav-popup--header align-c">
    
    <!-- ICONS -->
    <div class="sq90 iconbox fs80 mr-0 txt-default">
      <i class="pe-7s-mail"></i>
    </div><!-- / ICONS -->

    <h3 class="title bold-4">Drop us line</h3>

    <hr class="px-w100 mr-auto mr-tb-30">

  </div><!-- / HEADER -->

  <!-- BODY -->
  <div class="ckav-popup--body align-c mr-t-60" data-ckav-md="mr-t-60" data-ckav-sm="mr-t-40">

    <form action="http://pinak.c-kav.com/demos/form-data/formdata.php" class="form-widget" novalidate="novalidate">
      <div class="field-wrp">
        <input type="hidden" name="to" value="c.kav.art@gmail.com">
        <div class="form-group">
          <input class="form-control" data-label="Name" required="" data-msg="Please enter name." type="text" name="name" placeholder="Enter your name" aria-required="true">
        </div>
        <div class="form-group">
          <input class="form-control" data-label="Email" required="" data-msg="Please enter email." type="email" name="email" placeholder="Enter your email" aria-required="true">
        </div>
        <div class="form-group">
          <input class="form-control" data-label="Subject" required="" data-msg="Please enter subject." type="text" name="subject" placeholder="Enter subject" aria-required="true">
        </div>
        <div class="form-group">
          <textarea class="form-control" data-label="Message" required="" data-msg="Please enter your message." name="message" placeholder="Add your message" cols="30" rows="10" aria-required="true"></textarea>
        </div>
      </div>
      <button type="submit" class="f-1 bold-4 btn solid btn-default block txt-upper">
        <i class="fa fa-envelope-o"></i> 
        Submit
      </button>
    </form>

  </div>
  <!-- / BODY -->

</div>
</div>
</div><!-- CONTACT-FORM -->
    @endsection

    @push('head')

    @endpush

    @push('foot')

    @endpush