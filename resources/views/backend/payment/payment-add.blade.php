@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Payment</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{url('/admin/create-payment/store')}}" method="POST">
                        @csrf

                        {{-- <div class="form-group">
                            <label>Invoice ID</label>
                            <input type="text" name="invoice_id" class="form-control" required>
                        </div> --}}

                        <div class="form-group">
                            <label>Patient Name</label>
                            <input type="text" name="patient_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Payment Type</label>
                            <select name="payment_type" class="form-control" required>
                                <option value="">-- Select Type --</option>
                                <option value="Cash">Cash</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Card">Card</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Paid Date</label>
                            <input type="date" name="paid_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input type="number" step="0.01" name="paid_amount" class="form-control" required>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save Payment</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
