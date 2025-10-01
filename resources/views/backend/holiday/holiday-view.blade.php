@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row mb-4 justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="page-title">Holiday Details</h3>
                    <p class="text-muted">View full details of the selected holiday</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Holiday Name</label>
                                <input type="text" class="form-control" value="{{ $holiday->holiday_name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Holiday Date</label>
                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($holiday->holiday_date)->format('d M Y') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Day</label>
                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($holiday->holiday_date)->format('l') }}" readonly>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ url('/admin/holiday') }}" class="btn btn-primary px-4">
                                    Back to Holidays
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
