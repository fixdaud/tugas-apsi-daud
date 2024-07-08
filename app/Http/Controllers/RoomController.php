<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RoomController extends Controller
{
    //
    public function index()
    {
        $rooms = Room::all();
        return view('room', ['rooms' => $rooms]);
    }

    public function add(){
        $categories = Category::all();
        return view('room-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => 'required|unique:rooms|max:255',
            'title' => 'required|max:255'
        ]);

        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'-'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $room = Room::create($request->all());
        $room->categories()->sync($request->categories);
        return redirect('rooms')->with('status', 'Room Added Successfully');
    }

    public function edit($slug)
    {
        $room = Room::where('slug', $slug)->first();
        $categories = Category::all();
        return view('room-edit', [ 'categories' => $categories, 'room' => $room]);
    }

    public function update(Request $request, $slug)
    {
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'-'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
            }

            $room = Room::where('slug', $slug)->first();
            $room->update($request->all());

            if($request->categories){
                $room->categories()->sync($request->categories);
            }
            return redirect('rooms')->with('status', 'Room Updated Successfully');
    }

    public function delete($slug)
    {
        $room = Room::where('slug', $slug)->first();
        return view('room-delete', ['room' => $room]);
    }

    public function destroy($slug)
    {
        $room = Room::where('slug', $slug)->first();
        $room->delete();
        return redirect('rooms')->with('status', 'Room Deleted Successfully');
        
    }

    public function deletedRoom()
    {
        $deletedRooms = Room::onlyTrashed()->get();
        return view('room-deleted-list', ['deletedRooms' => $deletedRooms]);
    }

    public function restore($slug)
    {
        $room = Room::withTrashed()->where('slug', $slug)->first();
        $room->restore();
        return redirect('rooms')->with('status', 'Room Restored Successfully');
    }
}
