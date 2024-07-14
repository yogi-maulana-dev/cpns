<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\On;
use App\Livewire\Forms\KategoriForm;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class KategoriTable extends Component
{

    use WithPagination;
    use WithSorting;
    public KategoriForm $form;

    public

    $paginate =5,
    $sortBy = "kategoris.id",
    $sortDirection = 'desc';

    #[On('dispatch-kategori-create-save')]
    #[On('dispatch-kategori-create-edit')]
    #[On('dispatch-kategori-delete-hapus')]
    public function render()
    {
        return view('livewire.kategori.kategori-table',[
            'data' => Kategori::where('id', 'like', '%'.$this->form->id.'%')
            ->where('nama', 'like', '%'.$this->form->nama.'%')
            ->orderby($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate),
        ]);
    }
}
