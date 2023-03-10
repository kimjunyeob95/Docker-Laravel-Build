@extends('layouts.forum')

@section('inside_head_tag')
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="container">
      <div class="row my-3">
        <div class="col-12">
          <label for="">Title</label>
          <input type="text" class="form-control" name="title">
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <label for="">Category</label>
          <select class="form-select" aria-label="Default select example" name="category">
            @foreach ($categorys as $key => $item)
              <option {{$key == 0 ? "selected" : ""}} value={{$item->id}}>{{$item->title}}</option>    
            @endforeach
          </select>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <div id="editor"></div>
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
            <button class="btn btn-success" id="btn_save">저장</button>
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

    $.ajax({
      url: '/forum/create/posts',
      method: 'POST',
      dataType: 'json',
      data:{
        _token : CSRF_TOKEN,
        title,
        category,
        content
      },
      success: function(res){
        console.log(res)
        window.location.href = "/";
      },
      error: function(res){
        console.log(res)
      }
    })
  })
  
  
</script>
@endsection

