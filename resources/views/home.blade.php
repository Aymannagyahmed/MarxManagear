@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @include('inc.messages')
                    <button class="btn btn-primary btn-lg"
                    data-toggle="modal" data-target="#addModal" 
                    type="button" name="button">Add Bookmark</button>
                    <hr>
                    @if (count($bookmarks)>0)
                      <h3>My Bookmarks</h3>
                      <ul class="list-group">
                        @foreach ($bookmarks as $bookmark)
                          <li class="list-group-item clearfix">
                            <a href="{{$bookmark->url}}" target="_blank" 
                              style="position:absolute;top:30%">
                              {{$bookmark->name}}
                              <span class="label label-default">{{$bookmark->description}}</span></a>
                              <span class="float-right btn btn-group">
                                <button data-id="{{$bookmark->id}}" type="button" class="delete-bookmark btn btn-danger" name="button">
                                  <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg></span>
                                  Delete</button>
                              </span>
                          
                          </li>        
                        @endforeach
                      </ul>
                    @else
                      <h3>You dont have Bookmarks</h3>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="addModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Bookmark</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  action="{{route('bookmarks.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label >Bookmark Nmae</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label >Bookmark URL</label>
                <input type="text" class="form-control" name="url">
            </div>
            <div class="form-group">
                <label >Website Description</label>
                <textarea type="text" class="form-control" name="description"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit"
            class="btn btn-success">
          </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection
