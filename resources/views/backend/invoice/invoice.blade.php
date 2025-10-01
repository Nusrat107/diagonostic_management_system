@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Invoices</h4>
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <a href="{{ url('/admin/invoice-add') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus"></i> Create New Invoice
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice Number</th>
                                    <th>Patient</th>
                                    <th>Created Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($invoices as $key => $invoice)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="{{ url('/admin/invoice-view/' . $invoice->id) }}">
                                            #INV-{{ str_pad($invoice->id, 4, '0', STR_PAD_LEFT) }}
                                        </a>
                                    </td>
                                    <td>{{ $invoice->patient_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('d M Y') }}</td>
                                    <td>{{ number_format((float)$invoice->total_amount, 2) }}Tk</td>
                                    <td>
                                        <span class="custom-badge status-green">Paid</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/invoice-view/' .  $invoice->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/invoice-edit/' .  $invoice->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/invoice-delete/' .  $invoice->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this invoice?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No invoices found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
