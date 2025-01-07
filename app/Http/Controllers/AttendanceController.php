<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        return view('dashboard.dashboard', compact('title'));
    }

    public function attendance()
    {
        $title = "Kehadiran";

        return view('dashboard.attendance.index', compact('title'));
    }

    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $currentTime = Carbon::now()->toTimeString();
        $data = [
            'latitude'  => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'check_in'  => $currentTime
        ];

        dd($data);
    }
}
