@extends('layouts.main')
@section('title','category table')
@section('content')

<h1 class="text-center">Category Table</h1><br>
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
        <div class="container">
<!-- Button trigger modal -->
<button
  type="button"
  class="btn btn-primary"
  data-mdb-toggle="modal"
  data-mdb-target="#exampleModal"
>
  ADD MENU +
</button>

<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
    <form method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-outline mb-3" >
            <input type="name" id="typeText" name="name" class="form-control" />
            <label class="form-label" for="typeText">Menu Name</label>
        </div>
        <div class="form-outline mb-3" >
        <select class="custom-select" name="category">
            <option selected>Select Categories</option>
            @foreach($categorytable as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-outline mb-3">
            <textarea class="form-control" id="textAreaExample" name="description" rows="4"></textarea>
            <label class="form-label" for="textAreaExample">Description</label>
        </div>
        <div class="form-outline mb-3">
            <input type="number" id="typeNumber" name="price" class="form-control" />
            <label class="form-label" for="typeNumber">Price</label>
        </div>
        <div class="form-outline mb-3">
            <input type="file" id="typeText" name="image" class="form-control" />
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

    <button type="button" class="btn btn-primary" style="float:right;">
        No of Category in Current Page <span class="badge badge-light" style = "font-size: 1.5em;" >{{$categorytable->count()}}</span>
    </button><br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S/N</th>
                <th scope="col">CATEGORY NAME</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
                <th scope="col">CREATED_AT</th>
                <th scope="col">UPDATED_AT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorytable as $key=> $categorytab)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$categorytab->name}}</td>
                    <td><a href=" {{route('category.edit',$categorytab->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>EDIT</a></td>
                    <form action=" {{route('category.destroy',$categorytab->id)}}" id="delete-form{{$categorytab->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>


                    <td>
                        <a href="" onclick = "if(confirm(' Are you sure you want to delele this data?')){
                                    event.preventDefault();
                                    getElementById('delete-form{{$categorytab->id}}').submit();
                            }"
                            else{
                                event.preventDefault();
                            }
                            class="btn btn-danger"><i class="fas fa-trash-alt"></i>DELETE
                        </a>
                    </td>
                            <td>{{$categorytab->created_at->diffForHumans()}}</td>
                            <td>{{$categorytab->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach

        
            
        </tbody>
    </table>
    {{$categorytable->links()}}
</div>
@endsection
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    