@extends('layouts.roles')
@section('content')


<div class="container">

<div class="row">
 <div class="col-sm-5 offset-sm-2">
    <h3>Add Category</h3>
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
    <form method="post" action="{{ route('expensesCategory.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">Display Name:</label>
              <input type="text" class="form-control" name="dname"/>
          </div>

          <div class="form-group">
              <label for="last_name">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
                         
          
          <button type="submit" class="btn btn-primary">Add Category</button>
      </form>
  </div>
</div>
</div>
</div>



@endsection