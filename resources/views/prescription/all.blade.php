@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Réservations ({{$patients->count()}})</div>
                

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Docteur</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Prescription</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $key=>$patient)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> <img src="/profile/{{$patient->user->image}}" width="40" style="border-radius: 50%" > </td> 
                                    <td>{{$patient->date}} </td>
                                    <td>{{$patient->user->name}}</td>
                                    <td>{{$patient->user->email}}</td>
                                    <td>{{$patient->user->phone_number}}</td>
                                    <td>{{$patient->user->gender}}</td>
                                    <td>{{$patient->time}}</td>
                                    <td>{{$patient->doctor->name}}</td>
                                    <td>
                                        @if ($patient->status == 1)
                                            <button class="btn btn-success">Validé</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('prescription.show', [$patient->user->id, $patient->date])}}" class="btn btn-secondary">voir l'ordonnance</a>                                        
                                    </td>
                                </tr>
                            @empty
                                <td>Aucune Réservation disponible</td>
                            @endforelse
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->


  
@endsection
