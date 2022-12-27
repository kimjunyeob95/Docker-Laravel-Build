@extends('layouts.forum')
 
@section('content')
    <div class="container my-3">
      <div class="row">
        <div class="col-12">
          <input type="text" class="form-control" value="제목">
        </div>
      </div>
      <div class="row my-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
          <button class="btn btn-info" type="button">수정</button>
          <button class="btn btn-danger" type="button">삭제</button>
        </div>
      </div>
    </div>
@endsection