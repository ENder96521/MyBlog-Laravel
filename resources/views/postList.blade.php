@extends('layouts.master')

@section('content')
    <header class="masthead" style="background-image: url({{ asset('assets/img/post-bg.jpg' )}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>文章列表</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mx-[5rem]">
        <div class="row gy-4">
          @foreach ( $posts as $post)
            <div class="col-lg-4">
              <article>
                <h2 class="title">
                  <a href="{{ route('post', $post->id ) }}">
                    {{ $post->title }}
                  </a>
                </h2>
                <div class="d-flex align-items-center">
                  <div class="post-meta">
                    <p class="post-author">{{ $post->author }}</p>
                    <p class="post-date">
                      <time datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->toFormattedDateString() }}</time>
                    </p>
                  </div>
                </div>
              </article>
            </div>
          @endforeach
        </div>
    </div>
    {{ $posts->links() }}
@stop