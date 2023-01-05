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
                                <th scope="col">Email </th>
                                <td> : </td>
                                <td scope="col">{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Password </th>
                                <td> : </td>
                                <td scope="col">******* <a href="{{ route('change-password', $data->id) }}">Change Password</a></td>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
            <div class="card-footer d-flex">
                <a href="#edit" data-toggle="modal" class="btn btn-sm btn-info mr-3">Edit Profile</a>
            </div>
        </div>
    </div>
    <div class="modal" id="edit">
        <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Update</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->

                <div class="modal-body">
                    <form method="POST" action="{{ route('profile.update', [$data->id]) }}">
                    @method('PUT')
                    @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" id="" value="{{ $data->name}}">
                            <input type="text" class="form-control" name="email" id="" value="{{ $data->email }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>


                    </form>
                </div>

                </div>
            </div>
        </div>

    </div>
    <div class="modal" id="password">
        <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Update</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->

                <div class="modal-body">
                    <form method="POST" action="{{ route('profile.update', [$data->id]) }}">
                    @method('PUT')
                    @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" name="password" id="">

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>


                    </form>
                </div>

                </div>
            </div>
        </div>

    </div>
@endsection
