<!-- Modal -->
<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <img style="border-radius:20px;" src="{{asset('images')}}/{{$user->image}}" width="200" alt="">
                </div>
           
            <div class="col-ms-6">
                <p> Name: {{$user->name}} </p>
                <p> Email: {{$user->email}} </p>
                <p> Address: {{$user->adress}} </p>
                <p> Phone: {{$user->phone_number}} </p>
                <p> Department: {{$user->department}} </p>
                <p> Education: {{$user->education}} </p>
                <p> Description: {{$user->description}} </p>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  