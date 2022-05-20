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
        Schema::create('jenjang_jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jenjang',10)->unique();
            $table->string('nama_jenjang',100);
            $table->double('tunjangan');
            $table->tinyInteger('index');
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
        Schema::dropIfExists('jenjang_jabatans');
    }
};
