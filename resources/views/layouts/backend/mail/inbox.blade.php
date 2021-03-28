@extends('layouts.backend.app')

@section('content')
<style>
    .nav-link-color {
        color: #000 !important;
    }
</style>
<div class="content-wrapper" style="min-height: 1157.69px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Message Box</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Message Box</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('compose.index')}}" class="btn btn-primary btn-block mb-3">Compose</a>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Folders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a href="{{route('mail.inbox')}}" class="nav-link nav-link-color">
                                    <i class="far fa-envelope"></i> Sent
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('draft.index') }}" class="nav-link nav-link-color">
                                    <i class="far fa-file-alt"></i> Drafts
                                    <span
                                        class="badge bg-primary float-right">{{ $mails->where('status','draft')->count() }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('trash') }}" class="nav-link nav-link-color">
                                    <i class="far fa-trash-alt"></i> Trash
                                    <span
                                        class="badge bg-danger float-right">{{ $mails->where('status','trash')->count() }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            @yield('mail_content')
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection
