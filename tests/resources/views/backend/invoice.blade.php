@extends('backend.master')

@section('content')


<div class="content-wrapper mt-5" style="margin-left:250px; padding:20px;">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                <h4 class="mb-0">Invoice Test Table</h4>
                <a href="{{url('/admin/create-invoice')}}" class="btn btn-light">
                    <i class="fa fa-plus"></i>  Create Invoice
                </a>
            </div>

            <div class="card-body">
                <table id="invoiceTable" class="table table-bordered table-striped text-center">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Patient Code</th>
                            <th>Patient Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoicelist as $invoice)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$invoice->barcode}}</td>
                                <td>{{$invoice->patient_code}}</td>
                                <td>{{$invoice->patient_name}}</td>
                                <td>{{$invoice->phone_number}}</td>
                                <td>{{$invoice->address}}</td>                                                      
                                <td>
                                    <a href="{{ url('/admin/invoice-view/' . $invoice->id) }}" class="btn btn-info btn-sm"> 
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('/admin/invoice-edit/' . $invoice->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    
                                    <!-- Delete Button with confirmation -->
                                    <form action="{{ url('/admin/invoice-delete/' . $invoice->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Confirmation -->
<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this invoice?');
}
</script>

@endsection
