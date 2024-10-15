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
    $queryHapus = mysqli_query($connection, "DELETE FROM categories WHERE id='$id'");
    header('location: ?pg=categories');
} // query untuk delete

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM categories WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);
} // query untuk get data edit

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $categories = $_POST['categories_name'];

    $queryEdit = mysqli_query($connection, "UPDATE categories SET categories_name='$categories' WHERE id='$id'");
    header('location: ?pg=categories');
} //query untuk post edit
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 mt-5 mx-auto">
            <fieldset class="border border-black border-2 p-3 shadow">
                <legend class="float-none w-auto px-3">
                    <?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah ' ?> Categories
                </legend>
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Categories</label>
                        <input type="text" class="form-control" name="categories_name" value="<?php echo isset($_GET['edit']) ? $rowEdit['categories_name'] : '' ?>">
                    </div>
                    <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?></button>
                </form>
            </fieldset>
        </div>

        <!-- Modal -->

    </div>
</div>