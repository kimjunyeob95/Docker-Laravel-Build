@extends('layouts.forum')
 
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12 border border-1 mt-5">
          <h3>Lorem, ipsum dolor.</h3>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate distinctio eveniet velit beatae ipsum voluptates provident ducimus! Maiores expedita explicabo possimus architecto, esse consectetur pariatur ducimus harum commodi aliquam minus cumque doloremque dicta ex, optio perspiciatis at exercitationem eaque iure modi, blanditiis totam! Repellendus omnis eius dolore exercitationem dolores itaque.
          <hr>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <button class="btn btn-info" type="button">수정</button>
            <button class="btn btn-danger" type="button">삭제</button>
          </div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <div class="d-grid gap-2 col-2 mx-auto">
            <button class="btn btn-outline-danger rounded-pill fs-4"><i class="fas fa-heart"></i> 5</button>
          </div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <ul class="list-group">
            <li class="list-group-item list-group-item-action">A second item</li>
            <li class="list-group-item list-group-item-action">A third item</li>
            <li class="list-group-item list-group-item-action">A fourth item</li>
            <li class="list-group-item list-group-item-action">And a fifth one</li>
          </ul>
        </div>
      </div>
      <hr>
      <div class="row my-3">
        <div class="col-12">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="button">답글 달기</button>
          </div>
        </div>
      </div>
    </div>
@endsection