@extends('_layouts.app')

@section('title', 'Edit Operator')

@section('content-header')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Operator</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Edit Operator</li>
    </ol>
</div>
@endsection

@section('content')
    <div class="col-lg-6 mx-auto">
		<div class="card shadow">
		<form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="card-header py-3">
				<h2 class="h6 m-0 font-weight-bold text-dark">Edit Operator</h2>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="Nama" autofocus>

					@error('name')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Email">

					@error('email')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary shadow" type="submit">Edit</button>
				<a href="{{ route('user.index') }}" class="btn btn-secondary shadow">Batal</a>
			</div>
		</form>
		</div>
	</div>
@endsection

