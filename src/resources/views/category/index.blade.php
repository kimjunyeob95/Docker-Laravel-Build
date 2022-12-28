@extends('layouts.forum')
 
@section('content')
    <div class="container">
      <div class="row my-3">
        <div class="col-12">
          <label for="">Category Title</label>
          <form action="/category/store" method="post">
            @csrf
            <input type="text" class="form-control" name="title">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
              <button class="btn btn-primary"  >추가</button>
            </div>
          </form>
        </div>
      </div>
      <hr>
      <div class="row my-3">
        <div class="col-12">
          <ul class="list-group">
            @foreach ($categorys as $item)
              <li class="list-group-item">
                <a href="{{url('/')}}/category/{{ $item->id }}"> {{ $item->title }}</a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
@endsection