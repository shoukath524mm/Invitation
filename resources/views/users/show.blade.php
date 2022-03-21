@extends('users.layout')
  
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{$user->name}} Invitations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        
         
          @foreach($invitations as $invitaion )
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  
                  <h5 class="card-title">{{$invitaion->event->name}}</h5>
                  <p class="card-text">{{$invitaion->event->description}}</p>
                  <a href="{{ route('invitations.accept',['invitation'=>$invitaion->id]) }}" class="btn btn-primary">Accept</a>
                  <a href="{{ route('invitations.reject',['invitation'=>$invitaion->id]) }}" class="btn btn-primary">Reject</a>


              </div>
            </div>
        </div>
        @endforeach
            
        
        
    </div>
@endsection