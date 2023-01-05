@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>

        <div class="d-flex justify-content-between">
            <div class="text-right">
                <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#flat_sec">
                    Create Section
                  </button>
            </div>
        </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">
            <h2>Section</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Total Area</th>
                            <th scope="col">Total Floor</th>
                            <th scope="col">Parking Lot</th>
                            <th scope="col">Social Area</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                            @if ($flat_sec != null)
                                @foreach ($flat_sec as $section)
                                <tr class="">
                                    <td>{{ Strlimit($section->description, 30) }}</td>
                                    <td scope="row">{{ $section->total_area }}</td>
                                    <td>{{ $section->total_floor }}</td>
                                    <td>{{ $section->parking_lot }}</td>
                                    <td>{{ $section->social_area }}</td>

                                    <td class="d-flex">
                                        <a href="#section{{ $section->id }}" class="btn btn-info" data-toggle="modal">Edit</a>

                                        <form method="post" action="{{route('flat_sec.destroy', $section->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else


                            <tr>
                                <td colspan="3" class="text-center">There Are No data Available</td>
                            </tr>

                            @endif


                    </tbody>
                </table>
            </div>

        </div>
        <br><br>
        <div class="text-right">
            <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#designs">
                Create Rooms
              </button>
        </div>
        <div class="row justify-content-center align-items-center g-2">
            <h2>Room Descriptions</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Room</th>
                            <th scope="col">Room Size</th>
                            <th scope="col">Room Design</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                            @if ($roomDesign != null)
                                @foreach ($roomDesign as $design)
                                <tr class="">
                                    <td>{{ $design->room_name }}</td>
                                    <td>{{ $design->room_size }}</td>
                                    <td><img src="{{ getImage('rooms', $design->room_design) }}" class="" width="150" alt=""></td>

                                    <td class="d-flex">
                                        <a href="#designs{{ $design->id }}" class="btn btn-info" data-toggle="modal">Edit</a>

                                        <form method="post" action="{{route('design_sec.destroy', $design->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else


                            <tr>
                                <td colspan="3" class="text-center">There Are No data Available</td>
                            </tr>

                            @endif


                    </tbody>
                </table>
            </div>

        </div>

        @if ($flat_sec !=null)
             @foreach ($flat_sec as $section)
            <div class="modal" id="section{{ $section->id }}">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                        <div class="modal-body">
                            <form method="POST" action="{{ route('flat_sec.update', [$section->id]) }}">
                            @method('PUT')
                            @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description" id="" value="{{ $section->description }}">
                                    <label for="" class="form-label">Total Area</label>
                                    <input type="text" class="form-control" name="total_area" id="" value="{{ $section->total_area }}">
                                    <label for="" class="form-label">Total Floor</label>
                                    <input type="text" class="form-control" name="total_floor" id="" value="{{ $section->total_floor }}">
                                    <label for="" class="form-label">Parking Lot</label>
                                    <input type="text" class="form-control" name="parking_lot" id="" value="{{ $section->parking_lot }}">
                                    <label for="" class="form-label">Social Area</label>
                                    <input type="text" class="form-control" name="social_area" id="" value="{{ $section->social_area }}">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Update Section</button>
                                </div>


                            </form>
                        </div>

                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        @endif
        @if ($roomDesign !=null)
             @foreach ($roomDesign as $design)
            <div class="modal" id="designs{{ $design->id }}">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                        <div class="modal-body">
                            <form method="POST" action="{{ route('design_sec.update', [$design->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" name="room_name" id="" value="{{ $design->room_name }}">
                                    <label for="" class="form-label">Room Size</label>
                                    <input type="text" class="form-control" name="room_size" id="" value="{{ $design->room_size }}">
                                    <label for="" class="form-label">Room Design</label>
                                    <input type="file" class="form-control" name="room_design" id="">

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Update Image</button>
                                </div>


                            </form>
                        </div>

                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        @endif

        <div class="modal" id="designs">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('design_sec.store') }}" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Room Name</label>
                            <input type="text" class="form-control" name="room_name" id="">
                            <label for="" class="form-label">Room Size</label>
                            <input type="text" class="form-control" name="room_size" id="">
                            <label for="" class="form-label">Room Design</label>
                            <input type="file" class="form-control" name="room_design" id="">

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add section</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>
        <div class="modal" id="flat_sec">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create Flat Section</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('flat_sec.store') }}">
                    @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="">
                            <label for="" class="form-label">Total Area</label>
                            <input type="text" class="form-control" name="total_area" id="">
                            <label for="" class="form-label">Total Floor</label>
                            <input type="text" class="form-control" name="total_floor" id="">
                            <label for="" class="form-label">Parking Lot</label>
                            <input type="text" class="form-control" name="parking_lot" id="">
                            <label for="" class="form-label">Social Area</label>
                            <input type="text" class="form-control" name="social_area" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Create Flat Section</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>

</div>
</div>
@endsection
