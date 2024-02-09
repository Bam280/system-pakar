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
        Schema::create('risikos', function (Blueprint $table) {
            $table->id();
            $table->int('id_tujuan')->refrence('id')->on('tujuans');
            $table->text('deskripsi_risiko')->nullable();
            $table->text('deskripsi_dampak')->nullable();
            $table->text('deskripsi_kemungkinan')->nullable();
            $table->int('ref_dampak_id')->nullable();
            $table->int('ref_kemungkinan_id')->nullable();
            $table->int('nilai_dampak_regional');
            $table->int('nilai_dampak_nasional');
            $table->int('nilai_kemungkinan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risikos');
    }
};
