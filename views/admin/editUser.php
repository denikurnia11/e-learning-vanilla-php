<?php require('./template/head.php'); ?>
<?php if (isset($_GET['message'])) {
    $pesan = '<div class="alert alert-danger" role="alert">' .
        $_GET['message'] . '
        </div>';
    echo $pesan;
} ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-edit"></i> Edit User</h6>
    </div>
    <div class="card-body">
        <form action="../../controllers/admin/EditUser.php" method="POST">
            <?php require '../../models/UserModel.php';
            $model = new UserModel();
            $data = $model->getDataById($_GET['id']);
            while ($d = mysqli_fetch_array($data)) { ?>
                <input name="id" type="hidden" value="<?= $d['id_user']; ?>">
                <input name="usernameOLD" type="hidden" value="<?= $d['username']; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required value="<?= $d['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required value="<?= $d['username']; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required placeholder="Masukkan password lama atau password baru!">
                </div>
                <div class="mb-3">
                    <label for="Role" class="form-label">Role</label>
                    <select class="form-control" required name="role">
                        <option value="">Pilih Role</option>
                        <option <?= $d['role'] == 'user' ? 'selected' : '' ?> value="user">User</option>
                        <option <?= $d['role'] == 'admin' ? 'selected' : '' ?> value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            <?php } ?>
        </form>
    </div>
</div>


<?php require('./template/footer.php'); ?>