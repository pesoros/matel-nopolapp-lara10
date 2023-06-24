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
        Schema::connection('sqlite')->create('vehicle_number', function (Blueprint $table) {
            $table->id();
            $table->string('nopol')->default('-');;
            $table->text('unit')->default('-');;
            $table->text('finance')->default('-');;
            $table->text('cabang')->default('-');;
            $table->text('no_rangka')->default('-');;
            $table->text('no_mesin')->default('-');;
            $table->text('tahun')->default('-');;
            $table->text('warna')->default('-');;
            $table->text('overdue')->default('-');;
            $table->text('saldo')->default('-');;
            $table->text('nama')->default('-');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_numbers');
    }
};
