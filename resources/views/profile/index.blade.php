@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    <div class="row">
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    <p>Name: {{auth()->user()->name}} </p>
                    <p>Email: {{auth()->user()->email}} </p>
                    <p>Address: {{auth()->user()->adress}} </p>
                    <p>Phone: {{auth()->user()->phone_number}} </p>
                    <p>Gender: {{auth()->user()->gender}} </p>
                    <p>Bio: {{auth()->user()->description}} </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Profile</div>

                <div class="card-body">
                    <form action="{{route('profile.store')}}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">address</label>
                            <input type="text" name="adress" class="form-control" value="{{auth()->user()->adress}}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone_number" class="form-control"  value="{{auth()->user()->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                           <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                               <option  value="">Select gender</option>
                               <option  value="male" @if(auth()->user()->gender ==='male') selected @endif >male</option>
                               <option value="female" @if(auth()->user()->gender ==='female') selected @endif>female</option>
                           </select>
                           @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea name="description" class='form-control' id="" cols="30" rows="5">{{auth()->user()->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Update Image</div>
                <form action="{{route('profile.pic')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (!auth()->user()->image)
                            <img  src="/images/user.jpg " width="120" style="border-radius: 3px"><br>
                        @else
                            <img  src="/profile/{{auth()->user()->image}}" width="120" style="border-radius: 3px"><br>
                        @endif
                        <input type="file" name="file" class="form-control  mt-3 p-2" required><br>
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="submit" class="btn btn-primary" >Update</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
