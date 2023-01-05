@extends('backend.layouts.app')

@section('content')
    <div class="container card">
        <br>
        <br>
        <div class="card-header d-flex justify-content-between">
            <h4>All Invitations</h4>
            <form action="" method="GET" class="d-flex justify-content-right">
                <div class="form-group">
                    <input type="search" name="search" id="" class="form-control" placeholder="Search Here" value="{{ $search }}">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-success ml-2" type="submit">Search</button>
                    <a href="{{ route('invitation.index') }}" class="btn btn-info">Reset</a>
                  </div>
            </form>
        </div>
        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <td><input type="checkbox" form="bulk_action" id="checkAll"></td>
                        <th scope="col">S.L.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Address</th>
                        <th scope="col">Land Size</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invites as $index=>$invite)

                        <tr class="">
                            <td scope="row" width="50"><input form="bulk_action" type="checkbox" name="mark[]" value="{{$invite->id}}"></td>
                            <td scope="row">{{ $index+1 }}</td>
                            <td>{{ $invite->name }}</td>
                            <td>{{ $invite->contact_no }}</td>
                            <td>{{ $invite->address }}</td>
                            <td>{{ $invite->land_size }}</td>
                            <td>
                                {{-- <a href="{{ route('invitation.show', [$invite->id]) }}" class="btn btn-sm btn-info">View</a> --}}
                                <form method="post" action="{{route('invitation.destroy', $invite->id)}}">
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
                            <form action="{{ route('invite.del') }}" id="bulk_action" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit" id="delete-btn-all" onclick="return confirm('Are You Sure?')" disabled>Delete Selected</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row justify-content-center">
                {{ $invites->links() }}
            </div>
        </div>


    </div>


@endsection

@section('footer-section')
    <script>

    </script>
@endsection
