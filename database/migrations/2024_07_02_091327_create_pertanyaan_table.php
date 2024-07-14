<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id()->primary();
            $table->longText('pertanyaan');
            $table->string('gambar_pertanyaan','128');
            $table->string('diskusi_gambar','128');
            $table->string('diskusi','128');
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('jawaban')->unsigned()->notNull();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan');
    }
};
