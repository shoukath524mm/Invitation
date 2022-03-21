@extends('invitations.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Invitation</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('invitations.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('invitations.store') }}" method="POST">
    @csrf 
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Event:</strong>
                <select class="form-control"  name="event_id" placeholder="Event"> 
                    @foreach ($events as $key => $value)
                    <option value={{$value->id}} >{{$value->name}}</option>
                    @endforeach
                </select>
                <br/>
                <strong>User:</strong>
                <select class="form-control"  name="user_id" placeholder="Event"> 
                    @foreach ($users as $key => $value)
                    <option value={{$value->id}} name="user_id">{{$value->email}}</option>
                    @endforeach
                </select>
                <br/>
                <strong>Send At:</strong>
                <input type="date" name="send_at" class="form-control" placeholder="Enter Starting Date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection