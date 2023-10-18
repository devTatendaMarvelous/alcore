<?php

namespace App\Http\Controllers;

use App\Models\Gadget;
use App\Models\Client;
use Illuminate\Http\Request;

class GadgetController extends Controller
{
    public function index()
    {
        $gadgets = Gadget::all();
        return view('gadgets.index', compact('gadgets'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('gadgets.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Gadget::create($request->all());

        return redirect()->route('gadgets.index')->with('success', 'Gadget created successfully.');
    }

    public function show(Gadget $gadget)
    {
        return view('gadgets.show', compact('gadget'));
    }

    public function edit(Gadget $gadget)
    {
        $clients = Client::all();
        return view('gadgets.edit', compact('gadget', 'clients'));
    }

    public function update(Request $request, Gadget $gadget)
    {
        $request->validate([
            'client_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $gadget->update($request->all());

        return redirect()->route('gadgets.index')->with('success', 'Gadget updated successfully.');
    }

    public function destroy(Gadget $gadget)
    {
        $gadget->delete();

        return redirect()->route('gadgets.index')->with('success', 'Gadget deleted successfully.');
    }
}