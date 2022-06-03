@extends('layouts.main')
@section('title','create')
    @section('content')
    
<div class="container">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        @if(session('successMsg'))
            <div class="alert alert-success" role="alert">
                {{session('successMsg')}}
            </div>
        @endif
    <h1 class="text-center">Edit Category</h1>
<form method="post" action="{{route('category.update',$editcategory )}}">
@csrf
@method('PUT')
  <div class="mb-3" >
    <label for="exampleInputEmail1" class="form-label">Category Name</label>
    <input type="text" name="name" value="{{$editcategory->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
    @endsection
    