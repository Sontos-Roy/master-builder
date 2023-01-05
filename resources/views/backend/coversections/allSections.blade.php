@extends('backend.layouts.app')

@section('content')
    <div class="container">
            <div class="d-flex justify-content-between">
                <h4>Page Cover Section</h4>
                <a href="{{ url('admin/coversection/create') }}" class="btn btn-info">Create Cover</a>
            </div>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Page Name</th>
                        <th scope="col">Cover Title</th>
                        <th scope="col">description</th>
                        <th scope="col">description 2</th>
                        <th scope="col">image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cover_section as $sections)

                        <tr class="">
                            <td scope="row">{{ $sections->page_name }}</td>
                            <td>{{ $sections->cover_title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($sections->cover_des, 20), '...' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($sections->cover_des2, 20), '...' }}</td>
                            <td><img src="{{ asset('images/cover') }}/{{ $sections->background_image }}" alt="" height="50"></td>
                            <td><a href="{{ route('coversection.edit', $sections->id) }}" class="btn btn-info">Edit</a></td>
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
    <br>
    <br>
    <h4>For All Pages Cover Section</h4>
    <img src="{{ getImage('info', 'pagecover.png') }}" alt="" class="col-12">

@endsection
