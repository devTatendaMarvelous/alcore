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
        return view('gadgets.index', compact(['gadgets']));
    }

    public function create()
    {
        $clients = Client::all();
        if ($clients->count() > 0) {
            return view('gadgets.create', compact('clients'));
        }else{
            return back()->with('error', 'Gadget cannot be created without at least one client. ');
        }
    }

    public function store(Request $request)
    {
        try {
            $gadget=$request->validate([
                'client_id' => 'required',
                'name' => 'required',
                'serial_number' => 'required|unique:gadgets',
                'description' => 'required',
            ]);
            if($request->has('photo')){
                $gadget['photo'] =  $request->file('photo')->store('gadgetPhotos', 'public');;
            }
            Gadget::create( $gadget);

            return redirect()->route('gadgets.index')->with('success', 'Gadget created successfully.');
        }catch (\Exception $e) {
            return $e->getMessage();
        }

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
        try {
            $gadget=$request->validate([
                'client_id' => 'required',
                'name' => 'required',
                'serial_number' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]);
            if($request->has('photo')){
                $gadget['photo'] =  $request->file('photo')->store('gadgetPhotos', 'public');;
            }
            $gadget->update($gadget);

            return redirect()->route('gadgets.index')->with('success', 'Gadget updated successfully.');

        }catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function sale($id)
    {
        try {
            $gadget=Gadget::find($id);
            $gadget->is_forsale =1;
            $gadget->save();
            return redirect()->route('gadgets.index')->with('success', 'Gadget now on sale.');
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function remove($id)
    {
        try {

            $gadget=Gadget::find($id);
            $gadget->is_forsale =0;
            $gadget->save();
            return redirect()->route('gadgets.index')->with('success', 'Gadget now removed from sale.');

        }catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function destroy(Gadget $gadget)
    {
        $gadget->delete();

        return redirect()->route('gadgets.index')->with('success', 'Gadget deleted successfully.');
    }
}
