@extends('admin.layout')

@section('content')
<form action = "{{route('admin.trainers.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Spec</label>
        <input type="text" name="spec" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">image</label>
        <input type="file" name="image" class="form-control-file" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
