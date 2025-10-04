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
            /* End Call নিচে যাবে */
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        /* Icon List */
        .call-items {
            display: flex;
            gap: 20px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Each Icon */
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
            margin-top: auto;
            /* উপরের সব আইটেমকে ঠেলে নিচে পাঠাবে */
            margin-bottom: 20px;
            /* নিচে ফাঁকা জায়গা রাখবে */
            text-align: right;
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
            display: inline-block;
        }

        .end-call a:hover {
            background: #d32f2f;
        }

        /* Mute icon margin */
        .call-mute {
            margin-top: 10px !important;
        }
    </style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="main-wrapper">
        <!-- Sidebar -->
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
                            <a href="#">
                                <span class="chat-avatar-sm user-img">
                                    <img src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle"
                                        alt="">
                                    <span class="status online"></span>
                                </span>
                                John Doe
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="chat-avatar-sm user-img">
                                    <img src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle"
                                        alt="">
                                    <span class="status offline"></span>
                                </span>
                                Richard Miles
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="chat-avatar-sm user-img">
                                    <img src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle"
                                        alt="">
                                    <span class="status away"></span>
                                </span>
                                John Smith
                            </a>
                        </li>

                        <li class="active">
                            <a href="#">
                                <span class="chat-avatar-sm user-img">
                                    <img src="{{ asset('backend/assets/img/user.jpg') }}" class="rounded-circle"
                                        alt="">
                                    <span class="status online"></span>
                                </span>
                                Jennifer
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Chat Section -->
        <div class="page-wrapper">
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-lg-9 message-view chat-view">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details mr-auto">
                                        <div class="float-left user-img m-r-10">
                                            <a href="profile.html" title="Jennifer Robinson">
                                                <img src="{{ asset('backend/assets/img/user.jpg') }}"
                                                    class="w-40 rounded-circle" alt="">
                                                <span class="status online"></span>
                                            </a>
                                        </div>
                                        <div class="user-info float-left">
                                            <a href="profile.html"><span class="font-bold">Jennifer Robinson</span></a>
                                            <span class="last-seen">Online</span>
                                        </div>
                                    </div>
                                    <ul class="nav float-right custom-menu">
                                        <li class="nav-item">
                                            <a class="task-chat profile-rightbar float-right" href="#chat_sidebar"
                                                id="task_chat">
                                                <i class="fa fa-comments"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown dropdown-action">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="javascript:void(0)" class="dropdown-item">Settings</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Chat Body -->
                            <div class="chat-contents">
                                <div class="chat-content-wrap">
                                    <div class="voice-call-avatar">
                                        <img src="{{ asset('backend/assets/img/doctor-03.jpg') }}" class="call-avatar"
                                            alt="">
                                        <span class="username">Cristina Groves</span>
                                        <span class="call-timing-count">01:23</span>
                                    </div>
                                    <div class="call-users">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('backend/assets/img/user-04.jpg') }}"
                                                        class="img-fluid" alt="">
                                                    <span class="call-mute"><i class="fa fa-microphone-slash"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('backend/assets/img/patient-thumb-02.jpg') }}"
                                                        class="img-fluid" alt="">
                                                    <span class="call-mute"><i class="fa fa-microphone-slash"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="{{ asset('backend/assets/img/patient-thumb-01.jpg') }}"
                                                        class="img-fluid" alt="">
                                                    <span class="call-mute"><i class="fa fa-microphone-slash"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Chat Footer -->
                            <div class="chat-footer">
                                <div class="call-icons">
                                    <ul class="call-items">
                                        <li class="call-item">
                                            <a href="#" title="Enable Video" data-placement="top" data-toggle="tooltip">
                                     <i class="fa fa-video-camera"></i>
                                            </a>
                                        </li>
                                        <li class="call-item">
                                            <a href="#" title="Mute" data-placement="top" data-toggle="tooltip">
                                         <i class="fa fa-microphone"></i>
                                            </a>
                                        </li>
                                        <li class="call-item">
                                            <a href="#" title="Add User" data-placement="top" data-toggle="tooltip">
                                           <i class="fa fa-user-plus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="end-call">
                                        <a href="javascript:void(0);">End Call</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                        <div class="chat-window video-window">
                            <div class="fixed-header">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#calls_tab" data-toggle="tab">Calls</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content chat-contents">
                                <div class="content-full tab-pane show active" id="calls_tab">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
                                                <!-- Example Chat Logs -->
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img src="{{ asset('backend/assets/img/user.jpg') }}"
                                                                class="img-fluid rounded-circle" alt="John Doe">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">You</span>
                                                                <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">phone_missed</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">Jeffrey Warden
                                                                                missed the call</span>
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
                                                            <img src="{{ asset('backend/assets/img/user.jpg') }}"
                                                                class="img-fluid rounded-circle" alt="John Doe">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">John Doe</span>
                                                                <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">call_end</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">This call has
                                                                                ended</span>
                                                                        </div>
                                                                        <div class="call-timing">
                                                                            Duration: <strong>5 min 57 sec</strong>
                                                                        </div>
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
                                                            <img src="{{ asset('backend/assets/img/user.jpg') }}"
                                                                class="img-fluid rounded-circle" alt="John Doe">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">Richard Miles</span>
                                                                <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">phone_missed</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">You missed the
                                                                                call</span>
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
                                                            <img src="{{ asset('backend/assets/img/user.jpg') }}"
                                                                class="img-fluid rounded-circle" alt="John Doe">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">You</span>
                                                                <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">ring_volume</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <a href="#"
                                                                                class="call-description call-description--linked"
                                                                                data-qa="call_attachment_link">Calling John
                                                                                Smith ...</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Example Chats -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end sidebar -->
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>
@endsection
