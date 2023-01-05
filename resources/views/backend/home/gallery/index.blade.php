    @extends('backend.layouts.app')

    @section('content')
        <div class="container">
            <br>

            <div class="d-flex justify-content-between">
                <h4>Home Gallery Section</h4>
                <div class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#brandImage">
                        Create Gallery
                    </button>
                </div>
            </div>
            <br>

            <div class="row justify-content-center align-items-center g-2">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Gallery Titles</th>
                                <th scope="col">Gallery Description</th>
                                <th scope="col">Gallery Image 1</th>
                                <th scope="col">Gallery Image 2</th>
                                <th scope="col">Gallery Image 3</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                                @if ($home_gallery != null)
                                    @foreach ($home_gallery as $gallery)
                                    <tr class="">
                                        <td>{{ Strlimit($gallery->title, 20) }}</td>
                                        <td scope="row">{{ Strlimit($gallery->description, 20) }}</td>
                                        <td><img src="{{ getImage('home_gallery', $gallery->image1) }}" alt="" width="60"></td>
                                        <td><img src="{{ getImage('home_gallery', $gallery->image2) }}" alt="" width="60"></td>
                                        <td><img src="{{ getImage('home_gallery', $gallery->image3) }}" alt="" width="60"></td>
                                        <td class="d-flex">
                                            <a href="#gallery{{ $gallery->id }}" class="btn btn-info" data-toggle="modal">Edit</a>

                                            <form method="post" action="{{route('home_gallery.destroy', $gallery->id)}}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
            <h4>For Home Page Gallery Section</h4>
            <img src="{{ getImage('info', 'homegallery.png') }}" alt="" class="col-12">

            @if ($home_gallery !=null)
                @foreach ($home_gallery as $gallery)
            <div class="modal" id="gallery{{ $gallery->id }}">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                        <div class="modal-body">
                            <form method="POST" action="{{ route('home_gallery.update', [$gallery->id]) }}" enctype="multipart/form-data" id="ajax_form">
                            @method('PUT')
                            @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Update Image</label>
                                    <input type="text" class="form-control" name="title" id="" value="{{ $gallery->title }}">
                                    <input type="text" class="form-control" name="description" id="" value="{{ $gallery->description }}">
                                    <input type="file" class="form-control" name="image1" id="" value="">
                                    <input type="file" class="form-control" name="image2" id="" value="">
                                    <input type="file" class="form-control" name="image3" id="" value="">
                                    <input type="hidden" class="form-control" name="id" id="" value="{{ $gallery->id }}">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Update Image</button>
                                </div>


                            </form>
                        </div>

                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        @endif

            <div class="modal" id="brandImage">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Create</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <form method="POST" action="{{ route('home_gallery.store') }}" enctype="multipart/form-data" id="ajax_form">
                        @csrf

                            <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="">
                            <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="">
                            <label for="" class="form-label">Title</label>
                            <input type="file" class="form-control" name="image1" id="">
                            <label for="" class="form-label">Title</label>
                            <input type="file" class="form-control" name="image2" id="">
                            <label for="" class="form-label">Title</label>
                            <input type="file" class="form-control" name="image3" id="">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Add Home Gallery</button>
                            </div>


                        </form>
                    </div>

                </div>
                </div>
            </div>

    @endsection
