@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;">

        </div>   
        <div class="col-sm-6">
            <h2>Create an account & Book your appointment</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            <div class="mt-5">
            <a href="{{ url('/register') }}"> <button class="btn btn-success">Register as Patient</button> </a> 
            <a href="{{ url('/login') }}"> <button class="btn btn-secondary">Login</button> </a>
        </div>
        </div>
        
    </div>
    <hr>
    <section class="">
        <div class="card">
            <div class="card-header">Find Doctors</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <input autocomplete="off" type="text" class="form-control " id="datepicker"  name="date">
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-primary">Find doctors</button>
                        </div>

                    </div>
                </div>
                
            </div>

            <div class="card mt-1">
            <div class="card-header"> Doctors available today</div>
                <div class="card-body">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Name</th>
                          <th scope="col">Category</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($doctors as $doctor)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="{{ asset('images') }}/{{$doctor->doctor->image}}" width="80" style="border-radius: 50%;">
                                </td>
                                <td>{{$doctor->doctor->name}}</td>
                                <td>{{$doctor->doctor->department}}</td>
                                <td>
                                    <a href="{{route('create.appointment', [$doctor->user_id, $doctor->date])}}">
                                        <button class="btn btn-success">Book Appointment</button>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <td>No doctors available today</td>
                        @endforelse

                      </tbody>
                    </table>

                    
                </div>
                
            </div>
        </div>
    </section>
</div>
 
        
@endsection
