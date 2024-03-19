<!-- resources/views/Contacts/update.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Contact</div>

                    <div class="card-body">
                        <form action="{{ route('Contacts.update', $contact) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $contact->first_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $contact->last_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $contact->phone }}" required>
                            </div>

                            <div class="form-group">
                                <label for="user_id">User ID:</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $contact->user_id }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
