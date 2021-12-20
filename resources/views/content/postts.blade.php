@extends('Layout')
@section('icons')
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
@endsection
@section('content')

@if (Auth::check())
@if(Auth::user()->hasRole('Admin')||Auth::user()->hasRole('editor'))
<div class="card">
<form method="POST" action="/posts/store" class="col-md-10" enctype="multipart/form-data">
{{ csrf_field() }}


    <div class="form-group">
      <label for="formGroupExampleInput" class="card-header">Title : </label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="type ur title" name="title">
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput2"class="card-header">Body </label>
      <textarea type="text" class="form-control" id="formGroupExampleInput2" placeholder="Type post body " name="body"></textarea>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput3"class="card-header">Image</label>
        <input type="file" class="form-control" id="formGroupExampleInput3" name="url">
      </div>
    <div style="margin-top: 5px; " >
        <button style="border-radius:5px;width:150px;" class="btn btn-primary btn-lg mb-2"  type="submit">Post </button>
      </div>
</form>
@foreach ($errors->all() as $error)
    
<div class="alert alert-danger" role="alert">

    {{$error}}            
</div>
@endforeach    


</div>
@endif
@endif

@endsection
