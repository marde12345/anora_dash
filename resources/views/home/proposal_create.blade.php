@extends('layouts.home')

@section('main-content')
{!! NoCaptcha::renderJs() !!}

<section class="py-5 bg-dark inner-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="mt-0 mb-3 text-white">Buat Proposal</h1>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mx-auto">
                    <div class="card-header">
                        <h4>{{ $widget['job']->name_job }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <!-- <input class="form-control" type="text" name="level" value="{{$widget['job']->level_need}}" readonly> -->
                            <p style="color: grey;">{{$widget['job']->level_need}}</p>
                        </div>
                        <div class="form-group">
                            <label for="service">Jasa</label>
                            <p style="color: grey;">{{$widget['job']->service_need}}</p>
                            <!-- <input class="form-control" type="text" name="service" value="{{$widget['job']->service_need}}" readonly> -->
                        </div>
                        <div class="form-group">
                            <label for="tool">Skill</label>
                            <p style="color: grey;">{{$widget['job']->tool_need}}</p>
                            <!-- <input class="form-control" type="text" name="tool" value="{{$widget['job']->tool_need}}" readonly> -->
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <p style="color: grey;">{{$widget['job']->description}}</p>
                            <!-- <input class="form-control" type="text" name="desc" value="{{$widget['job']->description}}" readonly> -->
                        </div>
                        <div class="form-group">
                            <label for="input_file">File yang diberikan</label>
                            <a href="{{$widget['job']->input_file_url}}" name="input_file">{{$widget['job']->input_file_url}}</a>
                        </div>
                        <div class="form-group">
                            <label for="open_price">Upah yang ditawarkan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control uang" value="{{$widget['job']->open_price}}" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">,00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duration">Durasi (hari)</label>
                            <input class="form-control" type="text" name="duration" value="{{$widget['job']->duration}}  Hari" readonly>
                        </div>
                        <div class="form-group">
                            <label for="home_service">Home Service?</label>
                            @if($widget['job']->is_home_service==1)
                            <button class="badge badge-primary">Bersedia</button>
                            @else if($widget['job']->is_home_service==0)
                            <button class="badge badge-danger">Tidak bersedia</button>
                            @endif
                            <lottie-player id="isHomeServiceJob" src="https://assets3.lottiefiles.com/packages/lf20_sxrbhrtx.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                        </div>
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mx-auto">
                    <div class="card-header card-success">
                        <h4>
                            Buat Proposal Pekerjaan
                        </h4>
                    </div>
                    <div class="card-body">
                        {{Form::open(['method' => 'POST', 'route' => ['proposal.store']])}}
                        <!-- Type -->
                        <input type="hidden" name="job_id" value="{{$widget['job']->id}}">
                        <h4>Penawaran</h4>
                        <hr>
                        <!-- desc -->
                        <div class="form-group">
                            <label for="description">Surat pengantar</label>
                            <textarea class="form-control" name="cover_letter" value='{{old("cover_letter")}}' placeholder="Yang saya hormati bapak/ibu ditempat...">{{old("cover_letter")}}</textarea>
                        </div>
                        <div class="form-row">
                            <!-- open price -->
                            <div class="form-group col-md-6">
                                <label for="duration">Upah</label>
                                <div class="input-group">
                                    <small id="bidPrice" style="color: red;">
                                        Upah minimal Rp. 100.000,00 dan maksimal Rp. {{$widget['job']->open_price}},00
                                    </small>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input name="bid_price" type="number" class="form-control uang" value='{{old("bid_price",$widget["job"]->open_price)}}' aria-describedby="bidPrice">
                                    <div class="input-group-append">
                                        <span class="input-group-text">,00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- duration -->
                            <div class="form-group col-md-6">
                                <label for="duration">Lama pengerjaan ( Hari )</label>
                                <div class="input-group">
                                    <small id="bidDuration" style="color: red;">
                                        Lama pengerjaan paling cepat 1 hari dan paling lama {{$widget['job']->duration}} hari
                                    </small>
                                    <input class="form-control" type="number" name="bid_duration" value='{{old("bid_duration",1)}}' aria-label="3" aria-describedby="bidDuration">
                                    <div class="input-group-append">
                                        <span class="input-group-text"> Hari</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-12 mx-auto" style="text-align: -webkit-center;">
                            {!! NoCaptcha::display() !!}
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-success col-md-6" type="submit">Buat proposal</button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 p-list-two">
    <div class="container">

    </div>
</section>
@endsection