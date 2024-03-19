<!-- resources/views/Contacts/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Delete Contact</div>

                    <div class="card-body">
                        <p>Are you sure you want to delete this contact?</p>

                        <p><strong>Name:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
                        <p><strong>Email:</strong> {{ $contact->email }}</p>
                        <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                        <p><strong>User ID:</strong> {{ $contact->user_id }}</p>

                        <form action="{{ route('contacts.delete', $contact) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="{{ route('contacts.index') }}" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
