<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function index()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:rooms',
            'price' => 'required|integer',
            'size' => 'required|string',
            'status' => 'required|in:available,occupied,maintenance',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'size', 'status', 'description']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('rooms', 'public');
        }

        Room::create($data);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:rooms,name,' . $room->id,
            'price' => 'required|integer',
            'size' => 'required|string',
            'status' => 'required|in:available,occupied,maintenance',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'size', 'status', 'description']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('rooms', 'public');
        }

        $room->update($data);
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Room::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
