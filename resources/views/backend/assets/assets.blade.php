@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row mb-3">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">Assets</h4>
                </div>
                <div class="col-sm-4 col-6 text-right">
                    <a href="{{ url('/admin/assets-add') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fa fa-plus"></i> Add Asset
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                   
                                    <th>Asset Name</th>
                                    <th>Asset ID</th>
                                    <th>Purchase Date</th>
                                    <th>Warranty</th>
                                    <th>Value</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($assets as $asset)
                                    <tr>
                                        
                                        <td><strong>{{ $asset->asset_name }}</strong></td>
                                        <td>#{{ $asset->asset_id }}</td>
                                        <td>{{ $asset->purchase_date ?? 'N/A' }}</td>
                                        <td>{{ $asset->warranty ?? 'N/A' }}</td>
                                        <td>{{ $asset->value ?? 'N/A' }}</td>

                                        <td class="text-center">
                                            <div class="dropdown action-label">
                                                @php
                                                    $badgeClass = match($asset->status) {
                                                        'Approved' => 'status-green',
                                                        'Deployed' => 'status-blue',
                                                        'Damaged' => 'status-orange',
                                                        default => 'status-red'
                                                    };
                                                @endphp
                                                <a class="custom-badge {{ $badgeClass }} dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    {{ $asset->status }}
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"
                                                       onclick="event.preventDefault(); updateStatus({{ $asset->id }}, 'Pending')">Pending</a>
                                                    <a class="dropdown-item" href="#"
                                                       onclick="event.preventDefault(); updateStatus({{ $asset->id }}, 'Approved')">Approved</a>
                                                    <a class="dropdown-item" href="#"
                                                       onclick="event.preventDefault(); updateStatus({{ $asset->id }}, 'Deployed')">Deployed</a>
                                                    <a class="dropdown-item" href="#"
                                                       onclick="event.preventDefault(); updateStatus({{ $asset->id }}, 'Damaged')">Damaged</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                        <a href="{{ url('/admin/assets-view/' .  $asset->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/assets-edit/' .  $asset->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/assets-delete/' .  $asset->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this schedule?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    </tr>
                                @endforeach

                                @if($assets->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">No assets found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- AJAX Script for Status Update --}}
<script>
    function updateStatus(id, status) {
        fetch(`/admin/assets-status/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ status }),
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
</script>
@endsection
