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
        Schema::create('iiv', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('ref_instansi_id')->nullable();
            $table->foreign('ref_instansi_id')->references('id')->on('ref_instansi');
            $table->float('nilai_risiko');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iiv');
    }
};
