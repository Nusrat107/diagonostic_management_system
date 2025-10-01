@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            
            <!-- Page Title -->
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Holiday</h4>
                </div>
            </div>

            <!-- Edit Holiday Form -->
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    
                    <form action="{{ url('/admin/holiday-update/'.$holiday->id) }}" method="POST">
                        @csrf
                        
                        <!-- Holiday Name -->
                        <div class="form-group">
                            <label>Holiday Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="holiday_name" 
                                value="{{ old('holiday_name', $holiday->holiday_name) }}" required>
                            @error('holiday_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Holiday Date -->
                        <div class="form-group">
                            <label>Holiday Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control" type="date" name="holiday_date" 
                                    value="{{ old('holiday_date', \Carbon\Carbon::parse($holiday->holiday_date)->format('Y-m-d')) }}" required>
                                @error('holiday_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Holiday</button>
                           
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="sidebar-overlay" data-reff=""></div>
@endsection
