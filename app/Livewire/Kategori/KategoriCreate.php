<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Livewire\Forms\KategoriForm;
use App\Livewire\Kategori\KategoriTable;

class KategoriCreate extends Component
{
    public KategoriForm $form;

    public $modalKategoriCreate = false;

    public function save()
    {
        $this->validate();

        $simpan = $this->form->store();

        is_null($simpan) ? $this->dispatch('notifity', title: 'success', message: 'Selamat anda berhasil') : $this->dispatch('notifity', title: 'failed', message: 'Selamat anda berhasil');
        $this->dispatch('dispatch-kategori-create-save')->to(KategoriTable::class);
    }

    public function render()
    {
        return view('livewire.kategori.kategori-create');
    }
}
