@extends('layouts.app')

@section('content')
    <h1>Edit Kontak</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('Contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="first_name" placeholder="First Name" value="{{ $contact->first_name }}"><br>
        <input type="text" name="last_name" placeholder="Last Name" value="{{ $contact->last_name }}"><br>
        <input type="email" name="email" placeholder="Email" value="{{ $contact->email }}"><br>
        <input type="text" name="phone" placeholder="Phone" value="{{ $contact->phone }}"><br>
        <input type="text" name="user_id" placeholder="User ID" value="{{ $contact->user_id }}"><br>
        <button type="submit">Perbarui Kontak</button>
    </form>
@endsection
