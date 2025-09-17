@extends('backend.master')

@section('content')

<div class="content-wrapper mt-5" style="margin-left:250px; padding:20px;">
    <div class="container-fluid mt-3">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Invoice Details</h4>
                <a href="{{url('/admin/invoice')}}" class="btn btn-light">
                    <i class="fa fa-arrow-left"></i> Back to Invoice List
                </a>
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

                <!-- Optional: Other Invoices List -->
                @if(isset($invoicelist) && $invoicelist->count() > 1)
                <div class="mb-4">
                    <h5 class="text-primary">Other Invoices</h5>
                    <ul>
                        @foreach($invoicelist as $inv)
                            @if($inv->id != $invoice->id)
                                <li>Invoice {{$inv->id}} - {{$inv->patient_name}} ({{$inv->status}})</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="text-end">
    <a href="{{url('/admin/invoice-print/'.$invoice->id)}}" class="btn btn-info">
        <i class="fa fa-print"></i> Print
    </a>
    <a href="{{ url('/admin/invoice-edit/' . $invoice->id) }}" class="btn btn-warning">
    <i class="fa fa-edit"></i> Edit
</a>

    <form action="{{url('/admin/invoice-delete/' . $invoice->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash"></i> Delete
        </button>
    </form>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this invoice?');
}
</script>
@endsection
