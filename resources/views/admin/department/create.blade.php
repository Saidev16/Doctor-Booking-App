@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Spécialité</h5>
                        <span> Ajouter Spécialité </span>
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
                <div class="card-header"> <h3>Ajouter Spécialité</h3> </div>
                <div class="card-body"> 
                    <form  class="forms-sample" method='POST' action="{{ route('department.store') }}"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fullname">Spécialité</label>
                                <input type="text" value="{{old('department')}}" name="department" class="form-control @error('department') is-invalid @enderror" placeholder="Spécialité" >
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div> 
                        </div>
                        <button class="btn btn-primary mt-3">Ajouter</button>

                    </form>    
                
            </div>
        </div>
    </div>

@endsection