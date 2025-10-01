@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            
            <div class="row mb-4">
                <div class="col-sm-8 col-6">
                    <h4 class="page-title">Taxes</h4>
                </div>
                <div class="col-sm-4 col-6 text-right m-b-30">
                    <a href="{{ url('/admin/taxes-add') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Tax</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tax Name</th>
                                    <th>Tax Percentage (%)</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($taxes as $key => $tax)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tax->name }}</td>
                                    <td>{{ $tax->percentage }}%</td>
                                    <td class="text-center">
                                        @if($tax->status == 'Approved')
                                            <span class="custom-badge status-green">Approved</span>
                                        @else
                                            <span class="custom-badge status-red">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/taxes-view/' . $tax->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/taxes-edit/' . $tax->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/taxes-delete/' . $tax->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this schedule?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No taxes found</td>
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
