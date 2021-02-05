@extends('layouts.dashboard')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('User Role') }}</h1>

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Permintaan update role</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="list_userupgraderole_table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Informasi</th>
                                    <th>Permintaan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($widget['ListUsers'] as $user)
                                <tr>
                                    <td>
                                        {{ $user->from->name . " " . $user->from->last_name }}
                                        <br>
                                        {{ $user->from->email }}
                                    </td>
                                    <td>
                                        @if ($user->from_role == 'admin')
                                        <button class="badge badge-light">{{ "Admin" }}</button>
                                        @elseif ($user->from_role == 'st_user')
                                        <button class="badge badge-primary">{{ "Mitra" }}</button>
                                        @else ($user->from_role == 'customer')
                                        <button class="badge badge-success">{{ "Pelanggan" }}</button>
                                        @endif
                                        ->
                                        @if ($user->to_role == 'admin')
                                        <button class="badge badge-light">{{ "Admin" }}</button>
                                        @elseif ($user->to_role == 'st_user')
                                        <button class="badge badge-primary">{{ "Mitra" }}</button>
                                        @else ($user->to_role == 'customer')
                                        <button class="badge badge-success">{{ "Pelanggan" }}</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status == 'review')
                                        <button class="btn btn-info">{{ "Review" }}</button>
                                        @elseif ($user->status == 'accepted')
                                        <button class="btn btn-success">{{ "Diterima" }}</button>
                                        @elseif ($user->status == 'rejected')
                                        <button class="btn btn-danger">{{ "Ditolak" }}</button>
                                        <br>
                                        {{ $user->description }}
                                        @else ($user->status == 'blocked')
                                        <button class="btn btn-secondary">{{ "Block" }}</button>
                                        <br>
                                        {{ $user->description }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if ($user->status == "review")
                                            {{Form::open(['method' => 'POST', 'route' => ['dashboard.userupgraderole.update', $user->id]])}}
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="accept">
                                            <button type="submit" class="btn btn-success">Setuju</button>
                                            {{Form::close()}}
                                            <button type="button" class="btn btn-danger open_userUpgradeModalTolak" href="#" data-toggle="modal" data-target="#userUpgradeModalTolak" data-id="{{$user->id}}">Tolak</button>
                                            @else
                                            <button class="btn btn-info">Review telah diberikan</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tolak Modal-->
<div class="modal fade" id="userUpgradeModalTolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Upgrade akses ditolak') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form -->
                <form method="POST" id="formTolak" action="">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="action">Status</label><br>
                                <input type="radio" id="mitra" name="action" value="tolak" checked />
                                <label class="radio">Tolak
                                </label>
                                <br>
                                <input type="radio" id="pelanggan" name="action" value="blok">
                                <label class="radio">Blok
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="desc">Alasan</label>
                                <input type="description" id="description" class="form-control" name="description" placeholder="Tidak diijinkan">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Batal') }}</button>
                <button class="btn btn-danger" type="submit">Selesai</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection