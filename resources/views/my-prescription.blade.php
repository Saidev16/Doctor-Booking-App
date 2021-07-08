@extends('layouts.app')

@section('content')
<div class="mt-3">
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
                                <td scope="row">{{$prescription->date}} </td>
                                <td scope="row">{{$prescription->doctor->name}} </td>
                                <td scope="row">{{$prescription->name_of_disease}} </td>
                                <td scope="row">{{$prescription->symptoms}} </td>
                                <td scope="row">{{$prescription->medicine}} </td>
                                <td scope="row">{{$prescription->procedure_to_use_medicine}} </td>
                                <td scope="row">{{$prescription->feedback}} </td>
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
