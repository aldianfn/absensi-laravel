<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        $checkedInStatus = Attendance::hasAttendanceToday($user);
        $checkedOutStatus = Attendance::hasCheckOutToday($user);

        return view('dashboard.attendance.index', compact('title', 'checkedInStatus', 'checkedOutStatus'));
    }

    public function checkInStore(Request $request)
    {
        $user = Auth::user();
        $currentTime = Carbon::now()->toTimeString();

        $data = [
            'latitude'  => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'check_in'  => $currentTime,
            'date'      => today()->toDateString(),
            'user_id'   => $user->id
        ];

        $createCheckIn = Attendance::create($data);

        if ($createCheckIn) {
            return redirect()->intended(route('dashboard.attendance'));
        }

        return redirect()->back()->withErrors('Server error');
    }
    public function checkOutStore(Request $request)
    {
        $user = Auth::user();
        $currentTime = Carbon::now()->toTimeString();
    }
}
