{{-- resources/views/contacts/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kontak</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $contact->first_name }} {{ $contact->last_name }}</h5>
            <p class="card-text">Email: {{ $contact->email }}</p>
            <p class="card-text">Phone: {{ $contact->phone }}</p>
            <a href="{{ route('contacts.index') }}" class="btn btn-primary">Back to list</a>
        </div>
    </div>
</div>
@endsection
