@extends('layouts.home')

@section('main-content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <h4 class="card-header">{{$widget['job']->name_job}}</h4>
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
                    <div class="card-footer text-muted">
                        {{$widget['job']->created_at_time}}
                        <a href="{{route('proposal.create_proposal',['job_id'=>$widget['job']->id])}}" class="btn btn-primary" style="float: right;">Ajukan Proposal</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mx-auto">
                <div class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection