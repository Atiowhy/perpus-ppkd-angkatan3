<?php
$books = mysqli_query($connection, "SELECT * FROM buku ORDER BY id DESC");

//hapus data buku
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $queryHapus = mysqli_query($connection, "DELETE FROM buku WHERE id='$id'");
    header('location: ?pg=book');
}

// get data update buku
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $queryDataEdit = mysqli_query($connection, "SELECT * FROM buku WHERE id='$id'");
    $dataEdit = mysqli_fetch_assoc($queryDataEdit);
}

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $judulBuku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahun_terbit'];
    $id_kategori = $_POST['id_kategori'];

    $queryEditData = mysqli_query($connection, "UPDATE buku SET judul_buku='$judulBuku', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahunTerbit', id_kategori='$id_kategori' WHERE id='$id'");
    header('location: ?pg=book');
}

$queryKategori = mysqli_query($connection,  "SELECT * FROM categories");

?>
<div class="container">
    <div class="row">

        <div class="card p-5 mt-5 mx-5 shadow-lg">
            <fieldset class="border border-black border-2 p-3 shadow">
                <legend class="float-none w-auto px-3">
                    <?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku
                </legend>
                <form action="" method="post">
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="" class="form-label">No Peminjaman</label>
                                <input type="text" class="form-control" name="no_peminjaman" value="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tgl_peminjaman" value="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Anggota</label>
                                <select name="id_anggota" class="form-control" id="">
                                    <option value="">Pilih Anggota</option>
                                    <!-- ambil data dari tabel anggota -->
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" name="tgl_pengembalian" value="">
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>

    </div>
</div>