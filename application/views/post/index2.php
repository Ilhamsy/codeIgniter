<div class="container">
    <div class="row">
        <div class="col-md-4 d-flex justify-content-between">
            <h1>Sinopsis Dongeng</h1>
            <a href="<?= base_url(); ?>post/tambah" class="btn btn-primary align-self-center">Tambah Dongeng</a>
        </div>
        <div class="row">
            <div class="col">
            <?= $this->pagination->create_links(); ?>
            </div>   
        </div>
    </div>
    <div class="row">
        <?php if (isset($posts)) : ?>
        <?php foreach ($posts as $post) : ?>
            <div class="col-md-4 mb-3">
                <h3 class="text-truncate"><?= $post['judul']; ?></h3>
                <p class="" style="-webkite-line-clamp:3; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;"><?= $post['sinopsis'] ?></p>
                <hr>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>