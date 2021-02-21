<div class="container">
    <div class="row mt-4"> 
        <div class="col-md-4">
        <?php foreach($sinopsis as $post): ?>
            <div class="card">
                <div class="card-header">
                    Lihat Dongeng
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul"  placeholder="Masukkan judul" value="<?= $post['judul'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <textarea class="form-control" name="isi" id="isi" placeholder="Masukkan isi" rows="3" required><?= $post['sinopsis'] ?></textarea>
                        </div>
                        <a href="<?= base_url() ?>post" class="btn btn-secondary">Selesai</a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

