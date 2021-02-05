@extends('layouts.dashboard')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('User Chat') }}</h1>

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List user chat</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="list_chat" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Dari</th>
                                    <th>Kepada</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($widget['messages'] as $message)
                                <tr>
                                    <td>{{ $message->from->name }}</td>
                                    <td>{{ $message->to->name }}</td>
                                    <td>
                                        <button class="badge badge-light">{{ $message->created_at }}</button>
                                        <button class="badge badge-primary">{{ $message->time_dif }}</button>
                                        <br>
                                        {{$message->content}}
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
@endsection