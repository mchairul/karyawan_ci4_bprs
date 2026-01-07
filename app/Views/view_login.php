<?= $this->extend('layouts/layout_auth') ?>

<?= $this->section('content') ?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h1>Login</h1>
    </div>
    <div class="card-body login-card-body">
        <form action="<?= url_to('login.post') ?>" method="post">
            <?= csrf_field() ?>
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input name="username" id="loginUsername" type="text" class="form-control" placeholder="Username" />
                    <label for="loginUsername">Username</label>
                </div>
                <div class="input-group-text"><span class="bi bi-person-circle"></span></div>
            </div>
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input name="password" id="loginPassword" type="password" class="form-control" placeholder="" />
                    <label for="loginPassword">Password</label>
                </div>
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            <div class="row">   
                <div class="col-12">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </form>

        <?php if (session()->getFlashdata('pesan_gagal') != null) : ?>
        <div class="alert alert-danger mt-3">
            <?= session()->getFlashdata('pesan_gagal') ?>
        </div>
        <?php endif ?>

    </div>
</div>

<?= $this->endSection() ?>