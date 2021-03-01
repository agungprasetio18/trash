@extends('_layouts.app')

@section('title', 'Transaksi')

@section('content-header')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Transaksi</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Transaksi</li>
    </ol>
</div>
@endsection

@section('content')
<div class="col-md-9 col-lg-6 mx-auto">
		<div class="card shadow">
		<form action="{{ route('transaction.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="card-header py-3">
				<h2 class="h6 m-0 font-weight-bold text-primary">Transaksi Baru</h2>
			</div>
			<div class="card-body">
					<label>Anggota</label>
					<select class="form-control select2 custom-select @error('member_id') is-invalid @enderror" name="member_id"></select>

					@error('member_id')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
          <livewire:transaction.transaction/>
          
			</div>
			<div class="card-footer">
				<button class="btn btn-primary shadow" type="submit">Tambah</button>
			</div>
		</form>
		</div>
	</div>
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('admin/vendor/select2/css/select2.min.css') }}">
@endpush

@push('js')
  <script src="{{ asset('admin/vendor/select2/js/select2.min.js') }}"></script>
	<script>
		$(function () {
			$('[name=member_id]').select2({
				placeholder: 'Member',
				ajax: {
					url: '{{ route('member.search') }}',
					type: 'post',
					data: params => ({
						name: params.term,
						_token: '{{ csrf_token() }}'
					}),
					processResults: res => ({
						results: res
					}),
					cache: true
				}
			})
		})
	</script>

