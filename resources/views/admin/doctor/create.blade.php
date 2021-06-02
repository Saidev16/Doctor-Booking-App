@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
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
            <div class="card">
                <div class="card-header"> <h3>Add doctor</h3> </div>
                <div class="card-body"> 
                    <form action="" class="forms-sample">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fullname">fullname</label>
                                <input type="text" name="name" class="form-control" placeholder="doctor name" >
                            </div>
                            <div class="col-md-6">
                                <label for="email">email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" >

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Doctor Password" >
                            </div>
                            <div class="col-md-6">
                                <label for="Gender">Gender</label>
                                <select name="Gender" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="Education">Education</label>
                                <input type="text" name="education" class="form-control" placeholder="Doctor's degree" >
                            </div>
                            <div class="col-md-6">
                                <label for="Adress">Adsress</label>
                                <input type="text" name="adress" class="form-control" placeholder="address" >
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="Specialist">Specialist</label>
                                <input type="text" name="department" class="form-control" placeholder="Doctor's degree" >
                            </div>
                            <div class="col-md-6">
                                <label for="Phone number">Phone number</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="address" >
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="file" name="image" class="form-control file-upload-info"  placeholder="Upload Image">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="">About</label>
                            <textarea name="description" cols="30" rows="7" class='form-control'></textarea>
                        </div>
                        <button class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>

                    </form>    
                </div>
            </div>
        </div>
    </div>

@endsection