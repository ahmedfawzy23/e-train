@extends('admin.layout')
@section('content')

<div class="container d-flex justify-content-between mt-3">

<h4>
    Students
</h4>
    <a href="{{route('admin.students.create')}}" class="btn btn-primary">Add new</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Spec</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
      <tr>

        <th scope="row">{{$loop->iteration}}</th>


        <td>{{$student->name}}</td>

        <td>

            {{$student->email}}

        </td>
        <td>{{$student->spec}}</td>

        <td>
            <a href="{{route('admin.students.edit', $student->id)}}" class="btn btn-primary">edit</a>
            <a href="{{route('admin.students.delete', $student->id)}}" class="btn btn-danger">delete</a>
            <a href="{{route('admin.students.showCourses', $student->id)}}" class="btn btn-info">Show Cources</a>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>



  @endsection
