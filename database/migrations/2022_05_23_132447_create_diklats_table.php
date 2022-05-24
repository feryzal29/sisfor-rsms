<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diklats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('units_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->foreignId('jenis_kegiatans_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('tempat',100);
            $table->date('tanggal');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diklats');
    }
};
