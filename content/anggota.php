<?php
$anggota = mysqli_query($connection, "SELECT * FROM anggota ORDER BY id DESC");

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_anggota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $queryTambah = mysqli_query($connection, "INSERT INTO buku (nama_anggota, telepon, email, alamat) VALUES('$nama', '$telepon', '$email', '$alamat')");

    if (!$queryTambah) {
        echo "Gagal menambahkan data";
    } else {
        header('location: ?pg=anggota');
    }
}

$queryAnggota = mysqli_query($connection,  "SELECT * FROM anggota");



?>

<div class="card p-5 mt-5 mx-5 shadow-lg">
    <div class="card-header">
        <h5 class="card-title">Data Anggota</h5>
    </div>
    <div class="button-card mt-5 ">
        <a href="?pg=tambah-anggota" type="submit" class="btn btn-primary">Tambah</a>
        <a href="" type="submit" class="btn btn-warning">Recycle</a>
    </div>
    <div class="table-buku mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($rowAnggota = mysqli_fetch_assoc($anggota)) :
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php echo $rowAnggota['nama_anggota']; ?></td>
                        <td><?php echo $rowAnggota['telepon'] ?></td>
                        <td><?php echo $rowAnggota['email'] ?></td>
                        <td><?php echo $rowAnggota['alamat'] ?></td>
                        <td>
                            <div class="btn-setting  gap-3">
                                <a href="?pg=tambah-anggota&hapus=<?php echo $rowAnggota['id'] ?>" class="btn btn-danger">Hapus</a>
                                <a href="?pg=tambah-anggota&edit=<?php echo $rowAnggota['id'] ?>" class="btn btn-warning">Edit</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>

<!-- <div class="modal fade p-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" name="judul_buku" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kategori Buku</label>
                        <select name="id_kategori" class="form-control" id="">
                            <option value="">Pilih Kategori</option>
                            <?php while ($rowkategori = mysqli_fetch_assoc($queryKategori)) : ?>
                                <option value="<?php echo $rowkategori['id'] ?>">
                                    <?php echo $rowkategori['categories_name'] ?>
                                </option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" value="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tahun Terbit</label>
                        <input type="date" class="form-control" name="tahun_terbit" value="">
                    </div>
                    <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?></button>
                </form>
            </div>
        </div>
    </div>
</div> -->