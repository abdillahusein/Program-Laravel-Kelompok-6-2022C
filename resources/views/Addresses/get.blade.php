@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Alamat</h1>
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
        <a href="{{ route('Addresses.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
