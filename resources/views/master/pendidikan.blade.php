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
              <h3 class="card-title">Data Pendidikan RS PKU Muhammadiyah Sekapuk</h3>
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">TAMBAH DATA</button>
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
                  <th>Tingkat</th>
                  <th>Index</th>
                  <th>Gaji Pokok 1</th>
                  <th>Kenaikan</th>
                  <th>Maksimal</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pendidikan as $item)
                    <tr>
                      <td>{{ $item->tingkat }}</td>
                      <td>{{ $item->index }}</td>
                      <td>{{ $item->gapok1 }}</td>
                      <td>{{ $item->kenaikan }}</td>
                      <td>{{ $item->maksimal }}</td>
                      <td>
                        <a href="{{ route('pendidikan.show', $item->id) }}" class="btn btn-success">Edit</a>
                        <a onclick="return confirm('Are you sure?')" href="{{ route('pendidikan.delete', $item->id) }}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr> 
                  @endforeach
                  
                </tbody>
                <tfoot>
                <tr>
                  <th>Tingkat</th>
                  <th>Index</th>
                  <th>Gaji Pokok 1</th>
                  <th>Kenaikan</th>
                  <th>Maksimal</th>
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
        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH DATA PENDIDIKAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/pendidikan" method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
              <label>Tingkat</label>
              <input type="text" name="tingkat" class="form-control" placeholder="Tingkat">
            </div>
            <div class="form-group">
              <label>Index</label>
              <input type="number" name="index" class="form-control" placeholder="Index">
            </div>
            <div class="form-group">
              <label>Gaji Pokok 1</label>
              <input type="number" name="gapok1" class="form-control" placeholder="Gaji Pokok 1">
            </div>
            <div class="form-group">
              <label>Kenaikan</label>
              <input type="number" name="kenaikan" class="form-control" placeholder="Kenaikan">
            </div>
            <div class="form-group">
              <label>Maksimal</label>
              <input type="number" name="maksimal" class="form-control" placeholder="Maksimal">
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

@endsection