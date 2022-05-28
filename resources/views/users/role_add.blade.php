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
              <h3 class="card-title">Role Permission <b>{{ $user->name }}</b></h3>
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
                  <th>Roles</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($user->getRoleNames() as $item)
                  <tr>
                    <td>{{ $item }}</td>
                    <td>
                      <form action="{{ route('role.permission.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="role" value="{{ $item }}">
                        <input class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" value="Delete">
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
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
        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('role.permission.user') }}" method="POST">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="id_user" value="{{ $user->id }}">
          <div class="form-group">
            <label>Role</label>
            <select class="select2" multiple="multiple" name="roles[]" data-placeholder="Pilih Role" style="width: 100%;">
              @foreach ($role as $item)
              <option value="{{ $item->name }}">{{ $item->name }}</option>
              @endforeach
            </select>
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