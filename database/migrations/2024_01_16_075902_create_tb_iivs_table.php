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
        Schema::create('tb_iiv', function (Blueprint $table) {
            $table->bigIncrements('Id_IIV');
            $table->Text('Nama_IIV');
            $table->tinyInteger('Ref_Instansi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_iiv');
    }
};
