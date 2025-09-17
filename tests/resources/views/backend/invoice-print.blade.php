@extends('backend.master')

@section('content')
<div class="content-wrapper mt-5" style="margin-left:250px; padding:20px;">
    <div class="container-fluid mt-3">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Invoice #{{ $invoice->id }}</h4>
                <button onclick="window.print();" class="btn btn-light">
                    <i class="fa fa-print"></i> Print
                </button>
            </div>

            <div class="card-body">
                <!-- Invoice Header -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5><strong>Invoice No:</strong> {{$invoice->id}}</h5>
                        <h6><strong>Date:</strong> {{$invoice->date}}</h6>
                        <h6><strong>Status:</strong> 
                            <span class="badge {{ $invoice->status == 'Paid' ? 'bg-success' : 'bg-danger' }}">
                                {{$invoice->status}}
                            </span>
                        </h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <h5><strong>Barcode:</strong> {{$invoice->barcode}}</h5>
                        <h6><strong>Patient Code:</strong> {{$invoice->patient_code}}</h6>
                    </div>
                </div>

                <!-- Patient Info -->
                <div class="mb-4">
                    <h5 class="text-primary">Patient Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Patient Name</th>
                            <td>{{$invoice->patient_name}}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{$invoice->phone_number}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$invoice->address}}</td>
                        </tr>
                    </table>
                </div>

                <!-- Invoice Calculation -->
                <div class="mb-4">
                    <h5 class="text-primary">Invoice Summary</h5>
                    <table class="table table-bordered text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$invoice->subtotal}}</td>
                                <td>{{$invoice->discount}}</td>
                                <td>{{$invoice->total}}</td>
                                <td>{{$invoice->paid_amount}}</td>
                                <td>{{$invoice->due_amount}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <p>Thank you for your visit!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Print Styles -->
<style>
@media print {
    body * {
        visibility: hidden;
    }
    .card, .card * {
        visibility: visible;
    }
    .card {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
}
</style>
@endsection
