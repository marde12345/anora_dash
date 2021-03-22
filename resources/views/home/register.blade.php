@extends('layouts.homeauth')

@section('main-content')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-lg-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4"><a href="index.html"><img src="/images/logo-horizontal.png" style="width: 200px !important" alt="" /></a>
                        <h5 class="font-weight-bold mt-3">Bergabung dengan ANORA</h5>
                        <p class="text-muted">Dedikasikan kemampuan professionalmu</p><strong></strong>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="pl-4 my-2">
                            @foreach ($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('root.register') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="mb-1">Nama depan</label>
                                    <div class="position-relative icon-form-control"><i class="mdi mdi-account position-absolute"></i>
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" autofocus required />
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="mb-1">Nama belakang</label>
                                    <div class="position-relative">
                                        <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Email</label>
                            <div class="position-relative icon-form-control"><i class="mdi mdi-email-outline position-absolute"></i>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Password (6 atau lebih karakter)</label>
                            <div class="position-relative icon-form-control"><i class="mdi mdi-key-variant position-absolute"></i>
                                <input class="form-control" type="password" name="password" value="{{ old('password') }}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Konfirmasi Password</label>
                            <div class="position-relative icon-form-control"><i class="mdi mdi-key-variant position-absolute"></i>
                                <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Anda setuju dengan <a href="#">Perjanjian Pengguna</a>, <a href="#">Privacy Policy</a>, dan <a href="#">Cookie Policy</a>.</label>
                        </div>
                        <button class="btn btn-success btn-block text-uppercase" type="submit"> Setuju & Bergabung</button>
                        <div class="text-center mt-3 border-bottom pb-3">
                            <p class="small text-muted">Atau login menggunakan</p>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('login.provider', 'google') }}">
                                        <button class="btn btn-outline-google btn-block" type="button"><i class="mdi mdi-google"></i>
                                            Google
                                        </button>
                                    </a>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('login.provider', 'facebook') }}">
                                        <button class="btn btn-outline-facebook btn-block" type="button"><i class="mdi mdi-facebook"></i>
                                            Facebook
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="py-3 d-flex align-item-center"><a href="/forgot-password">Lupa kata sandi?</a><span class="ml-auto">Sudah memiliki akun ANORA? <a href="/login">Masuk</a></span></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection