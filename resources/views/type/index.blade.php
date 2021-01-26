@extends('_layouts.app')

@section('title', 'Type')

@section('content-header')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Type</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Type List</li>
    </ol>
</div>
@endsection

@section('content')
    <livewire:type.data/>
@endsection