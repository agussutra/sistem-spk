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
        Schema::create('nilai_kriteria', function (Blueprint $table) {
            $table->string('kode')->primary();
            $table->string('kode_kriteria');
            $table->string('nilai_kriteria');
            $table->integer('nilai');
            $table->foreign('kode_kriteria')->references('kode')->on('kriteria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_kriteria');
    }
};
