<?php

use App\Models\footerBar;
use App\Models\SocialMedia;
use App\Models\Footer;
use App\Models\headerSide;

$footerBar = footerBar::all()->first();

$header = headerSide::all()->first();

$footerMain = Footer::all()->first();


$social = SocialMedia::first();


?>

<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="format-detection" content="telephone=no">
<meta name="theme-color" content="#282828"/>
<title>
    @if (@$page_title != null)
        {{ $page_title }} | Master Builder LTD.
    @else
        Master Builder | Real Estate & Luxury Homes
    @endif
</title>
<meta name="author" content="Master Builder">
<meta name="description" content="Master Builder | Real Estate & Luxury Homes">
<meta name="keywords" content="Master Builder, realestate, flat, apartment, benefits, facility, consultation, home, house, studio, pool, animation, transportation">

<!-- SOCIAL MEDIA META -->
<meta property="og:description" content="Master Builder | Real Estate & Luxury Homes">
<meta property="og:image" content="">
<meta property="og:site_name" content="Master Builder">
<meta property="og:title" content="Master Builder">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/') }}">

<!-- TWITTER META -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@master_builder">
<meta name="twitter:creator" content="@master_builder">
<meta name="twitter:title" content="Master Builder">
<meta name="twitter:description" content="Master Builder | Real Estate & Luxury Homes">
<meta name="twitter:image" content="preview.html">

<!-- FAVICON FILES -->
<link href="ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="144x144">
<link href="ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon" sizes="114x114">
<link href="ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
<link href="ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon">
<link href="ico/favicon.png" rel="shortcut icon">

<!-- CSS FILES -->

<link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/odometer.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
<div class="preloader">
  <div class="layer"></div>
  <!-- end layer -->
  <div class="inner">
    <figure><img src="{{ asset('frontend/images/preloader.gif') }}" alt="Image"></figure>
    <p><span class="text-rotater" data-text="Master Builder | Elements | Loading">Loading</span></p>
  </div>
  <!-- end inner -->
</div>
<!-- end prelaoder -->
<div class="transition-overlay">
  <div class="layer"></div>
</div>
<!-- end transition-overlay -->
<div class="side-navigation">
  <div class="menu">
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('about') }}">About Us</a></li>
      <li><a href="{{ url('properties') }}">Properties</a></li>
      <li><a href="{{ url('media') }}">Media</a></li>
      <li><a href="{{ url('contact') }}">Contact</a></li>
    </ul>
  </div>
  <!-- end menu -->
  <div class="side-content">
    <figure>
        @if ($header)
            <img src="{{ getImage('header', $header->logo) }}" alt="Image">
        @else
            <h2>Logo</h2>
        @endif
    </figure>
    <address>
      @if ($footerBar)
        {!! $footerBar->co_office !!}
      @endif
    </address>
    <h6>
        @if ($header)
            {{ $header->phone }}
        @endif
    </h6>
    <p><a href="#">
        @if ($header)
            {{ $header->email }}
        @endif
    </a></p>
    @if($social)
    <ul class="social-media">

      <li><a href="{{ $social->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a></li>


      <li><a href="{{ $social->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>

      <li><a href="{{ $social->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>

      <li><a href="{{ $social->googleplus }}" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>

      <li><a href="{{ $social->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>

    </ul>
    @endif
    <small>© Copyright protected 2022 (c) | Master Builder</small> </div>
  <!-- end side-content -->
</div>
<!-- end side-navigation -->
<nav class="navbar sticky-top" id="navbar">
  <div class="container">
    <div class="upper-side">
      <div class="logo"> <a href="{{ url('/') }}">
        @if ($header)
            @if ($header->logo)
            <img src="{{ getImage('header', $header->logo) }}" alt="Image">
            @endif
        @else
            <h4>Master Builder</h4>
        @endif
    </a> </div>
      <!-- end logo -->
      <div class="menu">
        <ul class="mb-0">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('about') }}">About Us</a></li>
            <li><a href="{{ url('properties') }}">Properties</a></li>
            <li><a href="{{ url('media') }}">Media</a></li>
            <li><a href="{{ url('contact') }}">Contact</a></li>
        </ul>
      </div>
      @if ($header)
      <div class="phone-email"> <img src="{{ asset('frontend/images/icon-phone.png') }}" alt="Image">
        <h4>
                {{ $header->phone }}
        </h4>
        <small>
            <a href="#">
                {{ $header->email }}
            </a>
        </small>
        </div>
        @else
            <div class="phone-email" style="opacity: 0;">hello</div>
        @endif
      <!-- end phone -->
      <div class="language"></div>
      <!-- end language -->
      <div class="hamburger"> <span></span> <span></span> <span></span><span></span> </div>
      <!-- end hamburger -->
    </div>
    <!-- end upper-side -->

    <!-- end menu -->
  </div>
  <!-- end container -->
</nav>
<!-- end navbar -->


    <!-- Header end -->

    @yield('main-content')



    <!-- end certificates -->
