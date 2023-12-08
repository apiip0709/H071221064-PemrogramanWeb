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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id(); // Menambahkan primary key dengan auto-increment
            $table->string('namaCompany', 255);
            $table->text('detail')->nullable();
            $table->unsignedBigInteger('id_user'); // Menggunakan tipe data yang sesuai dengan primary key di tabel users
            $table->timestamps();
        
            // Mendefinisikan foreign key constraint untuk kolom 'id_user'
            $table->foreign('id_user')->references('id')->on('users');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
