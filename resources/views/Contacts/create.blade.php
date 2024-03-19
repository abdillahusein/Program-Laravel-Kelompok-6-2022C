@extends('layouts.app')

@section('content')
    <h1>Tambah Kontak Baru</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('Contacts.create') }}" method="POST">
        @csrf
        <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}"><br>
        <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}"><br>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
        <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}"><br>
        <button type="submit">Tambah Kontak</button>
    </form>
@endsection
