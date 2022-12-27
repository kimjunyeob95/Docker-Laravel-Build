@extends('layouts.forum')

@section('content')
  <div class="container">
    <div class="row my-3">
      <div class="col-12">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
          <a href="{{url('/')}}/forum/create" class="btn btn-success" type="button">글 작성</a>
        </div>
      </div>
    </div>
    <hr>
    <div class="row mt-5">
      <div class="col-12">
        <h4>Movie</h4>
        <ul class="list-group">
          <li class="list-group-item list-group-item-action">
            <a href="{{url('/')}}/forum/view/1">fdasfdas </a>
            <span class="badge bg-info rounded-pill"><i class="fas fa-comment-dots"></i> 2</span>
            <span class="badge bg-danger rounded-pill"><i class="fas fa-heart"></i> 5</span>
            <br>
            <small>2022-12-28 | by kimjunyeob</small>
          </li>
          <li class="list-group-item list-group-item-action">
            fdasfdas 
            <span class="badge bg-info rounded-pill"><i class="fas fa-comment-dots"></i> 2</span>
            <span class="badge bg-danger rounded-pill"><i class="fas fa-heart"></i> 5</span>
            <br>
            <small>2022-12-28 | by kimjunyeob</small>
          </li>
        </ul>
      </div>
      <div class="col-12 my-3">
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button">All Postings of Movie Category</button>
        </div>
      </div>
    </div>
    <hr>
    <div class="row mt-5">
      <div class="col-12">
        <h4>Music</h4>
        <ul class="list-group">
          <li class="list-group-item list-group-item-action">
            fdasfdas 
            <span class="badge bg-info rounded-pill"><i class="fas fa-comment-dots"></i> 2</span>
            <span class="badge bg-danger rounded-pill"><i class="fas fa-heart"></i> 5</span>
            <br>
            <small>2022-12-28 | by kimjunyeob</small>
          </li>
          <li class="list-group-item list-group-item-action">
            fdasfdas 
            <span class="badge bg-info rounded-pill"><i class="fas fa-comment-dots"></i> 2</span>
            <span class="badge bg-danger rounded-pill"><i class="fas fa-heart"></i> 5</span>
            <br>
            <small>2022-12-28 | by kimjunyeob</small>
          </li>
        </ul>
      </div>
      <div class="col-12 my-3">
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button">All Postings of Movie Category</button>
        </div>
      </div>
    </div>
  </div>
@endsection

