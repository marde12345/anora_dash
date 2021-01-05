@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('User') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List user</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary" role="button">Tambahkan user</a>
                    </div>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="list_users_table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Informasi Diri</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($widget['ListUsers'] as $user)
                                <tr>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>
                                        @if ($user->role == 'admin')
                                        <span class="badge badge-light">{{ "ADMIN" }}</span>
                                        @elseif ($user->role == 'st_user')
                                        <span class="badge badge-primary">{{ "MITRA" }}</span>
                                        @else ($user->role == 'customer')
                                        <span class="badge badge-success">{{ "PELANGGAN" }}</span>
                                        @endif
                                    </td>
                                    <td>{{ __('Ini informasi') }}</td>
                                    <td>
                                        <div class="row" style="text-align: center;">
                                            <div class="col-md-12" style="margin: 3px;">
                                                <div class="btn btn-primary">Update</div>
                                            </div>
                                            <div class="col-md-12" style="margin: 3px;">
                                                <div class="btn btn-success">Submit</div>
                                            </div>
                                            <div class="col-md-12" style="margin: 3px;">
                                                <div class="btn btn-danger">Hapus</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection