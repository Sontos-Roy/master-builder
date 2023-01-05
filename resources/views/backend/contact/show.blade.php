@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="{{ route('contact.index') }}">< back</a><h5>{{ $contact->name }}'s Information</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name </th>
                                <td> : </td>
                                <td scope="col">{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">contact_no </th>
                                <td> : </td>
                                <td scope="col"><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                            </tr>
                            <tr>
                                <th scope="col">Email </th>
                                <td> : </td>
                                <td scope="col"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                            </tr>
                            <tr>
                                <th scope="col">Message </th>
                                <td> : </td>
                                <td scope="col">{{ $contact->message }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
            <div class="card-footer">
                <form method="post" action="{{route('contact.destroy', $contact->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
