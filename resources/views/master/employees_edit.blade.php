@extends('template.template')
@section('conten')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li> --}}
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">EDIT data Karyawan RS PKU Muhammadiyah Sekapuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                  @csrf
                  @method('put')
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" name="nip" class="form-control" value="{{ $employee->nip }}">
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" value="{{ $employee->nama }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                        <option value="{{ $employee->jk }}">{{ $employee->jk }}</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="jabatan" class="form-control" value="{{ $employee->jbtn }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenjang</label>
                      <select class="form-control" name="jenjang">
                        @foreach ($jenjang as $item)
                          <option value="{{ $item->kode_jenjang }}" {{ $item->kode_jenjang == $employee->jenjang->kode_jenjang ? 'selected' : '' }}>{{ $item->nama_jenjang }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Kelompok</label>
                      <select class="form-control" name="kelompok">
                        @foreach ($kelompok as $item)
                          <option value="{{ $item->kode_kelompok }}" {{ $item->kode_kelompok == $employee->kelompok->kode_kelompok ? 'selected' : '' }}>{{ $item->kode_kelompok }} - {{ $item->nama_kelompok }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Resiko Kerja</label>
                      <select class="form-control" name="resiko">
                        @foreach ($resiko as $item)
                          <option value="{{ $item->kode_resiko }}" {{ $item->kode_resiko == $employee->resiko->kode_resiko ? 'selected' : '' }}>{{ $item->kode_resiko }} - {{ $item->nama_resiko }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Emergency</label>
                      <select class="form-control" name="emergency">
                        @foreach ($emergency as $item)
                          <option value="{{ $item->kode }}" {{ $item->kode == $employee->emergency->kode ? 'selected' : '' }}>{{ $item->kode }} - {{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="unit">
                        @foreach ($unit as $item)
                          <option value="{{ $item->kode_unit }}" {{ $item->kode_unit == $employee->unit->kode_unit ? 'selected' : '' }}>{{ $item->nama_unit }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Bidang</label>
                      <select class="form-control" name="bidang">
                        @foreach ($bidang as $item)
                          <option value="{{ $item->id }}" {{ $item->id == $employee->bidang->id_bidangs ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Status WP</label>
                      <select class="form-control" name="wp">
                        @foreach ($wp as $item)
                          <option value="{{ $item->stts }}" {{ $item->stts == $employee->stts_wp ? 'selected' : '' }}>{{ $item->stts }} - {{ $item->kategori }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Status Kerja</label>
                      <select class="form-control" name="kerja">
                        @foreach ($kerja as $item)
                          <option value="{{ $item->stts }}" {{ $item->stts == $employee->stts_kerja ? 'selected' : '' }}>{{ $item->stts }} - {{ $item->kategori }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NPWP</label>
                      <input type="text" name="npwp" class="form-control" value="{{ $employee->npwp }}">
                    </div>
                    <div class="form-group">
                      <label>Pendidikan</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="pendidikan">
                        @foreach ($pendidikan as $item)
                          <option value="{{ $item->id }}" {{ $item->id == $employee->pendidikan->pendidikans_id ? 'selected' : '' }}>{{ $item->tingkat }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Asal Sekolah</label>
                      <input type="text" name="sekolah" class="form-control" value="{{ $employee->sekolah }}">
                    </div>
                    <div class="form-group">
                      <label>Tahun Lulus</label>
                        <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tahun_lulus" data-target="#reservationdate5" value="{{ date('d/m/Y',strtotime($employee->tahun_lulus))}}"/>
                            <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>No. Ijazah</label>
                      <input type="text" name="ijazah" class="form-control" value="{{ $employee->ijazah }}">
                    </div>
                    <div class="form-group">
                      <label>Gaji Pokok</label>
                      <input type="number" name="gapok" class="form-control" value="{{ $employee->gapok }}">
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="lahir" class="form-control" value="{{ $employee->tmp_lahir }}">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" data-target="#reservationdate" value="{{ date('d/m/Y',strtotime($employee->tgl_lahir))}}"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Alamat</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{  $employee->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Kota</label>
                      <input type="text" name="kota" class="form-control" value="{{ $employee->kota }}">
                    </div>
                    <div class="form-group">
                      <label>Mulai Kerja</label>
                        <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="mulai_kerja" data-target="#reservationdate3" value="{{ date('d/m/Y',strtotime($employee->mulai_kerja))}}"/>
                            <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Masa Kerja</label>
                      <select class="form-control" name="ms_kerja">
                        <option value="{{ $employee->ms_kerja }}">{{ $employee->ms_kerja }}</option>
                          <option value="<1"><1</option>
                          <option value="PT">PT</option>
                          <option value="FT>1">FT>1</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Indeksing</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="indexings">
                        @foreach ($unit as $item)
                          <option value="{{ $item->kode_unit }}" {{ $item->kode_unit == $employee->indexing->kode_unit ? 'selected' : '' }}>{{ $item->nama_unit }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Bank</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="bank">
                        @foreach ($bank as $item)
                          <option value="{{ $item->id }}" {{ $item->id == $employee->bank->banks_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Rekening</label>
                      <input type="text" name="rekening" class="form-control" value="{{ $employee->rekening }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Status Aktif</label>
                      <select class="form-control" name="stts_aktif">
                          <option value="{{ $employee->stts_aktif }}">{{ $employee->stts_aktif }}</option>
                          <option value="AKTIF">AKTIF</option>
                          <option value="CUTI">CUTI</option>
                          <option value="KELUAR">KELUAR</option>
                          <option value="TENAGA LUAR">TENAGA LUAR</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Wajib Masuk</label>
                      <input type="number" name="masuk" class="form-control" value="{{ $employee->wajib_masuk }}">
                    </div>
                    <div class="form-group">
                      <label>Pengurangan</label>
                      <input type="number" name="pengurangan" class="form-control" value="{{ $employee->pengurangan }}">
                    </div>
                    <div class="form-group">
                      <label>Indek</label>
                      <input type="number" name="index" class="form-control" value="{{ $employee->index }}">
                    </div>
                    <div class="form-group">
                      <label>Mulai Kontrak</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="mulai_kontrak" data-target="#reservationdate2" value="{{ date('d/m/Y',strtotime($employee->mulai_kontrak))}}"/>
                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Cuti Diambil</label>
                      <input type="number" name="cuti" class="form-control" value="{{ $employee->cuti_diambil }}">
                    </div>
                    <div class="form-group">
                      <label>Dankes</label>
                      <input type="number" name="dankes" class="form-control" value="{{ $employee->dankes }}">
                    </div>
                    <div class="form-group">
                      <label>No. KTP</label>
                      <input type="number" name="no_ktp" class="form-control" value="{{ $employee->no_ktp }}">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                    </div>
                    <div class="form-group">
                      <label>No. Telp</label>
                      <input type="text" name="no_telp" class="form-control" value="{{ $employee->no_telp }}">
                    </div>
                    <div class="form-group float-right">
                      <input type="submit" class="btn btn-success" value="GANTI">
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
            <!-- /.card-body -->
          </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@push('scripts-select')

<script>
  $(document).ready(function () {
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#reservationdate2').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#reservationdate3').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#reservationdate4').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#reservationdate5').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  });
</script>
@endpush

@endsection