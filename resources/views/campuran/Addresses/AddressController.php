<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::all();
        return view('addresses.index', ['addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     * (Biasanya tidak digunakan untuk API)
     */
    public function create()
    {
        // Form creation logic
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $address = Address::create($validatedData);

        return redirect()->route('addresses.index')->with('success', 'Address created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return view('addresses.show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     * (Biasanya tidak digunakan untuk API)
     */
    public function edit(Address $address)
    {
        // Edit form logic
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $validatedData = $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $address->update($validatedData);

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully');
    }
}