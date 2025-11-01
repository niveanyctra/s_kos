<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Setting;
use App\Models\Facility;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $rooms = Room::count();
        $facilities = Facility::count();
        $users = User::count();
        $available = Room::where('status', 'available')->count();
        $occupied = Room::where('status', 'occupied')->count();
        $maintenance = Room::where('status', 'maintenance')->count();
        $setting = Setting::first();

        return view('admin.dashboard', compact('rooms', 'facilities', 'users', 'available', 'occupied', 'maintenance', 'setting'));
    }
}
