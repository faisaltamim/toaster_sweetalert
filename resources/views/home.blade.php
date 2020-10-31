@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#exampleModalCenter">Add New</a>
                    <a href="{{route('all_posts')}}" class="btn btn-primary text-light mr-3 btn-sm float-right" >All Posts</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in right now!') }}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal in bottom --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark font-weight-bold">
          <h5 class="modal-title text-light" id="exampleModalLongTitle">Write your post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-light">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{url('post_form')}}" method="POST">
            @csrf
                <div class="form-group row">
                  <label for="title" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Your Title">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="author" class="col-sm-2 col-form-label">Author</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="author" id="author" placeholder="Author Name">
                  </div>
                </div>     
                <div class="form-group row">
                  <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="Post Search Tag">
                  </div>
                </div>     
                <div class="form-group row">
                  <label for="msg" class="col-sm-2 col-form-label">Message</label>
                  <div class="col-sm-10">
                    <textarea name="msg" class="form-control" class="p-2" placeholder="Write for..." id="msg" style="border:1px solid #ddd;border-radius:3px;width:100%;height:180%;"></textarea>
                  </div>
                </div>
            </div>
                <div class="modal-footer text-center d-block mt-5">
                    <input type="submit" class="btn btn-primary" value="Add Post">
                </div>
            </form>     
        
    
    
      </div>
    </div>
  </div>
@endsection
