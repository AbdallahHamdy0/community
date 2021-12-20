@extends('Layout')
@section('icons')
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
@endsection
@section('content')


@foreach ($posts as $post)
    

<div class="row gx-4 gx-lg-5 justify-content-center m-3">
    <div class="col-md-11 col-lg-10 col-xl-9">
        <!-- Post preview-->
        <div class="post-preview">
            <a href="/posts/{{$post->id}}">
                <h2 class="post-header " style="margin-left: -30px;margin-bottom: 0px;font-weight: bolder;">{{$post->title}}</h2>                
            </a>
            <small class="post-meta">
                Posted by
                <a href="#!">{{$post->id}}</a>
                <b>on</b> {{$post->created_at}} <strong>Category : </strong> 
                <a href="../category/{{$post->category->name}}">
                    {{$post->category->name}}
                    </a>
            </small>
            @if ($post->url)
                
            
            <p><img src="upload/{{$post->url}}" style="width:650px; margin-top:10px;"></p>
            @endif
            <p class="post-subtitle">{{$post->body}}</p>
            <form method="POST">
            <a href="/posts/{{$post->id}}"  class="btn btn-primary p-3" style="font-size: 14px">Read More ></a>
            @php
                $like_count=0;
                $dislike_count=0;
                $like_status='normal';
                $dislike_status='normal';
            @endphp
         @foreach ($post->likes as $like) 
            @php
                if($like->like==1){
                    $like_count++;
                }
                if($like->like==0){
                    $dislike_count++;
                }
                if (Auth::check()){
                if ($like->like == 1 && $like->user_id == Auth::user()->id) {
                    $like_status='like_status';
                }
                if ($like->like == 0 && $like->user_id == Auth::user()->id) {
                    $dislike_status='dislike_status';
                }
            }
            @endphp    
        @endforeach

            <button class=" like btn p-3 {{$like_status}}" data-post-id="{{$post->id}}-l" data-like="{{$like_status}}"  type="button"  style="font-size: 14px;  "  >
                like  <span class="glyphicon glyphicon glyphicon-thumbs-up"> </span> <b> <span class="like_count"> {{$like_count}} </span></b>
            </button>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                </svg> --}}
                
              
           
            <button class="dislike btn  p-3 {{$dislike_status}}" data-post-id="{{$post->id}}-d" data-like="{{$dislike_status}}"  type="button"  style="font-size: 14px;  ">
                Dislike
                <span class="glyphicon glyphicon glyphicon-thumbs-down"></span> <b> <span class="dislike_count">{{$dislike_count}} </span></b>
            </button>

                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"></path>
                </svg> --}}
              
        </div>
        <!-- Divider-->
        <hr class="my-4" />
        <!-- Post preview-->
    </div>

        @endforeach
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


        <!-- Divider-->
        <!-- Pager-->
        {{-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="">Older Posts →</a></div> --}}

    </div>
@endsection
{{-- 
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <!-- Post preview-->
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href="#!">Start Bootstrap</a>
                on September 24, 2021
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
        <!-- Post preview-->
        
        <!-- Divider-->
        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
    </div>
</div> --}}