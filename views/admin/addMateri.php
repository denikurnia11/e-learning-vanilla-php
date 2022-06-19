<?php require('./template/head.php'); ?>
<?php if (isset($_GET['message'])) {
    $pesan = '<div class="alert alert-danger" role="alert">' .
        $_GET['message'] . '
        </div>';
    echo $pesan;
} ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Add New Materi</h6>
    </div>
    <div class="card-body">
        <form action="../../controllers/admin/AddMateri.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Materi</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="10" required class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control" id="file" name="file" required>
                <div id="fileHelp" class="form-text">Ukuran Maksimal 5mb dengan format (docx, pptx, xlsx, atau pdf).</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php require('./template/footer.php'); ?>