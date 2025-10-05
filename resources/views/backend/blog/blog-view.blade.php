@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            {{-- Page Title with Delete Button --}}
            <div class="row mb-3">
                <div class="col-sm-12 d-flex justify-content-between align-items-center">
                    <h4 class="page-title">{{ $blog->name }}</h4>

                    {{-- Delete button --}}
                    <form action="{{ url('/admin/blog-delete/'.$blog->id) }}" method="GET" 
                          onsubmit="return confirm('Are you sure you want to delete this blog?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="row">
                {{-- Main Blog Content --}}
                <div class="col-md-8">
                    <div class="blog-view">
                        <article class="blog blog-single-post">
                            <h3 class="blog-title">{{ $blog->name }}</h3>

                            <div class="blog-info clearfix mb-3">
                                <div class="post-left">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <i class="fa fa-calendar"></i>
                                            <span>{{ $blog->created_at->format('F d, Y') }}</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="fa fa-user-o"></i>
                                            <span>By {{ $blog->author ?? 'Admin' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            @if($blog->image)
                            <div class="blog-image mb-3">
                                <img src="{{ asset('backend/images/blog/'.$blog->image) }}" class="img-fluid" alt="{{ $blog->name }}">
                            </div>
                            @endif

                            <div class="blog-content">
                                {!! $blog->description !!}
                            </div>
                        </article>

                        {{-- Share Section Only --}}
                        <div class="widget blog-share clearfix mt-4">
                            <h5>Share the post</h5>
                            <ul class="social-share list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="col-md-4">
                    {{-- Search Widget --}}
                    <div class="widget search-widget mb-4">
                        <h5>Blog Search</h5>
                        <form class="search-form">
                            <div class="input-group">
                                <input type="text" placeholder="Search..." class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Latest Posts --}}
                    <div class="widget post-widget">
                        <h5>Latest Posts</h5>
                        <ul class="latest-posts list-unstyled">
                            @foreach(\App\Models\Blog::latest()->take(5)->get() as $latest)
                            <li class="mb-3 d-flex">
                                <div class="post-thumb mr-2">
                                    <a href="{{ url('/admin/blog-view/'.$latest->id) }}">
                                        <img class="img-fluid" src="{{ asset('backend/images/blog/'.$latest->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h6 class="mb-1"><a href="{{ url('/admin/blog-view/'.$latest->id) }}">{{ $latest->name }}</a></h6>
                                    <p class="mb-0"><i class="fa fa-calendar"></i> {{ $latest->created_at->format('F d, Y') }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
