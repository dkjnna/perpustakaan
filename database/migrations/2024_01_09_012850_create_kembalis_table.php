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
        Schema::create('kembalis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('tanggal_pinjam');
            $table->string('nis');
            $table->string('noseri');
            $table->date('tanggal_pengembalian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kembalis');
    }
};
