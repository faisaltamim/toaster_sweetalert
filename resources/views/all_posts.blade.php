@extends('layouts.app')
@section('content')
<h2 class="text-center text-primary">All Posts</h2>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Serial No</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Tags</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($allData as $singleData)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$singleData->title}}</td>
        <td>{{$singleData->author}}</td>
        <td>{{$singleData->tags}}</td>
        <td>{{$singleData->desc}}</td>
        <td>
            <a href="{{url('delete-post-'.$singleData->id)}}" class="btn btn-sm btn-danger" id="mydelete">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
    