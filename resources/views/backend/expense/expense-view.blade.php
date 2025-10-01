@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row mb-4">
                <div class="col-lg-8 offset-lg-2 d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Expense Details</h4>
                    <a href="{{ url('/admin/expense') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <!-- Left Column -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Item Name</label>
                                        <input class="form-control" type="text" value="{{ $expense->item_name }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Purchase From</label>
                                        <input class="form-control" type="text" value="{{ $expense->purchase_from }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <input class="form-control" type="text" value="{{ \Carbon\Carbon::parse($expense->purchase_date)->format('d M Y') }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Purchased By</label>
                                        <input class="form-control" type="text" value="{{ $expense->purchased_by }}" readonly>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input class="form-control" type="text" value="Tk {{ number_format($expense->amount, 2) }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Paid By</label>
                                        <input class="form-control" type="text" value="{{ $expense->paid_by }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <input class="form-control" type="text" value="{{ ucfirst($expense->status) }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Attachment</label>
                                        <input class="form-control" type="text" value="{{ $expense->attachment ?? 'N/A' }}" readonly>
                                        @if($expense->attachment)
                                            <a href="{{ asset('uploads/'.$expense->attachment) }}" target="_blank" class="d-block mt-1">View File</a>
                                        @endif
                                    </div>
                                </div>

                            </div> <!-- row -->

                        </div> <!-- card-body -->
                    </div> <!-- card -->

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
