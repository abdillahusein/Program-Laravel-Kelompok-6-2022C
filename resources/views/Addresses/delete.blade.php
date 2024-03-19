@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Konfirmasi Penghapusan Alamat</h1>
        <p>Apakah Anda yakin ingin menghapus alamat ini?</p>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Street:</th>
                    <td>{{ $address->street }}</td>
                </tr>
                <tr>
                    <th scope="row">City:</th>
                    <td>{{ $address->city }}</td>
                </tr>
                <tr>
                    <th scope="row">Province:</th>
                    <td>{{ $address->province }}</td>
                </tr>
                <tr>
                    <th scope="row">Country:</th>
                    <td>{{ $address->country }}</td>
                </tr>
                <tr>
                    <th scope="row">Postal Code:</th>
                    <td>{{ $address->postal_code }}</td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('Addresses.delete', $address->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            <a href="{{ route('Addresses.index') }}" class="btn btn-secondary">Tidak, Batalkan</a>
        </form>
    </div>
@endsection
