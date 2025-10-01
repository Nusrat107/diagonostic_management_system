@extends('backend.master')

@section('content')
   <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Leave</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
          
                        <form action="{{ url('/admin/create-leave/store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="leave_type" required>
                                    <option value="">-- Select Leave Type --</option>
                                    <option value="Casual Leave">Casual Leave (12 Days)</option>
                                    <option value="Medical Leave">Medical Leave</option>
                                    <option value="Loss of Pay">Loss of Pay</option>
                                </select>
                            </div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>From <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control " name="from_date" type="text" required>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>To <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control " name="to_date" type="text" required>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Number of days <span class="text-danger">*</span></label>
										<input class="form-control" name="days" readonly type="text">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Remaining Leaves <span class="text-danger">*</span></label>
										<input class="form-control" name="remaining_leaves" readonly value="12" type="text">
									</div>
								</div>
							</div>

                            <div class="form-group">
                                <label>Leave Reason <span class="text-danger">*</span></label>
                                <textarea rows="4" cols="5" class="form-control" name="reason" required></textarea>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Send Leave Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
@endsection
