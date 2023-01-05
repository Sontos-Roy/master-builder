@extends('frontend.layouts.app')

@section('main-content')

<header class="slider">
    <div class="slider-container">
      <div class="swiper-wrapper">
        @forelse ($sliders as $slider)
        <div class="swiper-slide" data-background="{{ asset('images/slider/'. $slider->background_image) }}" data-stellar-background-ratio="1.15">
            <div class="container">
              <h1><span>{{ $slider->cover_title }}</span></h1>
              <h2>{{ $slider->cover_des }}</h2>
              <h2>{{ $slider->cover_des2 }}</h2>
              <figure><img src="{{ asset('images/slider/'.$slider->icon_img) }}" alt="Image"></figure>
            </div>
            <!-- end container -->
          </div>
        @empty
        <div class="swiper-slide" data-background="{{ asset('frontend/images/slide02.jpg') }}" data-stellar-background-ratio="1.15">
            <div class="container">
              <h1><span>Master Builder</span> Elite Residences</h1>
              <h2>We build your dream house</h2>
              <figure><img src="{{ asset('frontend/images/services-icon07.png') }}" alt="Image"></figure>
            </div>
            <!-- end container -->
          </div>

        @endforelse
        <!-- end swiper-slide -->

        <!-- end swiper-slide -->
      </div>
      <!-- Add Pagination -->
      <div class="inner-elements">
        <div class="container">
          <!-- <div class="pagination"></div> -->
          <!-- end pagination -->
          <div class="button-prev">PREV</div>
          <!-- end button-prev -->
          <div class="button-next">NEXT</div>
          <!-- end button-next -->
          <div class="social-media">
            <h6>SOCIAL MEDIA</h6>
            <ul>
              <li><a href="{{ ($social->facebook) ? $social->facebook : '#' }}"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="{{ ($social->twitter) ? $social->twitter : '#' }}"><i class="fab fa-twitter"></i></a></li>
              <li><a href="{{ ($social->googleplus) ? $social->googleplus : '#' }}"><i class="fab fa-google"></i></a></li>
              <li><a href="{{ ($social->youtube) ? $social->youtube : '#' }}"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
          <!-- end social-media -->
        </div>
        <!-- end container -->
      </div>
      <!-- end inner-elements -->
    </div>
    <!-- end slider-container -->
  </header>
  <!-- end slider -->
  @if ($brand_image)
  <section class="intro">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <figure>
            <div class="pattern-bg" data-stellar-ratio="1.07"></div>
            <!-- end pattern-bg -->
            <div class="holder" data-stellar-ratio="1.10"> <img src="{{ getImage('brandImage',$brand_image->brandImage) }}" alt="Image" class="p-"></div>
            <!-- end holder -->
          </figure>
        </div>
        <!-- edn col-6 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  @endif
  <!-- end intro -->
  <!-- end logos -->
  @if ($progress_sec != null)
  <section class="benefits">
    <div class="container">
      <div class="row">
        <div class="col-12 wow fadeInUp">
          <h4>{!! $progress_sec->sec_title !!}</h4>
          <h3>{!! $progress_sec->sec_des !!}</h3>
        </div>
        <!-- end col-12 -->
        @foreach ($progress_counter as $progress)
        <div class="col wow fadeInUp" data-wow-delay="0s">
            <figure> <img src="{{ getImage('progress', $progress->progress_icon) }}" alt="Image"> <b></b> </figure>
            <h6>{{ $progress->progress_title }}</h6>
            <span class="odometer" data-count="{{ $progress->no_of_progress }}" data-status="yes">0</span> <span class="extra">Years</span> </div>
        @endforeach

        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  @endif
  <!-- end benefits -->
  @if ($home_gallery != null)
  <section class="recent-gallery">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 wow fadeInUp">
          <h4>{!! $home_gallery->title !!}</h4>
          <h3>{{ $home_gallery->description }}</h3>
          <a href="{{ url('media') }}" class="link">SEE ALL GALLERY <i class="fas fa-caret-right"></i></a> </div>
        <!-- end col-5 -->
        <div class="col-lg-7">
          <div class="row inner">
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0s">
              <figure data-stellar-ratio="1.07"> <a href="{{ getImage('home_gallery', $home_gallery->image1) }}" data-fancybox><img src="{{ getImage('home_gallery', $home_gallery->image1) }}" alt="Image"></a> </figure>
            </div>
            <!-- end col-4 -->
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.05s">
              <figure data-stellar-ratio="1.15"> <a href="{{ getImage('home_gallery', $home_gallery->image2) }}" data-fancybox><img src="{{ getImage('home_gallery', $home_gallery->image2) }}" alt="Image"></a> </figure>
            </div>
            <!-- end col-4 -->
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.10s">
              <figure data-stellar-ratio="1.04"> <a href="{{ getImage('home_gallery', $home_gallery->image3) }}" data-fancybox><img src="{{ getImage('home_gallery', $home_gallery->image3) }}" alt="Image"></a> </figure>
            </div>
            <!-- end col-4 -->
          </div>
          <!-- end row -->
        </div>
        <!-- end col-7 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  @endif
  <!-- end recent-gallery -->

  <!-- end property-calculator -->
  @if ($design)
  <section class="property-plans">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 wow fadeInUp">
          <h4>{!! $design->sec_title !!}</h4>
          <h3>{{ $design->sec_des }}</h3>
          @if ($flat_sec != null)
            <p>{{ $flat_sec->description }}</p>
          @endif
          <table>
            @if ($flat_sec != null)
            <tbody>
                <tr>
                  <td>Total area:</td>
                  <td>{{ $flat_sec->total_area }}</td>
                </tr>
                <tr>
                  <td>Total Floor:</td>
                  <td>{{ $flat_sec->total_floor }}</td>
                </tr>
                <tr>
                  <td>Parking Lot:</td>
                  <td>{{ $flat_sec->parking_lot }}</td>
                </tr>
                <tr>
                  <td>Social Area:</td>
                  <td>{{ $flat_sec->social_area }}</td>
                </tr>
              </tbody>
            @endif
          </table>
        </div>
        <!-- end col-6 -->
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.05s">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @foreach ($roomDesign as $key=>$room)
                <li class="nav-item"> <a class="nav-link {{ $key == 0 ? 'active': '' }}" data-toggle="pill" href="#room{{ $room->id }}" role="tab">{{ $room->room_name }} {{ $room->room_size }}</a> </li>
            @endforeach
          </ul>
          <div class="tab-content">
            @foreach ($roomDesign as $key=>$item)
                <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="room{{ $item->id }}">
                <figure><img src="{{ getImage('rooms', $item->room_design) }}" alt="Image"></figure>
                </div>
            @endforeach

            <!-- end tab-pane -->
          </div>
          <!-- end tab-contnet -->
        </div>
        <!-- end col-6 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  @endif
  <!-- property-plans -->
  @if ($quat_sec)
  <section class="get-consultation" data-background="{{ asset('frontend/images/section-bg01.jpg') }}" data-stellar-background-ratio="0.9">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 fadeInUp wow">
          <div class="content-box" style="width: 100%;">
            <div class="col-lg-6 col-md-9 col-12 m-auto ">
              <div class="image-box rounded-circle overflow-hidden mb-3">
                <img src="{{ getImage('feature_image', $quat_sec->feature_image) }}" alt="">
              </div>
            </div>
            <h3 class="col-lg-7 col-md-8 col-12 quat">
              <i>
                “ {{ $quat_sec->persor_speech }} ”
              </i>
            </h3>
            <div class="text-right col-12 ms-auto person-details">
              <h2>
                - {{ $quat_sec->persor_name }}
              </h2>
              <h5>
                {{ $quat_sec->persor_designation }}
              </h5>
            </div>
          <!-- end content-box -->
        </div>
        <!-- end col-6 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  @endif
  <!-- end get-consultation -->

  @if ($featured_project_sec)
    <section class="recent-posts">
        <div class="container">
          <div class="row">
            <div class="col-12 wow fadeInUp">
              <h4>{!! $featured_project_sec->sec_title !!}</h4>
              <small>{{ $featured_project_sec->sec_des }} </small> </div>
            <!-- end col-12 -->
                @foreach ($feature_project as $projects)
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0s">
                    <div class="post-box">
                    <figure> <img src="{{ getImage('project', $projects->Image) }}" alt="Image"> </figure>
                    <span>{{ \Carbon\Carbon::parse($projects->date)->format('d/m/Y') }}</span>
                    <p class="bg-info text-light p-1 pr-3 pl-3 mb-2">{{ $projects->address }}</p>
                    <h6 class="col-12 pl-0 text-secondary"><a href="#">{{ $projects->project_name }} </a></h6>
                    <p class="text-muted">{{ strLimit($projects->description, 40) }}</p>
                    </div>
                    <!-- end post-box -->
                </div>
                @endforeach

                            <!-- end col-4 -->
                            <div class="col-12 text-center mt-lg-5 mt-3">
                              <a href="{{ url('/properties') }}" class="link btn btn-outline-info btn-sm">Explore All <i class="fas fa-caret-right"></i></a>
                            </div>
                          </div>
                          <!-- end row -->
                        </div>
                        <!-- end container -->
                      </section>
            @endif
  @if ($recent_projects_sec)
  <section class="recent-posts">
        <div class="container">
          <div class="row">
            <div class="col-12 wow fadeInUp">
              <h4>{!! $recent_projects_sec->sec_title !!}</h4>
              <small>{{ $recent_projects_sec->sec_des }} </small> </div>
            <!-- end col-12 -->
                @foreach ($recent_project as $projects)
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0s">
                    <div class="post-box">
                    <figure> <img src="{{ getImage('project', $projects->Image) }}" alt="Image"> </figure>
                    <span>{{ \Carbon\Carbon::parse($projects->date)->format('d/m/Y') }}</span>
                    <p class="bg-info text-light p-1 pr-3 pl-3 mb-2">{{ $projects->address }}</p>
                    <h6 class="col-12 pl-0 text-secondary"><a href="#">{{ $projects->project_name }} </a></h6>
                    <p class="text-muted">{{ strLimit($projects->description, 40) }}</p>
                    </div>
                    <!-- end post-box -->
                </div>
                @endforeach
                <!-- end col-4 -->
                <div class="col-12 text-center mt-lg-5 mt-3">
                  <a href="{{ url('/properties') }}" class="link btn btn-outline-info btn-sm">Explore All <i class="fas fa-caret-right"></i></a>
                </div>
              </div>
              <!-- end row -->
            </div>
            <!-- end container -->
          </section>
            @endif


  @if ($invite)
      <!-- end recent-posts -->
  <section class="property-customization pt-1 pb-1">
    <div class="video-bg">
      <video src="{{ asset('frontend/videos/video01.mp4') }}" loop autoplay muted></video>
    </div>
    <!-- end video-bg -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 wow fadeInUp text-center">
          <h4>{{ $invite->sec_title }}</h4>
          <h3>{{ $invite->sec_des }}</h3>
        </div>
        <!-- end col-12 -->
        <div class="col-lg-4 text-lg-right">
          <h5 class="p-2">In-time hand over</h5>
          <h5 class="p-2">High-valuation</h5>
          <h5 class="p-2">No project-delay</h5>
          <h5 class="p-2">Quality construction</h5>
          <h5 class="p-2">Maximum ROI</h5>
          <h5 class="p-2">Hassle free development</h5>
        </div>
        <div class="col-lg-1 col-6 text-center">
          <img src="{{ asset('frontend/assets/images/Clip_ea.png') }}" alt="">
        </div>
        <div class="col-lg-1 col-6 text-center">
            <img src="{{ asset('frontend/assets/images/Clip_d.png') }}" alt="">
        </div>
        <div class="col-lg-4">
          <h5>Are you planning to develop your land?</h5>
          <h6 class="mt-2 col-10 p-0">You are invited to discuss
            about it with our experts
            over a cup of tea.</h6>
            <h3 class="text-info message alert"></h3>
            <form action="{{ route('invitation.store') }}" method="POST" id="ajax_form">
                @csrf
              <h5>Landowners Information</h5>
              <div class="mb-3 floating">
                <label for="">Your Name</label>
                <input type="text" name="name" class="form-control bg-transparent text-light" placeholder="Your Name">
              </div>
              <div class="mb-3 floating">
                <label for="">Contact No.</label>
                <input type="text" name="contact_no" class="form-control bg-transparent text-light" placeholder="Contact No">
              </div>
              <h5>Land Information</h5>
              <div class="mb-3 floating">
              <label for="">Address</label>
              <input type="text" name="address" class="form-control bg-transparent text-light" placeholder="Address">
              </div>
              <div class="mb-3 floating">
              <label for="">Land Size</label>
              <input type="text" name="land_size" class="form-control bg-transparent text-light" placeholder="Land Size">
              </div>

              <button class="btn btn-outline-info btn-sm" type="submit">Submit</button>

            </form>

        </div>

      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  @endif
  <!-- end property-customization -->
  @if ($member != null)
  <section class="certificates">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12 wow fadeInUp text-center">
          <h4>{{ $member->sec_title }}</h4>
          <small>{{ $member->sec_des }} </small> </div>
        <!-- end col-5 -->
        <div class="col-lg-4 col-md-8 col-sm-12 col-11 m-auto text-center wow fadeInUp" data-wow-delay="0.05s">
          <div> <a href="{{ getImage('sections', $member->section_image) }}" data-fancybox><img src="{{ getImage('sections', $member->section_image) }}" alt="Image"></a> </div>
        </div>

        <!-- end col-3 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  @endif

@endsection
