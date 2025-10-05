@extends('backend.master')

@section('content')
<style>
    .sidebar-menu .menu-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<!-- ✅ Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<div class="main-wrapper">
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div class="sidebar-menu">
                <ul>
                    <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home back-icon"></i> <span>Back to Inbox</span></a></li>
                    <li><a href="{{url('/admin/ixbox-email')}}">Inbox <span class="mail-count">(21)</span></a></li>
                    <li><a href="#">Starred</a></li>
                    <li><a href="#">Sent Mail</a></li>
                    <li><a href="#">Draft <span class="mail-count">(8)</span></a></li>
                    <li><a href="#">Trash</a></li>
                    <li class="menu-title">Label <a href="#" class="add-user-icon"><i class="fa fa-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-circle text-success mail-label"></i> Work</a></li>
                    <li><a href="#"><i class="fa fa-circle text-danger mail-label"></i> Office</a></li>
                    <li><a href="#"><i class="fa fa-circle text-warning mail-label"></i> Personal</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Compose</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <form>
                            <div class="form-group">
                                <input type="email" placeholder="To" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Cc" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Bcc" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Subject" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" class="form-control" placeholder="Enter your message here"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <div class="text-center compose-btn">
                                    <button class="btn btn-primary"><span>Send</span> <i class="fa fa-send m-l-5"></i></button>
                                    <button class="btn btn-success m-l-5" type="button"><span>Draft</span> <i class="fa fa-floppy-o m-l-5"></i></button>
                                    <button class="btn btn-danger m-l-5" type="button"><span>Delete</span> <i class="fa fa-trash-o m-l-5"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sidebar-overlay" data-reff=""></div>
@endsection


@push('script')
<!-- ✅ jQuery আগে লোড আছে কিনা backend.master এ দেখবেন -->
<!-- ✅ Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#summernote').summernote({
            height: 200,
            placeholder: 'Enter your message here...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['fontsize', 'color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endpush
