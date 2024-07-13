<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();

        $title = 'Delete Destination';
        $text  = 'Are you sure you want to delete this destination?';
        confirmDelete($title, $text);
        
        return view('admin.pages.destination', compact('destinations'));
    }

    public function create()
    {
        return view('admin.pages.createDestination');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'image'         => 'required|image|mimes:png,jpg,jpeg',
            'name'          => 'required',
            'ticket_price'  => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/img', $image->hashName());

        Destination::create([
            'image'         => $image->hashName(),
            'name'          => $request->name,
            'ticket_price'  => $request->ticket_price,
        ]);

        return redirect()->route('destination.index')->with('success', 'A New Destination Successfully Added!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $destination = Destination::findOrFail($id);
        return view('admin.pages.editDestination', compact('destination'));
    }

    public function update(Request $request, string $id)
    {
        $destination = Destination::findOrFail($id);

        $credentials = $request->validate([
            'image'         => 'nullable|image|mimes:png,jpg,jpeg',
            'name'          => 'required',
            'ticket_price'  => 'required',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/img/', $image->hashName());            

            Storage::delete('public/img/' . $destination->image);

            $destination->update([
                'image'         => $image->hashName(),
                'name'          => $request->name,
                'ticket_price'  => $request->ticket_price,
            ]);

        } else {
            $destination->update([
                'name'          => $request->name,
                'ticket_price'  => $request->ticket_price,
            ]);
        }

        return redirect()->route('destination.index')->with('success', 'The Destination is Successfully Edited!');
        
    }

    public function destroy($id): RedirectResponse
    {
        $destination = Destination::findOrFail($id);
        Storage::delete('public/img/' . $destination->image);
        $destination->delete();

        return redirect()->route('destination.index')->with('success', 'Destination has been Deleted.');
    }
}
