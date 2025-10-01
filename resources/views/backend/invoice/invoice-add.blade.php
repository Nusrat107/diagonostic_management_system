@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content" id="invoice-content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Create Hospital Invoice</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/create-invoice/store') }}" method="POST">
                        @csrf
                        <div class="card-box">
                            <h3 class="card-title">Patient Details</h3>
                            <div class="form-group">
                                <label>Patient Name</label>
                                <input type="text" name="patient_name" class="form-control" placeholder="Enter patient name" required>
                            </div>
                            <div class="form-group">
                                <label>Patient ID</label>
                                <input type="text" name="patient_id" class="form-control" placeholder="Enter patient ID" required>
                            </div>
                            <div class="form-group">
                                <label>Admission Date</label>
                                <input type="date" name="admission_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Discharge Date</label>
                                <input type="date" name="discharge_date" class="form-control">
                            </div>

                            <h3 class="card-title mt-4">Invoice Items</h3>
                            <div id="invoice-items">
                                <div class="invoice-item">
                                    <div class="form-group">
                                        <label>Service Description</label>
                                        <input type="text" name="services[]" class="form-control" placeholder="Enter service description" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="text" name="amounts[]" class="form-control" placeholder="Enter amount" required>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary mb-3" id="add-item">Add More Item</button>

                            <div class="form-group">
                                <label>Total Amount</label>
                                <input type="text" name="total_amount" class="form-control" placeholder="Enter total amount" required>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Save Invoice</button>
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
