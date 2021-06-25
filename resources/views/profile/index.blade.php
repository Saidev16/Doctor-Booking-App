@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    <p>Name: {{auth()->user()->name}} </p>
                    <p>Email: {{auth()->user()->email}} </p>
                    <p>Address: {{auth()->user()->address}} </p>
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
                    <form action="" method="POST" >@csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                           <select name="gender" class="form-control">
                               <option  value="male">male</option>
                               <option value="female">female</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea name="description" class='form-control' id="" cols="30" rows="10"></textarea>
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

                <div class="card-body">
                    <img  src=" /images/user.jpg " width="120" style="border-radius: 3px"> <br>
                    <input type="file" name="image" class="form-control mt-3" id=""><br>
                    <button type="submit" class="btn btn-primary" >Update</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
