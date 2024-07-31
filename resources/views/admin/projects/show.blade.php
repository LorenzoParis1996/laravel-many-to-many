@extends('layouts.admin')

@section('content')
<div class="container">

<div class="card" style="width: 30rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h4 class="card-title">{{$project->title}}</h4>
      <h5 class="card-title">{{$project->type->name}}</h5>
      <h5 class="card-title">{{$project->developer}}</h5>
      <p class="card-text">{{$project->release_date}}</p>
      <p class="card-text">{{$project->description}}</p>
    </div>
  </div>
</div>
<div class="container mt-2">

    <a class="btn btn-info btn-sm" href="{{route('admin.projects.edit',$project)}}">Edit</a>
    <form action="{{route('admin.projects.destroy', $project)}}" class="d-inline-block" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</div>

@endsection
