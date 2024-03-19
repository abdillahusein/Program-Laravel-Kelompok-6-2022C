{{-- resources/views/contacts/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kontak</h1>
    <div>
        <a href="{{ route('Contacts.create') }}">Create Contact</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>
                    <a href="{{ route('Contacts.update', $contact->id) }}">Update Contact</a>
                    <a href="{{ route('Contacts.get', $contact->id) }}">Get Contact</a>
                    <a href="{{ route('Contacts.search') }}">Search Contact</a>
                    <form action="{{ route('Contacts.delete', $contact->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove Contact</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
