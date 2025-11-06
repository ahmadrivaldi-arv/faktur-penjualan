<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_faktur', function (Blueprint $table) {
            $table->foreignId('id_produk')->constrained('produk', 'id_produk');
            $table->foreignId('no_faktur')->constrained('faktur', 'no_faktur');
            $table->integer('qty')->default(0);
            $table->integer('price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_faktur');
    }
};
