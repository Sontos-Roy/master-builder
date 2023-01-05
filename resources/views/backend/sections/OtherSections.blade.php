@extends('backend.layouts.app')

@section('content')
    <div class="container">

        @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
        <div class="d-flex justify-content-between">
            <h4>All Pages Sections</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sections">
                Create Section
              </button>
        </div>
        <br>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Section Name</th>
                        <th scope="col">Section Title</th>
                        <th scope="col">Section Description</th>
                        <th scope="col">Section Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sections_info as $sec_info)

                        <tr class="">
                            <td scope="row">{{ $sec_info->sec_name }}</td>
                            <td scope="row">{{ $sec_info->sec_title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($sec_info->sec_des, 20), '...' }}</td>
                            <td>
                                <img src="{{ asset('images/sections/') }}/{{ $sec_info->section_image }}" alt="" height="100">
                            </td>
                            <td>
                                <a href="{{ route('other_sec.edit', [$sec_info->id]) }}" class="btn btn-info">Edit</a>
                                <form method="post" action="{{route('other_sec.destroy', $sec_info->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
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


    <div class="modal" id="sections">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Create</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form method="POST" action="{{ route('other_sec.store') }}" enctype="multipart/form-data">
                @csrf

                    <div class="mb-3">
                      <label for="" class="form-label">Section Name</label>
                      <select name="sec_name" class="form-control" id="">
                        @foreach ($sec_name as $name)
                            <option value="{{ $name->sec_name }}">{{ $name->sec_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Section Title</label>
                      <input type="text" class="form-control" name="sec_title" id="">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Section Description</label>
                      <textarea type="text" class="form-control" name="sec_des" id=""></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Section Description 2</label>
                      <textarea type="text" class="form-control" name="sec_des2" id=""></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Section Picture</label>
                      <input type="file" class="form-control" name="section_image" id="">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Add Section</button>
                    </div>


                </form>
            </div>

          </div>
        </div>
      </div>

@endsection
