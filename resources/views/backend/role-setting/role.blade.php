@extends('backend.master')

@section('content')
<style>
    .settings-page { display: flex; flex-wrap: wrap; background: #f9f9f9; padding: 20px; gap: 20px; }
    .settings-sidebar { width: 260px; background: #fff; border-radius: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.1); padding: 20px; height: fit-content; position: sticky; top: 100px; flex-shrink: 0; }
    .settings-sidebar ul { list-style: none; padding: 0; margin: 0; }
    .settings-sidebar ul li { margin-bottom: 10px; }
    .settings-sidebar ul li a { display: flex; align-items: center; color: #333; font-weight: 500; text-decoration: none; padding: 8px 10px; border-radius: 6px; transition: 0.3s; }
    .settings-sidebar ul li a:hover, .settings-sidebar ul li.active a { background: #2F4050; color: #fff; }
    #roles-list { list-style: none; padding: 0; margin: 0; border: 1px solid #eee; border-radius: 6px; overflow: hidden; }
    #roles-list li { padding: 10px 12px; background: #fff; border-bottom: 1px solid #eee; cursor: pointer; display: flex; justify-content: space-between; align-items: center; transition: 0.3s; }
    #roles-list li:last-child { border-bottom: none; }
    #roles-list li.active, #roles-list li:hover { background: #2F4050; color: #fff; }
    #roles-list li .role-action .action-circle { background: #eee; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; margin-left: 5px; color: #555; transition: 0.3s; }
    #roles-list li .role-action .action-circle:hover { background: #2F4050; color: #fff; }
    .settings-content { flex: 1; background: #fff; border-radius: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.08); padding: 30px; min-width: 300px; }
    .page-title { font-weight: 600; text-align: center; margin-bottom: 25px; }
    @media (max-width: 991px) { .settings-page { flex-direction: column; padding: 10px; } .settings-sidebar { width: 100%; position: relative; top: 0; } .settings-content { width: 100%; margin-left: 0; padding: 20px; } #roles-list li { justify-content: center; text-align: center; } #roles-list li .role-action { display: none; } }
</style>

<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="settings-page">

                <!-- Sidebar -->
                <div class="settings-sidebar">
                    <ul>
                        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home mr-2"></i> Back to Home</a></li>
                        <li class="menu-title mt-3 mb-2 text-muted">Settings</li>
                        <li><a href="{{ url('/admin/setting') }}"><i class="fa fa-building mr-2"></i> Company Settings</a></li>
                        <li><a href="{{ url('/admin/location') }}"><i class="fa fa-clock-o mr-2"></i> Localization</a></li>
                        <li><a href="{{ url('/admin/theme') }}"><i class="fa fa-picture-o mr-2"></i> Theme Settings</a></li>
                        <li class="active"><a href="{{ url('/admin/role') }}"><i class="fa fa-key mr-2"></i> Roles & Permissions</a></li>
                        <li><a href="{{url('/admin/invoice-setting')}}"><i class="fa fa-pencil-square-o mr-2"></i> Invoice Settings</a></li>
                        <li><a href="{{url('/admin/sellary-setting')}}"><i class="fa fa-money mr-2"></i> Salary Settings</a></li>
                        <li><a href="{{url('/admin/password-setting')}}"><i class="fa fa-lock mr-2"></i> Change Password</a></li>
                    </ul>
                </div>

                <!-- Content -->
                <div class="settings-content">
                    <h4 class="page-title">Roles & Permissions</h4>
                    <div class="row">

                       <!-- Roles Column -->
<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
    <a href="{{ url('/admin/role-add') }}" class="btn btn-primary btn-block mb-3"><i class="fa fa-plus"></i> Add Role</a>
    <ul id="roles-list">
        @foreach($roles as $role)
        <li class="{{ $loop->first ? 'active' : '' }}" data-role-id="{{ $role->id }}" data-role-name="{{ $role->name }}" data-permissions="{{ json_encode($role->permissions) }}">
            {{ $role->name }}
            <span class="role-action">
                <!-- Edit Button -->
                <a href="{{ url('/admin/role-edit/'.$role->id) }}">
                    <span class="action-circle"><i class="material-icons">edit</i></span>
                </a>
                <!-- Delete Button -->
                <a href="{{ url('/admin/role-delete/'.$role->id) }}" onclick="return confirm('Are you sure to delete this role?')">
                    <span class="action-circle delete-btn"><i class="material-icons">delete</i></span>
                </a>
            </span>
        </li>
        @endforeach
    </ul>
</div>

                        <!-- Module Access Column -->
                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                            <h6 class="card-title m-b-20" id="role-title">{{ $roles->first()->name ?? 'Administrator' }} Module Access</h6>
                            <div class="m-b-30" id="module-list">
                                <ul class="list-group">
                                    @foreach($modules as $module)
                                    @php
                                        $permissions = $roles->first()->permissions ?? [];
                                        $hasPermission = in_array($module, $permissions);
                                    @endphp
                                    <li class="list-group-item">
                                        {{ $module }}
                                        <div class="material-switch float-right">
                                            <input id="{{ Str::slug($module) }}_module" type="checkbox" {{ $hasPermission ? 'checked' : '' }}>
                                            <label for="{{ Str::slug($module) }}_module" class="badge-success"></label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped custom-table" id="permission-table">
                                    <thead>
                                        <tr>
                                            <th>Module Permission</th>
                                            <th class="text-center">Read</th>
                                            <th class="text-center">Write</th>
                                            <th class="text-center">Create</th>
                                            <th class="text-center">Delete</th>
                                            <th class="text-center">Import</th>
                                            <th class="text-center">Export</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($modules as $module)
                                        @php
                                            $permissions = $roles->first()->permissions ?? [];
                                            $hasPermission = in_array($module, $permissions);
                                        @endphp
                                        <tr>
                                            <td>{{ $module }}</td>
                                            @for($i=0;$i<6;$i++)
                                            <td class="text-center"><input type="checkbox" {{ $hasPermission ? 'checked' : '' }}></td>
                                            @endfor
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End content -->

            </div>
        </div>
    </div>
</div>

<script>
    const roles = document.querySelectorAll('#roles-list li');
    const roleTitle = document.getElementById('role-title');
    const moduleList = document.getElementById('module-list');
    const permissionTable = document.getElementById('permission-table').getElementsByTagName('tbody')[0];

    roles.forEach(role => {
        role.addEventListener('click', function() {
            // Remove active class
            roles.forEach(r => r.classList.remove('active'));
            this.classList.add('active');

            // Update role title
            const roleName = this.dataset.roleName;
            roleTitle.innerText = roleName + ' Module Access';

            // Update modules checkbox
            const permissions = JSON.parse(this.dataset.permissions);
            const moduleItems = moduleList.querySelectorAll('li');
            moduleItems.forEach(li => {
                const moduleName = li.innerText.trim();
                const checkbox = li.querySelector('input[type=checkbox]');
                checkbox.checked = permissions.includes(moduleName);
            });

            // Update permission table checkboxes
            const tableRows = permissionTable.querySelectorAll('tr');
            tableRows.forEach(row => {
                const moduleName = row.cells[0].innerText.trim();
                const checkboxes = row.querySelectorAll('input[type=checkbox]');
                checkboxes.forEach(cb => cb.checked = permissions.includes(moduleName));
            });
        });
    });
</script>
@endsection









