<div>

    @if ($isOpen)
    <div class="modal backdrop d-block">
        <div class="modal-backdrop" style="background: rgba(0,0,0,.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form wire:submit.prevent="update">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data</h5>
                            <button type="button" class="close" wire:click="$set('isOpen', false)">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control @error('type.name') is-invalid @enderror"
                                    wire:model="type.name" placeholder="Nama" autofocus>

                                @error('type.name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tipe</label>
                                <input type="text" class="form-control @error('type.price') is-invalid @enderror"
                                    wire:model="type.price" placeholder="Nama" autofocus>

                                @error('type.price')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary shadow" type="submit">Edit</button>
                            <button type="button" class="btn btn-secondary shadow"
                                wire:click="$set('isOpen', false)">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
