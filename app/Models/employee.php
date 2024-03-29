<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = 
    ['nip','nama',
     'jk','jbtn',
     'kode_jenjang','kode_kelompok',
     'kode_resiko','kode_emergency',
     'kode_unit','id_bidangs',
     'stts_wp','stts_kerja',
     'npwp','id_pendidikans',
     'gapok','tmp_lahir','tgl_lahir',
     'alamat','kota',
     'mulai_kerja','ms_kerja',
     'indexings','id_banks',
     'rekening','stts_aktif',
     'wajib_masuk','pengurangan',
     'index','mulai_kontrak',
     'cuti_diambil','dankes',
     'no_ktp','email','no_telp',
     'sekolah','tahun_lulus','ijazah'
    ];

    public function jenjang(){
        return $this->belongsTo(JenjangJabatan::class,'kode_jenjang', 'kode_jenjang');
    }

    public function kelompok(){
        return $this->belongsTo(KelompokJabatan::class,'kode_kelompok','kode_kelompok');
    }

    public function emergency(){
        return $this->belongsTo(UnitEmergency::class,'kode_emergency','kode');
    }

    public function resiko(){
        return $this->belongsTo(ResikoKerja::class,'kode_resiko','kode_resiko');
    }

    public function unit(){
        return $this->belongsTo(unit::class,'kode_unit','kode_unit');
    }

    public function bidang(){
        return $this->belongsTo(Bidang::class, 'id_bidangs','id');
    }

    public function stts_wp(){
        return $this->belongsTo(SttsWp::class, 'stts_wp','stts');
    }

    public function bank(){
        return $this->belongsTo(Bank::class,'id_banks','id');
    }

    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class,'id_pendidikans','id');
    }

    public function indexing(){
        return $this->belongsTo(unit::class,'indexings','kode_unit');
    }

    public function stts_kerja(){
        return $this->belongsTo(SttsKerja::class,'stts_kerja','stts');
    }

    public function files(){
        return $this->hasMany(EmployeesFile::class,'employee_id','id');
    }

    public function str(){
        return $this->hasOne(Str::class,'employee_id','id')->withDefault([
            'no_str'=>'-',
            'tgl_terbit'=>'00-Jan-0000',
            'tgl_ed'=>'00-Jan-0000'

        ]);
    }

    public function sip(){
        return $this->hasOne(Sip::class,'employee_id','id')->withDefault([
            'no_sip'=>'-',
            'tgl_terbit'=>'00-Jan-0000',
            'tgl_ed'=>'00-Jan-0000'
        ]);
    }

    public function JamDiklat(){
        return $this->hasMany(Absensi::class,'employee_id','id');
    }

    public function TtlCuti(){
        return $this->hasMany(employees_cuti::class,'employee_id','id')->where('status','disetujui');
    }

}
