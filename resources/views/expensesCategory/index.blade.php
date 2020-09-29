@extends('layouts.roles')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expenses Categories</h1>
          
         
        </div>
      </div>
    </div>
    


    <section class="content">
    
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <a style="margin: 19px;" href="{{ route('expensesCategory.create')}}" class="btn btn-primary">New Category</a>
            <div class="box-body">
            <table class="table table-bordered table-striped">
    <thead>
        <tr>
          <td>Display Name</td>
          <td>Description</td>
          <td>Created_at</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($category as $Category)
        <tr>
            <td>{{$Category->dname}}</td>
            <td>{{$Category->description}}</td>
            <td>{{$Category->created_at}}</td>
            <td>
                <a href="{{ route('expensesCategory.edit',$Category->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <form action="{{ route('expensesCategory.destroy', $Category->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
       @endforeach
    </tbody>
  </table>
  </div>
    </section>
   
@endsection