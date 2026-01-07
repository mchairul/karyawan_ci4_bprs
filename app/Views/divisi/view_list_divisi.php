<?= $this->extend('layouts/layout_app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="card p-3">

        <div class="col-2 mb-2">
            <a href="<?= url_to('divisi.add') ?>" class="btn btn-primary">
                Tambah Divisi
            </a>
        </div>

        <table class="table table-striped table-hover">
            <tr>
                <th>Nama Divisi</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>

            <?php foreach ($dataDivisi->getResult() as $divisi): ?>
            <tr>
                <td><?= $divisi->nama_divisi ?></td>
                <td><?= $divisi->created_at ?></td>
                <td>
                    <a href="<?= url_to('divisi.edit', $divisi->id) ?>"
                        class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="deleteDivisi('<?= $divisi->id ?>')">Delete</button>
                </td>
            </tr>
            <?php endforeach ?>

        </table>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<script>
    function deleteDivisi(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "untuk menghapus divisi ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, hapus"
        }).then((result) => {
            if (result.isConfirmed) {
               window.location.href = '<?= url_to('divisi.delete') ?>?id=' + id
            }
        });
    }
</script>

<?= $this->endSection() ?>