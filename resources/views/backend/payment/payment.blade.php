@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            {{-- Page Header --}}
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="page-title">Payments</h4>
                </div>

                <div class="col-sm-6 text-right m-b-30">
                    <a href="{{url('/admin/payment-add')}}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus"></i> Create Payment
                    </a>
                </div>
            </div>


            {{-- Payments Table --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice ID</th>
                                    <th>Patient</th>
                                    <th>Payment Type</th>
                                    <th>Paid Date</th>
                                    <th>Paid Amount</th>
                                    <th class="text-leaft">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$payment->invoice_id}}</td>
                                        <td>{{$payment->patient_name}}</td>
                                        <td>{{$payment->payment_type}}</td>
                                        <td>{{$payment->paid_date}}</td>
                                        <td>{{$payment->paid_amount}}</td>
                                        <td>
                                            <a href="{{ url('/admin/payment-delete/' . $payment->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this schedule?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
