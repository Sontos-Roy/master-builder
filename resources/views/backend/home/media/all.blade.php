@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="text-right">
            <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#Slider">
                Create Slider
              </button>
        </div>



        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Slider Titles</th>
                                <th scope="col">Slider Items</th>
                                <th scope="col">Slider icon</th>
                                <th scope="col">Slider Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Sliders as $Slider)

                                <tr class="">
                                    <td>{{ \Illuminate\Support\Str::limit($Slider->cover_title, 20), '...' }}</td>
                                    <td scope="row">{{ \Illuminate\Support\Str::limit($Slider->cover_des, 20), '...' }}</td>
                                    <td><img src="{{ asset('images/slider/'.$Slider->icon_img) }}" alt="" width="40"></td>
                                    <td><img src="{{ asset('images/slider/'.$Slider->background_image) }}" alt="" width="60"></td>
                                    <td class="d-flex">
                                        <a href="{{ route('home_slider.edit', $Slider->id) }}" class="btn btn-info">Edit</a>

                                        <form method="post" action="{{route('home_slider.destroy', $Slider->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3" class="text-center">There Are No data Available</td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>



        <div class="modal" id="Slider">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('home_slider.store') }}" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-3">
                          <label for="" class="form-label">Slider Title</label>
                          <input type="text" class="form-control" name="cover_title" id="">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Slider Description</label>
                          <input type="text" class="form-control" name="cover_des" id="">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Slider Description 2</label>
                          <input type="text" class="form-control" name="cover_des2" id="">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Add Icon</label>
                          <input type="file" class="form-control" name="icon_img" id="">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Add Slide Background</label>
                          <input type="file" class="form-control" name="background_image" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add Slider</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>
@endsection
