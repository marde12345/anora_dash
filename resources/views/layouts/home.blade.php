<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'Laravel') . ' | ' .  $widget['title'] }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Gurdeep singh osahan">
  <meta name="author" content="Gurdeep singh osahan">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @auth
  <meta name="user_id" content="{{ auth()->user()->id }}">
  @endauth

  <!-- Scripts -->
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

  <!-- Favicon Icon-->
  <link rel="icon" type="image/png" href="{{ asset('img/anora_small.png') }}">

  <!-- Styles -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

  <!-- Bootstrap core CSS-->
  <link href="/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome-->
  <link href="/home/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Material Design Icons-->
  <link href="/home/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">

  <!-- Slick-->
  <link href="/home/vendor/slick-master/slick/slick.css" rel="stylesheet" type="text/css">

  <!-- Lightgallery-->
  <link href="/home/vendor/lightgallery-master/dist/css/lightgallery.min.css" rel="stylesheet">

  <!-- Select2 CSS-->
  <link href="/home/vendor/select2/css/select2-bootstrap.css">
  <link href="/home/vendor/select2/css/select2.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/home/stylesheets/landing/style.css" rel="stylesheet">
  <link href="/home/stylesheets/landing/style-adjust.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg navbar-light topbar static-top shadow-sm bg-white osahan-nav-top px-0">
  <div class="container">
    <!-- Sidebar Toggle (Topbar)-->
    <a class="navbar-brand" href="/"><img src="/home/images/logo-horizontal.png" alt=""></a>
    <!-- Topbar Search-->
    {{Form::open(['method' => 'GET', 'route' => ['root.browse'], 'class' => 'd-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search'])}}
    <div class="input-group">
      <input class="form-control bg-white small" name="q" type="text" placeholder="Cari Statistisi..." aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-success" type="submit"><i class="fa fa-search fa-sm"></i></button>
      </div>
    </div>
    {{Form::close()}}
    <!-- Topbar Navbar-->
    <ul class="navbar-nav align-items-center ml-auto">
      <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications d-sm-none"><a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search fa-fw"></i></a>
        <!-- Dropdown - Messages-->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input class="form-control bg-light border-0 small" type="text" placeholder="Cari Statistisi..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fa fa-search fa-sm"></i></button>
              </div>
            </div>
          </form>
        </div>
      </li>
      @auth
      <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications">
        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg class="feather feather-bell" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
          </svg>
          <span class="badge badge-danger badge-counter">3+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
          <h6 class="dropdown-header dropdown-notifications-header">
            <svg class="feather feather-bell mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
              <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>Notifikasi
          </h6><a class="dropdown-item dropdown-notifications-item" href="#!">
            <div class="dropdown-notifications-item-icon bg-warning">
              <svg class="feather feather-activity" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
              </svg>
            </div>
            <div class="dropdown-notifications-item-content">
              <div class="dropdown-notifications-item-content-details">December 29, 2020</div>
              <div class="dropdown-notifications-item-content-text">This is an alert message. It&apos;s nothing serious, but it requires your attention.</div>
            </div>
          </a><a class="dropdown-item dropdown-notifications-item" href="#!">
            <div class="dropdown-notifications-item-icon bg-info">
              <svg class="feather feather-bar-chart" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="20" x2="12" y2="10"></line>
                <line x1="18" y1="20" x2="18" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="16"></line>
              </svg>
            </div>
            <div class="dropdown-notifications-item-content">
              <div class="dropdown-notifications-item-content-details">December 22, 2020</div>
              <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click here to view!</div>
            </div>
          </a><a class="dropdown-item dropdown-notifications-item" href="#!">
            <div class="dropdown-notifications-item-icon bg-danger">
              <svg class="svg-inline--fa fa-exclamation-triangle fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-triangle" role="img" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512" data-fa-i2svg="">
                <path fill="currentColor" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
              </svg>
              <!-- <i class="fas fa-exclamation-triangle"></i>-->
            </div>
            <div class="dropdown-notifications-item-content">
              <div class="dropdown-notifications-item-content-details">December 8, 2020</div>
              <div class="dropdown-notifications-item-content-text">Critical system failure, systems shutting down.</div>
            </div>
          </a><a class="dropdown-item dropdown-notifications-item" href="#!">
            <div class="dropdown-notifications-item-icon bg-success">
              <svg class="feather feather-user-plus" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="8.5" cy="7" r="4"></circle>
                <line x1="20" y1="8" x2="20" y2="14"></line>
                <line x1="23" y1="11" x2="17" y2="11"></line>
              </svg>
            </div>
            <div class="dropdown-notifications-item-content">
              <div class="dropdown-notifications-item-content-details">December 2, 2020</div>
              <div class="dropdown-notifications-item-content-text">New user request. Woody has requested access to the organization.</div>
            </div>
          </a><a class="dropdown-item dropdown-notifications-footer" href="/user/notification">Lihat Semua Notifikasi</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications">
        <a class="btn btn-icon btn-transparent-dark dropdown-toggle nav-link" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg class="feather feather-mail" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
          @if(count(auth()->user()->countMessageUnread) > 3)
          <span class="badge badge-danger badge-counter">
            3+
          </span>
          @else
          <span class="badge badge-danger badge-counter">
            {{count(auth()->user()->countMessageUnread)}}
          </span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
          <h6 class="dropdown-header dropdown-notifications-header">
            <svg class="feather feather-mail mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg> Kotak Pesan
          </h6>
          @foreach(auth()->user()->countMessageUnread as $message)
          <a class="dropdown-item dropdown-notifications-item" href="#!">
            <img class="dropdown-notifications-item-img" src="{{$message->from->photo_url}}">
            <div class="dropdown-notifications-item-content">
              <div class="dropdown-notifications-item-content-text">{{$message->content}}</div>
              <div class="dropdown-notifications-item-content-details">{{$message->from->name ." ". $message->from->last_name}} &middot; {{$message->send_at}}</div>
            </div>
          </a>
          @endforeach
          <a class="dropdown-item dropdown-notifications-footer" href="/user/message">Baca Semua Pesan</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow no-caret dropdown-user"><a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="{{ auth()->user()->photoProfile }}"></a>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
          <h6 class="dropdown-header d-flex align-items-center"><img class="dropdown-user-img" src="{{ auth()->user()->photoProfile }}">
            <div class="dropdown-user-details">
              <div class="dropdown-user-details-name">{{ auth()->user()->name }}</div>
              <div class="dropdown-user-details-email">{{ auth()->user()->email }}</div>
            </div>
          </h6>
          <div class="dropdown-divider"></div>
          @if(auth()->user()->role === "customer")
          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('upgrade-user-role-form').submit();">
            <div class="dropdown-item-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="8.5" cy="7" r="4"></circle>
                <line x1="20" y1="8" x2="20" y2="14"></line>
                <line x1="23" y1="11" x2="17" y2="11"></line>
              </svg>
            </div>Jadikan saya mitra <span class="badge badge-primary">Daftar</span>
            <form id="upgrade-user-role-form" action="{{ route('dashboard.userupgraderole.store') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </a>
          @endif
          <a class="dropdown-item" href="{{ route('dashboard.profile') }}">
            <div class="dropdown-item-icon">
              <svg class="feather feather-settings" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
              </svg>
            </div>Profil
          </a>
          <a class="dropdown-item" href="#" data-target="#logoutModal" data-toggle="modal">
            <div class="dropdown-item-icon">
              <svg class="feather feather-log-out" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
              </svg>
            </div> Logout
          </a>
        </div>
      </li>
    </ul>
    @endauth
  </div>
