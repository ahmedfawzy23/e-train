@extends('admin.layout')
@section('content')

<div class="container d-flex justify-content-between mt-3">

<h4>
    Categories
</h4>
    <a href="{{route('admin.cats.create')}}" class="btn btn-primary">Add new</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cats as $cat)
      <tr>

        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$cat->name}}</td>
        <td>
            <a href="{{route('admin.cats.edit', $cat->id)}}" class="btn btn-primary">edit</a>
            <a href="{{route('admin.cats.delete', $cat->id)}}" class="btn btn-danger">delete</a>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>



  @endsection
