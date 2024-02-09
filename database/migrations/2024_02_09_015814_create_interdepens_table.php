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
            $table->integer('ref_interdepen_id');
            $table->unsignedBigInteger('iiv_id')->nullable();
            $table->foreign('iiv_id')->refrense('id')->on('iiv');
            $table->unsignedBigInteger('sistem_iiv')->nullable();
            $table->foreign('sistem_iiv')->refrense('id')->on('iiv');
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
