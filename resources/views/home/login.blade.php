@extends('layouts.homeauth')

@section('main-content')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-lg-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4"><a href="/"><img src="/images/logo-horizontal.png" style="width: 200px !important" alt="" /></a>
                        <h5 class="font-weight-bold mt-3">Selamat Datang Kembali</h5>
                        <p class="text-muted">Jangan lewatkan penawaran pengolahan data, dan dapatkan informasi terbaru.</p>
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
                    <form action="{{ route('root.login') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class=" form-group">
                            <label class="mb-1">Email atau No. Telepon</label>
                            <div class="position-relative icon-form-control"><i class="mdi mdi-account position-absolute"></i>
                                <input class="form-control" type="email" name="email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Password</label>
                            <div class="position-relative icon-form-control"><i class="mdi mdi-key-variant position-absolute"></i>
                                <input class="form-control" type="password" name="password" />
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck1" type="checkbox" />
                            <label class="custom-control-label" for="customCheck1">Ingat kata sandi</label>
                        </div>
                        <button class="btn btn-success btn-block text-uppercase" type="submit"> Masuk</button>
                        <div class="text-center mt-3 border-bottom pb-3">
                            <p class="small text-muted">Atau login menggunakan</p>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('login.provider', 'google') }}" class="btn btn-danger">{{ __('Google Sign in') }}</a>
                                    <!-- <button class="btn btn-outline-instagram btn-block" type="button"><i class="mdi mdi-instagram"></i> Instagram</button> -->
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-facebook btn-block" type="button"><i class="mdi mdi-facebook"></i> Facebook</button>
                                </div>
                            </div>
                        </div>
                        <div class="py-3 d-flex align-item-center"><a href="forgot-password.html">Lupa kata sandi?</a><span class="ml-auto">Baru di ANORA? <a href="/register">Daftar Baru</a></span></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection