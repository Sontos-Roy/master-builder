@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="{{ route('invitation.index') }}">< back</a><h5>Password Change</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('profile.password') }}" id="ajax_form">
                        @csrf

                            <div class="mb-3">
                                <label for="">Old Password</label>
                                <input type="text" class="form-control" name="oldPassword" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">New Password</label>
                                <input type="text" class="form-control" name="password" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Retype Password</label>
                                <input type="text" class="form-control" name="confirm_password" id="">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Change Password</button>
                            </div>


                        </form>
                </div>

            </div>
        </div>
    </div>


@endsection
