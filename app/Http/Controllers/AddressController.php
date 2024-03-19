<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // Menampilkan semua alamat
    public function index()
    {
        $addresses = Address::all(); // Mengambil semua alamat dari database
        return view('Addresses.index', compact('addresses')); // Menampilkan view 'Addresses.index' dengan data alamat yang telah diambil
    }

    // Menampilkan formulir pembuatan alamat baru
    public function createForm()
    {   
        return view('Addresses.create'); // Menampilkan view 'Addresses.create' untuk formulir pembuatan alamat baru
    }

    // Menyimpan alamat baru ke dalam database
    public function create(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);
    
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            // Handle the case where the user is not logged in
            return redirect()->route('User.login')->withErrors('Anda harus login terlebih dahulu.');
        }
    
        // Ambil ID pengguna dari sesi atau konteks aplikasi
        $user_id = Auth::id();
    
        // Simpan alamat baru ke dalam database dengan 'user_id' yang sudah diisi
        Address::create(array_merge($request->all(), ['user_id' => $user_id]));
    
        // Redirect ke halaman index alamat dengan pesan sukses
        return redirect()->route('Addresses.index')->with('success', 'Alamat baru berhasil ditambahkan.');
    }    

    // Menampilkan formulir untuk mengubah alamat
    public function updateForm(Address $address)
    {
        // Menampilkan view 'Addresses.update' untuk formulir update alamat dengan data alamat yang ingin diubah
        return view('Addresses.update', compact('address'));
    }

    // Memperbarui alamat yang ada dalam database
    public function update(Request $request, Address $address)
    {
        // Validasi data inputan
        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);

        // Perbarui alamat yang ada dalam database
        $address->update($request->all());

        // Redirect ke halaman index alamat dengan pesan sukses
        return redirect()->route('Addresses.index')->with('success', 'Alamat berhasil diperbarui.');
    }

    // Menampilkan detail alamat
    public function get(Address $address)
    {
        // Menampilkan view 'Addresses.get' dengan data alamat yang ingin ditampilkan detailnya
        return view('Addresses.get', compact('address'));
    }

    // Menghapus alamat dari database
    public function delete(Address $address)
    {
        // Menghapus alamat yang dipilih dari database
        $address->delete();

        // Redirect ke halaman index alamat dengan pesan sukses
        return redirect()->route('Addresses.index')->with('success', 'Alamat berhasil dihapus.');
    }
}
