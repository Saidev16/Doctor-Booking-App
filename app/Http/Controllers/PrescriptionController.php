<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index(){
        date_default_timezone_set('Africa/Casablanca');
        $bookings = Booking::where('date', date('Y-m-d'))->where('status', 1)->get();
        return view('prescription.index', compact('bookings'));
    }

    public function store(Request $request){
        $data = $request->all();
        $data['medicine'] = implode(',', $request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message', 'Prescription created');
    }
}
