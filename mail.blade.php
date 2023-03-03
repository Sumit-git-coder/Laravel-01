{{-- <table>
    <tr>
        <td>
            {{$name}}
        </td>
        <td>
            {{$data}}
        </td>
    </tr>
</table> --}}



@extends('admin.layouts.app')
@section('content')

<h1 class="text-center">Users</h1>
<hr>

<div class="container text-center">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
            <tr>
                <th scope="row">{{$data->role_id}}</th>
                <td>{{$data->first_name}}</td>
                <td>{{$data->email}}</td>
                <td><a href={{route('send.email',$data->id)}}><i class="fa fa-envelope"></i></a></td>
              </tr>

            @endforeach
          
        </tbody>
      </table>
</div>

@endsection