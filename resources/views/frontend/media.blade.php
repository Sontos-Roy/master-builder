@extends('frontend.layouts.app')

@section('main-content')


<!-- end navbar -->
@if ($cover)
<header class="page-header" data-background="{{ getImage('cover', $cover->background_image) }}" data-stellar-background-ratio="1.15">
	<div class="container">
		<h1>{{ $cover->cover_title }}</h1>
		<!-- <p>The smaller male cones release pollen, which fertilizes the female</p>   -->

	</div>
	<!-- end container -->
</header>
@endif
<style>
    .image-title{
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.596);
        width: 98%;
        margin: 0 auto;
        z-index: 9999;
        padding: 10px;
    }
    .image-title *{
        padding: 0;
        margin: 0;
        color: aliceblue;
    }
</style>
<section class="photo-gallery">
    <div class="container">
      <div class="row">
          <div class="col-12">
          <ul class="gallery-filter">
                 <li><a href="javascript:void(0);" data-filter="*" class="current">ALL AREA</a></li>
                 @foreach ($gal_tag as $tag)
                 <li><a href="javascript:void(0);" data-filter=".{{ $tag->tag }}">{{ $tag->name }}</a></li>
                 @endforeach
             </ul>
              <ul class="gallery">
                @foreach ($media as $item)
                <li class="{{ $item->media_tag->tag }}">
                    <a href="{{ getImage('media', $item->image) }}" data-fancybox>
                        <img src="{{ getImage('media', $item->image) }}" alt="Image">
                        <div class="image-title text-center">
                            <h6>
                                <span>{{ $item->title }}</span><br> <small>{{ \Carbon\Carbon::parse($item->date)->format('d-M-Y') }}</small>
                            </h6>
                        </div>
                    </a>
                </li>
                @endforeach

              </ul>
          </div>
          <!-- end col-12 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>

  @endsection
