<div>


    <x-dialog-modal wire:model.live="modalKategoriHapus">
        <x-slot name="title">
            Kategori Edit
        </x-slot>

        <x-slot name="content">
         <p>Apakah anda yakin akan menghapus data dengan {{ $id }} dan dengan nama {{ $nama }}</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalKategoriHapus', false)" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button @click="$wire.hapus()" class="ms-3" wire:loading.attr="disabled">
                Hapus Data
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>
