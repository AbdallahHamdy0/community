@extends('Layout')
@section('content')


    

<div class="row gx-4 gx-lg-5 justify-content-center m-3">

    <div class="col-md-11 col-lg-10 col-xl-9">
        <!-- Post preview-->
        <div class="post-preview">
            <a href="post.html">
                
                <h2 class="post-header " style="margin-left: -30px;margin-bottom: 0px;font-weight: bolder;"> {{$post->title}}</h2></a>
                <small class="post-meta">
                    Posted by
                    <a href="#!">{{$post->id}}</a>
                    <b>on</b> {{$post->created_at}} <strong>Category : </strong> 
                    <a href="../category/{{$post->category->name}}">
                    {{$post->category->name}}
                    </a>
                </small>
            @if ($post->url)
            <p><img src="../upload/{{$post->url}}" style="width:650px; margin-top:10px;"></p>
            @endif
                <p class="post-subtitle">{{$post->body}}</p>
                @php
                $like_count=0;
                $dislike_count=0;
            @endphp
         @foreach ($post->likes as $like) 
            @php
                if($like->like==1){
                    $like_count++;
                }
                if($like->like==0){
                    $dislike_count++;
                }
            @endphp    
        @endforeach

            <button type="button" class="btn  btn-danger " >
                like
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                </svg>
                <b>{{$like_count}}</b>
              </button>
            </button>
            <button type="button" class="btn btn-outline-danger">
                Dislike
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"></path>
                </svg>
                <b>{{$dislike_count}}</b>
            </button>
        </div>

        <!-- Divider-->
        <hr class="my-4" />
        @if($stop_comment==1)
    <div class="container p-3 alert alert-danger text-center">
    <h3 class="">Oops!... Comments Closed Now.</h3>
     </div>
        @else
        <form method="POST" action="/posts/{{$post->id}}/store" class="bg-light p-2  "style="border-radius:5px;">

            {{ csrf_field() }}
            @foreach ($post->comments as $comment)
                        <div  class="bg-white m-1 ">
                                                   
                            <div  style="padding:2px 5px 2px 10px;border:1px solid #eee;border-radius:5px; ">
                                <p class="p-1  m-1" >{{$comment->body}}</p>
                                {{-- <span  style="font-size:13px;"class="post-meta">
                                    
                                    Posted by <a href="#!">{{$post->id}}</a> <b>on</b> {{$post->created_at}}
                                </span> --}}
                            </div>
                            
                           
                        </div>
                 @endforeach
                        <div style=" " class=" p-1  rounded bg-light">
                            <div class="d-flex flex-row align-items-start">
                                <textarea  placeholder="Type Ur comment Here . . ." class="rounded p-3" name="body" style=" height:150px;margin-bottom:10px; width:650px;"></textarea>
                            </div>
                            <div  style="margin: 0 5px 5px 0; text-align:right;">
                                <button class="btn btn-secondary  p-2 rounded" type="submit">Post Comment</button>
                            </div>
                        </div>
        </form>
    @endif
            

        <!-- Divider-->
        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary m-2" href="/">Older Posts →</a></div>


@endsection
