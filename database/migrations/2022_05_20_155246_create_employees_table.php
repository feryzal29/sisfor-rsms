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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip',20);
            $table->string('nama',50);
            $table->enum('jk',['Pria','Wanita']);
            $table->string('jbtn');
            $table->string('kode_jenjang',10);
            $table->string('kode_kelompok',10);
            $table->string('kode_resiko',10);
            $table->string('kode_emergency',10);
            $table->string('kode_unit',10);
            $table->foreignId('id_bidangs');
            $table->string('stts_wp',10);
            $table->string('stts_kerja',10);
            $table->string('npwp',5);
            $table->foreignId('id_pendidikans');
            $table->double('gapok');
            $table->string('tmp_lahir',20);
            $table->date('tgl_lahir');
            $table->string('alamat',60);
            $table->string('kota',20);
            $table->date('mulai_kerja');
            $table->enum('ms_kerja',['<1','PT','FT>1']);
            $table->string('indexings',10);
            $table->foreignId('id_banks');
            $table->string('rekening',25);
            $table->enum('stts_aktif',['AKTIF','CUTI','KELUAR','TENAGA LUAR']);
            $table->integer('wajib_masuk');
            $table->double('pengurangan');
            $table->integer('index');
            $table->date('mulai_kontrak');
            $table->integer('cuti_diambil');
            $table->double('dankes');
            $table->string('no_ktp',20);
            $table->timestamps();
            $table->softDeletes()->nullable();

            $table->foreign('kode_jenjang')->references('kode_jenjang')->on('jenjang_jabatans')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('kode_kelompok')->references('kode_kelompok')->on('kelompok_jabatans')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('kode_resiko')->references('kode_resiko')->on('resiko_kerjas')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('kode_emergency')->references('kode')->on('unit_emergencies')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('kode_unit')->references('kode_unit')->on('units')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('id_bidangs')->references('id')->on('bidangs')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('stts_wp')->references('stts')->on('stts_wps')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('stts_kerja')->references('stts')->on('stts_kerjas')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('id_pendidikans')->references('id')->on('pendidikans')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('indexings')->references('kode_unit')->on('units')->onUpdate('cascade')->onDelete('NO ACTION');
            $table->foreign('id_banks')->references('id')->on('banks')->onUpdate('cascade')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