@if ($footerBar)
<section class="footer-bar">
    <div class="container">
      <div class="inner wow fadeIn">
        <div class="row">
          @if ($footerBar->co_office)
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.05s">
                <figure><img src="{{ asset('frontend/images/footer-icon01.png') }}" alt="Image"></figure>
                <h3>Corporate Office</h3>
                <p>{!! $footerBar->co_office !!}</p>
            </div>
          @endif
          <!-- end col-4 -->
          @if ($footerBar->office_time)
          <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.10s">
            <figure><img src="{{ asset('frontend/images/footer-icon02.png') }}" alt="Image"></figure>
            <h3>Working Hours</h3>
            <p>
              {!! $footerBar->office_time !!}
            </p>
          </div>
          @endif
          <!-- end col-4 -->
          @if ($footerBar->re_office)
          <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.15s">
            <figure><img src="{{ asset('frontend/images/footer-icon03.png') }}" alt="Image"></figure>
            <h3>Registered Office</h3>
            <p>{!! $footerBar->re_office !!}</p>
          </div>
          @endif
          <!-- end col-4 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end inner -->
    </div>
    <!-- end container -->
  </section>
@endif
  <!-- end footer-bar -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.05s">
          @if ($footerMain != null)
            <img src="{{ getImage('footer', $footerMain->logo) }}" alt="Image" class="logo">

            <p>{{ $footerMain->description }}</p>
          @endif

          <!-- end select-box -->
        </div>
        <!-- end col-4 -->
        <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.10s">
          <ul class="footer-menu">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('about') }}">About Us</a></li>
            <li><a href="{{ url('properties') }}">Properties</a></li>
            <li><a href="{{ url('media') }}">Media</a></li>
            <li><a href="{{ url('contact') }}">Contact</a></li>
          </ul>
        </div>
        <!-- end col-2 -->
        {{-- <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.15s">
          <ul class="footer-menu">
            <li><a href="#">Suites</a></li>
            <li><a href="#">Apartments</a></li>
            <li><a href="#">Villas & Houses</a></li>
            <li><a href="#">Butique Room</a></li>
            <li><a href="#">Buildings</a></li>
          </ul>
        </div> --}}
        <!-- end col-2 -->
        <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.20s">
          <div class="contact-box">
            @if ($footerMain != null)
                <h5>CALL CENTER</h5>
                <h3>{{ $footerMain->phone1 }}</h3>
                <h3>{{ $footerMain->phone2 }}</h3>
                <p><a href="#">{{ $footerMain->email }}</a></p>
            @endif

            @if($social)
            <ul>

              <li><a href="{{ $social->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>

              <li><a href="{{ $social->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>

              <li><a href="{{ $social->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>

              <li><a href="{{ $social->googleplus }}" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>

              <li><a href="{{ $social->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>

            </ul>
            @endif
          </div>
          <!-- end contact-box -->
        </div>
        <!-- end col-4 -->
        <div class="col-12"> <span class="copyright">© Copyright protected 2022 (c) | Master Builder LTd</span></div>
        <!-- end col-12 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </footer>
  <!-- end footer -->

  <!-- JS FILES -->
  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/swiper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/fancybox.min.js') }}"></script>
  <script src="{{ asset('frontend/js/odometer.min.js') }}"></script>
  <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
  <script src="{{ asset('frontend/js/text-rotater.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.stellar.js') }}"></script>
  <script src="{{ asset('frontend/js/isotope.min.js') }}"></script>
  <script src="{{ asset('frontend/js/scripts.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  @yield('footer-script')
  <script>
    $(document).on('submit','form#ajax_form', function(e) {
         e.preventDefault();
         $('p.textdanger').text('');
         $(document).find('p.failed').text('');
         var url=$(this).attr('action');
         var method=$(this).attr('method');
         var formData = new FormData($(this)[0]);
         $.ajax({
             type: method,
             url: url,
             data: formData,
             async: false,
             processData: false,
             contentType: false,
             beforeSend: function(){
                $('.submit').attr('disabled', true);
             },
             success: function(res) {
                $('.submit').attr('disabled', false);
                 if(res.status==true){
                     toastr.success(res.msg);
                     var message = res.msg;
                     $('.message').html(message);
                     $('#ajax_form')[0].reset();
                     if(res.url){
                        setTimeout(() => {
                            document.location.href = res.url;
                        }, 2000);

                     }else{
                        //  window.location.reload();
                     }
                 }else if(res.status==false){
                     toastr.error(res.msg);
                 }

             },
             error:function (response){
                 $.each(response.responseJSON.errors,function(field_name,error){
                     $(document).find('[name='+field_name+']').after('<p style="color:red" class="failed">' +error+ '</p>')
                     toastr.error(error);
                     $('.submit').attr('disabled', false);
                 })
             }
         });
     });
  </script>


  </body>

  <!-- Mirrored from themezinho.net/hompark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2022 12:24:47 GMT -->
  </html>
