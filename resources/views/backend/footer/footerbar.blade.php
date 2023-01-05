@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>



        <div class="d-flex justify-content-between">
            <h3>Footer Main Section </h3>
            <div class="text-right">
                <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#footermain">
                    Create Footer Main Info
                  </button>
            </div>
        </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Logo</th>
                            <th scope="col">Description</th>
                            <th scope="col">Phone 1</th>
                            <th scope="col">Phone 2</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                            @if ($footerMain != null)
                                @foreach ($footerMain as $section)
                                <tr class="">
                                    <td><img src="{{ getImage('footer', $section->logo) }}" alt="" height="60"></td>
                                    <td>{{ $section->description }}</td>
                                    <td>{{ $section->phone1 }}</td>
                                    <td>{{ $section->phone2 }}</td>
                                    <td>{{ $section->email }}</td>

                                    <td class="d-flex">
                                        <a href="#footermain{{ $section->id }}" class="btn btn-info" data-toggle="modal">Edit</a>

                                        <form method="post" action="{{route('footer_main.destroy', $section->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else


                            <tr>
                                <td colspan="3" class="text-center">There Are No data Available</td>
                            </tr>

                            @endif


                    </tbody>
                </table>
            </div>

        </div>
        <br><br>
        <h3>For All Pages Footer</h3>
        <img src="{{ getImage('info', 'footer.png') }}" alt="" class="col-12">

    @if ($footerMain !=null)
             @foreach ($footerMain as $section)
            <div class="modal" id="footermain{{ $section->id }}">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                        <div class="modal-body">
                            <form method="POST" action="{{ route('footer_main.update', [$section->id]) }}" enctype="multipart/form-data" id="ajax_form">
                            @method('PUT')
                            @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Footer Description</label>
                                    <input type="text" class="form-control" name="description" id="" value="{{ $section->description }}">
                                    <label for="" class="form-label">Footer Phone 1</label>
                                    <input type="text" class="form-control" name="phone1" id="" value="{{ $section->phone1 }}">
                                    <label for="" class="form-label">Footer Phone 2</label>
                                    <input type="text" class="form-control" name="phone2" id="" value="{{ $section->phone2 }}">
                                    <label for="" class="form-label">Footer Email</label>
                                    <input type="email" class="form-control" name="email" id="" value="{{ $section->email }}">
                                    <label for="" class="form-label">Footer Logo</label>
                                    <input type="file" class="form-control" name="logo" id="">

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Update Header</button>
                                </div>


                            </form>
                        </div>

                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        @endif

        <div class="modal" id="footermain">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('footer_main.store') }}" enctype="multipart/form-data" id="ajax_form">
                    @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Footer Description</label>
                            <input type="text" class="form-control" name="description" id="">
                            <label for="" class="form-label">Footer Phone 1</label>
                            <input type="text" class="form-control" name="phone1" id="">
                            <label for="" class="form-label">Footer Phone 2</label>
                            <input type="text" class="form-control" name="phone2" id="">
                            <label for="" class="form-label">Footer Email</label>
                            <input type="email" class="form-control" name="email" id="">
                            <label for="" class="form-label">Footer Logo</label>
                            <input type="file" class="form-control" name="logo" id="">

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add Footer</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>



</div>
@endsection
