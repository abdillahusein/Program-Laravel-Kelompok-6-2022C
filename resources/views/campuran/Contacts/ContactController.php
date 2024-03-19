<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ContactController extends Controller
{
    /**
     * Menampilkan daftar kontak.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('Contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Menampilkan form untuk membuat kontak baru.
     * (Biasanya tidak digunakan untuk API)
     */
    public function createForm()
    {
        return view('Contacts.create');
    }

    /**
     * Menyimpan kontak yang baru dibuat.
     */
    public function create(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
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
            'user_id' => 'required|exists:users,id'
        ]);
        
        // Simpan data ke database
        $contact = Contact::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'user_id' => $validatedData['user_id'],
        ]);
        
        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('Contacts.index')->with('success', 'Contact created successfully.');
    }

    /**
     * Menampilkan form untuk mengedit kontak.
     * (Biasanya tidak digunakan untuk API)
     */
    public function updateForm(Contact $contact)
    {
        return view('Contacts.update', ['contact' => $contact]);
    }

    /**
     * Memperbarui kontak yang ada.
     */
    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required|unique:contacts,phone,' . $contact->id,
            'user_id' => 'required|exists:users,id'
        ]);

        $contact->update($validatedData);
        return redirect()->route('Contacts.index')->with('success', 'Contact updated successfully');
    }

    /**
     * Menampilkan detail dari kontak tertentu.
     */
    public function get(Contact $contact)
    {
        return view('Contacts.get', ['contact' => $contact]);
    }

    /**
     * Menampilkan kontak yang sesuai dengan pencarian.
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $contacts = Contact::where('first_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('email', 'like', '%' . $searchTerm . '%')
            ->orWhere('phone', 'like', '%' . $searchTerm . '%')
            ->get();
            
        return view('Contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Menghapus kontak tertentu.
     */
    public function delete(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('Contacts.index')->with('success', 'Contact deleted successfully');
    }
}
