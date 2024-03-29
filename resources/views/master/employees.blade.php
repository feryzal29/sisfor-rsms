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
                  <th>Asal Sekolah</th>
                  <th>Tahun Lulus</th>
                  <th>No. Ijazah</th>
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
                  <th>Batas Cuti</th>
                  <th>Cuti diambil</th>
                  <th>Dankes</th>
                  <th>No KTP</th>
                  <th>Email</th>
                  <th>No. telp</th>
                  <th>No. STR</th>
                  <th>Tgl. Terbit</th>
                  <th>No. ED</th>
                  <th>No. SIP</th>
                  <th>Tgl. Terbit</th>
                  <th>No. ED</th>
                  <th>Total Waktu Diklat</th>
                  <th>Tanggal Dibuat</th>
                  <th>Tanggal Terupdate</th>
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
                    <td>{{ $item->sekolah }}</td>
                    <td>{{ $item->tahun_lulus }}</td>
                    <td>{{ $item->ijazah }}</td>
                    <td>{{ $item->gapok }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->tgl_lahir)) }}</td>
                    <td>{{ $item->tmp_lahir}}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->kota }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->mulai_kerja)) }}</td>
                    <td>{{ $item->masa_kerja }} </td>
                    <td>{{ $item->indexings }}</td>
                    <td>{{ $item->bank->nama }}</td>
                    <td>{{ $item->rekening }}</td>
                    <td>{{ $item->stts_aktif }}</td>
                    <td>{{ $item->wajib_masuk }}</td>
                    <td>{{ $item->pengurangan }}</td>
                    <td>{{ $item->index }}</td>
                    <td>{{ $item->mulai_kontrak }}</td>
                    <td>{{ $item->cuti_diambil}}</td>
                    <td>{{ $item->TtlCuti }}</td>
                    <td>{{ $item->dankes }}</td>
                    <td>{{ $item->no_ktp }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->str->no_str }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->str->tgl_terbit)) }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->str->tgl_ed)) }}</td>
                    <td>{{ $item->sip->no_sip }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->sip->tgl_terbit)) }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->sip->tgl_ed)) }}</td>
                    <td>{{ $item->total_waktu }} <b>Jam</b></td>
                    <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->updated_at)) }}</td>
                    <td>
                      <a href="{{ route('employees.show', $item->id) }}" class="btn btn-success">Edit</a>
                      <a onclick="return confirm('Are you sure?')" href="{{ route('employee.delete',$item->id) }}" class="btn btn-danger">Delete</a>
                      {{-- <a href="javascript:;" class="btn btn-danger btn-delete" data-action="{{ route('employee.delete', $item->id) }}">Delete</a> --}}
                      <div class="dropdown show float-right">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                          Lain-lain
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{ route('employee.diklat',$item->id) }}">Data Diklat</a>
                          <a class="dropdown-item" href="{{ route('employees.files',$item->id) }}">File Kepegawaian</a>
                          <a class="dropdown-item" href="{{ route('employees.str',$item->id) }}">STR</a>
                          <a class="dropdown-item" href="{{ route('employees.sip',$item->id) }}">SIP</a>
                          <a class="dropdown-item" href="{{ route('employee.cuti.show',$item->id) }}">Cuti</a>
                          <a class="dropdown-item" href="{{ route('employee.user',$item->id) }}">Buat User</a>
                          <a class="dropdown-item" href="{{ route('employee.kodeqr',$item->id) }}">Generate QRcode</a>
                        </div>
                      </div>
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
                  <th>Asal Sekolah</th>
                  <th>Tahun Lulus</th>
                  <th>No. Ijazah</th>
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
                  <th>Batas Cuti</th>
                  <th>Cuti diambil</th>
                  <th>Dankes</th>
                  <th>No KTP</th>
                  <th>Email</th>
                  <th>No. telp</th>
                  <th>No. STR</th>
                  <th>Tgl. Terbit</th>
                  <th>No. ED</th>
                  <th>No. SIP</th>
                  <th>Tgl. Terbit</th>
                  <th>No. ED</th>
                  <th>Total Waktu Diklat</th>
                  <th>Tanggal Dibuat</th>
                  <th>Tanggal Terupdate</th>
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
<form id="form-delete" method="POST">
  @csrf
  @method('delete')
</form>
@push('scripts')
    <script>
        $(document).ready(function () {
          $('.btn-delete').on('click', function () {
            console.log("data");
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