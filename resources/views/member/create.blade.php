@extends('_layouts.app')

@section('title', 'Tambah Member')

@section('content-header')
<div class="col-sm-6">
    <h1 class="m-0 text-dark">Member</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Tambah Member</li>
    </ol>
</div>
@endsection

@section('content')
<div class="col-lg-6 mx-auto">
    <div class="card shadow">
        <form action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header py-3">
                <h2 class="h6 m-0 font-weight-bold text-dark">Tambah Member</h2>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Nama" autofocus>

                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>

                    @error('gender')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone') }}" placeholder="Telepon" autofocus>

                    @error('phone')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Desa</label>
                    {{-- <select id="village_id" class="form-control custom-select @error('village_id') is-invalid @enderror" name="village_id"></select> --}}
                    <select name="village_id" id="village_id" style="width: 100%"
                        class="form-control select2 @error('village_id') is-invalid @enderror">
                        <option value="">-- Select --</option>
                        @foreach ($villages as $village)
                        <option value="{{ $village->id }}" {{ old('village_id')==$village->id?'selected':'' }}>
                            {{ $village->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('village_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                        placeholder="Alamat">{{ old('address') }}</textarea>

                    @error('address')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary shadow" type="submit">Tambah</button>
                <a href="{{ route('member.index') }}" class="btn btn-secondary shadow">Batal</a>
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
    $(function(){
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })    
</script>
{{-- <script>	
		$(function () {
			$('#village_id').select2({
				placeholder: 'Desa',
				ajax: {
					url: '{{ route('village.search') }}',
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
</script> --}}
@endpush
