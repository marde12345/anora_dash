@extends('layouts.homeauth')

@section('main-content')
{!! NoCaptcha::renderJs() !!}
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-lg-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <img src="{{asset('img/anora_horizontal.png')}}" style="width: 200px !important" alt="" />
                        <h5 class="font-weight-bold mt-3">Transaksi</h5>
                    </div>
                    <div class=" form-group">
                        <h6 class="text-dark"><i class="mdi mdi-note"></i> Nomor Pembayaran :</h6>
                        <p>{{$widget['payment']->payment_id}}</p>
                    </div>
                    <div class="form-group">
                        <h6 class="text-dark">Status Pembayaran :</h6>
                        @if($widget['payment']->payment_status=='settlement')
                        <p class="btn btn-success">Diterima</p>
                        @elseif($widget['payment']->payment_status=='deny')
                        <p class="btn btn-danger">Ditolak</p>
                        @else
                        <p class="btn btn-warning">{{$widget['payment']->payment_status}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <h6 class="text-dark"><i class="mdi mdi-bank"></i> Tipe Pembayaran :</h6>
                        <p>{{$widget['payment']->payment_type}}</p>
                    </div>
                    <div class="form-group">
                        <h6 class="text-dark"><i class="mdi mdi-cash-multiple"></i> Sejumlah :</h6>
                        <p>{{$widget['payment']->gross_amount_rp}}</p>
                    </div>
                    <div class="form-group">
                        <h6 class="text-dark"><i class="mdi mdi-math-compass"></i> Atas Pekerjaan :</h6>
                        <p>{{$widget['payment']->job_name}}</p>
                    </div>
                    <div class="form-group">
                        <h6 class="text-dark"><i class="mdi mdi-clock"></i> Transaksi Pada :</h6>
                        <p>{{$widget['payment']->payment_time}}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('http://anora.id/payment/finish?bc=on&order_id='.urlencode($widget['payment']->payment_id), 'QRCODE')}}" alt="barcode" /><br>
                        </div>
                        <div class="col-md-8">
                            QRcode verifikasi dokumen sebagai bukti keabsahan transaksi pembayaran biaya jasa.
                        </div>
                    </div>
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