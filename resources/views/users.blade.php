@extends('layouts.roles')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
            
        </div>
      </div>
    </div>
<section class='content'>
@if(count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{$errors}}</li>
@endforeach
</ul>
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success">
<p>{{\Session::get('success')}}</p>
</div>
@endif

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Add Users
</button>

<!-- Add Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ action('UsersControllers@store')}}" method="post">
      {{csrf_field()}}
      <div class="modal-body">
      
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name">
  </div>
  <div class="form-group">
    <label>Roles</label>
    <input type="text" class="form-control" name="roles" placeholder="Admin or Users">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
 
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Edit Modal-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/users" method="post" id="Editform">
      {{csrf_field()}}
      {{ method_field('PUT')}}
      <div class="modal-body">
      
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name">
  </div>
  <div class="form-group">
    <label>Roles</label>
    <input type="text" class="form-control" id="roles" name="roles" placeholder="Admin or Users">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" id="email"name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
 
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Roles</td>
          <td>Created_at</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $userdata)
        <tr>
            <td>{{$userdata->id}}</td>
            <td>{{$userdata->name}}</td>
            <td>{{$userdata->email}}</td>
            <td></td>
            <td>{{$userdata->created_at}}</td>
            <td>
                <a href="" class="btn btn-primary">Edit</a>
               
            </td>
            <td>
            <form action="{{ route('users.destroy', $userdata->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <!--<td>
                <form action="" method="post">
                 
                 
                </form>
            </td>-->
        </tr>
        @endforeach
       
    </tbody>
  </table>
</section>

   
@endsection