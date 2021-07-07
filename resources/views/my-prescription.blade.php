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
                            <th scope="col">Docteur</th>
                            <th scope="col">maladie</th>
                            <th scope="col">Symptômes</th>
                            <th scope="col">Médicaments</th>
                            <th scope="col">Traitement</th>
                            <th scope="col">Retour du docteur</th>
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
