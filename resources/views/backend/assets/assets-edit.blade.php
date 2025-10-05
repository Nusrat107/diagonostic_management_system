@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">Edit Asset</h4>
                </div>
                <div class="col-sm-4 col-6 text-right">
                    <a href="{{ url('/admin/assets') }}" class="btn btn-secondary btn-rounded float-right">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/assets-update/'.$asset->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asset Name</label>
                                    <input name="asset_name" class="form-control" type="text" value="{{ old('asset_name', $asset->asset_name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asset ID</label>
                                    <input name="asset_id" class="form-control" type="text" value="{{ $asset->asset_id }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase Date</label>
                                    <input name="purchase_date" class="form-control" type="date" value="{{ old('purchase_date', $asset->purchase_date) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase From</label>
                                    <input name="purchase_from" class="form-control" type="text" value="{{ old('purchase_from', $asset->purchase_from) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Manufacturer</label>
                                    <input name="manufacturer" class="form-control" type="text" value="{{ old('manufacturer', $asset->manufacturer) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Model</label>
                                    <input name="model" class="form-control" type="text" value="{{ old('model', $asset->model) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Serial Number</label>
                                    <input name="serial_number" class="form-control" type="text" value="{{ old('serial_number', $asset->serial_number) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <input name="supplier" class="form-control" type="text" value="{{ old('supplier', $asset->supplier) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Condition</label>
                                    <input name="condition" class="form-control" type="text" value="{{ old('condition', $asset->condition) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Warranty (months)</label>
                                    <input name="warranty" class="form-control" type="text" value="{{ old('warranty', $asset->warranty) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Value (TK)</label>
                                    <input name="value" class="form-control" type="text" value="{{ old('value', $asset->value) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Asset User</label>
                                    <input name="asset_user" class="form-control" type="text" value="{{ old('asset_user', $asset->asset_user) }}" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter description...">{{ old('description', $asset->description) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending" {{ $asset->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Approved" {{ $asset->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="Deployed" {{ $asset->status == 'Deployed' ? 'selected' : '' }}>Deployed</option>
                                        <option value="Damaged" {{ $asset->status == 'Damaged' ? 'selected' : '' }}>Damaged</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="m-t-20 text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Update Asset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
