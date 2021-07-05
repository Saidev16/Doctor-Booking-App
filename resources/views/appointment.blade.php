@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="text-center">
                       Informations du docteur
                    </h4>
                    <img src="{{asset('images')}}/{{$user->image}}" alt="" width="80" style="border-radius: 50%;">
                    <br>
                    <p class="lead mt-3">Nom : {{ucfirst($user->name)}}</p> 
                    <p class="lead">Niveau d'études :{{$user->education}}</p> 
                    <p class="lead">Spécialité :{{$user->department}}</p> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
    
            @if (Session::has('errmessage'))
                <div class="alert alert-danger">{{Session::get('errmessage')}}</div>
            @endif
            <div class="card">
                <div class="card-header lead">{{$date}}</div>
                <div class="card-body">
                    
                    <form action="{{route('booking.appointment')}} " method="POST">
                        @csrf
                        <div class="row">
                            @foreach ($times as $time)
                            <div class="col-md-3">
                                <label for="" class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="{{ $time->time }}">
                                    <span>{{ $time->time }}</span>
                                </label>
                            </div>
                            <input type="hidden" name="doctorId" value="{{$doctor_id}}">
                            <input type="hidden" name="appointmentId" value="{{$time->appointment_id}}">
                            <input type="hidden" name="date" value="{{$date}}">
                            
                            @endforeach
                        </div>
                        <div class="card-footer mt-3">
                            @if (Auth::check())
                            <button type="submit" class="btn btn-success" style="width: 100%;">Book appointment</button>
                            @else
                            <h5>Veuillez se connecter pour réserver une consultation</h5>
                            <a href="/register"><button class="btn btn-primary" >S'inscrire</button></a>
                                <a href="/login"><button class="btn btn-primary">Se Connecter</button></a>
                            @endif
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
