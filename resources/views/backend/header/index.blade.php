@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>



        <div class="d-flex justify-content-between">
                <h3>Header Section</h3>
                <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#header">
                    Create Header Info
                  </button>
        </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Logo</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                            @if ($header != null)
                                @foreach ($header as $section)
                                <tr class="">
                                    <td><img src="{{ getImage('header', $section->logo) }}" alt="" height="60"></td>
                                    <td>{{ $section->phone }}</td>
                                    <td>{{ $section->email }}</td>

                                    <td class="d-flex">
                                        <a href="#header{{ $section->id }}" class="btn btn-info" data-toggle="modal">Edit</a>

                                        <form method="post" action="{{route('header.destroy', $section->id)}}">
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
        <h3 class="text-start">For All Pages Header</h3>
        <img src="{{ getImage('info', 'header.png') }}" alt="" class="col-12">



        @if ($header !=null)
             @foreach ($header as $section)
            <div class="modal" id="header{{ $section->id }}">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                        <div class="modal-body">
                            <form method="POST" action="{{ route('header.update', [$section->id]) }}" enctype="multipart/form-data" id="ajax_form">
                            @method('PUT')
                            @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Phone No. </label>
                                    <input type="text" class="form-control" name="phone" id="" value="{{ $section->phone }}">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="" value="{{ $section->email }}">
                                    <label for="" class="form-label">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="" value="{{ $section->logo }}">

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

        <div class="modal" id="header">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('header.store') }}" enctype="multipart/form-data"  id="ajax_form">
                    @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add Header</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>


</div>
</div>
@endsection

@section('footer-script')



@endsection
