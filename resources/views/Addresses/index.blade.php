@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Alamat</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('Addresses.createForm') }}" class="btn btn-primary mb-3">Tambah Alamat</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Street</th>
                    <th scope="col">City</th>
                    <th scope="col">Province</th>
                    <th scope="col">Country</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($addresses as $address)
                    <tr>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->province }}</td>
                        <td>{{ $address->country }}</td>
                        <td>{{ $address->postal_code }}</td>
                        <td>
                            <a href="{{ route('Addresses.get', $address->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('Addresses.updateForm', $address->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('Addresses.delete', $address->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus alamat ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
