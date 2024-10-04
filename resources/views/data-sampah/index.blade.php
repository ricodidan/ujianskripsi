@extends('layouts/contentLayoutMaster')

@section('title', 'Data Sampah')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
<!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <table class="datatables-basic table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Sampah</th>
              <th>Deskripsi Sampah</th>
              <th>Jenis</th>
              <th>Sumber</th>
              <th>Berat</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal to add new record -->
  <div class="modal modal-slide-in fade" id="modals-slide-in">
    <div class="modal-dialog sidebar-sm">
      <form class="add-new-record modal-content pt-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sampah</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-fullname">Nama Sampah</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="name_sampah"
              placeholder="Nama Sampah"
              aria-label="Nama Sampah"
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-post">Deskripsi Sampah</label>
            <textarea class="form-control" id="description_sampah" rows="5" placeholder="Deskripsi Sampah"></textarea>
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-email">Berat Sampah</label>
            <input
              type="text"
              id="berat_sampah"
              class="form-control dt-email"
              placeholder="xxx kg"
              aria-label="xxx kg"
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-date">Jenis Sampah</label>
            <select class="form-control" id="id_jenis_sampah">
              <option value="" disabled selected>Pilih Jenis Sampah</option>
              @foreach($jenisSampah as $jenis)
                <option value="{{ $jenis->id_jenissampah }}">{{ $jenis->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-date">Sumber Sampah</label>
            <select class="form-control" id="id_sumbersampah">
              <option value="" disabled selected>Pilih Sumber Sampah</option>
              @foreach($sumberSampah as $sumber)
                <option value="{{ $sumber->id_sumbersampah }}">{{ $sumber->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-4">
            <label class="form-label" for="basic-icon-default-date">Status Sampah</label>
            <select class="form-control" id="id_statussampah">
              <option value="" disabled selected>Pilih Status Sampah</option>
              @foreach($statusSampah as $status)
                <option value="{{ $status->id_statussampah }}">{{ $status->name }}</option>
              @endforeach
            </select>
          </div>
          <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <div
    class="modal fade"
    id="exampleModalCenter"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Kirim Notifikasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Apakah anda yakin ingin mengirim notifikasi sampah ke email petugas kebersihan ?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!--/ Basic table -->
@endsection


@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script>
@endsection
