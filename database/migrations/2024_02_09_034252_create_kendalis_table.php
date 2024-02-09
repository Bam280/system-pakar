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
        Schema::create('kendalis', function (Blueprint $table) {
            $table->id();
            $table->int('id_risiko')->refrence('id')->on('risikos');
            $table->text('nama_kendali');
            $table->text('deskripsi_kendali')->nullable();
            $table->int('ref_fungsi_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendalis');
    }
};
