@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <form action="{{ url('admin/coversection', [$data->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @method("PUT")
            <div class="mb-3">
              <label for="" class="form-label">Page Name</label>
              <input type="text"
                class="form-control" name="page_name" id="" placeholder="" value="{{ $data->page_name }}">
              <input type="hidden"
                class="form-control" name="id" id="" placeholder="" value="{{ $data->id }}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Cover Title</label>
              <input type="text"
                class="form-control" name="cover_title" id="" placeholder="" value="{{ $data->cover_title }}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Cover decscription 1</label>
              <textarea class="form-control" name="cover_des" id="" rows="3">{{ $data->cover_des }}</textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Cover decscription 2</label>
              <textarea class="form-control" name="cover_des2" id="" rows="3">{{ $data->cover_des2 }}</textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Update Cover Picture</label>
              <input type="file"
                class="form-control" name="background_image" id="" placeholder="">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
            </div>

        </form>
    </div>

@endsection
