@extends('frontend.layouts.app')

@section('main-content')


<!-- end navbar -->
@if ($cover)
<header class="page-header" data-background="{{ getImage('cover', $cover->background_image) }}" data-stellar-background-ratio="1.15">
	<div class="container">
		<h1>{!! $cover->cover_title !!}</h1>
		<p>{!! $cover->cover_des !!}</p>
		<p>{!! $cover->cover_des2 !!}</p>

	</div>
	<!-- end container -->
</header>
@endif
<!-- end page-header -->
@if ($under_cons)
<section class="about-content pb-0">
<div class="container text-center">
    <h2><span>{{ $under_cons->sec_title }}</span></h2>
    <h6>{!! $under_cons->sec_des !!}</h6>
  </div>
</section>

@endif
<section class="sales-offices pt-4">
  <div class="container">
    <div class="row">
        @foreach ($ongoing as $projects)
        <div class="col-lg-4 wow fadeInUp p-2" data-wow-delay="0s">
            <div class="post-box card p-2">
            <figure> <img src="{{ getImage('project', $projects->Image) }}" alt="Image"> </figure>
            <span>{{ \Carbon\Carbon::parse($projects->date)->format('d/m/Y') }}</span>
            <p class="bg-info text-light p-1 pr-3 pl-3 mb-2">{{ $projects->address }}</p>
            <h6 class="col-12 pl-0 text-secondary"><a href="#">{{ $projects->project_name }} </a></h6>
            <p class="text-muted">{{ strLimit($projects->description, 40) }}</p>
            <a data-fancybox data-type="iframe" data-src="{{ $projects->map }}" href="javascript:;"><i class="fas fa-map-marker-alt"></i> CLICK FOR MAP</a>
            </div>
            <!-- end post-box -->
        </div>
@endforeach


    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</section>
@if ($completed_sec)
<section class="about-content pb-0">
<div class="container text-center">
    <h2><span>{{ $completed_sec->sec_title }}</span></h2>
    <h6>{!! $completed_sec->sec_des !!}</h6>
  </div>
</section>

@endif
<section class="sales-offices pt-4">
  <div class="container">
    <div class="row">
        @foreach ($complete as $projects)
                <div class="col-lg-4 wow fadeInUp p-2" data-wow-delay="0s">
                    <div class="post-box card p-2">
                    <figure> <img src="{{ getImage('project', $projects->Image) }}" alt="Image"> </figure>
                    <span>{{ \Carbon\Carbon::parse($projects->date)->format('d/m/Y') }}</span>
                    <p class="bg-info text-light p-1 pr-3 pl-3 mb-2">{{ $projects->address }}</p>
                    <h6 class="col-12 pl-0 text-secondary"><a href="#">{{ $projects->project_name }} </a></h6>
                    <p class="text-muted">{{ strLimit($projects->description, 40) }}</p>
                    <a data-fancybox data-type="iframe" data-src="{{ $projects->map }}" href="javascript:;"><i class="fas fa-map-marker-alt"></i> CLICK FOR MAP</a>
                    </div>
                    <!-- end post-box -->
                </div>
        @endforeach


    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</section>
<div class="container">
  <hr>
</div>
<section class="contact pt-0">
  <div class="container text-center">
    <h2><span>Interested in Our Projects?</span></h2>
    <h6>If you are interested in our projects</h6>
    <h6>Please Call us at 01777 7098 - 99</h6>
    <h6>Or</h6>
    <h6>Submit your Information :</h6>
    <hr>
    <h3 class="message alert alert text-success"></h3>
    <div class="col-lg-6 m-auto text-left pt-3">
      <div class="contact-form pl-0">
   <form action="{{ route('invitation.store') }}" method="POST" id="ajax_form">
    <div id="contact">
        @csrf
      <div class="form-group">
          <input type="text" name="name" class="border border-dark" id="name" autocomplete="off" required>
           <span>Your name</span>
      </div>
      <!-- end form-group -->
      <div class="form-group">
        <input type="text" name="contact_no" class="border border-dark" id="contact_no" autocomplete="off" required>
        <span>Your Contact No</span>
      </div>
      <!-- end form-group -->
      <div class="form-group">
        <input type="text" name="address" class="border border-dark" id="email" autocomplete="off" required>
        <span>Address</span>
      </div>
      <!-- end form-group -->
      <div class="form-group">
        <input type="text" name="land_size" class="border border-dark" id="email" autocomplete="off" required>
        <span>Land Size</span>
      </div>
      <!-- end form-group -->
      <div class="form-group">
        <button id="submit" type="submit">
    Submit
     </button>
      </div>
      <!-- end form-group -->
    </div>
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
  </div>
</section>

@endsection
