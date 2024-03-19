@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hasil Pencarian Kontak</h1>
        <p>Keyword: {{ $keyword }}</p>
        <ul>
            @foreach($contacts as $contact)
                <li>{{ $contact->first_name }} {{ $contact->last_name }}</li>
            @endforeach
        </ul>
        <a href="{{ route('Contacts.index') }}" class="btn btn-primary">Kembali ke Daftar Kontak</a>
    </div>
@endsection
