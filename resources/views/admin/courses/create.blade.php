@extends('admin.layout')

@section('content')
@include('admin.inc.error')
<form action = "{{route('admin.courses.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Small Desc</label>
        <input type="text" name="small_desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="disabledSelect" class="form-label">Categories</label>
        <select id="disabledSelect" class="form-select" name="category_id">
            @foreach ($categories as $category)

            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="disabledSelect" class="form-label">Trainers</label>
        <select id="disabledSelect" class="form-select" name="trainer_id">
            @foreach ($trainers as $trainer)
            <option value="{{$trainer->id}}">{{$trainer->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="form-floating">
        <textarea class="form-control" name = "desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Desc</label>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">image</label>
        <input type="file" name="image" class="form-control-file" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
