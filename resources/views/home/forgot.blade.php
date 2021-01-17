@extends('layouts.homeauth')

@section('main-content')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-lg-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4"><a href="index.html"><img src="/images/logo-horizontal.png" style="width: 200px !important" alt="" /></a>
                        <h5 class="font-weight-bold mt-3">Ingatkah informasi akun anda?</h5>
                        <p class="text-muted">Masukan email atau no telepon</p>
                    </div>
                    <form action="index.html">
                        <div class="form-group">
                            <label class="mb-1">Email atau No Telepon</label>
                            <div class="position-relative icon-form-control"><i class="mdi mdi-account position-absolute"></i>
                                <input class="form-control" type="email" />
                            </div>
                        </div>
                        <button class="btn btn-success btn-block text-uppercase" type="submit"> Cari Akun</button>
                        <div class="py-3 d-flex align-item-center"><a href="/login">Masuk Akun</a><span class="ml-auto">Baru di ANORA? <a href="/register">Daftar Baru</a></span></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection