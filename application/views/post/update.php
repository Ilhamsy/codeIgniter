<div class="container">
    <div class="row mt-4"> 
        <div class="col-md-4">
        <?php foreach($post as $post): ?>
            <div class="card">
                <div class="card-header">
                    Update Post
                </div>
                <div class="card-body">
                    <form action="<?= base_url(); ?>post/prosesUpdate/<?= $post['id_post'] ?>" method="POST">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul"  placeholder="Masukkan judul" value="<?= $post['judul'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <textarea class="form-control" name="isi" id="isi" placeholder="Masukkan isi" rows="3" required><?= $post['isi'] ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url() ?>post" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
