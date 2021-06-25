@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Réservations ({{$bookings->count()}})</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Docteur</th>
                            <th scope="col">Statut</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $key=>$booking)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$booking->date}} </td>
                                    <td>{{$booking->user->name}}</td>
                                    <td>{{$booking->time}}</td>
                                    <td>{{$booking->doctor->name}}</td>
                                    <td>
                                        @if ($booking->status == 0)
                                            <button class="btn btn-primary">En Attente</button>
                                        @else
                                            <button class="btn btn-success">Confirmé</button>
                                        @endif
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
</div>
@endsection
