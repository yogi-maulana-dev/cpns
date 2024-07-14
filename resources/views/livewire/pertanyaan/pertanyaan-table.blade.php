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
                <th class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">Soal pertanyaan
                </th>
                <th  class="p-2 whitespace-nowrap border border-spacing-1">Aksi</th>
            </tr>
            <tr>
                <td></td>
                <td class="p-2 whitespace-nowrap border border-spacing-1"></td>

            </tr>
        </thead>
        <tbody>

                    <tr>
                        <td class="p-2 border border-spacing-1 text-center"></td>
                        <td class="p-2 border border-spacing-1"></td>
                        <td class="p-2 border border-spacing-1">

                        </td>
                    </tr>

        </tbody>
    </table>
    {{-- <div class="mt-3">{{ $data->onEachSide(1)->links() }}</div> --}}
</div>
