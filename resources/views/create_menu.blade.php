@extends('layouts.main')
@section('title','create menu')
    @section('content')
    
        <div class="container">
            <h1>CREATE MENU PAGE</h1>

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
        </div>
       
    @endsection
    