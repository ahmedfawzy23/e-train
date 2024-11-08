@extends('admin.layout')
@section('content')

<div class="container d-flex justify-content-between mt-3">

<h4>
    Courses
</h4>
    <a href="{{route('admin.students.create')}}" class="btn btn-primary">Add new</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>

        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
      <tr>

        <th scope="row">{{$loop->iteration}}</th>


        <td>{{$course->name}}</td>
        <td>{{$course->pivot->status}}</td>


        <td>
            {{-- {{-- <a href="{{route('admin.students.edit', $student->id)}}" class="btn btn-primary">edit</a> --}}
<a href="{{route('admin.students.approve', [$student_id, $course->id])}}" class="btn btn-primary">Approve</a>

            <a href="{{route('admin.students.reject', [$student_id, $course->id])}}" class="btn btn-danger">reject</a>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>



  @endsection
