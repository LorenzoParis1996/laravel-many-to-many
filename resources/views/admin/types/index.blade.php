@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-hover table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Number of projects</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)


          <tr>
            <td>{{$type->id}}</td>
            <td>{{$type->name}}</td>
            <td>{{count($type->projects)}}</td>
            <td><a class="btn btn-primary btn-sm" href="{{route('admin.types.show',$type)}}">View</a>
                <a class="btn btn-info btn-sm" href="{{route('admin.types.edit',$type)}}">Edit</a>
                <form action="{{route('admin.types.destroy', $type)}}" class="d-inline-block" method="POST">
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
