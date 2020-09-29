@extends('layouts.roles')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">My Expenses</h1>
          
         
        </div>
      </div>
    </div>
    


    <section class="content">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <a style="margin: 19px;" href="{{ route('expenses.create')}}" class="btn btn-primary">Add Expense</a>
  <table class="table table-bordered table-striped">
    <thead>
        <tr>
          <td>Expenses Category</td>
          <td>Amount</td>
          <td>Entry Date</td>
          <td>Created_at</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($expenses as $expense)
        <tr>
            <td>{{$expense->ex_category}}</td>
            <td>{{$expense->amount}}</td>
            <td>{{$expense->entry_date}}</td>
            <td>{{$expense->created_at}}</td>
            <td>
                <a href="{{ route('expenses.edit',$expense->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <form action="{{ route('expenses.destroy', $expense->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
       @endforeach
    </tbody>
  </table>
    </section>
   
@endsection