</nav>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-white osahan-nav-mid px-0 border-top shadow-sm">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">
        <li class="nav-item dropdown"><a class="nav-link" href="/">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="/browse">Telusuri Statistisi</a></li>
        <li class="nav-item"><a class="nav-link" href="/about">Tentang Kami</a></li>
      </ul>
    </div>
    <ul class="navbar-nav ml-auto">
      @guest
      <li class="nav-item"><a class="nav-link" href="/login"><span>Login</span></a></li>
      <li class="nav-item"><a class="nav-link" href="/register"><span>Daftar Baru</span></a></li>
      @endguest
      @auth
      <li class="nav-item"><a class="nav-link" href="/dashboard"><span>Dashboard</span></a></li>
      @endauth
    </ul>
  </div>
</nav>
<!-- Begin Page Content-->
<section class="py-1 bg-white">
  <div class="container">
    @include('layouts.notification')
  </div>
</section>
@yield('main-content')
<!-- footer-->
<footer class="bg-white" style="padding-top: 0px !important">
  <div class="container">
    <div class="copyright" style="border-top: none">
      <div class="logo"><a href="index.html"><img src="/home/images/logo-horizontal.png"></a></div>
      <p>&copy; Copyright {{date("Y")}} ANORAs. All Rights Reserved</p>
      <ul class="social">
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
</footer>
<!-- footer-->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('Mau logout?') }}</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Tekan "Logout" dibawah untuk mengakhiri session.</div>
      <div class="modal-footer">
        <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Batal') }}</button>
        <a class="btn btn-danger" href="{{ route('root.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('root.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
<div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
<!-- Bootstrap core JavaScript-->
<script src="/home/vendor/jquery/jquery.min.js"></script>
<script src="/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Contact form JavaScript-->
<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file.-->
<!-- <script src="js/jqBootstrapValidation.js"></script> -->
<!-- <script src="js/contact_me.js"></script> -->

<!-- Slick-->
<script src="/home/vendor/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>

<!-- lightgallery-->
<script src="/home/vendor/lightgallery-master/dist/js/lightgallery-all.min.js"></script>

<!-- select2 Js-->
<script src="/home/vendor/select2/js/select2.min.js"></script>

<!-- Custom-->
<script src="/home/js/custom_home.js"></script>