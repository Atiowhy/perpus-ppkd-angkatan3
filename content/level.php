<?php
$Level = mysqli_query($connection, "SELECT * FROM level ORDER BY id DESC");

if (isset($_POST['tambah'])) {
    $level = $_POST['nama_level'];

    $addLevel = mysqli_query($connection, "INSERT  INTO level (nama_level) VALUES ('$level')");

    if ($addLevel) {
        header('location:  ?pg=level');
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-5">
            <fieldset class="border border-black border-2 p-3 shadow">
                <div class="btn-action">
                    <a href="?pg=tambah-level" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</a>
                </div>
                <legend class="float-none w-auto px-3">
                    Data Level
                </legend>
                <div class="table-responsive mt-5">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Level</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($levelData = mysqli_fetch_assoc($Level)) :
                            ?>
                                <tr>
                                    <th scope="row" class="text-center"><?php echo $no++ ?></th>
                                    <td class="text-center"><?php echo $levelData['nama_level'] ?></td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <div class="btn-setting  gap-3">
                                            <a type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" name="hapus" href="?pg=tambah-level&hapus=<?php echo $levelData['id'] ?>" class="btn btn-danger">Hapus</a>
                                            <a type="submit" name='edit' href="?pg=tambah-level&edit=<?php echo $levelData['id'] ?>" class="btn btn-warning">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>

        <!-- Modal -->
        <div class="modal fade p-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Level</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Level</label>
                                <input type="text" class="form-control" name="nama_level" value="<?php echo isset($_GET['edit']) ? $levelData['nama_level'] : '' ?>">
                            </div>
                            <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>