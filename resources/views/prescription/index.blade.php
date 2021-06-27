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
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Docteur</th>
                            <th scope="col">Statut</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $key=>$booking)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> <img src="/profile/{{$booking->user->image}}" width="40" style="border-radius: 50%" > </td> 
                                    <td>{{$booking->date}} </td>
                                    <td>{{$booking->user->name}}</td>
                                    <td>{{$booking->user->email}}</td>
                                    <td>{{$booking->user->phone_number}}</td>
                                    <td>{{$booking->user->gender}}</td>
                                    <td>{{$booking->time}}</td>
                                    <td>{{$booking->doctor->name}}</td>
                                    <td>
                                        @if ($booking->status == 0)
                                            <a href="{{route('update.status',[$booking->id])}}"> <button class="btn btn-primary">En Attente</button> </a> 
                                        @else
                                            <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-success">Confirmé</button></a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kml">
                                                write perscription
                                            </button> 
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


<!-- Modal -->
<div class="modal fade" id="kml" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        ...
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>
@endsection
