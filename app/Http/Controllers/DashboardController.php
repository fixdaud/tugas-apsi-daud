<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $roomCount = Room::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        return view('dashboard', ['room_count' => $roomCount, 'category_count' => $categoryCount, 'user_count'=> $userCount]);
    }
}
