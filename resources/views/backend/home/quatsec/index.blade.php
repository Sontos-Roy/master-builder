
@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="text-right">
            <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#Quat">
                Create Quat
              </button>
        </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Person Speech</th>
                                <th scope="col">Person Name</th>
                                <th scope="col">Person Designation</th>
                                <th scope="col">Feature Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($quat != null)

                            <tr class="">
                                <td>{{ $quat->persor_speech }}</td>
                                <td>{{ $quat->persor_name }}</td>
                                <td>{{ $quat->persor_designation }}</td>
                                <td>
                                    <img src="{{ asset('images/feature_image') }}/{{ $quat->feature_image }}" alt="" height="100">
                                </td>
                                <td class="d-flex">
                                    <a href="#quat-update" class="btn btn-info" data-toggle="modal">Update</a>

                                    <form method="post" action="{{route('person_quat.destroy', $quat->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @else
                                    <tr>
                                    <td colspan="3" class="text-center">There Are No data Available</td>
                                </tr>

                            @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <br><br>
        <h4>Quat Section</h4>
        <img src="{{ getImage('info', 'quat.png') }}" alt="" class="col-12">

        @if ($quat != null)
        <div class="modal" id="quat-update">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('person_quat.update', [$quat->id]) }}" enctype="multipart/form-data" id="ajax_form">
                    @method('PUT')
                    @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Title</label>
                          <input type="text" class="form-control" name="persor_speech" id="" value="{{ $quat->persor_speech }}">
                          <input type="hidden" class="form-control" name="id" id="" value="{{ $quat->id }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Count</label>
                          <input type="text" class="form-control" name="persor_name" id="" value="{{ $quat->persor_name }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Count</label>
                          <input type="text" class="form-control" name="persor_designation" id="" value="{{ $quat->persor_designation }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Count</label>
                          <input type="file" class="form-control" name="feature_image" id=""">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update Quat</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>
        @endif

        <div class="modal" id="Quat">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('person_quat.store') }}" enctype="multipart/form-data" id="ajax_form">
                        @csrf
                            <div class="mb-3">
                              <label for="" class="form-label">Quat</label>
                              <input type="text" class="form-control" name="persor_speech" id="">
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label">Person name</label>
                              <input type="text" class="form-control" name="persor_name" id="" >
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label">Person Designation</label>
                              <input type="text" class="form-control" name="persor_designation" id="">
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label">Feature Image</label>
                              <input type="file" class="form-control" name="feature_image" id="">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Create Quat</button>
                            </div>


                        </form>
                </div>

              </div>
            </div>
          </div>

@endsection
