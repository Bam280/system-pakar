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
        Schema::create('risiko', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tujuan_id')->nullable();
            $table->foreign('tujuan_id')->refrence('id')->on('tujuan');
            $table->longtext('deskripsi_risiko')->nullable();
            $table->longtext('deskripsi_dampak')->nullable();
            $table->longtext('deskripsi_kemungkinan')->nullable();
            $table->integer('ref_dampak_id')->nullable();
            $table->integer('ref_kemungkinan_id')->nullable();
            $table->integer('nilai_dampak_regional');
            $table->integer('nilai_dampak_nasional');
            $table->integer('nilai_kemungkinan');
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
