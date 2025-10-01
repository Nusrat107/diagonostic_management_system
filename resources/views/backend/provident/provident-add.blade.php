@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="container">

                <div class="row mb-3">
                    <div class="col-12">
                        <h4 class="page-title">Add Provident Fund</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form action="{{ url('/admin/create-provident/store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Employee Name <span class="text-danger">*</span></label>
                                        <select class="form-control" name="employee_id" required>
                                            <option value="">Select Employee</option>
                                            <option value="3">John Doe (FT-0001)</option>
                                            <option value="23">Richard Miles (FT-0002)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provident Fund Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="fund_type" id="fundType" required>
                                            <option value="Fixed Amount" selected>Fixed Amount</option>
                                            <option value="Percentage of Basic Salary">Percentage of Basic Salary</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Fixed Amount Fields -->
                            <div id="fixedAmountFields">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Employee Share (Amount)</label>
                                            <input class="form-control" type="text" name="employee_share_amount" placeholder="Enter employee share amount">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Organization Share (Amount)</label>
                                            <input class="form-control" type="text" name="organization_share_amount" placeholder="Enter organization share amount">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Percentage Fields -->
                            <div id="percentageFields" style="display: none;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Employee Share (%)</label>
                                            <input class="form-control" type="text" name="employee_share_percentage" placeholder="Enter employee share %">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Organization Share (%)</label>
                                            <input class="form-control" type="text" name="organization_share_percentage" placeholder="Enter organization share %">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Field -->
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Pending" selected>Pending</option>
                                    <option value="Approved">Approved</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4" placeholder="Enter description"></textarea>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Create Provident Fund</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div> 
        </div>
    </div>
</div>

<script>
    const fundTypeSelect = document.getElementById('fundType');
    const fixedFields = document.getElementById('fixedAmountFields');
    const percentageFields = document.getElementById('percentageFields');

    fundTypeSelect.addEventListener('change', function() {
        if (this.value === 'Fixed Amount') {
            fixedFields.style.display = 'block';
            percentageFields.style.display = 'none';
        } else {
            fixedFields.style.display = 'none';
            percentageFields.style.display = 'block';
        }
    });
</script>
@endsection
