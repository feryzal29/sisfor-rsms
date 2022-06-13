<?php

namespace Database\Seeders;

use App\Models\employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emp = [
            [
            'nip' => '9999',
            'nama' => 'ADMIN',
            'jk' => 'Pria',
            'jbtn' => 'administrator',
            'kode_jenjang' => 'I,5',
            'kode_kelompok' => 'I',
            'kode_resiko' => 'R2',
            'kode_emergency' => 'E1',
            'kode_unit' => 'IT',
            'id_bidangs' => '5',
            'stts_wp' => 'TK/0',
            'stts_kerja' => 'T',
            'npwp' => '0',
            'id_pendidikans' => '9',
            'gapok' => '1',
            'tgl_lahir' => '2022-06-13',
            'tmp_lahir' => '-',
            'alamat' => 'z',
            'kota' => 'z',
            'mulai_kerja' => '2022-06-13',
            'ms_kerja' => '<1',
            'indexings' => 'IT',
            'id_banks' => '2',
            'rekening' => '0',
            'stts_aktif' => 'AKTIF',
            'wajib_masuk' => '0',
            'pengurangan' => '0',
            'index' => '0',
            'mulai_kontrak' => '2022-06-13',
            'cuti_diambil' => '1',
            'dankes' => '0',
            'no_ktp' => '0',
            'email' => 'admin.sisfor@app.com',
            'no_telp' => '0',
            'sekolah' => '-',
            'tahun_lulus' => '2022-06-13'
            ]
        ];

        foreach ($emp as $key => $value) {
            employee::create($value);
            
        }
    }
}
