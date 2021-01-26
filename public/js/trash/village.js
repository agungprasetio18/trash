$(function () {
	
	const table = $('table').DataTable({
		serverSide: true,
		processing: true,
		ajax: {
			url: ajaxUrl,
			type: 'post',
			data: {
				_token: csrf
			}
		},
		columns: [
			{ data: 'DT_RowIndex' },
			{ data: 'name' },
			{
				data: 'action',
				orderable: false,
				searchable: false,
			},
		]
	})

	const restore = id => {
		const url = restoreUrl.replace(':id', id)

		$.ajax({
			url: url,
			type: 'post',
			data: {
				_token: csrf,
			},
			success: res => {
				$('#alert').html(`
					<div class="alert alert-success alert-dismissible">
					<span>${res}</span>
						<button class="close" data-dismiss="alert">&times;</button>
					</div>
				`)

				table.ajax.reload()
			}
		})
	}

	const remove = id => {
		const url = removeUrl.replace(':id', id)

		$.ajax({
			url:url,
			type: 'post',
			data: {
				_token: csrf,
			},
			success: res => {
				$('#alert').html(`
					<div class="alert alert-success alert-dismissible">
					<span>${res}</span>
						<button class="close" data-dismiss="alert">&times;</button>
					</div>
				`)

				table.ajax.reload()
			}
		})
	}

	$('tbody').on('click', '.restore', function () {
		if (confirm('Yakin pulihkan data ini ?')) {
			const id = table.row($(this).parents('tr')).data().id

			restore(id)
		}
	})

	
	$('tbody').on('click', '.deletePerm', function (){
			if(confirm('Yakin Menghapus Selamanya Data Ini?')){
				const id= table.row($(this).parents('tr')).data().id

				remove(id)
			}
	})
})