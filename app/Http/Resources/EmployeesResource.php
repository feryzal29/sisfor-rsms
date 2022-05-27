<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class EmployeesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [
            "id" => $this->id,
            "nip" => $this->nip,
            "nama" => $this->nama,
            "jk" => $this->jk,
            "jbtn" => $this->jbtn,
            "kode_jenjang" =>"a",
            "kode_kelompok" => "a",
            "kode_resiko" => "a",
            "kode_emergency" => "a",
            "kode_unit" => "a",
            "id_bidangs" => "a",
            "stts_wp" => "a",
            "stts_kerja" => "a",
            "npwp" =>  $this->npwp,
            "id_pendidikans" => "a",
            "gapok" =>  $this->gapok,
            "tmp_lahir" =>  $this->tmp_lahir,
            "tgl_lahir" => $this->tgl_lahir,
            "alamat" => $this->alamat,
            "kota" => $this->kota,
            "mulai_kerja" => $this->mulai_kerja,
            "ms_kerja" => Carbon::now()->diffInYears($this->mulai_kerja),
            "indexings" => "a",
            "id_banks" => "a",
            "rekening" => $this->rekening,
            "stts_aktif" => $this->stts_aktif,
            "wajib_masuk" => $this->wajib_masuk,
            "pengurangan" =>$this->pengurangan,
            "index" => $this->index,
            "mulai_kontrak" => $this->mulai_kontrak,
            "cuti_diambil" => $this->cuti_diambil,
            "dankes" => $this->dankes,
            "no_ktp" => $this->no_ktp,
            "created_at" => "2022-05-20T09:37:30.000000Z",
            "updated_at" => "2022-05-20T09:37:30.000000Z",
            "deleted_at" => null,
            "jenjang" => "a",
            "kelompok" => "a",
            "emergency" => "a",
            "resiko" => "a",
            "unit" => "a",
            "bidang" => "a",
            "bank" => "a",
            "pendidikan" => "a",
            "indexing" => "a"
        ];
    }
}
