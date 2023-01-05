@extends('backend.layouts.app')

@section('content')
    <div class="container">


                  <form method="POST" action="{{ route('home_slider.update', [$slider->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="" class="form-label">Slider Title</label>
                        <input type="text" class="form-control" name="cover_title" id="" value="{{ $slider->cover_title }}">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Slider Description</label>
                        <input type="text" class="form-control" name="cover_des" id="" value="{{ $slider->cover_des }}">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Slider Description 2</label>
                        <input type="text" class="form-control" name="cover_des2" id="" value="{{ $slider->cover_des2 }}">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Update Icon</label>
                        <input type="file" class="form-control" name="icon_img" id="">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Update Slide Background</label>
                        <input type="file" class="form-control" name="background_image" id="">
                      </div>
                      <div class="mb-3">
                          <button type="submit" class="btn btn-success">Update Slider</button>
                      </div>


                    </form>
                </div>


@endsection
