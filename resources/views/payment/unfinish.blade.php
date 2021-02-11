@extends('layouts.homeauth')

@section('main-content')
{!! NoCaptcha::renderJs() !!}
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-lg-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4"><a href="index.html"><img src="/images/logo-horizontal.png" style="width: 200px !important" alt="" /></a>
                        <h5 class="font-weight-bold mt-3">Transaksi Belum Selesai</h5>
                    </div>
                    {{Form::open(['method' => 'GET', 'id'=>'contract_captha'])}}
                    <div class="form-group" style="text-align: -webkit-center;">
                        {!! NoCaptcha::display(['data-callback'=>'imNotARobot', 'data-sitekey'=>env('NOCAPTCHA_SITEKEY')]) !!}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var imNotARobot = function() {
        $('#contract_captha').submit();
    };
</script>
@endsection