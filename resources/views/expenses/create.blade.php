@extends('layouts.roles')
@section('content')


<div class="container">

<div class="row">
 <div class="col-sm-5 offset-sm-2">
    <h3>Add Expense</h3>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('expenses.store') }}">
          @csrf
         
          <div class="form-group">
       <label for="exampleFormControlSelect1">Expense Category:</label>
       <select class="form-control" name="ex_category" id="">
           <option>Travel</option>
           <option>Lunch</option>
           <option>Commute</option>
           <option>other</option>
        </select>
        </div>

          <div class="form-group">
              <label>Amount:</label>
              <input type="text" class="form-control" name="amount"/>
          </div>
       
          
          <div class="form-group">
              <label>Entry Date:</label>
              <input type="date" class="form-control" name="entry_date"/>
          </div>
          
                         
          
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
</div>
</div>



@endsection