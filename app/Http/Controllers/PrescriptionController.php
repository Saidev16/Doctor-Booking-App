<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index(){
        date_default_timezone_set('Africa/Casablanca');
        $bookings = Booking::where('date', date('Y-m-d'))->where('status', 1)->where('doctor_id', auth()->user()->id)->get();
        return view('prescription.index', compact('bookings'));
    }

    public function store(Request $request){
        $data = $request->all();
        dd($data);
        $data['medicine'] = implode(',', $request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message', 'Prescription created');
    }

    public function show($userId, $date){
        $prescription = Prescription::where('user_id', $userId)->where('date', $date)->first();
        return view('prescription.show', compact('prescription'));
    }
}
