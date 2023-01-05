@extends('backend.layouts.app')

@section('content')
    <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <form action="" method="GET" class="d-flex">
                    <div class="form-group">
                        <input type="search" name="search" id="" class="form-control" placeholder="Search Here" value="{{ $search }}">
                      </div>
                      <div class="form-group">
                        <button class="btn btn-success ml-2" type="submit">Search</button>
                      </div>
                </form>
                <a href="{{ route('media.create') }}" class="btn btn-info mb-2">Create Gallery</a>

            </div>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">date</th>
                        <th scope="col">Tab Class</th>
                        <th scope="col">image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gallery as $data)
                        <tr class="">
                            <td scope="row">{{ $data->title }}</td>
                            <td>{{ $data->date }}</td>
                            <td>{{ $data->media_tag->tag }}</td>
                            <td><img src="{{ getImage('media', $data->image) }}" alt="" height="80"></td>
                            <td class="d-flex"><a href="{{ route('media.edit', $data->id) }}" class="btn btn-info btn-sm mr-2">Update</a>
                                <form method="POST" action="{{route('media.destroy', $data->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
        <div class="row justify-content-center">{{ $gallery->links('pagination::bootstrap-4') }}</div>

    </div>

@endsection
