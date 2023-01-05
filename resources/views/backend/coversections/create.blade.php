@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <form action="{{ route('coversection.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Page Name</label>
              <select name="page_name" id="" class="form-control">
                @foreach ($pages as $page)
                  <option value="{{ $page->page_name }}">{{ $page->page_name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Cover Title</label>
              <input type="text"
                class="form-control" name="cover_title" id="" placeholder="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Cover decscription 1</label>
              <textarea class="form-control" name="cover_des" id="" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Cover decscription 2</label>
              <textarea class="form-control" name="cover_des2" id="" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Choose Cover Picture</label>
              <input type="file"
                class="form-control" name="background_image" id="" placeholder="">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>

        </form>
    </div>

@endsection
