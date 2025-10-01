@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row mb-4 justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="page-title">Invoice Details</h3>
                    <p class="text-muted">View full details of the selected invoice</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Invoice Number</label>
                                <input type="text" class="form-control" value="#INV-{{ str_pad($invoice->id, 4, '0', STR_PAD_LEFT) }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Patient Name</label>
                                <input type="text" class="form-control" value="{{ $invoice->patient_name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Patient ID</label>
                                <input type="text" class="form-control" value="{{ $invoice->patient_id }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Admission Date</label>
                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($invoice->admission_date)->format('d M Y') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Discharge Date</label>
                                <input type="text" class="form-control" value="{{ $invoice->discharge_date ? \Carbon\Carbon::parse($invoice->discharge_date)->format('d M Y') : '-' }}" readonly>
                            </div>

                            <h5 class="mt-4 mb-2">Invoice Items</h5>
                            @php
                                $services = explode(',', $invoice->services);
                                $amounts = explode(',', $invoice->amounts);
                            @endphp
                            @foreach($services as $index => $service)
                            <div class="mb-3">
                                <label class="form-label">Service Description</label>
                                <input type="text" class="form-control mb-2" value="{{ $service }}" readonly>
                                <input type="text" class="form-control" value="{{ $amounts[$index] ?? '' }} Tk" readonly>
                            </div>
                            @endforeach

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Total Amount</label>
                                <input type="text" class="form-control" value="{{ number_format((float)$invoice->total_amount, 2) }} Tk" readonly>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ url('/admin/invoice') }}" class="btn btn-primary px-4">
                                    Back to Invoices
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
