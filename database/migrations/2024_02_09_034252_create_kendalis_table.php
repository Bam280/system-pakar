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
        Schema::create('kendali', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('risiko_id')->nullable();
            $table->foreign('risiko_id')->refrence('id')->on('risiko');
            $table->text('nama_kendali');
            $table->longtext('deskripsi_kendali')->nullable();
            $table->integer('ref_fungsi_id')->nullable();
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
