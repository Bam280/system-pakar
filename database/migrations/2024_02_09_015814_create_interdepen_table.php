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
        Schema::create('interdepen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ref_interdepen_id')->nullable();
            $table->foreign('ref_interdepen_id')->references('id')->on('ref_interdepen');

            $table->unsignedBigInteger('sistem_elektronik_id')->nullable();
            $table->foreign('sistem_elektronik_id')->references('id')->on('iiv');

            $table->unsignedBigInteger('sistem_iiv_id')->nullable();
            $table->foreign('sistem_iiv_id')->references('id')->on('iiv');

            $table->longtext('deskripsi_interdepen');
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
