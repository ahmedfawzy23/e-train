@extends('admin.layout')

@section('content')
@include('admin.inc.error')
<form action = "{{route('admin.students.store')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">spec</label>
        <input type="text" name="spec" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
