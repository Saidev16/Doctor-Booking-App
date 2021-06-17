@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">
                       Doctor Information
                    </h4>
                    <img src="{{asset('images')}}/{{$user->image}}" alt="" width="80" style="border-radius: 50%;">
                    <br>
                    <p class="lead">Name : {{ucfirst($user->name)}}</p> 
                    <p class="lead">Degree :{{$user->education}}</p> 
                    <p class="lead">Expertise :{{$user->department}}</p> 
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header lead">{{$date}}</div>
                <div class="card-body">

                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            @foreach ($times as $time)
                            <div class="col-md-3">
                                <label for="" class="btn btn-outline-primary">
                                    <input type="radio" name="status" value="1">
                                    <span>{{ $time->time }}</span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            @if (Auth::check())
                                <button type="submit" class="btn btn-success" style="width: 100%;">Book appointment</button>
                            @else
                                <p>Please login to make an appointment</p>
                                <a href="/register">Register</a>
                                <a href="/login">Login</a>
                            @endif
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
