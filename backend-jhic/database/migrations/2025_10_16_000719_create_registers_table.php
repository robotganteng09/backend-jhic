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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')
                  ->unique()
                  ->constrained('accounts')
                  ->onDelete('cascade');
            $table->string('nama_siswa');
            $table->string('jurusan');
            $table->string('nama_walmur');
            $table->string('nohp_walmur');
            $table->string('nik', 16)->unique();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
