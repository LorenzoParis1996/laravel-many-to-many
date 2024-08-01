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
 <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input class="form-control mb-3" type="text" placeholder="Title" aria-label="default input example" id="title" name="title" value="{{old('title')}}">

    <select class="form-select mb-3" aria-label="Default select example" name="type_id">
        @foreach ($types as $type)

        <option value="{{$type->id}}">{{$type->name}}</option>
        @endforeach

      </select>


      <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group">
        @foreach ($technologies as $technology)

        <input type="checkbox" class="btn-check" id="technology-check-{{$technology->id}}" autocomplete="off" name="technologies[]" value="{{$technology->id}}">
        <label class="btn btn-outline-primary" for="technology-check-{{$technology->id}}">{{$technology->name}}</label>

        @endforeach
      </div>

    <input class="form-control mb-3" type="text" placeholder="Developer" aria-label="default input example" id="developer" name="developer" value="{{old('developer')}}">

    <textarea class="form-control mb-3" type="text" placeholder="Description" aria-label="default input example" id="description" name="description">{{old('description')}}</textarea>

    <input class="form-control mb-3" type="text" placeholder="Release Date" aria-label="default input example" id="release-date" name="release_date" value="{{old('release_date')}}">

    <input class="form-control mb-3" type="file" placeholder="Image" aria-label="default input example" id="image" name="image">

    <input type="submit" value="Add new project" class="btn btn-primary btn-sm">
    <input type="reset" value="Reset fields" class="btn btn-danger btn-sm">
 </form>
</div>

@endsection


