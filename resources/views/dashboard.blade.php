@extends('_layouts.app')

@section('title', 'Dashboard')

@section('content-header')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Dashboard</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Home</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Halo, {{ Auth::user()->name }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                Segala aktivitas yang Anda lakukan di area ini menjadi tanggung jawab anda sepenuhnya. Silahkan lakukan
                dengan teliti dan benar.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection