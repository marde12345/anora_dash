@extends('layouts.home')

@section('main-content')
<section class="py-5 bg-dark inner-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="mt-0 mb-3 text-white">Telusuri Statistisi</h1>
                <div class="breadcrumbs">
                    <p class="mb-0 text-white"><a class="text-white" href="#">Beranda</a> / <span class="text-success">Daftar Statistisi</span></p>
                </div>
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
                            {{Form::open(['method' => 'GET', 'route' => ['root.browse']])}}
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
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cblevel1" type="checkbox" name="isLevel1" @if (request()->get('isLevel1')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel1">Top Rated Statistik <small class="text-danger float-right">81-100</small></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cblevel2" type="checkbox" name="isLevel2" @if (request()->get('isLevel2')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel2">Statistik Tinggi <small class="text-danger float-right">61-80</small></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cblevel3" type="checkbox" name="isLevel3" @if (request()->get('isLevel3')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel3">Statistik Medium <small class="text-danger float-right">41-60</small></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cblevel4" type="checkbox" name="isLevel4" @if (request()->get('isLevel4')) {{"checked"}} @endif/>
                                            <label class="custom-control-label" for="cblevel4">Statistik Entry <small class="text-danger float-right">21-40</small></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="cblevel5" type="checkbox" name="isLevel5" @if (request()->get('isLevel5')) {{"checked"}} @endif/>
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
                                <p class="mb-2">{{$widget['statistisis']->meta->total}} Statistisi ditemukan</p>
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
                        @foreach($widget['statistisis']->data as $statistisi)
                        <div class="col-md-4">
                            <a href="#">
                                <img class="img-fluid" src="{{$statistisi->photo_backcover}}" />
                            </a>
                            <div class="inner-slider">
                                <div class="inner-wrapper">
                                    <div class="d-flex align-items-center">
                                        <span class="seller-image">
                                            <img class="img-fluid" src="{{$statistisi->user->photo}}" alt="" />
                                        </span>
                                        <span class="seller-name">
                                            <a href="#">{{$statistisi->user->name . " " . $statistisi->user->last_name}}</a>
                                            <span class="level hint--top level-one-seller">Level {{$statistisi->level}} Statistisi</span>
                                        </span>
                                    </div>
                                    <h3>{{$statistisi->cover_letter}}</h3>
                                    <div class="content-info">
                                        <div class="rating-wrapper" style="text-align: center;">
                                            @foreach ($statistisi->services as $service)
                                            @switch($service)
                                            @case('Analisis Regresi')
                                            <br>
                                            <button class="badge badge-primary">Analisis Regresi</button>
                                            @break

                                            @case('Olah Data')
                                            <br>
                                            <button class="badge badge-danger">Olah Data</button>
                                            @break

                                            @case('Data Entry')
                                            <br>
                                            <button class="badge badge-secondary">Data Entry</button>
                                            @break

                                            @case('Pembuatan Kuisioner')
                                            <br>
                                            <button class="badge badge-success">Jasa Pembuatan Kuisioner</button>
                                            @break

                                            @case('Konsultasi Statistik')
                                            <br>
                                            <button class="badge badge-info">Konsultasi Statistik</button>
                                            @break

                                            @endswitch
                                            @endforeach
                                            <span class="gig-rating text-body-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1792 1792" width="15" height="15">
                                                    <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                </svg> 5.0<span>(7)</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        @foreach ($statistisi->tools as $tool)
                                        @switch($tool)
                                        @case('SPSS')
                                        <span class="badge badge-primary">SPSS</span>
                                        @break

                                        @case('R')
                                        <span class="badge badge-danger">R</span>
                                        @break

                                        @default
                                        <span class="badge badge-secondary">Python</span>
                                        @endswitch
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="footer-pagination text-center">
                        <nav class="mb-0 mt-0" aria-label="Page navigation example">
                            <ul class="pagination mb-0">
                                @foreach($widget['statistisis']->meta->links as $link)
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
@endsection