<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Booking;
use App\Time;
use App\User;

class FrontendController extends Controller{

    public function index(){

        date_default_timezone_set('Africa/Casablanca');
        if (request('date')) {
            $doctors = $this->findDoctorsBasedOnDate(request('date'));
            return view('welcome', compact('doctors'));
        }
        $doctors = Appointment::where('date', date('Y-m-d') )->get();
        return view('welcome', compact('doctors'));
    }

    public function show($doctorId, $date){
        $appointment = Appointment::where('user_id', $doctorId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user = User::where('id', $doctorId)->first();
        $doctor_id = $doctorId;
        return view('appointment', compact('times', 'date', 'user', 'doctor_id'));
    }

    public function findDoctorsBasedOnDate($date){
        
        $doctors = Appointment::where('date', $date)->get();
        return $doctors;
    }

    public function store(Request $request){
        $request->validate(['time'=>'required']);
        Booking::created([
            'user_id' => auth()->user()->id,
            'doctor_id' => $request->doctorId,
            'time' => $request->time,
            'date' => $request->date,
            'status' => 0,
        ]);
        Time::where('appointment_id', $request->appointmentId)
            ->where('time', $request->time)
            ->update(['status'=> 1]);
            return redirect()->back()->with('message', 'Your appointment was booked');

    }
}
