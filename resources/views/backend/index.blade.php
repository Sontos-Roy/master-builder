@extends('backend.layouts.app')

@section('content')
<?php
use App\Models\Contact;
use App\Models\Invitation;

$contact = Contact::all();
$invitation = Invitation::all();

$contact_count = $contact->count();
$intrest_count = $invitation->count();


?>
<div class="container">
    <div class="row">
        
        <div class="col-lg-4 mb-5">
            <a href="{{ route('contact.index') }}" class="text-decoration-none">
                <div class="card p-2 px-3 shadow">
                    <h3 class="text-muted">Total Contacts</h3>
                    <h1>{{ $contact_count }}</h1>
                </div>
            </a>
        </div>
        <div class="col-lg-4 mb-5">
            <a href="{{ route('invitation.index') }}" class="text-decoration-none">
                <div class="card p-2 px-3 shadow">
                    <h3 class="text-muted">Total Intrested</h3>
                    <h1>{{ $intrest_count }}</h1>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
