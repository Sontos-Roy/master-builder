@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>

        <div class="d-flex justify-content-between">
            <div class="text-right">
                <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#brandImage">
                    Create Image
                  </button>
            </div>
            <div class="text-right">
                <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#brandImage-update">
                    Update Image
                  </button>
            </div>
        </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">
            @if ($brand_image != null)
            <div class="col-12">
                <img src="{{ url('images/brandImage') }}/{{ $brand_image->brandImage }}" alt="" class="col-12">

            </div>
            <form method="post" action="{{route('brandimage.destroy', $brand_image->id)}}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
            </form>
            @else
            <h4>After Gallery Slide Section</h4>
            <img src="{{ getImage('info', 'brand.png') }}" alt="" class="col-12">
            @endif
        </div>

        <div class="modal" id="brandImage-update">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Update</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                @if ($brand_image !=null)
                <div class="modal-body">
                    <form method="POST" action="{{ route('brandimage.update', [$brand_image->id]) }}" enctype="multipart/form-data" id="ajax_form">
                      @method('PUT')
                      @csrf

                          <div class="mb-3">
                            <label for="" class="form-label">Update Image</label>
                            <input type="file" class="form-control" name="brandImage" id="" value="">
                            <input type="hidden" class="form-control" name="id" id="" value="{{ $brand_image->id }}">
                          </div>
                          <div class="mb-3">
                              <button type="submit" class="btn btn-success">Update Image</button>
                          </div>


                      </form>
                  </div>

                @endif

              </div>
            </div>
          </div>

    </div>

        <div class="modal" id="brandImage">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('brandimage.store') }}" enctype="multipart/form-data" id="ajax_form">
                    @csrf

                        <div class="mb-3">
                          <label for="" class="form-label">Add Banner Image</label>
                          <input type="file" class="form-control" name="brandImage" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add Brand Image</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>
@endsection
