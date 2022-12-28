@extends('layouts.forum')

@section('content')
  <div class="container">
    <div class="row my-3">
      <div class="col-12">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
          <a href="{{url('/')}}/forum/create" class="btn btn-success">글 작성</a>
        </div>
      </div>
    </div>
    <hr>
    <div class="row mt-3">
      <div class="col-12">
        <h4>{{$datas['category']->title}}</h4>
        <br>
        <ul class="list-group">
          @foreach ($datas['posts'] as $post)
            <li class="list-group-item list-group-item-action">
              <a href="{{url('/')}}/forum/view/{{$post->id}}" style="text-decoration: none" class="text-dark">{{$post->title}} </a>
              <span class="badge bg-info rounded-pill"><i class="fas fa-comment-dots"></i> {{$post->replyCnt}}</span>
              <span class="badge bg-danger rounded-pill"><i class="fas fa-heart"></i> {{$post->heartCnt}}</span>
              <br>
              <small>{{substr($post->created_at,0,16)}} | by {{$post->userName}}</small>
            </li>    
          @endforeach
        </ul>
      </div>
      <div class="col-12 my-3">
        {{ $datas['posts']->links() }}
      </div>
    </div>
  </div>
@endsection

