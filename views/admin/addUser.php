<?php require('./template/head.php'); ?>
<?php if (isset($_GET['message'])) {
    $pesan = '<div class="alert alert-danger" role="alert">' .
        $_GET['message'] . '
        </div>';
    echo $pesan;
} ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Add New User</h6>
    </div>
    <div class="card-body">
        <form action="../../controllers/admin/AddUser.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="Role" class="form-label">Role</label>
                <select class="form-control" required name="role">
                    <option selected value="">Pilih Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php require('./template/footer.php'); ?>