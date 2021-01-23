@extends('_layouts.app')

@section('title', 'Village')

@section('content-header')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Village</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Village List</li>
    </ol>
</div>
@endsection

@section('content')
    <livewire:village.data/>
@endsection