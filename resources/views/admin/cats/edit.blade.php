@extends('admin.layout')

@section('content')
<form action = "{{route('admin.cats.update')}}" method="post">
    @csrf
    <input type="hidden" name="cat_id" value="{{$cat->id}}">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Ctegory Name</label>
      <input type="text" name="name" value = "{{$cat->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
