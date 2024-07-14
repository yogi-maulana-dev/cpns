<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Pertanyaan;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class PertanyaanForm extends Form
{
    //
    public ?Pertanyaan $pertanyaan;
    #[Rule('required|min:3')]

    public $soal;
    public $gambar_pertanyaan;
    public $diskusi_gambar;
    public $diskusi;
    public $kategori_id;
    public $jawaban;
    public $id;

    public function setPertanyaan(Pertanyaan $pertanyaan)
    {
        $this->pertanyaan=$pertanyaan;
        $this->soal =$pertanyaan->soal;
        $this->gambar_pertanyaan =$pertanyaan->gambar_pertanyaan;
        $this->diskusi =$pertanyaan->diskusi;
        $this->kategori_id =$pertanyaan->kategori_id;
        $this->jawaban =$pertanyaan->jawaban;
    }

    public function store(){
        Pertanyaan::create($this->except('pertanyaan'));
        $this->reset();
    }
    public function update(){
        $this->pertanyaan->update($this->except('pertanyaan'));
    }
}
