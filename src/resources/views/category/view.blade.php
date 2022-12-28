@extends('layouts.forum')
 
@section('content')
    <div class="container my-3">
      <div class="row">
        <div class="col-12">
          <form action="/category/{{$category->id}}/modify" method="POST">
            @method('PUT')
            @csrf
            <input type="text" class="form-control" name="title" value="{{$category->title}}">
        </div>
      </div>
      <div class="row my-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <button class="btn btn-info" >수정</button>
          </form>
          <form action="/category/{{$category->id}}/delete" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" >삭제</button>
          </form>
        </div>
      </div>
    </div>
@endsection