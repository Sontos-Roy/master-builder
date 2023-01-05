@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3">
            <h3>About Short Section</h3>
            <a href="#section" class="btn btn-info" data-toggle="modal">Create Section</a>
        </div>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aboutshortsec as $sections)

                        <tr class="">
                            <td scope="row">{{ $sections->title }}</td>
                            <td scope="row">{{ $sections->description }}</td>
                            <td class="d-flex"><a href="#section{{ $sections->id }}" data-toggle="modal" class="btn btn-info">Update</a>
                                <form action="{{ route('aboutshortsec.destroy', $sections->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger" onclick="return confirm('Are you Sure')" type="submit">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">There Are No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    @foreach ($aboutshortsec as $section)
    <div class="modal" id="section{{ $section->id }}">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Section</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form method="POST" action="{{ route('aboutshortsec.update', $section->id) }}" id="ajax_form">
                @method('PUT')
                @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="" value="{{ $section->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $section->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success submit">Update Section</button>
                    </div>


                </form>
            </div>

          </div>
        </div>
      </div>
    @endforeach

    <div class="modal" id="section">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Create Section</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form method="POST" action="{{ route('aboutshortsec.store') }}" id="ajax_form">
                @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success submit">Add Section</button>
                    </div>


                </form>
            </div>

          </div>
        </div>
      </div>

@endsection
