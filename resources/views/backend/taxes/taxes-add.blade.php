@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Tax</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/create-taxes/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tax Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Enter tax name" required>
                        </div>

                        <div class="form-group">
                            <label>Tax Percentage (%) <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="percentage" placeholder="Enter tax percentage" required>
                        </div>

                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required>
                                <option value="Pending" style="color:red;">Pending</option>
                                <option value="Approved" style="color:green;">Approved</option>
                            </select>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Tax</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
