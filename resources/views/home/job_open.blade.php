@extends('layouts.home')

@section('main-content')
<section class="py-5 bg-dark inner-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="mt-0 mb-3 text-white">Telusuri Pekerjaan Statistisi</h1>
            </div>
        </div>
    </div>
</section>
<section class="py-5 p-list-two">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="filters shadow-sm rounded bg-white mb-4">
                    <div class="filters-header border-bottom pl-4 pr-4 pt-3 pb-3">
                        <h5 class="m-0">Cari Berdasarkan </h5>
                    </div>
                    <div class="filters-body">
                        <div id="accordion">
                            {{Form::open(['method' => 'GET', 'route' => ['jobs']])}}
                            <div class="filters-card border-bottom p-4">
                                <div class="filters-card-header" id="headingOne">
                                    <h6 class="mb-0"><a class="btn-link" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Populer <i class="mdi mdi-chevron-down float-right"></i></a></h6>
                                </div>
                                <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb1" type="checkbox" name="isSpss" @if (request()->get('isSpss')) {{"checked"}} @endif />
                                            <label class="custom-control-label" for="cb1">SPSS</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb2" type="checkbox" name="isPython" @if (request()->get('isPython')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cb2">Python</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb3" type="checkbox" name="isR" @if (request()->get('isR')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cb3">R</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb4" type="checkbox" name="isService1" @if (request()->get('isService1')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cb4">Analisis Regresi</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb6" type="checkbox" name="isService2" @if (request()->get('isService2')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cb6">Olah Data</label>
                                        </div>
                                        <!-- <div class="mt-2"><a class="link" href="#">Lihat semua</a></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="filters-card border-bottom p-4">
                                <div class="filters-card-header" id="headingTwo">
                                    <h6 class="mb-0"><a class="btn-link" href="#" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">Kategori <i class="mdi mdi-chevron-down float-right"></i></a></h6>
                                </div>
                                <div class="collapse show" id="collapsetwo" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        <!-- <form class="filters-search mb-3">
                                            <div class="form-group"><i class="fa fa-search"></i>
                                                <input class="form-control" type="text" placeholder="Cari Kategori" />
                                            </div>
                                        </form> -->
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb6" type="checkbox" name="isService2" @if (request()->get('isService2')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cb6">Olah Data</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb7" type="checkbox" name="isService3" @if (request()->get('isService3')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cb7">Data Entry</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb8" type="checkbox" name="isService4" @if (request()->get('isService4')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cb8">Jasa Pembuatan Kuisioner</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cb9" type="checkbox" name="isService5" @if (request()->get('isService5')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cb9">Konsultasi Statistik</label>
                                        </div>
                                        <!-- <div class="mt-2"><a class="link" href="#">Lihat semua</a></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="filters-card p-4 border-bottom">
                                <div class="filters-card-header" id="headingOffer">
                                    <h6 class="mb-0"><a class="btn-link" href="#" data-toggle="collapse" data-target="#collapseOffer" aria-expanded="true" aria-controls="collapseOffer">Rating Statistisi <i class="mdi mdi-chevron-down float-right"></i></a></h6>
                                </div>
                                <div class="collapse show" id="collapseOffer" aria-labelledby="headingOffer" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        <div class="custom-control">
                                            <input class="custom-control-input" id="cblevel1" type="radio" name="isLevel" value="top" @if (request()->get('isLevel')=='top') {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel1">Top Rated Statistik <small class="text-danger float-right">81-100</small></label>
                                        </div>
                                        <div class="custom-control">
                                            <input class="custom-control-input" id="cblevel2" type="radio" name="isLevel" value="tinggi" @if (request()->get('isLevel')=='tinggi') {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel2">Statistik Tinggi <small class="text-danger float-right">61-80</small></label>
                                        </div>
                                        <div class="custom-control">
                                            <input class="custom-control-input" id="cblevel3" type="radio" name="isLevel" value="medium" @if (request()->get('isLevel')=='medium') {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel3">Statistik Medium <small class="text-danger float-right">41-60</small></label>
                                        </div>
                                        <div class="custom-control">
                                            <input class="custom-control-input" id="cblevel4" type="radio" name="isLevel" value="entry" @if (request()->get('isLevel')=='entry') {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel4">Statistik Entry <small class="text-danger float-right">21-40</small></label>
                                        </div>
                                        <div class="custom-control">
                                            <input class="custom-control-input" id="cblevel5" type="radio" name="isLevel" value="baru" @if (request()->get('isLevel')=='baru') {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel5">Statistik Baru <small class="text-danger float-right">0-20</small></label>
                                        </div>
                                        <!-- <div class="mt-2"><a class="link" href="#">See all</a></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="filters-card p-4 border-bottom">
                                <div class="filters-card-header" id="headingOffer">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="col-lg-12 view_slider recommended">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sorting-div d-flex align-items-center justify-content-between">
                                <p class="mb-2">{{$widget['open_jobs']->meta->total}} pekerjaan ditemukan</p>
                                <!-- <div class="sorting d-flex align-items-center">
                                    <p>Urutkan</p>
                                    <select class="custom-select custom-select-sm border-0 shadow-sm ml-2">
                                        <option>Paling Dicari</option>
                                        <option>Rating Terbaik</option>
                                        <option>Statistisi Terbaru</option>
                                    </select>
                                </div> -->
                            </div>
                            <h3>Jasa Olah Data</h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($widget['open_jobs']->data as $job)
                        <div class="card shadow-sm col-md-12 open_jobInfoModal" data-toggle="modal" data-target="#jobInfoModal" data-id="{{$job->id}}" style="margin: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{$job->name_job}}</b> (Level {{$job->level_need}}+)</h5>
                                <hr>
                                <p class="card-text">{{$job->description}}</p>
                                <h6 class="card-subtitle mb-2" style="font-size: small;font-style: italic;color: blue;">{{$job->tool_need}}</h6>
                                <h6 class="card-subtitle mb-2" style="font-size: small;font-style: italic;color: blue;">{{$job->service_need}}</h6>
                                <hr>
                                <a href="#" class="card-link">{{$job->created_at_time}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="footer-pagination text-center">
                        <nav class="mb-0 mt-0" aria-label="Page navigation example">
                            <ul class="pagination mb-0">
                                @foreach($widget['open_jobs']->meta->links as $link)
                                @if ($link->active)
                                <li class="page-item active">
                                    @else
                                <li class="page-item">
                                    @endif
                                    <a class="page-link" href="{{$link->url}}">{{$link->label}}</a>
                                </li>
                                @endforeach

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Informasi Modal-->
<div class="modal fade" id="jobInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="nameJob">{{ __('Nama Pekerjaan') }}</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <lottie-player id="loadingModal" src="https://assets10.lottiefiles.com/packages/lf20_Gh0AU0.json" background="#43619d" speed="1" style="width: 100%; height: 300px;" loop autoplay>
                </lottie-player>
                <div id="modalBody">
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input id="levelJob" class="form-control plaintext" type="text" name="level" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="service">Jasa</label>
                        <input id="serviceJob" class="form-control plaintext" type="text" name="service" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tool">Skill</label>
                        <input id="toolJob" class="form-control plaintext" type="text" name="tool" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        <input class="form-control plaintext" id="descriptionJob" type="text" name="desc" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input_file">File yang diberikan</label>
                        <a id="inputFileJob" href="" name="input_file"></a>
                    </div>
                    <div class="form-group">
                        <label for="open_price">Upah yang ditawarkan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input id="openPriceJob" type="text" class="form-control plaintext" value="" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="duration">Durasi (hari)</label>
                        <input id="durationJob" class="form-control plaintext" type="text" name="duration" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="home_service">Home Service?</label>
                        <lottie-player id="isHomeServiceJob" src="https://assets3.lottiefiles.com/packages/lf20_sxrbhrtx.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                    </div>
                    <!-- <h5 class="text" id="descriptionJob"></h5>
                    <hr>
                    <a id="inputFileJob" href="#"></a>
                    <span>Rp. <div id="openPriceJob"></div></span>
                    <span>
                        <i class="fa fa-clock-o">
                            <div id="durationJob"></div>
                        </i>
                    </span>
                    <lottie-player id="isHomeServiceJob" src="https://assets3.lottiefiles.com/packages/lf20_sxrbhrtx.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                    <hr>
                    <h6 class="text" style="font-size: small;font-style: italic;color: blue;" id="toolJob"></h6>
                    <h6 class="text" style="font-size: small;font-style: italic;color: blue;" id="serviceJob"></h6> -->
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Tutup') }}</button>
                <a class="btn btn-link" href="#" id="urlStProfile" target="_blank">Detail</a>
                <a class="btn btn-primary" href="#" id="urlCreateProposal" target="_blank">Ajukan Proposal</a>
            </div>
        </div>
    </div>
</div>
@endsection