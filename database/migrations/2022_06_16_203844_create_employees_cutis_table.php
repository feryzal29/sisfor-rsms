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
        Schema::create('employees_cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pj_terkait')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kabag_umum')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pengganti')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl_pengajuan');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->integer('jml_cuti');
            $table->enum('status',['proses','disetujui','ditolak']);
            $table->enum('jenis_cuti',['tahunan','besar','sakit','bersalin','kepentingan','lain-lain']);
            $table->string('alamat_tujuan')->nullable();
            $table->string('kepengingan_cuti')->nullable();
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
        Schema::dropIfExists('employees_cutis');
    }
};
