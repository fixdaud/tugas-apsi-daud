<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoomRentController extends Controller
{
    //
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $rooms = Room::all();
        return view('room-rent', ['users' => $users, 'rooms' => $rooms]);
        // return view('room-rent');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDays(3)->toDateString();

        $room = Room::findOrFail($request->room_id)->only('status');

        if ($room['status'] != 'available') {
            Session::flash('message', 'Book is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('room-rent');
        } else {
            try {

                DB::beginTransaction();
                RentLogs::create($request->all());
                $room = Room::findOrFail($request->room_id);
                $room->status = 'not available';
                $room->save();
                DB::commit();

                Session::flash('message', 'rent success');
                Session::flash('alert-class', 'alert-success');
                return redirect('room-rent');
            } catch (\Throwable $th) {
                DB::rollBack();
                //throw $th;
            }
        }
    }
}
