@extends('layouts.forum')

@section('inside_head_tag')
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="container">
      <div class="row my-3">
        <div class="col-12">
          <label for="">Title</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="row my-3">
        <div class="col-12">
          <label for="">Category</label>
          <select class="form-select" aria-label="Default select example">
            <option selected>Movie</option>
            <option value="1">Music</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
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
            <button class="btn btn-success" type="button">저장</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('before_end_body_tag')
<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
</script>

@endsection