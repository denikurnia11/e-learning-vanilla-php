<?php require('./template/head.php'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Materi</h1>
<p class="mb-4">
    Materi ini berupa file yang bisa didownload oleh user. Materi tersebut harus berupa file yang berekstensi atau berformat docx, pptx, xlsx, dan pdf.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary d-inline">
            Data Materi
        </h6>
        <a href="./addMateri.php" class="btn-sm btn-primary"><i class="fas fa-plus"></i> Add</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width='10'>No</th>
                        <th>Judul Materi</th>
                        <th>Keterangan</th>
                        <th>URL File</th>
                        <th width='130'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    require '../../models/MateriModel.php';
                    $model = new MateriModel();
                    $data = $model->findAll();
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['judul']; ?></td>
                            <td><?= $d['keterangan']; ?></td>
                            <td><a href="../../uploads/<?= $d['url']; ?>">Download</a></td>
                            <td><a href="../admin/editMateri.php?id=<?= $d['id_materi']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a> <a href="../../controllers/admin/DeleteMateri.php?id=<?= $d['id_materi']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('./template/footer.php'); ?>