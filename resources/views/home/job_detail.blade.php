@extends('layouts.home')

@section('main-content')
<div class="py-5">
    <div class="container">
        <div class="row">
            @if(in_array(auth()->user()->role, ['admin','customer']) && ($widget['job']->user_id == auth()->user()->id || auth()->user()->role == 'admin'))
            <div class="col-md-12 mb-3">
                <div class="card shadow">
                    <div class="card-header card-proposal">
                        <h4>Daftar Proposal</h4>
                    </div>
                    <div class="card-body">
                        <div id="accordion" role="tablist" aria-multiselectable="true" style="max-height: 200px; overflow: auto;">
                            @foreach($widget['proposals']->data as $proposal)
                            <div class="card m-2">
                                @switch($proposal->status)
                                @case('submitted')
                                <h5 class="card-header card-proposal-submitted" role="tab" id="heading{{$proposal->st_user->st_user_namecode}}">
                                    @break
                                    @case('review')
                                    <h5 class="card-header card-proposal-review" role="tab" id="heading{{$proposal->st_user->st_user_namecode}}">
                                        @break
                                        @case('invited')
                                        <h5 class="card-header card-proposal-invited" role="tab" id="heading{{$proposal->st_user->st_user_namecode}}">
                                            @break
                                            @case('accepted')
                                            <h5 class="card-header card-proposal-accepted" role="tab" id="heading{{$proposal->st_user->st_user_namecode}}">
                                                @break
                                                @case('rejected')
                                                <h5 class="card-header card-proposal-rejected" role="tab" id="heading{{$proposal->st_user->st_user_namecode}}">
                                                    @break
                                                    @default
                                                    <h5 class="card-header" role="tab" id="heading{{$proposal->st_user->st_user_namecode}}">
                                                        @endswitch
                                                        <a class="collapsed d-block" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$proposal->st_user->st_user_namecode}}" aria-expanded="false" aria-controls="collapse{{$proposal->st_user->st_user_namecode}}" style="color: white;">
                                                            <div class="btn btn-icon btn-transparent-dark" id="navbarDropdownUserImage" role="button"><img class="img-fluid" src="{{ $proposal->st_user->user->photo_url }}"></div><i class="fa fa-chevron-down pull-right"></i> {{ $proposal->st_user->user->name }}
                                                        </a>
                                                    </h5>
                                                    <div id="collapse{{$proposal->st_user->st_user_namecode}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$proposal->st_user->st_user_namecode}}">
                                                        <div class="card-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                                                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-6 mx-auto">
                <div class="card shadow-sm">
                    <h4 class="card-header card-success">{{$widget['job']->name_job}}</h4>
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
            <div class="col-lg-6 mx-auto">
                <div class="card shadow-sm">
                    <h5 class="card-header card-success">Featured</h5>
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