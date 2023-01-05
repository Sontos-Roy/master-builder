@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data" id="ajax_form">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Project Name</label>
              <input type="text"
                class="form-control" name="project_name" id="" placeholder="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Project Address</label>
              <input type="text"
                class="form-control" name="address" id="" placeholder="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Project Map</label>
              <input type="text"
                class="form-control" name="map" id="" placeholder="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Project Description</label>
              <textarea class="form-control" name="description" id="" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Select Type</label>
              <select class="form-select" name="status" id="">
                <option selected>Select one</option>
                <option value="Under-Constraction">Under Constraction</option>
                <option value="Completed">Completed</option>
                <option value="Future">Future</option>
            </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Provide a Date</label>
              <input type="date"
                class="form-control" name="date" id="" placeholder="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Choose Project Picture</label>
              <input type="file"
                class="form-control" name="Image" id="" placeholder="">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>

        </form>
    </div>

@endsection
