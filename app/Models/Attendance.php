<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'date',
        'check_in',
        'check_out',
        'latitude',
        'longitude',
        'location',
        'photo',
        'photo_path',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function hasAttendanceToday($user)
    {
        return static::where('user_id', $user->id)
            ->whereDate('date', today())
            ->exists();
    }

    public static function hasCheckedInToday($user)
    {
        return static::where('user_id', $user->id)
            ->whereDate('date', today())
            ->whereNull('check_out')
            ->first();
    }

    public static function hasCheckOutToday($user)
    {
        return static::where('user_id', $user->id)
            ->whereDate('date', today())
            ->whereNotNull('check_out')
            ->exists();
    }
}
