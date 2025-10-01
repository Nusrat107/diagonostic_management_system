@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="">

                <!-- Page Header -->
                <div class="row mb-3">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Provident Fund</h4>
                    </div>
                    <div class="col-sm-7 col-8 text-right">
                        <a href="{{ url('/admin/provident-add') }}" class="btn btn-primary btn-rounded">
                            <i class="fa fa-plus"></i> Add Provident Fund
                        </a>
                    </div>
                </div>

                <!-- Provident Fund Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Provident Fund Type</th>
                                        <th>Employee Share</th>
                                        <th>Organization Share</th>
                                        <th>Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($providents as $pf)
                                    <tr>
                                        <td>
                                            <h2>{{ $pf->employee->name ?? 'N/A' }} <span>{{ $pf->employee->designation ?? '' }}</span></h2>
                                        </td>
                                        <td>{{ $pf->fund_type }}</td>
                                        <td>
                                            {{ $pf->fund_type == 'Fixed Amount' ? $pf->employee_share_amount : $pf->employee_share_percentage.'%' }}
                                        </td>
                                        <td>
                                            {{ $pf->fund_type == 'Fixed Amount' ? $pf->organization_share_amount : $pf->organization_share_percentage.'%' }}
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a class="custom-badge {{ $pf->status == 'Pending' ? 'status-red' : 'status-green' }} dropdown-toggle" href="#" data-toggle="dropdown">
                                                    {{ $pf->status }}
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ url('/admin/provident-status/'.$pf->id.'/Pending') }}">Pending</a>
                                                    <a class="dropdown-item" href="{{ url('/admin/provident-status/'.$pf->id.'/Approved') }}">Approved</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/provident-view/' . $pf->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('/admin/provident-edit/' . $pf->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ url('/admin/provident-delete/' . $pf->id) }}" class="btn btn-danger btn-sm mb-1" 
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

            </div> <!-- container end -->
        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
