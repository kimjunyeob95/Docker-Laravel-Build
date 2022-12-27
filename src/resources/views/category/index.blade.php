@extends('layouts.forum')
 
@section('content')
    <div class="container">
      <div class="row my-3">
        <div class="col-12">
          <label for="">Category Title</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-primary" type="button">추가</button>
        </div>
      </div>
      <hr>
      <div class="row my-3">
        <div class="col-12">
          <ul class="list-group">
            <li class="list-group-item">
              <a href="{{url('/')}}/category/view/1">제목</a>
            </li>
            <li class="list-group-item">
              <a href="{{url('/')}}/category/view/1">제목</a>
            </li>
            <li class="list-group-item">
              <a href="{{url('/')}}/category/view/1">제목</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
@endsection