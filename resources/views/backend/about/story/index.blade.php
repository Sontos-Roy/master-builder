@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>

        <div class="d-flex justify-content-between">
            <h4>Story Slider Section</h4>
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
                            <th scope="col"><input type="checkbox" form="bulk_action" id="checkAll"></th>
                            <th scope="col">Slider Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                            @if ($story_slider != null)
                                @forelse ($story_slider as $slider)
                                <tr class="">
                                    <td scope="row" width="50"><input form="bulk_action" type="checkbox" name="mark[]" value="{{$slider->id}}"></td>
                                    <td><img src="{{ getImage('story_slider', $slider->image) }}" alt="" width="200"></td>
                                    <td class="d-flex">
                                        <a href="#gallery{{ $slider->id }}" class="btn btn-info" data-toggle="modal">Edit</a>

                                        <form method="post" action="{{route('story_slider.destroy', $slider->id)}}">
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
                            @else


                            <tr>
                                <td colspan="3" class="text-center">There Are No data Available</td>
                            </tr>

                            @endif
                            <tr>
                                <td colspan="5">
                                    <form action="{{ route('story_slider.multidelete') }}" id="bulk_action" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit" id="delete-btn-all" onclick="return confirm('Are You Sure?')" disabled>Delete Selected</button>
                                    </form>
                                </td>
                            </tr>


                    </tbody>
                </table>
            </div>

        </div>
        <div class="container">
            <h3>For About Page</h3>
            <img src="{{ getImage('info', 'storyslider.png') }}" alt="">
        </div>

        @if ($story_slider !=null)
            @foreach ($story_slider as $slider)
        <div class="modal" id="gallery{{ $slider->id }}">
            <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Update</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                    <div class="modal-body">
                        <form method="POST" action="{{ route('story_slider.update', [$slider->id]) }}" enctype="multipart/form-data" id="ajax_form">
                        @method('PUT')
                        @csrf

                            <div class="mb-3">
                                <label for="" class="form-label">Update Image</label>
                                <input type="file" class="form-control" name="image" id="" value="">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success submit">Update About Slider Image</button>
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
                <form method="POST" action="{{ route('story_slider.store') }}" enctype="multipart/form-data" id="ajax_form">
                    @csrf

                        <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="file" class="form-control" name="image" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success submit">Add About Slider</button>
                        </div>


                    </form>
                </div>

            </div>
            </div>
        </div>

@endsection
