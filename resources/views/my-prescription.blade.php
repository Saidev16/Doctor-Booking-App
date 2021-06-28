@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Prescription</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Disease</th>
                            <th scope="col">Symptoms</th>
                            <th scope="col">Medicine</th>
                            <th scope="col">Procedure to use medicine</th>
                            <th scope="col">Doctor feedback</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($prescriptions as $prescription)
                            <tr>
                                <th scope="row">{{$prescription->date}} </th>
                                <th scope="row">{{$prescription->doctor->name}} </th>
                                <th scope="row">{{$prescription->name_of_disease}} </th>
                                <th scope="row">{{$prescription->symptoms}} </th>
                                <th scope="row">{{$prescription->medicine}} </th>
                                <th scope="row">{{$prescription->procedure_to_use_medicine}} </th>
                                <th scope="row">{{$prescription->feedback}} </th>
                              </tr>
                            @empty
                                <td>You have no prescriptions</td>
                            @endforelse
                          
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
