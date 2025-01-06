<?php

namespace App\Http\Controllers;

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
}
