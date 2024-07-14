<?php

namespace App\Livewire\Pertanyaan;

use Livewire\Component;
use App\Models\Pertanyaan;
use App\Livewire\Forms\PertanyaanForm;
use App\Livewire\Pertanyaan\PertanyaanTable;

class PertanyaanCreate extends Component
{
    public PertanyaanForm $form;

    public $modalPertanyaanCreate = false;

    public function save()
    {
        $this->validate();

        $simpan = $this->form->store();

        is_null($simpan) ? $this->dispatch('notifity', title: 'success', message: 'Selamat anda berhasil') : $this->dispatch('notifity', title: 'failed', message: 'Selamat anda berhasil');
        $this->dispatch('dispatch-pertanyaan-create-save')->to(PertanyaanTable::class);
    }


    public function render()
    {
        return view('livewire.pertanyaan.pertanyaan-create');
    }
}
