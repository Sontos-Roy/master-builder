@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <form action="{{ route('project.update', [$project->id]) }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Project Name</label>
              <input type="text"
                class="form-control" name="project_name" id="" placeholder="" value="{{ $project->project_name }}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Project Address</label>
              <input type="text"
                class="form-control" name="address" id="" placeholder="" value="{{ $project->address }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Project Map</label>
                <input type="text"
                  class="form-control" name="map" id="" placeholder="" value="{{ $project->map }}">
              </div>
            <div class="mb-3">
              <label for="" class="form-label">Project Description</label>
              <textarea class="form-control" name="description" id="summernote" rows="3">{{ $project->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Select Type</label>
                <select class="form-select" name="status" id="" value="{{ $project->status }}">
                  <option value="Under-Constraction" @if ($project->status == 'Under Constraction')
                        selected
                  @endif>Under Constraction</option>
                  <option value="Completed" @if ($project->status == 'Completed')
                    selected
              @endif>Completed</option>
                  <option value="Features" @if ($project->status == 'Features')
                    selected
              @endif>Features</option>
              </select>
              </div>
            <div class="mb-3">
              <label for="" class="form-label">Update Date</label>
              <input type="date"
                class="form-control" name="date" id="" placeholder="" value="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Choose Project Picture</label>
              <input type="file"
                class="form-control" name="Image" id="" placeholder="" value="">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>

        </form>
    </div>

@endsection
