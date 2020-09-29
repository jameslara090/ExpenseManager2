@extends('layouts.roles') 
@section('content')
<div class="row">
    <div class="col-sm-5 offset-sm-2">
        <h3 class="display-6">Update Expense</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('expenses.update', $expenses->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">    
              <label for="first_name">Expense Category:</label>
              <input type="text" class="form-control" name="ex_category" value={{ $expenses->ex_category }} />
          </div>

          <div class="form-group">
              <label>Amount:</label>
              <input type="text" class="form-control" name="amount" value={{ $expenses->amount }} />
          </div>
          <div class="form-group">
              <label>Entry Date:</label>
              <input type="date" class="form-control" name="entry_date" value={{ $expenses->entry_date }} />
          </div>
                
        
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection