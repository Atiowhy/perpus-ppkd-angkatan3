<?php
include '../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $jenisKelamin = $_POST['jenis_kelamin'];

    $queryInsert = mysqli_query($connection, "INSERT INTO user (nama, telepon, email, jenis_kelamin) VALUES ('$nama','$telepon', '$email', '$jenisKelamin')");

    if (!$queryInsert) {
        echo "Gagal";
    } else {
        header('location: ?pg=user');
    }
} // query untuk insert data

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $queryHapus = mysqli_query($connection, "DELETE FROM user WHERE id='$id'");
    header('location: ?pg=user');
} // query untuk delete

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM user WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);
} // query untuk get data edit

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $nama = $_POST['nama'];
    $password = ($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $jenisKelamin = $_POST['jenis_kelamin'];

    $queryEdit = mysqli_query($connection, "UPDATE user SET nama='$nama', telepon='$telepon', email='$email', jenis_kelamin='$jenisKelamin', password='$password' WHERE id='$id'");
    header('location: ?pg=user');
} //query untuk post edit

$queryKategori = mysqli_query($connection,  "SELECT * FROM categories");
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 mt-5 mx-auto">
            <fieldset class="border border-black border-2 p-3 shadow">
                <legend class="float-none w-auto px-3">
                    <?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah ' ?> User
                </legend>
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="telepon" value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : ''  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="telepon" value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : ''  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                        <br>
                        <input <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == "laki-laki") ? 'checked' : '' : '' ?> type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki
                        <br>
                        <input <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == "Perempuan") ? 'checked' : '' : '' ?> type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                    </div>
                    <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?></button>
                </form>
            </fieldset>
        </div>

        <!-- Modal -->

    </div>
</div>