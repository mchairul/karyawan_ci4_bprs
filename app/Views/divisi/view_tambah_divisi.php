<?= $this->extend('layouts/layout_app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="card p-3">
        <h3>Tambah Divisi</h3>
        <form action="<?= url_to('divisi.add.post') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label>Nama Divisi</label>
                <input type="text"
                    class="form-control <?php if ($validation->hasError('nama_divisi')) { echo "is-invalid"; } ?>"
                    name="nama_divisi" placeholder="input nama divisi" required>
                <?php if ($validation->hasError('nama_divisi')): ?>
                
                <div class="invalid-feedback"><?= $validation->getError('nama_divisi') ?></div>

                <?php endif ?>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>