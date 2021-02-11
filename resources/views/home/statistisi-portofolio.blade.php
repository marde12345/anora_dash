@extends('layouts.home')

@section('main-content')
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 left">
                <div class="profile_info">
                    <div class="seller-card">
                        <!-- <div>
                            <div class="user-online-indicator is-online" data-user-id="1152855"><i class="fa fa-circle"></i>online</div>
                        </div> -->
                        <!-- <div><a class="ambassadors-badge" href="#">Statistisi</a></div> -->
                        <div class="user-profile-info">
                            <div>
                                <div class="user-profile-image">
                                    <label class="user-pict"><img class="img-fluid user-pict-img" src="{{$widget['st_user']->user->photo}}" alt="Dieka Prastyas" /><a class="user-badge-round user-badge-round-med locale-en-us top-rated-seller" href="#"></a></label>
                                </div>
                            </div>
                            <div class="user-profile-label">
                                <div class="username-line"><a class="seller-link" href="#">{{$widget['st_user']->user->name.' '.$widget['st_user']->user->last_name}}</a></div>
                                <div class="oneliner-wrapper"><small class="oneliner">{{$widget['st_user']->level_statistisi}}</small>
                                    <div class="ratings-wrapper">
                                        <p class="rating-text"><strong>{{$widget['st_user']->avg_star_review}}</strong> ({{$widget['st_user']->count_star_review}})</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons-wrapper"><a class="btn-lrg-standard btn-contact-me js-contact-me js-open-popup-join" href="#">
                                Hubungi
                                Saya</a>
                            <div class="btn-lrg-standard btn-white btn-custom-order">Pesan Jasa</div>
                        </div>
                        <div class="user-stats-desc">
                            <ul class="user-stats">
                                <li class="location">Dari<strong>{{$widget['st_user']->user->county}}</strong></li>
                                <li class="member-since">Menjadi member sejak<strong>{{$widget['st_user']->member_sejak}}</strong></li>
                                <!-- <li class="response-time">Waktu Respon<strong>2 jam</strong></li> -->
                                <!-- <li class="recent-delivery">Order Pekerjaan Terakhir<strong>3 hari yang lalu</strong></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="seller-profile">
                    <div class="description">
                        <h3>Deskripsi</h3>
                        <p>
                            {{$widget['st_user']->cover_letter}}
                        </p>
                    </div>
                    <!-- <div class="languages">
                        <h3>Bahasa</h3>
                        <ul>
                            <li>Indonesia&nbsp;&nbsp;- <span>Fluent</span></li>
                            <li>English&nbsp;<strong>(espa&ntilde;ol)</strong>&nbsp;- <span>Conversational</span></li>
                            <li>French&nbsp;<strong>(fran&ccedil;ais)</strong>&nbsp;- <span>Basic</span></li>
                        </ul>
                    </div>
                    <div class="linked-accounts">
                        <h3>Akun Sosial Media </h3>
                        <ul>
                            <li class="platform social-account facebook"><i class="platform-icon facebook hint--top" aria-hidden="true" data-hint="facebook"></i><span class="text">facebook</span></li>
                            <li class="platform social-account google"><i class="platform-icon google hint--top" aria-hidden="true" data-hint="google"></i><span class="text">google</span></li>
                        </ul>
                    </div> -->
                    <div class="skills">
                        <h3>Skills</h3>
                        <ul>
                            @foreach($widget['st_user']->tools as $tool)
                            <li><a href="#">{{$tool}}</a></li>
                            @endforeach
                            @foreach($widget['st_user']->services as $service)
                            <li><a href="#">{{$service}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- <div class="education-list list">
                        <h3>Pendidikan</h3>
                        <ul>
                            <li>
                                <p>S1 - MIPA</p>
                                <p>Universitas Indonesia, Indonesia, Lulus 2006</p>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-8 right">
                <h2>Jasa yang Ditawarkan</h2>
                <div class="view services-slider recommended-slider recommended">
                    @foreach($widget['st_user']->services as $service)
                    <div class="col-md-12">
                        <div>
                            <a href="#">
                                @switch($service)
                                @case('Analisis Regresi')
                                <img class="img-fluid" src="{{asset('home/images/service_analisis-regresi.jpg')}}" />
                                @break
                                @case('Olah Data')
                                <img class="img-fluid" src="{{asset('home/images/service_olah-data.jpg')}}" />
                                @break
                                @case('Data Entry')
                                <img class="img-fluid" src="{{asset('home/images/service_data-entry.jpeg')}}" />
                                @break
                                @case('Pembuatan Kuisioner')
                                <img class="img-fluid" src="{{asset('home/images/service_pembuatan-kuisioner.jpg')}}" />
                                @break
                                @case('Konsultasi Statistik')
                                <img class="img-fluid" src="{{asset('home/images/service_konsultasi.jpg')}}" />
                                @break
                                @endswitch
                            </a>
                            <div class="inner-slider">
                                <div class="inner-wrapper">
                                    <div class="d-flex align-items-center"><span class="seller-name"><a href="#">{{$service}}</a></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- <div class="recommended">
                    <div class="row">
                        <div class="col-md-4">
                            <div><a href="#"><img class="img-fluid" src="/home/images/job1.jpg" /></a>
                                <div class="inner-slider">
                                    <div class="inner-wrapper">
                                        <div class="d-flex align-items-center"><span class="seller-image"><img class="img-fluid" src="/home/images/default_user.jpg" alt="" /></span><span class="seller-name"><a href="#">Olah Data</a><span class="level hint--top level-one-seller">Level 1 Statistisi</span></span></div>
                                        <h3>Saya akan membantu anda mengolah data dengan berbagai metode pengolahan data.</h3>
                                        <div class="content-info">
                                            <div class="rating-wrapper"><span class="gig-rating text-body-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1792 1792" width="15" height="15">
                                                        <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                    </svg> 5.0<span>(7)</span></span></div>
                                        </div>
                                        <div class="footer"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div><a href="#"><img class="img-fluid" src="/home/images/job2.jpg" /></a>
                                <div class="inner-slider">
                                    <div class="inner-wrapper">
                                        <div class="d-flex align-items-center"><span class="seller-image"><img class="img-fluid" src="/home/images/default_user.jpg" alt="" /></span><span class="seller-name"><a href="#">Data Entry</a><span class="level hint--top level-one-seller">Level 1 Statistisi</span></span></div>
                                        <h3>Saya akan membantu anda menginput data dengan baik melalui program aplikasi, ataupun excel.</h3>
                                        <div class="content-info">
                                            <div class="rating-wrapper"><span class="gig-rating text-body-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1792 1792" width="15" height="15">
                                                        <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                    </svg> 5.0<span>(7)</span></span></div>
                                        </div>
                                        <div class="footer"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div><a href="#"><img class="img-fluid" src="/home/images/job3.jpg" /></a>
                                <div class="inner-slider">
                                    <div class="inner-wrapper">
                                        <div class="d-flex align-items-center"><span class="seller-image"><img class="img-fluid" src="/home/images/default_user.jpg" alt="" /></span><span class="seller-name"><a href="#">Jasa Pembuatan Kuisioner</a><span class="level hint--top level-one-seller">Level 1 Statistisi</span></span></div>
                                        <h3>Saya akan membantu anda membuat kuisioner yang tepat dengan berbagai metode terbaik.</h3>
                                        <div class="content-info">
                                            <div class="rating-wrapper"><span class="gig-rating text-body-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1792 1792" width="15" height="15">
                                                        <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                                    </svg> 5.0<span>(7)</span></span></div>
                                        </div>
                                        <div class="footer"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="review-section">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="m-0">Testimoni
                            <small>
                                <span class="star-rating-s15"></span>
                                <span>
                                    <span class="total-rating-out-five header-average-rating" data-impression-collected="true">{{$widget['st_user']->avg_star_review}}</span>
                                </span>
                                <span>
                                    <span class="total-rating header-total-rating" data-impression-collected="true">({{$widget['st_user']->count_star_review}})</span>
                                </span>
                            </small>
                        </h4>
                        <!-- <select class="custom-select custom-select-sm border-0 shadow-sm ml-2">
                            <option>Paling Relevan</option>
                            <option>Paling Baru</option>
                        </select> -->
                    </div>
                    <!-- <div class="breakdown">
                        <ul class="header-stars">
                            <li>Komunikasi<small><span class="star-rating-s15"></span><span class="total-rating-out-five">5</span></small></li>
                            <li>Rekomendasi<small><span class="star-rating-s15"></span><span class="total-rating-out-five">5</span></small></li>
                            <li>Pelayanan<small><span class="star-rating-s15"></span><span class="total-rating-out-five">5</span></small></li>
                        </ul>
                    </div> -->
                </div>
                <div class="review-list">
                    <ul>
                        @foreach($widget['st_user']->reviews as $review)
                        <li>
                            <div class="d-flex">
                                <div class="left"><span>
                                        <img class="profile-pict-img img-fluid" src="{{$review->from_user->photo}}" alt="" /></span>
                                </div>
                                <div class="right">
                                    <h4>{{$review->from_user->name.' '.$review->from_user->last_name}}<span class="gig-rating text-body-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1792 1792" width="15" height="15">
                                                <path fill="currentColor" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"></path>
                                            </svg> {{$review->star}}</span></h4>
                                    <div class="country d-flex align-items-center"></div>
                                    <div class="review-description">
                                        <p>
                                            {{$review->review_description}}
                                        </p>
                                    </div><span class="publish py-3 d-inline-block w-100">{{$review->publish_at}}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection