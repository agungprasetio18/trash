<div class="row">

	<div class="col-sm-4 mb-4">
		<livewire:type.create />
	</div>
	<div class="col-sm-8">
		@if (session()->has('success'))
			<div class="alert alert-success alert-dismissible">
				<span>{{ session('success') }}</span>
				<button class="close" data-dismiss="alert">&times;</button>
			</div>
		@endif
		<div class="card shadow">
            <div class="card-header py-3">
				<h2 class="card-title h6 font-weight-bold text-dark m-0">Data Tipe</h2>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Harga</th>
                                <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($types as $type)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $type->name }}</td>
									<td>{{ $type->price }}</td>
									<td>
										<button class="btn btn-success btn-sm" wire:click="$emit('edit', '{{ $type->id }}')"><i class="fa fa-edit"></i></button>
										<button class="btn btn-danger btn-sm" onclick="remove()" wire:click="$emit('delete', '{{ $type->id }}')"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="4" align="center">Kosong</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				{{ $types->links() }}
			</div>
		</div>
	</div>

	<livewire:type.edit />

</div>

@push('js')
	<script>
		const remove = function () {
			return confirm('Yakin hapus data ini?') || event.stopImmediatePropagation()
		}
	</script>
@endpush
