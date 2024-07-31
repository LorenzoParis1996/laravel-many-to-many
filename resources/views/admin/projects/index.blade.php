@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-hover table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col">Developer</th>
            <th scope="col">Release Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)


          <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->type->name}}</td>
            <td>{{$project->developer}}</td>
            <td>{{$project->release_date}}</td>
            <td><a class="btn btn-primary btn-sm" href="{{route('admin.projects.show',$project)}}">View</a>
                <a class="btn btn-info btn-sm" href="{{route('admin.projects.edit',$project)}}">Edit</a>
                <form action="{{route('admin.projects.destroy', $project)}}" class="d-inline-block" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
</div>
@endsection
