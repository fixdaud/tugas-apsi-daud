<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->title) {
            # code...
            $rooms = Room::where('title','like', '%'.$request->title.'%')
            ->orWhereHas('categories', function($q) use($request) {
                $q->where('categories.id', $request->category);
            })
            ->get();
        }
        else {
            # code...
            $rooms = Room::all();
        }
        return view('book-list',['rooms' => $rooms, 'categories'=>$categories]);
    }
}
