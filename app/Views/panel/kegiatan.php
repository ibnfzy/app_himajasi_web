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
        <h3 class="card-title">Kegiatan Organisasi</h3>
      </div>
      <div class="card-body table-responsive">
        <table id="datatables" class="table table-bordered">
          <thead>
            <tr>
              <th>~</th>
              <th>Judul</th>
              <th>Tgl Upload</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $key => $item) : ?>
            <tr>
              <td>
                <?= $key + 1; ?>
              </td>
              <td>
                <?= $item['judul']; ?>
              </td>
              <td>
                <?= $item['created_at']; ?>
              </td>
              <td>
                <button onclick="" class="btn btn-primary"><i class="mdi mdi-pen"></i> Edit Post </button>
                <a href="" class="btn btn-danger"><i class="mdi mdi-delete"></i> Hapus Post</a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/Panel/Kegiatan" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="mb-3">
            <label for="isi" class="form-label">Konten</label>
            <textarea class="form-control" id="editor" name="isi" rows="3" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/Panel/Kegiatan" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul-edit" name="judul" required>
          </div>
          <div class="mb-3">
            <label for="isi" class="form-label">Konten</label>
            <textarea class="form-control" id="editor-edit" name="isi" rows="3" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
$(document).ready(function() {
  new FroalaEditor('#editor', {
    // Set custom buttons.
    toolbarButtons: {
      // Key represents the more button from the toolbar.
      moreText: {
        // List of buttons used in the  group.
        buttons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily',
          'fontSize', 'textColor', 'backgroundColor', 'inlineClass', 'inlineStyle', 'clearFormatting'
        ],

        // Alignment of the group in the toolbar.
        align: 'left',

        // By default, 3 buttons are shown in the main toolbar. The rest of them are available when using the more button.
        buttonsVisible: 3
      },


      moreParagraph: {
        buttons: ['alignLeft', 'alignCenter', 'formatOLSimple', 'alignRight', 'alignJustify', 'formatOL',
          'formatUL', 'paragraphFormat', 'paragraphStyle', 'lineHeight', 'outdent', 'indent', 'quote'
        ],
        align: 'left',
        buttonsVisible: 3
      },

      moreRich: {
        buttons: ['insertLink', 'insertImage', 'insertVideo', 'insertTable', 'emoticons', 'fontAwesome',
          'specialCharacters', 'embedly', 'insertHR'
        ],
        align: 'left',
        buttonsVisible: 3
      },

      moreMisc: {
        buttons: ['undo', 'redo', 'fullscreen', 'print', 'getPDF', 'spellChecker', 'selectAll', 'html', 'help'],
        align: 'right',
        buttonsVisible: 2
      }
    },

    imageInsertButtons: ['imageBack', '|', 'imageByURL'],
    videoInsertButtons: ['videoBack', '|', 'videoByURL', 'videoEmbed'],

    // Change buttons for XS screen.
    toolbarButtonsXS: [
      ['undo', 'redo'],
      ['bold', 'italic', 'underline']
    ],

    imageUploadURL: '/upload-image',
    imageManagerLoadURL: '<?= base_url('uploads/image_manager'); ?>',
    imageManagerDeleteURL: '/delete-image',
    imageManagerLoadMethod: 'GET',
    events: {
      'image.beforeUpload': function(files) {
        console.log('before upload', files);
      },
      'image.inserted': function($img, response) {
        console.log('inserted', $img, response);
      },
      'image.replaced': function($img, response) {
        console.log('replaced', $img, response);
      },
      'image.error': function(error, response) {
        console.error('Error', error, response);
      },
      'imageManager.imageLoaded': function(img) {
        console.log('Image loaded:', img);
      },
      'imageManager.beforeDeleteImage': function(img) {
        return confirm('Are you sure you want to delete this image?');
      }
    }
  });
});

function onClickEdit(id, judul, body) {
  $('#id-edit').val(id);
  $('#judul-edit').val(judul);
  $('#editor-edit').val(body);
  $('#edit').modal('show');
}
</script>

<?= $this->endSection(); ?>