@extends('layouts.admin')

@section('content')

<div class="container">
    @if ($errors->any())
       <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
             <li>{{$error}}</li>
            @endforeach
         </ul>
       </div>
    @endif
</div>

<div class="container">
 <form action="{{route('admin.technologies.store')}}" method="POST">
    @csrf
    <input class="form-control mb-3" type="text" placeholder="Name hardware" aria-label="default input example" id="hardware" name="name" value="{{old('name')}}">


    <input type="submit" value="Add new hardware" class="btn btn-primary btn-sm">
    <input type="reset" value="Reset fields" class="btn btn-danger btn-sm">
 </form>
</div>

@endsection
