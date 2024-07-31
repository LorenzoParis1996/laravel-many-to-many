@extends('layouts.admin')

@section('content')
<div class="container">

<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h4 class="card-title">{{$type->id}}</h4>
      <h5 class="card-title">{{$type->name}}</h5>
    </div>
  </div>
</div>
<div class="container">
    <h4>Projects available in this genre</h4>
    <ul>
        @foreach ($type->projects as $project)

        <li>
            <a href="{{route('admin.projects.show', $project)}}">
                {{$project->title}}, {{$project->developer}}
            </a>
        </li>
        @endforeach
    </ul>
</div>
<div class="container mt-2">

    <a class="btn btn-info btn-sm" href="{{route('admin.types.edit',$type)}}">Edit</a>
    <form action="{{route('admin.types.destroy', $type)}}" class="d-inline-block" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</div>

@endsection
