@extends('frontend.layouts.app')

@section('main-content')


<!-- end navbar -->
@if ($banner)
<header class="page-header" data-background="{{ getImage('cover', $banner->background_image) }}" data-stellar-background-ratio="1.15">
	<div class="container">
		<h1>{{ $banner->cover_title }}</h1>
		<p>{!! $banner->cover_des !!}</p>
		<p>{!! $banner->cover_des2 !!}</p>

	</div>
	<!-- end container -->
</header>
@endif
<!-- end page-header -->

<style>
  .vi-mi figure{
    min-height: 100% !important;
  }
</style>
@if ($aboutshortsec)
<section class="facilities about-content">
    <div class="container">
      <div class="row justify-content-around">
        @foreach ($aboutshortsec as $section)
        <div class="col-lg-5 col-md-6 text-center vi-mi">
          <figure>
            <h2><span>{{ $section->title }}</span></h2>
            <p>{{ $section->description }}</p>
          </figure>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
@if ($ourvalue)
<section class="p-0 about-content">
    <div class="container">
      <div class="feature-title text-center fadeInUp wow">
        <h2><span>{{ $ourvalue->sec_title }}</span></h2>
      </div>
    </div>
  </section>
  <section class="facilities pt-0">
    <div class="container">
      <div class="row">
          @foreach ($corevalues as $value)
          <div class="col-lg-4 col-md-6">
              <figure>
                  <img src="{{ getImage('corevalues', $value->icon) }}" alt="Image">
                  <figcaption>
                  <h5>{{ $value->value }}</h5>
                  <p>{{ $value->value_des }}</p>
                  </figcaption>
              </figure>
          </div>
          @endforeach

          <!-- end col-4 -->
      </div>
    </div>
  </section>
@endif

@if ($story)
<section class="about-content pt-0 pb-1">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				  <h2><span>{{ $story->sec_title }}</span></h2>
			</div>
			<!-- end col-12 -->
			 <div class="col-lg-10 m-auto text-center">
        <p>{{ $story->sec_des }}</p>
      </div>
      <!-- end col-5 -->

      <div class="col-12">
        <div class="gallery-container">
          <div class="swiper-wrapper">
            @foreach ($story_slider as $slider)
            <div class="swiper-slide"><img src="{{ getImage('story_slider', $slider->image) }}" alt="Image"></div>
            @endforeach
          </div>
    <!-- add swiper-wrapper -->
      <div class="gallery-pagination"></div>
      <!-- end gallery-pagination -->
    </div>
       </div>
       </div>
		<!-- end row -->
	</div>
	<!-- end container -->
</section>
@endif

@if ($managment)
<section class="about-content p-0">
    <div class="col-12 text-center">
      <h2><span>{{ $managment->sec_title }}</span></h2>
      <p>{!! $managment->sec_des!!}</p>
    </div>

  </section>
@endif
<section class="sales-team pt-0">
  <div class="container">

    <div class="row">
        @foreach ($member as $team)
        <div class="col-md-6">
        <figure><img src="{{ getImage('management', $team->image) }}" alt="Image">
			<figcaption>
			<h4>{!! $team->name !!}</h4>
			<small>{{ $team->designation }}</small>
			<ul>
				<li><a href="{{ $team->linkedIn }}"><i class="fab fa-linkedin-in"></i>LINKEDIN</a></li>
				<li><a href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i>FACEBOOK</a></li>
				<li><a href="{{ $team->email }}"><i class="far fa-envelope"></i>E-MAIL</a></li>
			</ul>
			</figcaption>
			</figure>
		</div>
        @endforeach

    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</section>
@if ($wishtojoin)
<section class="about-content"  style="background-image: url({{ getImage("sections", $wishtojoin->section_image) }}); background-position: left; background-repeat: no-repeat; background-size: cover;">
    <div class="container text-center">
      <div class="col-lg-6 pt-5">
        <h2><span>{{ $wishtojoin->sec_title }}</span></h2>
        <div class="col-lg-9 m-auto">
          <h4 style="line-height: 1.8;">
            {!! $wishtojoin->sec_des !!}
          </h4>
          <h3 class="text-info responsive-h2">
            {{ $wishtojoin->sec_des2 }}
          </h3>
        </div>
      </div>
    </div>
  </section>
@endif
@endsection
