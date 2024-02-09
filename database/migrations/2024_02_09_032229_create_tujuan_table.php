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
        Schema::create('tujuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iiv_id')->nullable();
            $table->foreign('iiv_id')->references('id')->on('iiv');

            $table->unsignedBigInteger('ref_tujuan_id')->nullable();
            $table->foreign('ref_tujuan_id')->references('id')->on('ref_tujuan');

            $table->longtext('deskripsi_tujuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tujuans');
    }
};
