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
    <h1 class="text-center">Edit Menu</h1>
<form method="post" action="{{route('menu.update',$editmenu )}}" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="mb-3" >
    <label for="exampleInputEmail1" class="form-label">Menu Name</label>
    <input type="text" name="name" value="{{$editmenu->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-outline mb-3">
            <textarea class="form-control" value="{{$editmenu->description}}" id="textAreaExample" name="description" rows="4">{{$editmenu->description}}</textarea>
            <label class="form-label" for="textAreaExample">Description</label>
    </div>
    <div class="form-outline mb-3">
        <input type="number" id="typeNumber" value="{{$editmenu->price}}" name="price" class="form-control" />
        <label class="form-label" for="typeNumber">Price</label>
    </div>
    <div class="form-outline mb-3">
        <input type="file" id="typeText" name="image" class="form-control" />
    </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
    @endsection
    