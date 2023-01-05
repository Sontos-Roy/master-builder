@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="{{ route('invitation.index') }}">< back</a><h5>{{ $data->name }}'s Information</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name </th>
                                <td> : </td>
                                <td scope="col">{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">contact_no </th>
                                <td> : </td>
                                <td scope="col">{{ $data->contact_no }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Address </th>
                                <td> : </td>
                                <td scope="col">{{ $data->address }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Land Size </th>
                                <td> : </td>
                                <td scope="col">{{ $data->land_size }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
            <div class="card-footer">
                <form method="post" action="{{route('invitation.destroy', $data->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
