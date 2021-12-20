@extends('Layout')
@section('content') 
<div class="row gx-4 gx-lg-5 justify-content-center m-3">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <!-- Post preview-->
        <div class="h3 text-muted" style="margin-left: -250px;">Category </div> 
            @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="/posts/{{$post->id}}">
                        <h2 class="post-header " style="margin-left: -30px;margin-bottom: 0px;font-weight: bolder;">{{$post->title}}</h2>
                    </a>
                    <small class="post-meta">
                        Posted by
                        <a href="#!">{{$post->id}}</a>
                        <b>on</b> {{$post->created_at}} 
                    </small>
                @if ($post->url)
                    <p><img src="../upload/{{$post->url}}" style="width:600px;margin-top:10px;"></p>
                @endif
                    <p class="post-subtitle">{{$post->body}}</p>
                </div>
                {{-- Line fasel  --}}
                <hr class="my-4" />
            @endforeach
    </div>
</div>
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="/">Older Posts →</a></div>


@endsection
