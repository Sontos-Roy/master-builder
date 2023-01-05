@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <br>

        <div class="d-flex justify-content-between">
            <h3>Footer Address Section</h3>
            <div class="text-right">
                <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#header">
                    Create Footer Bar Info
                  </button>
            </div>
        </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Corporate Office</th>
                            <th scope="col">Register Office</th>
                            <th scope="col">Office Time</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                            @if ($footer != null)
                                @foreach ($footer as $section)
                                <tr class="">
                                    <td>{{ $section->co_office }}</td>
                                    <td>{{ $section->re_office }}</td>
                                    <td>{{ $section->office_time }}</td>

                                    <td class="d-flex">
                                        <a href="#footer{{ $section->id }}" class="btn btn-info" data-toggle="modal">Edit</a>

                                        <form method="POST" action="{{route('footer.destroy', $section->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
        <div class="container">
            <h3>For All Pages Footer Address</h3>
            <img src="{{ getImage('info', 'footeraddress.png') }}" alt="" class="col-12">
        </div>



        @if ($footer !=null)
             @foreach ($footer as $section)
            <div class="modal" id="footer{{ $section->id }}">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                        <div class="modal-body">
                            <form method="POST" action="{{ route('footer.update', [$section->id]) }}" id="ajax_form">
                            @method('PUT')
                            @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Corporate Office</label>
                                    <textarea name="co_office" id="" rows="3" class="form-control">{{ $section->co_office }}</textarea>
                                    <label for="" class="form-label">Register Office</label>
                                    <textarea name="re_office" id="" rows="3" class="form-control">{{ $section->re_office }}</textarea>
                                    <label for="" class="form-label">Office Time</label>
                                    <textarea name="office_time" id="" rows="3" class="form-control">{{ $section->office_time }}</textarea>

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success submit">Update Footer Addrss</button>
                                </div>


                            </form>
                        </div>

                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        @endif

        <div class="modal" id="header">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('footer.store') }}" id="ajax_form">
                    @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Corporate Office</label>
                            <textarea name="co_office" id="" rows="3" class="form-control"></textarea>
                            <label for="" class="form-label">Register Office</label>
                            <textarea name="re_office" id="" rows="3" class="form-control"></textarea>
                            <label for="" class="form-label">Office Time</label>
                            <textarea name="office_time" id="" rows="3" class="form-control"></textarea>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success submit">Add Footer Address</button>
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
