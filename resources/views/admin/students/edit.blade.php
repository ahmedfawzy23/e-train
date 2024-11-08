@extends('admin.layout')

@section('content')
@include('admin.inc.error')
<form action = "{{route('admin.students.update')}}" method="post">
    @csrf
    <input type="hidden" name="student_id" value="{{$student->id}}">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" value = "{{$student->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">email</label>
        <input type="email" name="email" value = "{{$student->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">spec</label>
        <input type="text" name="spec" value = "{{$student->spec}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
