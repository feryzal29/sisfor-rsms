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
        Schema::create('set_aplikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('moto');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->string('logo');
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
        Schema::dropIfExists('set_aplikasis');
    }
};
