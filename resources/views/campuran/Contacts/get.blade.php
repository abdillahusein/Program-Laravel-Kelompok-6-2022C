<!-- resources/views/Contacts/get.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Contact Details</div>

                    <div class="card-body">
                        <h5>Name: {{ $contact->first_name }} {{ $contact->last_name }}</h5>
                        <p>Email: {{ $contact->email }}</p>
                        <p>Phone: {{ $contact->phone }}</p>
                        <p>User ID: {{ $contact->user_id }}</p>

                        <a href="{{ route('Contacts.index') }}" class="btn btn-primary">Back to Contacts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
