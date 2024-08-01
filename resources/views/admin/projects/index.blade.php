@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-hover table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col">Hardware/Console</th>
            <th scope="col">Developer</th>
            <th scope="col">Release Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)


          <tr>
            <td>{{$project->title}}</td>
            <td><span class="badge rounded-pill text-bg-primary">{{$project->type->name}}</span>
            </td>

            <td>
                @forelse ($project->technologies as $technology)
                <span class="badge rounded-pill text-bg-success">{{$technology->name}}</span>@if (!$loop->last) - @endif

                @empty
                <td>Not available on this device</td>

                @endforelse
            </td>
            <td>{{$project->developer}}</td>
            <td>{{$project->release_date}}</td>
            <td><a class="btn btn-primary btn-sm" href="{{route('admin.projects.show',$project)}}">View</a>
                <a class="btn btn-success btn-sm" href="{{route('admin.projects.edit',$project)}}">Edit</a>
                <form action="{{route('admin.projects.destroy', $project)}}" class="d-inline-block" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm mt-1">Delete</button>
                </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
</div>
@endsection
