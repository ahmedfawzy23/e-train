@extends('admin.layout')
@section('content')

<div class="container d-flex justify-content-between mt-3">

<h4>
    traineregories
</h4>
    <a href="{{route('admin.trainers.create')}}" class="btn btn-primary">Add new</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">phone</th>
        <th scope="col">spec</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($trainers as $trainer)
      <tr>

        <th scope="row">{{$loop->iteration}}</th>
        <td>
            <img src="{{asset("front/trainers/$trainer->image")}}" alt="">


        </td>

        <td>{{$trainer->name}}</td>

        <td>@if ($trainer->phone != null)

            {{$trainer->phone}}
            @else
            not exist
            @endif
        </td>

        <td>{{$trainer->spec}}</td>
        <td>
            <a href="{{route('admin.trainers.edit', $trainer->id)}}" class="btn btn-primary">edit</a>
            <a href="{{route('admin.trainers.delete', $trainer->id)}}" class="btn btn-danger">delete</a>

        </td>
    </tr>
    @endforeach

    </tbody>
  </table>



  @endsection
