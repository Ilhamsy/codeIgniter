<div class="container">
<div class="col-md-4">
<div class="card">
  <div class="card-header">
    Tambah Post
  </div>
  <div class="card-body">
  <form action="<?= base_url(); ?>post/tambah" method="POST">
  <div class="form-group">
    <label for="judul">Judul</label>
    <input type="text" class="form-control" name="judul" id="judul"  placeholder="Masukkan judul" required>
  </div>
  <div class="form-group">
    <label for="isi">Isi</label>
    <textarea class="form-control" name="sinopsis" id="sinopsis" placeholder="Masukkan isi" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
</div>
</div>

