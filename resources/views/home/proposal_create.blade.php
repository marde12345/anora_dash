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
                                <input type="text" class="form-control" value="{{$widget['job']->open_price}}" readonly>
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
                            <lottie-player id="isHomeServiceJob" src="https://assets3.lottiefiles.com/packages/lf20_sxrbhrtx.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>
                        </div>
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mx-auto">
                    <div class="card-body">
                        {{Form::open(['method' => 'POST', 'route' => ['proposal.store']])}}
                        <!-- Type -->
                        <fieldset class="form-group col-md-12">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Tipe pekerjaan</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type1" value="open" checked>
                                        <label class="form-check-label" for="type1">
                                            Pekerjaan terbuka
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type2" value="direct">
                                        <label class="form-check-label" for="type2">
                                            Pekerjaan langsung
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <!-- Level -->
                        <fieldset class="form-group col-md-12">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Level minimal</legend>
                                <div class="col-sm-10">
                                    @foreach($widget['levels'] as $key => $level)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level_need" id="{{$key}}" value="{{$key}}">
                                        <label class="form-check-label" for="{{$key}}">
                                            {{$level}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </fieldset>
                        <!-- Tool -->
                        <fieldset class="form-group col-md-12">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Teknologi yang digunakan</legend>
                                <div class="col-sm-10">
                                    @foreach($widget['tools'] as $key => $tool)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tool_need[]" id="{{$key}}" value="{{$key}}">
                                        <label class="form-check-label" for="{{$key}}">
                                            {{$tool}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </fieldset>
                        <!-- Service -->
                        <fieldset class="form-group col-md-12">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Layanan yang digunakan</legend>
                                <div class="col-sm-10">
                                    @foreach($widget['services'] as $key => $service)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="service_need[]" id="{{$key}}" value="{{$key}}">
                                        <label class="form-check-label" for="{{$key}}">
                                            {{$service}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <!-- job_name -->
                        <div class="form-group">
                            <label for="name_job">Nama pekerjaan</label>
                            <input class="form-control" type="text" name="name_job" value='{{old("name_job")}}' placeholder="Nama Pekerjaan...">
                        </div>
                        <!-- desc -->
                        <div class="form-group">
                            <label for="description">Deskripsi pekerjaan</label>
                            <textarea class="form-control" name="description" value='{{old("description")}}' placeholder="Saya butuh seseorang untuk melakukan data entry">{{old("description")}}</textarea>
                        </div>
                        <!-- file_url -->
                        <div class="form-group">
                            <label for="input_file_url">Link file yang dibutuhkan</label>
                            <input class="form-control" type="text" name="input_file_url" value='{{old("input_file_url")}}' placeholder="https://drive.google.com">
                        </div>
                        <!-- home_service -->
                        <fieldset class="form-group col-md-12">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Home service?</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_home_service" id="is_home_service1" value="1" checked>
                                        <label class="form-check-label" for="is_home_service1">
                                            Iya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_home_service" id="is_home_service2" value="0">
                                        <label class="form-check-label" for="is_home_service2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-row">
                            <!-- open price -->
                            <div class="form-group col-md-6">
                                <label for="duration">Upah maksimal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp. </span>
                                    </div>
                                    <input name="open_price" type="text" class="form-control uang" min="100000" step="5000" value='{{old("open_price")}}'>
                                    <div class="input-group-append">
                                        <span class="input-group-text">,00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- duration -->
                            <div class="form-group col-md-6">
                                <label for="duration">Lama pengerjaan ( Hari )</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="duration" value='{{old("duration",1)}}' min="1" step="1" aria-label="3">
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
                            <button class="btn btn-primary col-md-6 " type="submit">Buat</button>
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