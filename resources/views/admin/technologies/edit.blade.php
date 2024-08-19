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
 <form action="{{route('admin.technologies.update', $technology)}}" method="POST">
    @method('PUT')
    @csrf
    <input class="form-control mb-3" type="text" placeholder="Hardware name" aria-label="default input example" id="hardware" name="name" value="{{old('name', $technology->name)}}">


    <input type="submit" value="Update" class="btn btn-success btn-sm">
    <input type="reset" value="Reset fields" class="btn btn-danger btn-sm">
 </form>
</div>

@endsection
