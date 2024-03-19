@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Kontak</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mb-4">
            <div class="col-md-6">
                <form action="{{ route('Contacts.search') }}" method="GET" class="form-inline">
                    <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="Cari kontak...">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('Contacts.createForm') }}" class="btn btn-primary">Tambah Kontak</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>
                                <a href="{{ route('Contacts.get', $contact->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('Contacts.updateForm', $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('Contacts.delete', $contact->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
