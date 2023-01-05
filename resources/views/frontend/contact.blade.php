@extends('frontend.layouts.app')

@section('main-content')


<!-- end navbar -->
@if ($cover != null)
<header class="page-header" data-background="{{ getImage('cover', $cover->background_image) }}" data-stellar-background-ratio="1.15">
	<div class="container">
		<h1>{{ $cover->cover_title }}</h1>
		<p>{{ $cover->cover_des }}</p>
		<p>{{ $cover->cover_des2 }}</p>

	</div>
	<!-- end container -->
</header>
@endif
<!-- end page-header -->
<section class="contact">
  <div class="container">
    <div class="row align-items-start">
   	<div class="col-lg-12 wow fadeInUp">
        @if ($contact_sec)
        <h4>{!! $contact_sec->sec_title !!}</h4>
        <small>{!! $contact_sec->sec_des !!}</small> </div>
        @endif
        <!-- end col-6 -->
        @if ($footerBar->co_office)
        <div class="col-lg-3 col-md-6 wow fadeInUp">
            <address>
                <strong>Corporate Office</strong>
                <p>{!! $footerBar->co_office !!}</p>
            </address>
              </div>
        @endif
        @if ($footerBar->re_office)
        <div class="col-lg-3 col-md-6 wow fadeInUp">
            <address>
                <strong>Registered Office</strong>
                <p>{!! $footerBar->re_office !!}</p>
            </address>
           </div>
        @endif
        <!-- end col-3 -->
        @if ($footerInfo->phone1 || $footerInfo->phone2)
        <div class="col-lg-3 col-md-6 wow fadeInUp">
            <address>
                <strong>You can simply give us a call</strong>
                <p>
                {!! $footerInfo->phone1 !!}
              </p>
                <p>
                {!! $footerInfo->phone2 !!}
              </p>
            </address>
           </div>
        @endif
        @if ($footerInfo->email)
        <div class="col-lg-3 col-md-6 wow fadeInUp">
            <address>
                <strong>Or send us an email here</strong>
              <p><a href="#">{{ $footerInfo->email }}</a></p>

            </address>
           </div>
        @endif
        <!-- end col-3 -->
	  </div>
       <!-- end row -->
    <div class="row align-items-center">
        <div class="col-lg-6">
        	 <div class="map">
          <div class="pattern-bg" data-stellar-ratio="1.03"></div>
          <!-- end pattern-bg -->
          <div class="holder" data-stellar-ratio="1.07">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.60988026534!2d90.38549751429785!3d23.796902592916677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c746db04c093%3A0xbe64860ddee947aa!2sMaster%20Builder%20Limited%20(Corp.%20Office)!5e0!3m2!1sen!2sbd!4v1669888545381!5m2!1sen!2sbd" allowfullscreen></iframe>
         </div>
          <!-- end holder -->
        </div>
        <!-- end map -->
        </div>
        <!-- end col-6 -->
        <div class="col-lg-6">
            <h3 class="message alert alert text-success"></h3>
        	<div class="contact-form">
			 <form action="{{ route('contact.store') }}" method="POST" id="ajax_form">
                @csrf
          <div id="contact">
            <div class="form-group">
                <input type="text" name="name" autocomplete="off">
                 <span>Your name</span>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <!-- end form-group -->
              <div class="form-group">
                <input type="text" name="phone" id="contact_no" autocomplete="off" >
                <span>Contact No</span>
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <!-- end form-group -->
              <div class="form-group">
                <input type="text" name="email" id="email" autocomplete="off">
                <span>Your e-mail</span>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <!-- end form-group -->
              <div class="form-group">
                <textarea name="message" id="message" autocomplete="off"></textarea>
                <span>Your message</span>
              </div>
              <!-- end form-group -->
              <div class="form-group">
                <button id="submit" type="submit" name="submit" class="submit">
                    Submit
             </button>
              </div>
          </div>
          <!-- end form-group -->
        </form>
        <!-- end form -->
         <div class="form-group">
          <div id="success" class="alert alert-success wow fadeInUp" role="alert"> Your message was sent successfully! We will be in touch as soon as we can. </div>
        <!-- end success -->
        <div id="error" class="alert alert-danger wow fadeInUp" role="alert"> Something went wrong, try refreshing and submitting the form again. </div>
        <!-- end error -->
        </div>
        <!-- end form-group -->
        </div>
        <!-- end contact-form -->
        </div>
        <!-- end col-6 -->
   </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</section>
<!-- end contact -->
@endsection

@section('footer-script')
<script>


 </script>
@endsection
