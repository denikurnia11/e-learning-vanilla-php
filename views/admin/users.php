<?php require('./template/head.php'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Users</h1>
<p class="mb-4">
    Role user terdapat 2 yaitu admin dan user. Role admin hanya bisa ditambahkan pada halaman ini. Password akun menggunakan enkripsi sha1, sehingga jika ingin mengubah data harus memasukkan password lama atau password baru.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary d-inline">
            Data Users
        </h6>
        <a href="./addUser.php" class="btn-sm btn-primary"><i class="fas fa-plus"></i> Add</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width='10'>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th width='130'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    require '../../models/UserModel.php';
                    $model = new UserModel();
                    $data = $model->findAll();
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['username']; ?></td>
                            <td><?= $d['password']; ?></td>
                            <td><?= $d['role']; ?></td>
                            <td><a href="../admin/editUser.php?id=<?= $d['id_user']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a> <a href="../../controllers/admin/DeleteUser.php?id=<?= $d['id_user']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('./template/footer.php'); ?>