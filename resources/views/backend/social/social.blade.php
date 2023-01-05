@extends('backend.layouts.app')

@section('content')
    <div class="container card">
        <br>

        <div class="d-flex justify-content-between">
                <h4>Social Media Links </h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#header">
                    Create Social Info
                  </button>
        </div>
          <br>

        <div class="row justify-content-center align-items-center g-2">
            <h2>Section</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Facebook</th>
                            <th scope="col">Twitter</th>
                            <th scope="col">Instagram</th>
                            <th scope="col">Google+</th>
                            <th scope="col">Youtube</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                            @if ($social != null)
                                @foreach ($social as $section)
                                <tr class="">
                                    <td>
                                        @if ($section->facebook)
                                        <a href="{{ $section->facebook }}">{{ strLimit($section->facebook, 20) }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($section->twitter)
                                        <a href="{{ $section->twitter }}">{{ strLimit($section->twitter, 20) }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($section->instagram)
                                        <a href="{{ $section->instagram }}">{{ strLimit($section->instagram, 20) }}</a>
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if ($section->googleplus)
                                        <a href="{{ $section->googleplus }}">{{ strLimit($section->googleplus, 20) }}</a>
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if ($section->youtube)
                                        <a href="{{ $section->youtube }}">{{ strLimit($section->youtube, 20) }}</a>
                                        @else

                                        @endif
                                    </td>

                                    <td class="d-flex">
                                        <a href="#header{{ $section->id }}" class="btn btn-info" data-toggle="modal">Edit</a>

                                        <form method="post" action="{{route('social.destroy', $section->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete</button>
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
        <h4>For All Social Links</h4>
        <img src="{{ getImage('info', 'social.png') }}" alt="" class="col-12">



        @if ($social !=null)
             @foreach ($social as $section)
            <div class="modal" id="header{{ $section->id }}">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                        <div class="modal-body">
                            <form method="POST" action="{{ route('social.update', [$section->id]) }}" enctype="multipart/form-data" id="ajax_form">
                            @method('PUT')
                            @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" id="" value="{{ $section->facebook }}">
                                    <label for="" class="form-label">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" id="" value="{{ $section->twitter }}">
                                    <label for="" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" id="" value="{{ $section->instagram }}">
                                    <label for="" class="form-label">Google Plus</label>
                                    <input type="text" class="form-control" name="googleplus" id="" value="{{ $section->googleplus }}">
                                    <label for="" class="form-label">Youtube</label>
                                    <input type="text" class="form-control" name="youtube" id="" value="{{ $section->youtube }}">

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Update Header</button>
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
                  <form method="POST" action="{{ route('social.store') }}" id="ajax_form">
                    @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="">
                            <label for="" class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter" id="">
                            <label for="" class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="instagram" id="">
                            <label for="" class="form-label">Google Plus</label>
                            <input type="text" class="form-control" name="googleplus" id="">
                            <label for="" class="form-label">Youtube</label>
                            <input type="text" class="form-control" name="youtube" id="">

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add Social</button>
                        </div>


                    </form>
                </div>

              </div>
            </div>
          </div>

    </div>


</div>
@endsection
