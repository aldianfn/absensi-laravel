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
        $title = "Attendance";
        $user = Auth::user();

        $attendanceLists = Attendance::where('user_id', $user->id)->get();
        // dd($attendanceLists);

        $checkedInStatus = Attendance::hasAttendanceToday($user);
        $checkedOutStatus = Attendance::hasCheckOutToday($user);

        return view('dashboard.attendance.index', compact('title', 'checkedInStatus', 'checkedOutStatus', 'attendanceLists'));
    }

    public function checkInStore(Request $request)
    {
        $user = Auth::user();
        $currentTime = Carbon::now()->toTimeString();

        // $request->validate([
        //     'latitiude'     => 'required|string|max:255',
        //     'longitude'     => 'required|string|max:255',
        //     'check_in'      => 'required|time',  // time?
        //     'date'          => 'required|date',  // date?
        //     'photo'         => 'required|image|mimes:jpeg,jpg|max:2048',
        //     'photo_path'    => 'required|string|max:255'
        // ]);

        $data = [
            'latitude'  => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'check_in'  => $currentTime,
            'date'      => today()->toDateString(),
            'user_id'   => $user->id,
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
        $attendance = Attendance::hasCheckedInToday($user);
        $currentTime = Carbon::now()->toTimeString();

        if ($attendance) {
            $attendance->update([
                'check_out' => $currentTime
            ]);

            return redirect()->intended(route('dashboard.attendance'));
        }

        return redirect()->back();
    }
}
