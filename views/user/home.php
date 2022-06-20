<?php require('./template/head.php'); ?>
<h1 class="h3 mb-1 text-gray-800">Home</h1>
<p class="mb-4">Halaman ini merupakan tempat belajar siswa yang berisikan materi-materi berupa file yang bisa di-download oleh siswa. Berikut materi-materi yang tersedia:</p>

<?php
$no = 1;
require '../../models/MateriModel.php';
$model = new MateriModel();
$data = $model->findAll();
while ($d = mysqli_fetch_array($data)) { ?>
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#card-<?= $no ?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card-<?= $no ?>">
            <h6 class="m-0 font-weight-bold text-primary"><?= $d['judul']; ?></h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="card-<?= $no ?>">
            <div class="card-body">
                <?= $d['keterangan']; ?>
            </div>
            <div class="card-footer"><a target="_blank" href="../../uploads/<?= $d['url']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download Materi</a></div>
        </div>
    </div>
<?php $no++;
}
?>
<?php require('./template/footer.php'); ?>