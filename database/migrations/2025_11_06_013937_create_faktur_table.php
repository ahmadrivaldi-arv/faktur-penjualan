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
        Schema::create('faktur', function (Blueprint $table) {
            $table->id('no_faktur');
            $table->date('tgl_faktur');
            $table->date('due_date');
            $table->string('metode_pembayaran');
            $table->integer('ppn')->default(0);
            $table->integer('dp')->default(0);
            $table->integer('grand_total')->default(0);
            $table->string('user');
            $table->foreignId('id_customer')->constrained('customer','id_customer');
            $table->foreignId('id_perusahaan')->constrained('perusahaan','id_perusahaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur');
    }
};
