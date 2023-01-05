@extends('backend.layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('other_sec.update', [$section_info->id]) }}" enctype="multipart/form-data">
        @method("PUT")
        @csrf
            <div class="mb-3">
              <label for="" class="form-label">Section Name</label>
              <select name="sec_name" id="" class="form-control">
                @foreach ($sec_name as $sec)
                    <option value="{{ $sec->sec_name }}" {{ $sec->sec_name == $section_info->sec_name ? "selected": ""}}>{{ $sec->sec_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Section Title</label>
              <input type="text" class="form-control" name="sec_title" id="" value="{{ $section_info->sec_title }}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Section Description</label>
              <textarea type="text" class="form-control" name="sec_des" id="">{{ $section_info->sec_des }}</textarea>
            <div class="mb-3">
              <label for="" class="form-label">Section Description 2</label>
              <textarea type="text" class="form-control" name="sec_des2" id="">{{ $section_info->sec_des2 }}</textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Section Picture</label>
              <input type="file" class="form-control" name="section_image" id="">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Update Section</button>
            </div>


        </form>
</div>

@endsection
