<?= $this->extend('panel/base'); ?>

<?= $this->section('content'); ?>

<div class="d-grid gap-2 d-md-block mb-3">
  <button class="btn btn-primary shadow-lg" data-bs-toggle="modal" data-bs-target="#add"><i class="mdi mdi-plus"></i>
    Tambah
    Data</button>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card shadow-lg">
      <div class="card-header">
        <h3 class="card-title">Barang</h3>
      </div>
      <div class="card-body table-responsive">
        <table id="datatables" class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Barang</th>
              <th>Satuan</th>
              <th>Harga Jual</th>
              <th>Harga Beli</th>
              <th>Kategori</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td>
                <button onclick="" class="btn btn-primary"><i class="mdi mdi-pen"></i> Edit </button>
                <a href="" class="btn btn-danger"><i class="mdi mdi-delete"></i> Hapus</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>