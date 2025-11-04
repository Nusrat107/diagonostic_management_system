@extends('backend.master')

@section('content')
    <style>
        .settings-page {
            display: flex;
            flex-wrap: wrap;
            background: #f9f9f9;
            padding: 20px;
            gap: 20px;
        }

        .settings-sidebar {
            width: 260px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: fit-content;
            position: sticky;
            top: 100px;
            flex-shrink: 0;
        }

        .settings-sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .settings-sidebar ul li {
            margin-bottom: 10px;
        }

        .settings-sidebar ul li a {
            display: flex;
            align-items: center;
            color: #333;
            font-weight: 500;
            text-decoration: none;
            padding: 8px 10px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .settings-sidebar ul li a:hover,
        .settings-sidebar ul li.active a {
            background: #2F4050;
            color: #fff;
        }

        .settings-content {
            flex: 1;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.08);
            padding: 30px;
            min-width: 300px;
        }

        .page-title {
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .submit-btn {
            background: #2F4050;
            border: none;
            color: #fff;
            padding: 10px 25px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #1f2d3d;
        }

        .form-group label {
            font-weight: 500;
        }

        input.form-control {
            border-radius: 8px;
            box-shadow: none;
        }

        @media (max-width: 991px) {
            .settings-page {
                flex-direction: column;
                padding: 10px;
            }

            .settings-sidebar {
                width: 100%;
                position: relative;
                top: 0;
                order: 1;
            }

            .settings-content {
                order: 2;
                margin-left: 0;
                padding: 20px;
            }

            .settings-sidebar ul li a {
                justify-content: center;
                text-align: center;
            }
        }

        .alert {
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-weight: 500;
            text-align: center;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
        }

        .user-avatar {
            font-size: 16px;
            background: #2F4050;
            color: #fff;
        }

        .badge {
            font-size: 13px;
            padding: 6px 10px;
            border-radius: 6px;
        }

        .table-hover tbody tr:hover {
            background: #f5f8fa;
            transition: 0.3s;
        }
    </style>

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="settings-page">

                    <!-- Sidebar -->
                    <div class="settings-sidebar">
                        <ul>
                            <li>
                                <a href="{{ url('/admin/dashboard') }}">
                                    <i class="fa fa-home back-icon mr-2"></i> Back to Home
                                </a>
                            </li>
                            <li class="menu-title mt-3 mb-2 text-muted">Settings</li>
                            <li><a href="{{ url('/admin/setting') }}"><i class="fa fa-building mr-2"></i> Company Settings</a>
                            </li>
                            <li><a href="{{ url('/admin/location') }}"><i class="fa fa-clock-o mr-2"></i> Localization</a>
                            </li>
                            <li><a href="{{ url('/admin/theme') }}"><i class="fa fa-picture-o mr-2"></i> Theme Settings</a>
                            </li>
                            <li><a href="{{ url('/admin/role') }}"><i class="fa fa-key mr-2"></i> Roles & Permissions</a>
                            </li>
                            <li class="active"><a href="{{ url('/admin/user/create') }}"><i class="fa fa-user mr-2"></i>
                                    Create Users</a></li>
                            <li><a href="{{ url('/admin/invoice-setting') }}"><i class="fa fa-pencil-square-o mr-2"></i>
                                    Invoice Settings</a></li>
                            <li><a href="{{ url('/admin/sellary-setting') }}"><i class="fa fa-money mr-2"></i> Salary
                                    Settings</a></li>
                            <li><a href="{{ url('/admin/password-setting') }}"><i class="fa fa-lock mr-2"></i> Change
                                    Password</a></li>
                        </ul>
                    </div>
                    <!-- Main Content -->
                    <div class="settings-content">
                        <h4 class="page-title">Create New User</h4>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        {{-- Create Form --}}
                        <form action="{{ url('/admin/user/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter full name"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Profile Image</label>
                                    <input type="file" name="profile_image" class="form-control">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password"
                                        required>
                                </div>
                            </div>

                            <button type="submit" class="submit-btn mt-2">Create User</button>
                        </form>

                        <hr class="my-4">

                        {{-- User List --}}
                        <h4 class="page-title">User List</h4>

                        <div class="table-responsive mt-4">
                            <table class="table table-hover align-middle">
                                <thead style="background: #2F4050; color: #fff;">
                                    <tr>
                                        <th scope="col" style="width: 50px;">#</th>
                                        <th scope="col">User Info</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key => $user)
                                        <tr style="border-bottom: 1px solid #eee;">
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="user-avatar bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                                        style="width:40px; height:40px; font-weight:600;">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <strong>{{ $user->name }}</strong><br>
                                                        <small class="text-muted">{{ $user->email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge 
                            @if ($user->role == 'admin') bg-danger
                            @elseif($user->role == 'manager') bg-primary
                            @else bg-success @endif
                            ">
                                                    {{ ucfirst($user->role) }}
                                                </span>
                                            </td>
                                            <td>{{ $user->created_at->format('d M, Y') }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/user/edit/' . $user->id) }}"
                                                    class="btn btn-sm btn-info text-white me-2">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{ url('/admin/user/delete/' . $user->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">No users found.</td>
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
    </div>
    </div>
    </div>
@endsection
