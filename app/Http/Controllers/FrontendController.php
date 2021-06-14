<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Time;

class FrontendController extends Controller{

    public function index(){

        date_default_timezone_set('Africa/Casablanca');
        // dd(date('y-m-d'));
        $doctors = Appointment::where('date', date('Y-m-d') )->get();
        // return $doctors;
        return view('welcome', compact('doctors'));
    }

    public function show($doctorId, $date){
        $appointment = Appointment::where('user_id', $doctorId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        // return $times;
        return view('appointment', compact('times', 'date'));
    }
}
