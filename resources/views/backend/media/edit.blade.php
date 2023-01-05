@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <form action="{{ route('media.update', $media->id) }}" method="POST" enctype="multipart/form-data" id="ajax_form">
            @method("PUT")
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Media Title</label>
              <input type="text"
                class="form-control" name="title" id="" placeholder="" value="{{ $media->title }}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Date</label>
              <input type="date"
                class="form-control" name="date" id="" placeholder="" value="{{ $media->date }}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Date</label>
              <select name="media_tag_id" id="" class="form-control">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @if($media->media_tag_id == $tag->id) selected @endif>{{ $tag->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Image</label>
              <input type="file"
                class="form-control" name="image" id="" placeholder="">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>

        </form>
    </div>

@endsection
