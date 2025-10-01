@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content" id="invoice-content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Hospital Invoice</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/invoice-update/' . $invoice->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-box">
                            <h3 class="card-title">Patient Details</h3>
                            <div class="form-group">
                                <label>Patient Name</label>
                                <input type="text" name="patient_name" class="form-control" value="{{ $invoice->patient_name }}" required>
                            </div>
                            <div class="form-group">
                                <label>Patient ID</label>
                                <input type="text" name="patient_id" class="form-control" value="{{ $invoice->patient_id }}" required>
                            </div>
                            <div class="form-group">
                                <label>Admission Date</label>
                                <input type="date" name="admission_date" class="form-control" value="{{ $invoice->admission_date }}" required>
                            </div>
                            <div class="form-group">
                                <label>Discharge Date</label>
                                <input type="date" name="discharge_date" class="form-control" value="{{ $invoice->discharge_date }}">
                            </div>

                            <h3 class="card-title mt-4">Invoice Items</h3>
                            <div id="invoice-items">
                                @php
                                    $services = explode(',', $invoice->services);
                                    $amounts = explode(',', $invoice->amounts);
                                @endphp

                                @foreach($services as $index => $service)
                                <div class="invoice-item mt-2">
                                    <div class="form-group">
                                        <label>Service Description</label>
                                        <input type="text" name="services[]" class="form-control" value="{{ $service }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="text" name="amounts[]" class="form-control" value="{{ $amounts[$index] ?? '' }}" required>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-secondary mb-3" id="add-item">Add More Item</button>

                            <div class="form-group">
                                <label>Total Amount</label>
                                <input type="text" name="total_amount" class="form-control" value="{{ $invoice->total_amount }}" required>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Update Invoice</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add more invoice items dynamically
    document.getElementById('add-item').addEventListener('click', function() {
        let container = document.getElementById('invoice-items');
        let html = `
            <div class="invoice-item mt-2">
                <div class="form-group">
                    <label>Service Description</label>
                    <input type="text" name="services[]" class="form-control" placeholder="Enter service description" required>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amounts[]" class="form-control" placeholder="Enter amount" required>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    });

    // Print invoice function
    function printInvoice() {
        let printContents = document.getElementById('invoice-content').innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
@endsection
