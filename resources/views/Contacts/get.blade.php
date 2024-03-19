@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Kontak</h1>
        <p><strong>Nama:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Phone:</strong> {{ $contact->phone }}</p>
        <p><strong>User ID:</strong> {{ $contact->user_id }}</p>
        <a href="{{ route('Contacts.index') }}" class="btn btn-secondary">Kembali ke Daftar Kontak</a>
    </div>
@endsection
