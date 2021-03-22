@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Verifikasi Email Anda') }}</h1>
                                </div>

                                @if (session('resent'))
                                <div class="alert alert-success border-left-success" role="alert">
                                    {{ __('Link verifikasi baru berhasil dikirim') }}
                                </div>
                                @endif

                                {{ __('Sebelum melanjutkan, silahkan verifikasi email terlebih dahulu.') }}
                                {{ __('Jika tidak menerima email verifikasi') }},
                                <form id="my_form" method="post" action="{{ route('verification.resend')}}">
                                    {{ csrf_field() }}
                                    <a href="javascript:{}" onclick="document.getElementById('my_form').submit();"> {{ __('Klik untuk mengirim ulang') }}</a>.
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection