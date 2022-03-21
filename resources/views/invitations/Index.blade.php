@extends('users.layout')
  
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Invitations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('invitations.create') }}"> Create New Invitation</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Event</th>
            <th>Email</th>
            <th>Sent at</th>
            <th>Accepted at</th>
            <th>Rejected at</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->event->name }}</td>
            <td>{{ $value->user->email }}</td>
            <td>{{ $value->send_at }}</td>
            <td>{{ $value->rejected_at }}</td>
            <td>{{ $value->accepted_at }}</td>
            <td>
                <form action="{{ route('invitations.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('invitations.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('invitations.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection