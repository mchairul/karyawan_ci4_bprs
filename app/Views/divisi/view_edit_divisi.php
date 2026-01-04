<?= $this->extend('layouts/layout_app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="card p-3">
        <h3>Edit Divisi</h3>
        <form action="<?= url_to('divisi.edit.post') ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $divisi['id'] ?>">
            <div class="mb-3">
                <label>Nama Divisi</label>
                <input type="text" value="<?= $divisi['nama_divisi'] ?>"
                    class="form-control <?php if ($validation->hasError('nama_divisi')) { echo "is-invalid"; } ?>"
                    name="nama_divisi" placeholder="input nama divisi" required>
                <?php if ($validation->hasError('nama_divisi')): ?>
                
                <div class="invalid-feedback"><?= $validation->getError('nama_divisi') ?></div>

                <?php endif ?>
            </div>
            <a href="<?= url_to('divisi.list') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>