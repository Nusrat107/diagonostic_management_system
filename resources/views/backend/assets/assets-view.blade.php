@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">View Asset</h4>
                </div>
                <div class="col-sm-4 col-6 text-right">
                    <a href="{{ url('/admin/assets') }}" class="btn btn-secondary btn-rounded float-right">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Asset Name</label>
                                        <input type="text" class="form-control" value="{{ $asset->asset_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Asset ID</label>
                                        <input type="text" class="form-control" value="{{ $asset->asset_id }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <input type="text" class="form-control" value="{{ $asset->purchase_date ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase From</label>
                                        <input type="text" class="form-control" value="{{ $asset->purchase_from ?? 'N/A' }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Manufacturer</label>
                                        <input type="text" class="form-control" value="{{ $asset->manufacturer ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input type="text" class="form-control" value="{{ $asset->model ?? 'N/A' }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Serial Number</label>
                                        <input type="text" class="form-control" value="{{ $asset->serial_number ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <input type="text" class="form-control" value="{{ $asset->supplier ?? 'N/A' }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Condition</label>
                                        <input type="text" class="form-control" value="{{ $asset->condition ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Warranty (months)</label>
                                        <input type="text" class="form-control" value="{{ $asset->warranty ?? 'N/A' }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Value (TK)</label>
                                        <input type="text" class="form-control" value="{{ $asset->value ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Asset User</label>
                                        <input type="text" class="form-control" value="{{ $asset->asset_user }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="4" readonly>{{ $asset->description ?? 'N/A' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" value="{{ $asset->status }}" readonly>
                                    </div>
                                </div>
                            </div> <!-- /row -->
                        </div> <!-- /card-body -->
                    </div> <!-- /card -->
                </div> <!-- /col-lg-12 -->
            </div> <!-- /row -->
        </div> <!-- /content -->
    </div> <!-- /page-wrapper -->
</div> <!-- /main-wrapper -->
@endsection

