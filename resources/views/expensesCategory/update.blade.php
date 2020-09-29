@extends('layouts.roles') 
@section('content')
<div class="row">
    <div class="col-sm-5 offset-sm-2">
        <h3 class="display-6">Update Category</h3>

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
        <form method="post" action="{{ route('expensesCategory.update', $category->id) }}">
            @method('PATCH') 
            @csrf
            
            <div class="form-group">    
              <label for="first_name">Display Name:</label>
              <input type="text" class="form-control"  name="dname" value={{ $category->dname }} />
          </div>

          <div class="form-group">
              <label for="last_name">Description:</label>
              <input type="text" class="form-control" name="description" value={{ $category->description }} />
          </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection