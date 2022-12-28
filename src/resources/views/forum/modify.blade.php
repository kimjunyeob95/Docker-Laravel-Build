@extends('layouts.forum')

@section('inside_head_tag')
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="container">
      <input type="hidden" class="form-control" name="postid" value={{$data['post']['id']}}>
      <div class="row my-3">
        <div class="col-12">
          <label for="">Title</label>
          <input type="text" class="form-control" name="title" value={{$data['post']['title']}}>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <label for="">Category</label>
          <select class="form-select" aria-label="Default select example" name="category">
            @foreach ($data['categorys'] as $key => $item)
              <option {{$data['post']['category_id'] == $item['id'] ? "selected" : ""}} value={{$item->id}}>{{$item->title}}</option>    
            @endforeach
          </select>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <div id="editor">{!!$data['post']['content'] !!}</div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
            <button class="btn btn-success" type="button" id="btn_save">수정</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('before_end_body_tag')
<script>
  let editor;
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .then( newEditor => {editor = newEditor;} )
      .catch( error => {console.error( error );} );
  
  $('#btn_save').click(function(){
    let title = $('input[name="title"]').val();
    let category = $('select[name="category"]').val();
    let content = editor.getData();
    let id = $('input[name="postid"]').val();

    $.ajax({
      url: `/forum/${id}/modify`,
      method: 'PUT',
      dataType: 'json',
      data:{
        _token : CSRF_TOKEN,
        title,
        category,
        content
      },
      success: function(res){
        window.location.href=`/forum/view/${id}`;
      },
      error: function(res){
        console.log(res)
      }
    })
  })
</script>
@endsection

