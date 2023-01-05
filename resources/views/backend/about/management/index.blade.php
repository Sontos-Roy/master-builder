
@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <br>
            <div class="d-flex justify-content-between mb-3 col-12">
                <h3>Member's for Management</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Quat">
                    Create Member
                </button>
            </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Facebook Link</th>
                                <th scope="col">LinkedIn LInk</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($team as $value)

                            <tr class="">
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->designation }}</td>
                                <td>{{ strLimit($value->facebook, 20) }}</td>
                                <td>{{ strLimit($value->linkedin, 20) }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <img src="{{ getImage("management", $value->image) }}" alt="" width="80">
                                </td>
                                <td class="d-flex">
                                    <a href="#value-update{{ $value->id }}" class="btn btn-info" data-toggle="modal">Update</a>

                                    <form method="post" action="{{route('management.destroy', $value->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure')">Delete</button>
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

        @foreach ($team as $value)
        <div class="modal" id="value-update{{ $value->id }}">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('management.update', [$value->id]) }}" enctype="multipart/form-data" id="ajax_form">
                    @method('PUT')
                    @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Member Name</label>
                          <input type="text" class="form-control" name="name" id="" value="{{ $value->name}}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Member Designation</label>
                          <input type="text" class="form-control" name="designation" id="" value="{{ $value->designation }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Facebook Link</label>
                          <input type="text" class="form-control" name="facebook" id="" value="{{ $value->facebook }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">linkedIn Link</label>
                          <input type="text" class="form-control" name="linkedin" id="" value="{{ $value->linkedin }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">E-Mail Address</label>
                          <input type="text" class="form-control" name="email" id="" value="{{ $value->email}}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Image</label>
                          <input type="file" class="form-control" name="image" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update Value</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>
        @endforeach

        <div class="modal" id="Quat">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create Mamber</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('management.store') }}" enctype="multipart/form-data" id="ajax_form">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Member Name</label>
                            <input type="text" class="form-control" name="name" id="">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Member Designation</label>
                            <input type="text" class="form-control" name="designation" id="">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Facebook Link</label>
                            <input type="text" class="form-control" name="facebook" id="">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">linkedIn Link</label>
                            <input type="text" class="form-control" name="linkedin" id="">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">E-Mail Address</label>
                            <input type="text" class="form-control" name="email" id="">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="">
                          </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Create Value</button>
                            </div>


                        </form>
                </div>

              </div>
            </div>
          </div>

@endsection
