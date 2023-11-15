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
        Schema::create('produks', function (Blueprint $table) {
            $table->string('kodeProduk', 10)->primary();
            $table->string('namaProduk', 255)->required();
            $table->string('kategori', 255)->required();
            $table->integer('stok')->required();
            $table->float('harga')->required();
            $table->timestamps();
            
            // Mendefinisikan foreign key constraint untuk kolom 'kategori'
            $table->foreign('kategori')->references('kategoriProduk')->on('kategoris');
        });                
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
