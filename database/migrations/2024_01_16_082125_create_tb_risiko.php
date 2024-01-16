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
        Schema::create('tb_risiko', function (Blueprint $table) {
            $table->bigIncrement('Id_Risiko')->primaryKey();
            $table->integer('Id_Tujuan');
            $table->text('Deskripsi_Risk')->null();
            $table->text('Deskripsi_Dampak')->null();
            $table->integer('Ref_Dampak');
            $table->integer('Nilai_Dampak');
            $table->text('Deskripsi_Kecenderungan')->null();
            $table->integer('Ref_Kecenderungan');
            $table->integer('Nilai-Kecenderungan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_risiko');
    }
};
