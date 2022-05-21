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
                <form action="employees" method="POST">
                  @csrf
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" name="nip" class="form-control" placeholder="NIP">
                    </div>
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenjang</label>
                      <select class="form-control" name="jenjang">
                        @foreach ($jenjang as $item)
                          <option value="{{ $item->kode_jenjang }}">{{ $item->nama_jenjang }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Kelompok</label>
                      <select class="form-control" name="kelompok">
                        @foreach ($kelompok as $item)
                          <option value="{{ $item->kode_kelompok }}">{{ $item->kode_kelompok }} - {{ $item->nama_kelompok }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Resiko Kerja</label>
                      <select class="form-control" name="resiko">
                        @foreach ($resiko as $item)
                          <option value="{{ $item->kode_resiko }}">{{ $item->kode_resiko }} - {{ $item->nama_resiko }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Emergency</label>
                      <select class="form-control" name="emergency">
                        @foreach ($emergency as $item)
                          <option value="{{ $item->kode }}">{{ $item->kode }} - {{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="unit">
                        @foreach ($unit as $item)
                          <option value="{{ $item->kode_unit }}">{{ $item->nama_unit }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Bidang</label>
                      <select class="form-control" name="bidang">
                        @foreach ($bidang as $item)
                          <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Status WP</label>
                      <select class="form-control" name="wp">
                        @foreach ($wp as $item)
                          <option value="{{ $item->stts }}">{{ $item->stts }} - {{ $item->kategori }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Status Kerja</label>
                      <select class="form-control" name="kerja">
                        @foreach ($kerja as $item)
                          <option value="{{ $item->stts }}">{{ $item->stts }} - {{ $item->kategori }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NPWP</label>
                      <input type="text" name="npwp" class="form-control" placeholder="NPWP">
                    </div>
                    <div class="form-group">
                      <label>Pendidikan</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="pendidikan">
                        @foreach ($pendidikan as $item)
                          <option value="{{ $item->id }}">{{ $item->tingkat }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Gaji Pokok</label>
                      <input type="number" name="gapok" class="form-control" placeholder="Gaji Pokok">
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="lahir" class="form-control" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tgl_lahir" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Alamat</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Kota</label>
                      <input type="text" name="kota" class="form-control" placeholder="kota">
                    </div>
                    <div class="form-group">
                      <label>Mulai Kerja</label>
                        <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="mulai_kerja" data-target="#reservationdate3"/>
                            <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Masa Kerja</label>
                      <select class="form-control" name="ms_kerja">
                          <option value="<1"><1</option>
                          <option value="PT">PT</option>
                          <option value="FT>1">FT>1</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Indeksing</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="indexings">
                        @foreach ($unit as $item)
                          <option value="{{ $item->kode_unit }}">{{ $item->nama_unit }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Bank</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="bank">
                        @foreach ($bank as $item)
                          <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Rekening</label>
                      <input type="text" name="rekening" class="form-control" placeholder="Rekening">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Status Aktif</label>
                      <select class="form-control" name="stts_aktif">
                          <option value="AKTIF">AKTIF</option>
                          <option value="CUTI">CUTI</option>
                          <option value="KELUAR">KELUAR</option>
                          <option value="TENAGA LUAR">TENAGA LUAR</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Wajib Masuk</label>
                      <input type="number" name="masuk" class="form-control" placeholder="Wajib Masuk">
                    </div>
                    <div class="form-group">
                      <label>Pengurangan</label>
                      <input type="number" name="pengurangan" class="form-control" placeholder="Pengurangan">
                    </div>
                    <div class="form-group">
                      <label>Indek</label>
                      <input type="number" name="index" class="form-control" placeholder="Indek">
                    </div>
                    <div class="form-group">
                      <label>Mulai Kontrak</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="mulai_kontrak" data-target="#reservationdate2"/>
                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Cuti Diambil</label>
                      <input type="number" name="cuti" class="form-control" placeholder="Cuti Diambil">
                    </div>
                    <div class="form-group">
                      <label>Dankes</label>
                      <input type="number" name="dankes" class="form-control" placeholder="Dankes">
                    </div>
                    <div class="form-group">
                      <label>No. KTP</label>
                      <input type="number" name="no_ktp" class="form-control" placeholder="No. KTP">
                    </div>
                    <div class="form-group float-right">
                      <input type="submit" class="btn btn-primary" value="SIMPAN">
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
        format: 'L'
    });
    $('#reservationdate2').datetimepicker({
        format: 'L'
    });
    $('#reservationdate3').datetimepicker({
        format: 'L'
    });
  });
</script>
@endpush

@endsection