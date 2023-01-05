@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="d-flex justify-content-between">
            <h3>All Contact List {{ $counts->count() }}</h3>
            <form action="" method="GET" class="d-flex justify-content-right">
                    <div class="form-group">
                        <input type="search" name="search" id="" class="form-control" placeholder="Search Here" value="{{ $search }}">
                      </div>
                      <div class="form-group">
                        <button class="btn btn-success ml-2" type="submit">Search</button>
                        <a href="{{ route('contact.index') }}" class="btn btn-info">Reset</a>
                      </div>
                </form>

        </div>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" form="bulk_action" id="checkAll"></th>
                        <th scope="col">S.L.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Send at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $index=>$contact)

                        <tr class="">
                            <td scope="row" width="50"><input form="bulk_action" type="checkbox" name="mark[]" value="{{$contact->id}}"></td>
                            <td scope="row"> {{ $index+1 }}</td>
                            <td>{{ strLimit($contact->name, 15) }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ strLimit($contact->email, 20) }}</td>
                            <td>{{ strLimit($contact->message, 16) }}</td>
                            <td>{{ $contact->created_at->diffForHumans() }}</td>
                            <td class="d-flex">
                                <a href="{{ route('contact.show', [$contact->id]) }}" class="btn btn-sm btn-info">View</a>
                                <form method="post" action="{{route('contact.destroy', $contact->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">There Are No Data</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="5">
                            <form action="{{ route('contact.multidelete') }}" id="bulk_action" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit" id="delete-btn-all" onclick="return confirm('Are You Sure?')" disabled>Delete Selected</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="row justify-content-center">
                {{ $contacts->links('pagination::bootstrap-4') }}
            </div>
        </div>


    </div>


@endsection
@section('footer-script')
    
@endsection
