@extends('backend.master')

@section('content')
<style>
    /* Sidebar Title Style */
    .sidebar-menu .menu-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Call Icons Section */
    .call-icons {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 15px;
        width: 100%;
    }

    .call-items {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        list-style: none;
        padding: 0;
        margin: 0 0 15px 0;
        width: 100%;
    }

    .call-items li a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 55px;
        height: 55px;
        border: 1px solid #ddd;
        border-radius: 50%;
        font-size: 20px;
        color: #333;
        background: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .call-items li a:hover {
        background: #f2f2f2;
        transform: scale(1.1);
    }

    /* End Call Button */
    .end-call {
        display: flex;
        justify-content: right;
        width: 100%;
    }

    .end-call a {
        background: #F06060;
        color: #fff;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        letter-spacing: 0.5px;
        box-shadow: 0 3px 6px rgba(255, 0, 0, 0.3);
        transition: 0.3s;
    }

    .end-call a:hover {
        background: #d32f2f;
    }

    /* Right Sidebar Tabs */
    .nav-tabs.nav-tabs-bottom {
        border-bottom: 1px solid #ddd;
    }

    .nav-tabs.nav-tabs-bottom .nav-link {
        padding: 10px 15px;
    }

    .chat-bubble {
        background: #f5f5f5;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .chat-user {
        font-weight: bold;
        margin-right: 5px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="main-wrapper">
    <!-- Left Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="fa fa-home back-icon"></i>
                            <span>Back to Home</span>
                        </a>
                    </li>

                    <li class="menu-title">
                        Chat Groups
                        <a href="#" class="add-user-icon" data-toggle="modal" data-target="#add_group">
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                    <li><a href="#">#General</a></li>
                    <li><a href="#">#Video Responsive Survey</a></li>
                    <li><a href="#">#500rs</a></li>
                    <li><a href="#">#warehouse</a></li>

                    <li class="menu-title">
                        Direct Chats
                        <a href="#" class="add-user-icon" data-toggle="modal" data-target="#add_chat_user">
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#"><img src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle" width="30"> John Doe</a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle" width="30"> Richard Miles</a>
                    </li>
                    <li class="active">
                        <a href="#"><img src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle" width="30"> Jennifer</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Left Sidebar -->

    <!-- Main Chat Section -->
    <div class="page-wrapper">
        <div class="chat-main-row">
            <div class="chat-main-wrapper">
                <!-- Chat Window -->
                <div class="col-lg-9 message-view chat-view">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="user-details mr-auto">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html"><img src="{{asset('backend/assets/img/user.jpg')}}" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                    </div>
                                    <div class="user-info float-left">
                                        <a href="profile.html"><span class="font-bold">Mike Litorus</span></a>
                                        <span class="last-seen">Online</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-contents">
                            <div class="chat-content-wrap">
                                <div class="user-video">
                                    <img src="{{asset('backend/assets/img/video-call.jpg')}}" alt="">
                                </div>
                                <div class="my-video">
                                    <ul>
                                        <li><img src="{{asset('backend/assets/img/user-02.jpg')}}" class="img-fluid" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Chat Footer -->
                        <div class="chat-footer">
                            <div class="call-icons">
                                <ul class="call-items">
                                    <li class="call-item"><a href="#"><i class="fa fa-video-camera"></i></a></li>
                                    <li class="call-item"><a href="#"><i class="fa fa-microphone"></i></a></li>
                                    <li class="call-item"><a href="#"><i class="fa fa-user-plus"></i></a></li>
                                    <li class="call-item"><a href="#"><i class="fa fa-arrows-v"></i></a></li>
                                </ul>
                                <div class="end-call">
                                    <a href="javascript:void(0);">End Call</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Chat Footer -->
                    </div>
                </div>
                <!-- /Chat Window -->

                <!-- Right Sidebar with Tabs -->
                <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                    <div class="chat-window video-window">
                        <div class="fixed-header">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a class="nav-link active" href="#calls_tab" data-toggle="tab">Calls</a></li>
                            </ul>
                        </div>
                        <div class="tab-content chat-contents">
                            <!-- Calls Tab -->
                            <div class="content-full tab-pane show active" id="calls_tab">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="chats">
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img alt="John Doe" src="{{asset('backend/assets/img/user.jpg')}}" class="img-fluid rounded-circle">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="chat-user">You</span> <span class="chat-time">8:35 am</span>
                                                            <div class="call-details">
                                                                <i class="material-icons">phone_missed</i>
                                                                <span class="call-description">Jeffrey Warden missed the call</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="John Doe" src="{{asset('backend/assets/img/user.jpg')}}" class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">John Doe</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">call_end</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details"><span class="call-description">This call has ended</span></div>
                                                                        <div class="call-timing">Duration: <strong>5 min 57 sec</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-line">
                                                    <span class="chat-date">January 29th, 2015</span>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="John Doe" src="{{asset('backend/assets/img/user.jpg')}}" class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">Richard Miles</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">phone_missed</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">You missed the call</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="John Doe" src="{{asset('backend/assets/img/user.jpg')}}" class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">You</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">ring_volume</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <a href="#" class="call-description call-description--linked" data-qa="call_attachment_link">Calling John Smith ...</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Calls Tab -->

                           

                            
                        </div>
                    </div>
                </div>
                <!-- /Right Sidebar -->
            </div>
        </div>
    </div>
</div>

<div class="sidebar-overlay" data-reff=""></div>
@endsection
