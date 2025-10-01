@extends('backend.master')

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">New Expense</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ url('/admin/create-expense/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Item Name</label>
                                        <input class="form-control" type="text" name="item_name" placeholder="Enter item name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Purchase From</label>
                                        <input class="form-control" type="text" name="purchase_from" placeholder="Enter vendor/shop name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <input class="form-control" type="date" name="purchase_date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Purchased By</label>
                                        <select class="form-control" name="purchased_by">
                                            <option value="">Select purchaser</option>
                                            <option value="Daniel Porter">Daniel Porter</option>
                                            <option value="Roger Dixon">Roger Dixon</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input class="form-control" type="number" name="amount" placeholder="Enter amount">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Paid By</label>
                                        <select class="form-control" name="paid_by">
                                            <option value="">Select payment method</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="">Select status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Approved">Approved</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Attachments</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Create Expense</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
