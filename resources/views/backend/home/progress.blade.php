@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h4>All Progresses</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#progress">
                Create Progress
              </button>
        </div>
          <br>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Progress Titles</th>
                                <th scope="col">Progress Items</th>
                                <th scope="col">Progress Icon</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($progresses as $progress)

                                <tr class="">
                                    <td>{{ $progress->progress_title }}</td>
                                    <td scope="row">{{ $progress->no_of_progress }}</td>
                                    <td scope="row">
                                        <img src="{{ asset('images/progress/') }}/{{ $progress->progress_icon }}" alt="" height="60">
                                    </td>
                                    <td class="d-flex">
                                        <a href="#progress-update{{ $progress->id }}" class="btn btn-info" data-toggle="modal">Update</a>

                                        <form method="post" action="{{route('progress.destroy', $progress->id)}}">
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
        <br><br>
        <h4>For Progress Section</h4>
        <img src="{{ getImage('info', 'progress.png') }}" alt="" class="col-12">

        @foreach ($progresses as $progre)
        <div class="modal" id="progress-update{{ $progre->id }}">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('progress.update', [$progre->id]) }}" enctype="multipart/form-data" id="ajax_form">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Title</label>
                          <input type="text" class="form-control" name="progress_title" id="" value="{{ $progre->progress_title }}">
                          <input type="hidden" class="form-control" name="id" id="" value="{{ $progre->id }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Count</label>
                          <input type="text" class="form-control" name="no_of_progress" id="" value="{{ $progre->no_of_progress }}">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Count</label>
                          <input type="file" class="form-control" name="progress_icon" id="" value="{{ $progress->progress_icon }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update Progress</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>
        @endforeach

        <div class="modal" id="progress">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('progress.store') }}" enctype="multipart/form-data" id="ajax_form">
                    @csrf

                        <div class="mb-3">
                          <label for="" class="form-label">Progress Title</label>
                          <input type="text" class="form-control" name="progress_title" id="">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Count</label>
                          <input type="text" class="form-control" name="no_of_progress" id="">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Progress Icon</label>
                          <input type="file" class="form-control" name="progress_icon" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add Progress</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
