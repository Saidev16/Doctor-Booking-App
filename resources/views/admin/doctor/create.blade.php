@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span> Add Doctor </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10"> 
            @if( Session::has('message') )
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header"> <h3>Add doctor</h3> </div>
                <div class="card-body"> 
                    <form  class="forms-sample" method='POST' action="{{ route('doctors.store') }}" enctype="multipart/form-data" > @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fullname">fullname</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="doctor name" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label for="email">email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Doctor Password" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control  @error('gender') is-invalid @enderror">
                                    <option value="">Select a gender</option>
                                    <option value="male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="Education">Education</label>
                                <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="Doctor's degree" >
                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label for="ville">Ville</label>
                                <input type="text" value="{{old('ville')}}" name="ville" class="form-control @error('ville') is-invalid @enderror" placeholder="ville" >
                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="Specialist">Specialist</label>
                                <select name="department" class="form-control">
                                    <option value="">please select</option>
                                    @foreach (App\Department::all() as $d)
                                        <option value="{{$d->department}}">{{$d->department}}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label for="Phone number">Phone number</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="phone_number" >
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="image" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="">Role</label>
                                <select name="role_id" class="form-control @error('image') is-invalid @enderror">
                                    <option value="">Please select role</option>
                                        @foreach (App\Role::where('name','!=','patient')->get() as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                        </div>

                        <div class="form-group">
                            <label for="">About</label>
                            <textarea name="description" cols="30" rows="7" class='form-control @error('description') is-invalid @enderror'></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <button class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>

                    </form>    
                </div>
            </div>
        </div>
    </div>

@endsection