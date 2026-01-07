<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <?= $this->renderSection('css') ?>
</head>
<body>

    <?= $this->include('layouts/nav') ?>

    <div class="container mt-5">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2.js') ?>"></script>

    <script>
        <?php if (session()->getFlashdata('pesan_sukses')): ?>
        var pesanSukses = '<?=  session()->getFlashdata('pesan_sukses') ?>'
        <?php else: ?>
        var pesanSukses = ''
        <?php endif ?>

        // check di js apakah variable pesanSukses ada atau tidak kosong
        if (pesanSukses != '') {
            Swal.fire({
                title: "Sukses!",
                text: pesanSukses,
                icon: "success"
            });
        }
    </script>
    <?= $this->renderSection('js') ?>
</body>
</html>