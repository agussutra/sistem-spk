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
        Schema::create('spk', function (Blueprint $table) {
            $table->string('kode_kriteria');
            $table->string('kode_nilai_kriteria');
            
            $table->foreignId('permohonan_id');
            $table->foreign('kode_kriteria')->references('kode')->on('kriteria');
            $table->foreign('kode_nilai_kriteria')->references('kode')->on('nilai_kriteria');
            $table->primary(['permohonan_id', 'kode_kriteria', 'kode_nilai_kriteria']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spk');
    }
};
