@extends('admin.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users </h2>
            </div> 
            <div class="pull-right"> 
        </div>
        </div>
    </div>
 
<table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->role}}</td>
            <td>
                <form method="POST">
                <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">View details</a>    
                </form>
            </td>
        </tr>
        @endforeach
</table>
{!! $users->links() !!}
@endsection