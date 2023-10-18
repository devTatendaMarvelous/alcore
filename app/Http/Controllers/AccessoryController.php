<?php
namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Gadget;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    public function index()
    {
        $accessories = Accessory::all();
        return view('accessories.index', compact('accessories'));
    }

    public function create()
    {
        $gadgets = Gadget::all();
        return view('accessories.create', compact('gadgets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gadget_id' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        Accessory::create($request->all());

        return redirect()->route('accessories.index')->with('success', 'Accessory created successfully.');
    }

    public function show(Accessory $accessory)
    {
        return view('accessories.show', compact('accessory'));
    }

    public function edit(Accessory $accessory)
    {
        $gadgets = Gadget::all();
        return view('accessories.edit', compact('accessory', 'gadgets'));
    }

    public function update(Request $I apologize, but it seems that my previous response was cut off. Here's the continuation of the `AccessoryController`:

```php
    public function update(Request $request, Accessory $accessory)
    {
        $request->validate([
            'gadget_id' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $accessory->update($request->all());

        return redirect()->route('accessories.index')->with('success', 'Accessory updated successfully.');
    }

    public function destroy(Accessory $accessory)
    {
        $accessory->delete();

        return redirect()->route('accessories.index')->with('success', 'Accessory deleted successfully.');
    }
}