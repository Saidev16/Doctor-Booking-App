@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
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
                            <th scope="col">Prescription</th>
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
                                        @if ($booking->status == 1)
                                            <button class="btn btn-success">Validé</button>
                                        @endif
                                    </td>
                                    <td>
                                            <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#exampleModal">
                                                prescription médicale
                                            </button>                                        
                                        
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="user_id" value="{{$booking->user_id}}">
          <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
          <input type="hidden" name="date" value="{{$booking->date}}">

          <div class="form-group">
              <label for="">Maladie</label>
              <input type="text" name="name_of_disease" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="">symptômes</label>
              <textarea name="symptoms" class="form-control" placeholder="sympotms" required cols="30" rows="2"></textarea>
          </div>
          <div class="form-group">
              <label for="">Comment bien prendre son traitement</label>
              <textarea name="procedure_to_use_medicine" class="form-control" placeholder="sympotms" required cols="30" rows="2"></textarea>

          </div>
          <div class="form-group">
              <label for="">Retour du medecin</label>
              <textarea name="feedback" class="form-control" placeholder="sympotms" required cols="30" rows="2"></textarea>

          </div>
          <div class="form-group">
              <label for="">Signature</label>
              <input type="text" name="signature" class="form-control" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  

</div>


  
@endsection
