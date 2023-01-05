@extends('frontend.layouts.app')

@section('main-content')
<style>
    .wrapper{
        height: 100vh;
        display: grid;
        place-content: center;
    }
</style>
    <div class="container wrapper text-center">
        {{-- @if (session('success'))
         <h3 class="text-success p-3">{{ session('success') }}</h3>
         @endif --}}
         <h3 class="text-success p-3 message"></h3>

        <a href="{{ url('/') }}" class="btn btn-outline-info">Home Page</a>
    </div>
@endsection
