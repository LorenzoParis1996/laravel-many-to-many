@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-hover table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Number of hardware releases</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)


          <tr>
            <td>{{$technology->id}}</td>
            <td>{{$technology->name}}</td>
            <td>{{count($technology->projects)}}</td>
            <td><a class="btn btn-primary btn-sm" href="{{route('admin.technologies.show', $technology)}}">View</a>
                <a class="btn btn-info btn-sm" href="{{route('admin.technologies.edit', $technology)}}">Edit</a>
                <form action="{{route('admin.technologies.destroy', $technology)}}" class="d-inline-block" method="POST">
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
