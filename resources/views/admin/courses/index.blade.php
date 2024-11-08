@extends('admin.layout')
@section('content')

<div class="container d-flex justify-content-between mt-3">

<h4>
    courseegories
</h4>
    <a href="{{route('admin.courses.create')}}" class="btn btn-primary">Add new</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
      <tr>

        <th scope="row">{{$loop->iteration}}</th>
        <td>
            <img src="{{asset("front/courses/$course->image")}}" height = "100px" alt="">
        </td>

        <td>{{$course->name}}</td>

        <td>

            {{$course->price}}

        </td>

        <td>
            <a href="{{route('admin.courses.edit', $course->id)}}" class="btn btn-primary">edit</a>
            <a href="{{route('admin.courses.delete', $course->id)}}" class="btn btn-danger">delete</a>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>



  @endsection
