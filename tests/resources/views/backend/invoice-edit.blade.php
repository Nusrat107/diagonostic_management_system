@extends('backend.master')

@section('content')

<div class="content-wrapper mt-5" style="margin-left:250px; padding:20px;">
    <div class="container-fluid mt-3">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Invoice</h4>
                <a href="{{url('/admin/invoice')}}" class="btn btn-light">
                    <i class="fa fa-arrow-left"></i> Back to Invoice List
                </a>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/invoice-update/' . $invoice->id) }}" method="POST">
    @csrf
    @method('POST')

                    <div class="row">
                        <!-- Barcode -->
                        <div class="col-md-6 mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="text" name="barcode" class="form-control" value="{{ $invoice->barcode }}" required>
                        </div>

                        <!-- Patient Code -->
                        <div class="col-md-6 mb-3">
                            <label for="patient_code" class="form-label">Patient Code</label>
                            <input type="text" name="patient_code" class="form-control" value="{{ $invoice->patient_code }}" required>
                        </div>

                        <!-- Patient Name -->
                        <div class="col-md-6 mb-3">
                            <label for="patient_name" class="form-label">Patient Name</label>
                            <input type="text" name="patient_name" class="form-control" value="{{ $invoice->patient_name }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $invoice->phone_number }}" required>
                        </div>

                        <!-- Address -->
                        <div class="col-md-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2">{{ $invoice->address }}</textarea>
                        </div>

                        <!-- Subtotal -->
                        <div class="col-md-4 mb-3">
                            <label for="subtotal" class="form-label">Subtotal</label>
                            <input type="number" name="subtotal" class="form-control" value="{{ $invoice->subtotal }}" required>
                        </div>

                        <!-- Discount -->
                        <div class="col-md-4 mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="number" name="discount" class="form-control" value="{{ $invoice->discount }}">
                        </div>

                        <!-- Total -->
                        <div class="col-md-4 mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" name="total" class="form-control" value="{{ $invoice->total }}" required>
                        </div>

                        <!-- Paid -->
                        <div class="col-md-6 mb-3">
                            <label for="paid_amount" class="form-label">Paid Amount</label>
                            <input type="number" name="paid_amount" class="form-control" value="{{ $invoice->paid_amount }}">
                        </div>

                        <!-- Due -->
                        <div class="col-md-6 mb-3">
                            <label for="due_amount" class="form-label">Due Amount</label>
                            <input type="number" name="due_amount" class="form-control" value="{{ $invoice->due_amount }}">
                        </div>

                        <!-- Date -->
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ $invoice->date }}" required>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="Paid" {{ $invoice->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                <option value="Unpaid" {{ $invoice->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Update Invoice
                        </button>
                        <a href="{{ url('/admin/invoice') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
