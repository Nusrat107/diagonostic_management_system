@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Holiday</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/create-holiday/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Holiday Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="holiday_name" value="{{ old('holiday_name') }}">
                            @error('holiday_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Holiday Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control" type="date" name="holiday_date" value="{{ old('holiday_date') }}">
                                @error('holiday_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Create Holiday</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Notification Box (Optional) --}}
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>
                <div class="drop-scroll msg-list-scroll" id="msg_list">
                    <ul class="list-box">
                        @foreach($messages ?? [] as $msg)
                        <li>
                            <a href="{{ $msg['link'] }}">
                                <div class="list-item {{ $msg['is_new'] ? 'new-message' : '' }}">
                                    <div class="list-left">
                                        <span class="avatar">{{ $msg['avatar'] }}</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">{{ $msg['author'] }}</span>
                                        <span class="message-time">{{ $msg['time'] }}</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">{{ $msg['content'] }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        @if(empty($messages))
                        <li class="text-center">No messages found</li>
                        @endif
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{ url('/admin/messages') }}">See all messages</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
