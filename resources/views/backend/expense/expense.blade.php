@extends('backend.master')

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-5">
                        <h4 class="page-title">Expenses</h4>
                    </div>
                    <div class="col-sm-4 col-7 text-right m-b-30">
                        <a href="{{ url('/admin/expense-add') }}" class="btn btn-primary btn-rounded float-right">
                            <i class="fa fa-plus"></i> Add Expense
                        </a>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Purchase From</th>
                                        <th>Purchase Date</th>
                                        <th>Purchased By</th>
                                        <th>Amount</th>
                                        <th>Paid By</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td><strong>{{ $expense->item_name }}</strong></td>
                                            <td>{{ $expense->purchase_from }}</td>
                                            <td>{{ \Carbon\Carbon::parse($expense->purchase_date)->format('d M Y') }}</td>
                                            <td>{{ $expense->purchased_by }}</td>
                                            <td>Tk {{ number_format($expense->amount, 2) }}</td>
                                            <td>{{ $expense->paid_by }}</td>
                                            <td class="text-center">
                                                @if ($expense->status == 'Pending')
                                                    <span class="custom-badge status-red">Pending</span>
                                                @else
                                                    <span class="custom-badge status-green">Approved</span>
                                                @endif
                                            </td>
                                           <td class="text-center">
                                        <a href="{{ url('/admin/expense-view/' . $expense->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/expense-edit/' . $expense->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/expense-delete/' . $expense->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this schedule?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                        </tr>
                                    @endforeach

                                    @if($expenses->count() == 0)
                                        <tr>
                                            <td colspan="8" class="text-center text-danger">No expenses found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div id="delete_expense" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="{{ asset('backend/assets/img/sent.png') }}" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this expense?</h3>
                        <div class="m-t-20">
                            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
