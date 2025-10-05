@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">Blog</h4>
                </div>
                <div class="col-sm-4 col-8 text-right m-b-30">
                    <a class="btn btn-primary btn-rounded float-right" href="{{url('/admin/blog-add')}}">
                        <i class="fa fa-plus"></i> Add Blog
                    </a>
                </div>
            </div>

            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="{{url('/admin/blog-view', $blog->id) }}">
                                <img class="img-fluid" src="{{ asset('backend/images/blog/'.$blog->image) }}" alt="{{ $blog->name }}">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title">
                                <a href="{{url('/admin/blog-view/', $blog->id) }}">{{ $blog->name }}</a>
                            </h3>
                            <p>{{ Str::limit($blog->description, 100) }}</p>
                            <a href="{{url('/admin/blog-view', $blog->id) }}" class="read-more">
                                <i class="fa fa-long-arrow-right"></i> Read More
                            </a>
                            <div class="blog-info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-calendar"></i> 
                                                <span>{{ $blog->created_at->format('F d, Y') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-right">
                                    <a href="#"><i class="fa fa-heart-o"></i> 21</a>
                                    <a href="#"><i class="fa fa-eye"></i> 8</a>
                                    <a href="#"><i class="fa fa-comment-o"></i> 17</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Notification box --}}
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            {{-- Example: Message list can be dynamic later --}}
                            @foreach($messages ?? [] as $message)
                            <li>
                                <a href="{{ url('admin/chat', $message->id) }}">
                                    <div class="list-item {{ $message->is_new ? 'new-message' : '' }}">
                                        <div class="list-left">
                                            <span class="avatar">{{ strtoupper($message->sender_name[0]) }}</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">{{ $message->sender_name }}</span>
                                            <span class="message-time">{{ $message->created_at->format('h:i A') }}</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">{{ Str::limit($message->content, 50) }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="{{url('/admin/chat')}}">See all messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
</div>
@endsection
