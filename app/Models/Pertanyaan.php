<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    public $table = 'pertanyaan';
    protected $fillable = ['soal', 'gambar_pertanyaan', 'diskusi_gambar', 'diskusi', 'kategori_id', 'jawaban'];
}
