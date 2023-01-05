
@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="text-right">
            <div class="d-flex justify-content-between">
                <h3>Core Values Section</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Quat">
                    Create Core Values
                  </button>
            </div>
        </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Value Title</th>
                                <th scope="col">Value Description</th>
                                <th scope="col">Value Icon</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($corevalues as $value)

                            <tr class="">
                                <td>{{ $value->value }}</td>
                                <td>{{ $value->value_des }}</td>
                                <td>
                                    <img src="{{ getImage("corevalues", $value->icon) }}" alt="" width="60">
                                </td>
                                <td class="d-flex">
                                    <a href="#value-update{{ $value->id }}" class="btn btn-info" data-toggle="modal">Update</a>

                                    <form method="post" action="{{route('corevalues.destroy', $value->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
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

        @foreach ($corevalues as $value)
        <div class="modal" id="value-update{{ $value->id }}">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Core Value Update</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('corevalues.update', [$value->id]) }}" enctype="multipart/form-data" id="ajax_form">
                    @method('PUT')
                    @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Value Title</label>
                          <input type="text" class="form-control" name="value" id="" value="{{ $value->value }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Value Description</label>
                          <input type="text" class="form-control" name="value_des" id="" value="{{ $value->value_des }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Value Icon</label>
                          <input type="file" class="form-control" name="icon" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success submit">Update Value</button>
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
                  <h4 class="modal-title">Create Core Value</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('corevalues.store') }}" enctype="multipart/form-data" id="ajax_form">
                        @csrf
                            <div class="mb-3">
                              <label for="" class="form-label">Value</label>
                              <input type="text" class="form-control" name="value" id="">
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label">Description</label>
                              <input type="text" class="form-control" name="value_des" id="" >
                            </div>
                            <div class="mb-3">
                              <label for="" class="form-label">Value Icon</label>
                              <input type="file" class="form-control" name="icon" id="">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success submit">Create Value</button>
                            </div>


                        </form>
                </div>

              </div>
            </div>
          </div>

@endsection
