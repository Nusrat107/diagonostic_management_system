@extends('backend.master')

@section('content')

<div class="content-wrapper mt-5" style="margin-left:250px; padding:20px;">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Create Invoice</h4>
                <a href="{{url('/admin/invoice')}}" class="btn btn-light">
                    <i class="fa fa-arrow-left"></i> Back to Invoice List
                </a>
            </div>

            <div class="card-body">
                <form action="{{url('/admin/create-invoice/store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Barcode -->
                        <div class="col-md-6 mb-3">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Enter Barcode">
                        </div>

                        <!-- Patient Code -->
                        <div class="col-md-6 mb-3">
                            <label for="patient_code" class="form-label">Patient Code</label>
                            <input type="text" name="patient_code" id="patient_code" class="form-control" placeholder="Enter Patient Code">
                        </div>

                        <!-- Patient Name -->
                        <div class="col-md-6 mb-3">
                            <label for="patient_name" class="form-label">Patient Name</label>
                            <input type="text" name="patient_name" id="patient_name" class="form-control" placeholder="Enter Patient Name" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" id="phone" class="form-control" placeholder="Enter Phone Number" required>
                        </div>

                        <!-- Address -->
                        <div class="col-md-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control" rows="2" placeholder="Enter Patient Address"></textarea>
                        </div>

                        <!-- Subtotal -->
                        <div class="col-md-4 mb-3">
                            <label for="subtotal" class="form-label">Subtotal</label>
                            <input type="number" name="subtotal" id="subtotal" class="form-control" placeholder="Enter Subtotal" required>
                        </div>

                        <!-- Discount -->
                        <div class="col-md-4 mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="number" name="discount" id="discount" class="form-control" placeholder="Enter Discount">
                        </div>

                        <!-- Total -->
                        <div class="col-md-4 mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" name="total" id="total" class="form-control" placeholder="Enter Total" required>
                        </div>

                        <!-- Paid -->
                        <div class="col-md-6 mb-3">
                            <label for="paid" class="form-label">Paid Amount</label>
                            <input type="number" name="paid_amount" id="paid_amount" class="form-control" placeholder="Enter Paid Amount">
                        </div>

                        <!-- Due -->
                        <div class="col-md-6 mb-3">
                            <label for="due" class="form-label">Due Amount</label>
                            <input type="number" name="due_amount" id="due_amount" class="form-control" placeholder="Enter Due Amount">
                        </div>

                        <!-- Date -->
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">-- Select Status --</option>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Save Invoice
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fa fa-undo"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
