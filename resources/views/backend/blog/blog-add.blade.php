@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Blog</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/create-blog/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Blog Name</label>
                            <input name="name" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label>Blog Images</label>
                            <input name="image" class="form-control" type="file">
                            <small class="form-text text-muted">Max. file size: 50 MB. Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blog Category</label>
                                    <input name="category" class="form-control" type="text" placeholder="Enter Blog Category">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blog Sub Category</label>
                                    <input name="subcategory" class="form-control" type="text" placeholder="Enter Blog Sub Category">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Blog Description</label>
                            <textarea name="description" cols="30" rows="6" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tags <small>(separated with a comma)</small></label>
                            <input name="tags" type="text" placeholder="Enter your tags" data-role="tagsinput" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="display-block">Blog Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="blog_active" value="Active" checked>
                                <label class="form-check-label" for="blog_active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="blog_inactive" value="Inactive">
                                <label class="form-check-label" for="blog_inactive">Inactive</label>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Publish Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
