@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h4>All Projects</h4>
            <a href="{{ url('admin/project/create') }}" class="btn btn-info">Create Project</a>
        </div>
        <br>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Project Name</th>
                        <th scope="col">Project Area</th>
                        <th scope="col">Project Description</th>
                        <th scope="col">Project Type</th>
                        <th scope="col">Project Map</th>
                        <th scope="col">Project Date</th>
                        <th scope="col">Project Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)

                        <tr class="">
                            <td scope="row">{{ $project->project_name }}</td>
                            <td>{{ $project->address }}</td>
                            <td>{{ strLimit($project->description, 20) }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ strLimit($project->map, 20) }}</td>
                            <td>{{ $project->date }}</td>
                            <td><img src="{{ asset('images/project') }}/{{ $project->Image }}" alt="" height="50"></td>
                            <td>
                                <a href="{{ route('project.edit', [$project->id]) }}">Update</a>
                                <form method="post" action="{{route('project.destroy', $project->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
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

    </div>

@endsection
