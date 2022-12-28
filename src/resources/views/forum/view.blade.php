@extends('layouts.forum')
 
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12 border border-1 mt-5">
          <h3 class="bg-light border border-1 py-3 mt-3 px-3">{{$data['post']['title']}}</h3>
          <p>{!! $data['post']['content'] !!}</p>
          @auth
          @if ($data['post']['user_id'] == auth()->user()->id)
            <hr>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3 my-3">
              <a class="btn btn-info" href="{{url('/')}}/forum/modify/{{$data['post']['id']}}">수정</a>
              <button class="btn btn-danger" id="btn_delete">삭제</button>
            </div>
          @endif
          @endauth
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <div class="d-grid gap-2 col-2 mx-auto">
            @if (count($data['heartFlag']) > 0 )
              <button class="btn btn-outline-danger rounded-pill fs-4 bg-danger text-white" id="btn-heart"><i class="fas fa-heart"></i> {{$data['heartCnt']}}</button>    
            @elseif(!isset(auth()->user()->id))
              <button class="btn btn-outline-danger rounded-pill fs-4" ><i class="fas fa-heart"></i> {{$data['heartCnt']}}</button>  
            @else
              <button class="btn btn-outline-danger rounded-pill fs-4" id="btn-heart"><i class="fas fa-heart"></i> {{$data['heartCnt']}}</button>  
            @endif
          </div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <ul class="list-group">
            @foreach ($data['replies'] as $item)
              <li class="list-group-item list-group-item-action">
              {{$item->reply}}<br>
              작성일 : {{substr($item->created_at,0,16)}} | 작성자 : {{$item->userName}}
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <hr>
      <form action="/reply/create/{{$data['post']['id']}}" method="POST">
        @csrf
        <div class="row my-3">
          <div class="col-12">
            <input type="text" class="form-control" name="reply">
          </div>
        </div>
        @auth
          <div class="row my-3">
            <div class="col-12">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" >답글 달기</button>
              </div>
            </div>
          </div>
        @endauth
      </form>
    </div>
    <input type="hidden" class="form-control" name="postid" value={{$data['post']['id']}}>
    <input type="hidden" class="form-control" name="categoryid" value={{$data['post']['category_id']}}>
@endsection

@section('before_end_body_tag')
<script>
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('#btn-heart').click(function(){
    let post_id = $('input[name="postid"]').val();

    $.ajax({
      url: `/forum/${post_id}/heart`,
      method: 'POST',
      dataType: 'json',
      data:{_token : CSRF_TOKEN},
      success: function(res){
        $('#btn-heart').html(` <i class="fas fa-heart"></i> ${res.heartCnt}`);
        if(res.heartFlag.length > 0){
          $('#btn-heart').addClass('bg-danger text-white');
        }else{
          $('#btn-heart').removeClass('bg-danger text-white');
        }
      },
      error: function(res){
        console.log(res)
      }
    })
  })

  $('#btn_delete').click(function(){
    if(confirm('정말로 삭제하시겠습니까?')){
      let id = $('input[name="postid"]').val();
      let categoryid = $('input[name="categoryid"]').val();

      $.ajax({
        url: `/forum/${id}/delete`,
        method: 'DELETE',
        dataType: 'json',
        data:{_token : CSRF_TOKEN},
        success: function(res){
          alert('삭제되었습니다.');
          window.location.href=`/category/${categoryid}/posts`;
        },
        error: function(res){
          console.log(res)
        }
      })
    }
  })
</script>
@endsection