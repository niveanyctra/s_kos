<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Setting;
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $setting = Setting::first();
        return view('index', compact('setting'));
    }
}
