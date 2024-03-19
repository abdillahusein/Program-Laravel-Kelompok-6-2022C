<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('Contacts.index', compact('contacts'));
    }

    public function createForm()
    {
        return view('Contacts.create');
    }

    public function create(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('Contacts')->ignore($request->id),
            ],
            'phone' => [
                'required',
                Rule::unique('Contacts')->ignore($request->id),
            ],
        ]);
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            // Handle the case where the user is not logged in
            return redirect()->route('User.login')->withErrors('Anda harus login terlebih dahulu.');
        }
    
        // Ambil ID pengguna dari sesi atau konteks aplikasi
        $user_id = Auth::id();
    
        // Simpan alamat baru ke dalam database dengan 'user_id' yang sudah diisi
        Contact::create(array_merge($request->all(), ['user_id' => $user_id]));
    
        return redirect()->route('Contacts.index')->with('success', 'Kontak baru berhasil ditambahkan.');
    }

    public function updateForm(Contact $contact)
    {
        return view('Contacts.update', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        // Validasi data inputan
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required|unique:contacts,phone,' . $contact->id,
            'user_id' => 'required|exists:users,id'
        ]);

        // Perbarui kontak yang ada dalam database
        $contact->update($request->all());

        return redirect()->route('Contacts.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    public function get(Contact $contact)
    {
        return view('Contacts.get', ['contact' => $contact]);
    }

    public function search(Request $request)
    {
        // Ambil kata kunci pencarian dari permintaan
        $keyword = $request->input('keyword');
    
        // Lakukan pencarian berdasarkan kata kunci pada kolom 'name' dan 'email'
        $contacts = Contact::where('first_name', 'like', "%$keyword%")
                            ->orWhere('last_name', 'like', "%$keyword%")
                            ->orWhere('email', 'like', "%$keyword%")
                            ->orWhere('phone', 'like', "%$keyword%")
                            ->get();
        // Kirim data hasil pencarian ke tampilan 'Contacts.search'
        return view('Contacts.search', compact('contacts', 'keyword'));
    }
      
    public function delete(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('Contacts.index')->with('success', 'Kontak berhasil dihapus.');
    }
}
