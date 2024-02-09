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
        Schema::create('interdepens', function (Blueprint $table) {
            $table->id();
            $table->int('ref_interdepen_id');
            $table->int('id_iiv');
            $table->int('sistem_terhubung')->refrense('id')->on('iiv');
            $table->text('deskripsi_interdepen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interdepens');
    }
};
