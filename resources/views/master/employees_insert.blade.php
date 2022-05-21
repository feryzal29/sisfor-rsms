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
              <h3 class="card-title">TAMBAH Karyawan RS PKU Muhammadiyah Sekapuk</h3>
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">TAMBAH DATA</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="" method="post">
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
                      <select class="form-control" name="resiko">
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
    
  });
</script>
@endpush

@endsection