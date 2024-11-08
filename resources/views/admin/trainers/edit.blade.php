@extends('admin.layout')

@section('content')
@include('admin.inc.error')
<form action = "{{route('admin.trainers.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="trainer_id" value="{{$trainer->id}}">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" value = "{{$trainer->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="text" name="phone" value = "{{$trainer->phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Spec</label>
        <input type="text" name="spec" value = "{{$trainer->spec}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>


<img src="{{asset("front/trainers/$trainer->image")}}" highet = "100px" alt="">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">image</label>
        <input type="file" name="image" class="form-control-file" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
