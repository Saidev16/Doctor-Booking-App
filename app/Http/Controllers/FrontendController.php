<?php

namespace App\Http\Controllers;

use App\Time;
use App\User;
use App\Booking;
use App\Appointment;
use Illuminate\Http\Request;
use App\Mail\AppointmentMail;
use App\Prescription;
use Illuminate\Support\Facades\Mail;

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

        date_default_timezone_set('Africa/Casablanca');

        $request->validate(['time'=>'required']);
        $check = $this->checkBookingTimeInterval();

        if ($check) {
           return redirect()->back()->with('errmessage', 'You already made an appointment. please wait to make next appointment');
        }

        Booking::create([
            'user_id' => auth()->user()->id,
            'doctor_id' => $request->doctorId,
            'time' => $request->time,
            'date' => $request->date,
            'status' => 0,
        ]);

        Time::where('appointment_id', $request->appointmentId)
            ->where('time', $request->time)
            ->update(['status'=> 1]);

            //send email notification 
        $doctorName = User::where('id',$request->doctorId)->first();
        $mailData = [
            'name' => auth()->user()->name,
            'time' => $request->time,
            'date' => $request->date,
            'doctorName' => $doctorName->name
        ];

        try {
            Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
        } catch (\Exception $e) {
            report($e);
        }

            return redirect()->back()->with('message', 'Your appointment was booked');
    }

    public function checkBookingTimeInterval(){
        return Booking::orderby('id', 'desc')
                        ->where('user_id', auth()->user()->id)
                        ->whereDate('created_at', date('y-m-d'))
                        ->exists();
    }

    public function myBookings(){
        $appointments = Booking::where('user_id', auth()->user()->id)->get();
        return view('booking.index', compact('appointments'));
    }

    public function doctorToday(Request $request){
        $doctors = Appointment::with('doctor')->whereDate('date', date('y-m-d'))->get();
        return $doctors;
    }

    public function finddoctors(Request $request){
        $doctors = Appointment::with('doctor')->whereDate('date', $request->date)->get();
        return $doctors;
    }

    public function myPrescription(){
        $prescriptions = Prescription::where('user_id', auth()->user()->id)->get();
        return view('my-prescription', compact('prescriptions'));
    }
}
