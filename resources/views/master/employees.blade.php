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
              <h3 class="card-title">Data Karyawan RS PKU Muhammadiyah Sekapuk</h3>
              {{-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">TAMBAH DATA</button> --}}
              <a href="/employeeinsert" class="btn btn-primary float-right">TAMBAH DATA</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>  
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Jabatan</th>
                  <th>Jenjang Jabatan</th>
                  <th>Kelompok</th>
                  <th>Resiko</th>
                  <th>emergency</th>
                  <th>Departemen</th>
                  <th>Bidang</th>
                  <th>Status WP</th>
                  <th>Status Kerja</th>
                  <th>NPWP</th>
                  <th>Pendidikan</th>
                  <th>Gaji Pokok</th>
                  <th>tanggal Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Mulai Kerja</th>
                  <th>Masa Kerja</th>
                  <th>Indeksing</th>
                  <th>Bank</th>
                  <th>Rekening</th>
                  <th>Status Aktif</th>
                  <th>Wajib Masuk</th>
                  <th>Pengurangan</th>
                  <th>Index</th>
                  <th>Mulai Kontrak</th>
                  <th>Cuti Diambil</th>
                  <th>Dankes</th>
                  <th>No KTP</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($employee as $item)
                  <tr>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jk }}</td>
                    <td>{{ $item->jbtn }}</td>
                    <td>{{ $item->jenjang->nama_jenjang }}</td>
                    <td>{{ $item->kelompok->nama_kelompok }}</td>
                    <td>{{ $item->kode_resiko }}</td>
                    <td>{{ $item->kode_emergency }}</td>
                    <td>{{ $item->unit->nama_unit }}</td>
                    <td>{{ $item->bidang->nama }}</td>
                    <td>{{ $item->stts_wp }}</td>
                    <td>{{ $item->stts_kerja }}</td>
                    <td>{{ $item->npwp }}</td>
                    <td>{{ $item->pendidikan->tingkat }}</td>
                    <td>{{ $item->gapok }}</td>
                    <td>{{ $item->tgl_lahir }}</td>
                    <td>{{ $item->tmp_lahir}}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->kota }}</td>
                    <td>{{ $item->mulai_kerja }}</td>
                    <td>{{ $item->ms_kerja }}</td>
                    <td>{{ $item->indexings }}</td>
                    <td>{{ $item->bank->nama }}</td>
                    <td>{{ $item->rekening }}</td>
                    <td>{{ $item->stts_aktif }}</td>
                    <td>{{ $item->wajib_masuk }}</td>
                    <td>{{ $item->pengurangan }}</td>
                    <td>{{ $item->index }}</td>
                    <td>{{ $item->mulai_kontrak }}</td>
                    <td>{{ $item->cuti_diambil}}</td>
                    <td>{{ $item->dankes }}</td>
                    <td>{{ $item->no_ktp }}</td>
                    <td>
                      <a href="{{ route('bank.show', $item->id) }}" class="btn btn-success">Edit</a>
                      <a href="javascript:;" class="btn btn-danger btn-delete" data-action="{{ route('bank.destroy', $item->id) }}">Delete</a>
                      {{-- <a onclick="return confirm('Are you sure?')" href="{{ route('jenjang.delete', $item->id) }}" class="btn btn-danger">Delete</a> --}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Jabatan</th>
                  <th>Jenjang Jabatan</th>
                  <th>Kelompok</th>
                  <th>Resiko</th>
                  <th>emergency</th>
                  <th>Departemen</th>
                  <th>Bidang</th>
                  <th>Status WP</th>
                  <th>Status Kerja</th>
                  <th>NPWP</th>
                  <th>Pendidikan</th>
                  <th>Gaji Pokok</th>
                  <th>tanggal Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Mulai Kerja</th>
                  <th>Masa Kerja</th>
                  <th>Indeksing</th>
                  <th>Bank</th>
                  <th>Rekening</th>
                  <th>Status Aktif</th>
                  <th>Wajib Masuk</th>
                  <th>Pengurangan</th>
                  <th>Index</th>
                  <th>Mulai Kontrak</th>
                  <th>Cuti Diambil</th>
                  <th>Dankes</th>
                  <th>No KTP</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH DATA BANK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="bank" method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
              <label>Nama Bank</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Bidang">
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="SIMPAN">
      </div>
    </form>
    </div>
  </div>
</div>
<form id="form-delete" method="POST">
  @csrf
  @method('delete')
</form>
@push('scripts')
    <script>
        $(document).ready(function () {
          $('.btn-delete').on('click', function () {
            let action = $(this).data('action');
            let xxx = confirm('Apakah anda ingin menghapus data ini ?');
            $('#form-delete').removeAttr('action');


            if (xxx) {
              $('#form-delete').attr('action',action);
              $('#form-delete').submit();
            }
          });
        });
    </script>
@endpush

@endsection