@extends('layouts.dashboard')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>

@include('layouts.notification')

<div class="row">

    <div class="col-lg-4 order-lg-2">

        <div class="card shadow mb-4">
            <div class="card-profile-image mt-4">
                <!-- <figure class="rounded-circle avatar avatar font-weight-bold" style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}"></figure> -->
                <img src="{{ asset('storage/images/PhotoProfile/300/'.auth()->user()->photoProfile) }}" alt="" class="rounded-circle avatar avatar font-weight-bold" style="height: auto; min-width: 180px;">
                <form action="{{ route('dashboard.profile.upload.image') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="">Ubah foto profile</label>
                        <input type="file" name="image">
                        <input type="hidden" name="codeImage" value="1">
                        <p class="text-danger">{{ $errors->first('image') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Upload</button>
                    </div>
                </form>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h5 class="font-weight-bold">{{ auth()->user()->fullName }}</h5>
                            <p>{{ auth()->user()->roleName }}</p>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">22</span>
                            <span class="description">Friends</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">10</span>
                            <span class="description">Photos</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-profile-stats">
                            <span class="heading">89</span>
                            <span class="description">Comments</span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

    </div>

    <div class="col-lg-8 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Akun</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('dashboard.profile.update') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="_method" value="PUT">

                    <h6 class="heading-small text-muted mb-4">Informasi User</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Nama<span class="small text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', Auth::user()->name) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="last_name">Nama akhir</label>
                                    <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name', Auth::user()->last_name) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email<span class="small text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email', Auth::user()->email) }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="current_password">Password sekarang</label>
                                    <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Password sekarang">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="new_password">Password baru</label>
                                    <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Password baru">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="confirm_password">Konfirmasi password baru</label>
                                    <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Konfirmasi password baru">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection