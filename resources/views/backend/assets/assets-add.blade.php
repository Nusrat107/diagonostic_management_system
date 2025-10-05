@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Asset</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/assets-blog/store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asset Name</label>
                                    <input name="asset_name" class="form-control" type="text" placeholder="Enter asset name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asset ID</label>
                                    <input class="form-control" type="text" value="Auto-generated" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase Date</label>
                                    <input name="purchase_date" class="form-control" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase From</label>
                                    <input name="purchase_from" class="form-control" type="text" placeholder="Enter supplier name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Manufacturer</label>
                                    <input name="manufacturer" class="form-control" type="text" placeholder="Enter manufacturer name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Model</label>
                                    <input name="model" class="form-control" type="text" placeholder="Enter model number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Serial Number</label>
                                    <input name="serial_number" class="form-control" type="text" placeholder="Enter serial number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <input name="supplier" class="form-control" type="text" placeholder="Enter supplier name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Condition</label>
                                    <input name="condition" class="form-control" type="text" placeholder="New / Used / Damaged">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Warranty (Months)</label>
                                    <input name="warranty" class="form-control" type="text" placeholder="Enter warranty period">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Value (TK)</label>
                                    <input name="value" class="form-control" type="text" placeholder="Enter value">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asset User</label>
                                    <input name="asset_user" class="form-control" type="text" placeholder="Enter asset user">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter description..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Deployed">Deployed</option>
                                        <option value="Damaged">Damaged</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Add Asset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




