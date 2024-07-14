<div>
    <select wire:model.live='paginate' class="text-xs mt-4">
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
    </select>
    <table class="w-full mt-2">
        <thead>
            <tr>
                <th class="p-2 whitespace-nowrap border border-spacing-1">No</th>
                <th @click="$wire.sortField('nama')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">Nama Kategori
                <x-sort :$sortDirection :$sortBy :field="'nama'"/></th>
                <th  class="p-2 whitespace-nowrap border border-spacing-1">Aksi</th>
            </tr>
            <tr>
                <td></td>
                <td class="p-2 whitespace-nowrap border border-spacing-1"><x-input class="w-full text-sm" wire:model.live='form.nama' type="search"/></td>

            </tr>
        </thead>
        <tbody>
            @isset($data)
                @foreach ($data as $kategori)
                    <tr>
                        <td class="p-2 border border-spacing-1 text-center">{{ $loop->iteration }}</td>
                        <td class="p-2 border border-spacing-1">{{ $kategori->nama }}</td>
                        <td class="p-2 border border-spacing-1">
                            <x-button type="button" @click="$dispatch('dispatch-kategori-table-edit', {id: {{ $kategori->id }}})">Edit</x-button>
                            <x-danger-button @click="$dispatch('dispatch-kategori-table-hapus', {id:{{ $kategori->id }}, nama: '{{ $kategori->nama }}'
                                })">Hapus</x-danger-button>
                        </td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
    <div class="mt-3">{{ $data->onEachSide(1)->links() }}</div>
</div>
