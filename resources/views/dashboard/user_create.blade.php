@extends('layouts.dashboard')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('User') }}</h1>

@include('layouts.notification')

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah User Baru</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('dashboard.user.store') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="POST">

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="last_name">Last name</label>
                                    <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email address<span class="small text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="role">Hak Akses</label><span class="small text-danger">*</span><br>
                                    <input type="radio" id="mitra" name="role" value="st_user">
                                    <label class="radio">Mitra
                                    </label><br>
                                    <input type="radio" id="pelanggan" name="role" value="customer" checked>
                                    <label class="radio">Pelanggan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection