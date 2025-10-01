@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="container">

                <div class="row mb-3">
                    <div class="col-12">
                        <h4 class="page-title">Tax Details</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tax Name</label>
                                    <input class="form-control" type="text" value="{{ $tax->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tax Percentage (%)</label>
                                    <input class="form-control" type="text" value="{{ $tax->percentage }}%" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    @if($tax->status == 'Approved')
                                        <input class="form-control text-center text-white" style="background-color: green;" value="Approved" readonly>
                                    @else
                                        <input class="form-control text-center text-white" style="background-color: red;" value="Pending" readonly>
                                    @endif
                                </div>

                                <div class="text-center mt-3">
                                    <a href="{{ url('/admin/taxes') }}" class="btn btn-secondary">Back</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- container end -->
        </div>
    </div>
</div>
@endsection
