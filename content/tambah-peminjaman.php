<?php
$books = mysqli_query($connection, "SELECT * FROM buku ORDER BY id DESC");

//simpan data pinjam
if (isset($_POST['simpan'])) {
    $no_peminjaman = $_POST['no_peminjaman'];
    $id_anggota = $_POST['id_anggota'];
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $id_buku = $_POST['id_buku'];

    $querySimpan = mysqli_query($connection, "INSERT INTO peminjaman (no_peminjaman, id_anggota, tgl_peminjaman, tgl_pengembalian) VALUES ('$no_peminjaman', '$id_anggota', '$tgl_peminjaman', '$tgl_pengembalian')");
    $id_peminjaman = mysqli_insert_id($connection);

    foreach ($id_buku as $key => $buku) {
        $id_buku = $_POST['id_buku'][$key];

        $insertDetail = mysqli_query($connection, "INSERT INTO detail_peminjaman (id_peminjaman, id_buku) VALUES ('$id_peminjaman ', '$id_buku')");
    }

    if (!$querySimpan) {
        echo "Gagal menambahkan data";
    } else {
        header('location: ?pg=peminjaman');
    }
}

//hapus data buku
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $queryHapus = mysqli_query($connection, "DELETE FROM peminjaman WHERE id='$id'");
    header('location: ?pg=peminjaman');
}

// get data update buku
if (isset($_GET['detail'])) {
    $id = $_GET['detail'];

    $queryDataPinjam = mysqli_query($connection, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE peminjaman.id = '$id'");

    $dataPinjam = mysqli_fetch_assoc($queryDataPinjam);
}
$queryDetailPinjam = mysqli_query($connection, "SELECT buku.judul_buku, detail_peminjaman.* FROM detail_peminjaman LEFT JOIN buku ON buku.id = detail_peminjaman.id_buku WHERE id_peminjaman = '$id'");

$queryBuku = mysqli_query($connection,  "SELECT * FROM buku");
$queryAnggota = mysqli_query($connection, "SELECT * FROM anggota");

$queryKodePinjam = mysqli_query($connection, "SELECT MAX(id) AS id_pinjam FROM peminjaman");
$rowPeminjaman = mysqli_fetch_assoc($queryKodePinjam);
$id_pinjam = $rowPeminjaman['id_pinjam'];
$id_pinjam++;

$kode_pinjam = "PJM/" . date('dmy') . "/" . sprintf("%03s",  $id_pinjam);
?>
<div class="container">
    <div class="row">
        <div class="card p-5 mt-5 mx-5 shadow-lg">
            <fieldset class="border border-black border-2 p-3 shadow">
                <legend class="float-none w-auto px-3">
                    <?php echo isset($_GET['detail']) ? 'Detail' : 'Tambah' ?> Buku
                </legend>
                <form action="" method="post">
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="" class="form-label">No Peminjaman</label>
                                <input type="text" class="form-control" name="no_peminjaman" value="<?php echo isset($_GET['detail']) ? $dataPinjam['no_peminjaman'] : $kode_pinjam  ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tgl_peminjaman" value="<?php echo isset($_GET['detail']) ? $dataPinjam['tgl_peminjaman'] : '' ?>" required>
                            </div>
                            <?php if (empty($_GET['detail'])): ?>
                                <div class="mb-3 ">
                                    <label for="" class="form-label">Nama Buku</label>
                                    <select required name="" id="id_buku" class="form-control">
                                        <option value="">Pilih Buku</option>
                                        <?php while ($rowBuku = mysqli_fetch_assoc($queryBuku)) : ?>
                                            <option value="<?php echo $rowBuku['id'] ?>"><?php echo $rowBuku['judul_buku'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Anggota</label>
                                <?php if (!isset($_GET['detail'])): ?>
                                    <select required name="id_anggota" class="form-control" id="">
                                        <option value="">Pilih Anggota</option>
                                        <!-- ambil data dari tabel anggota -->
                                        <?php while ($rowAnggota = mysqli_fetch_assoc($queryAnggota)) : ?>
                                            <option value="<?php echo $rowAnggota['id'] ?>"><?php echo $rowAnggota['nama_anggota'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                <?php else: ?>
                                    <input type="text" class="form-control" readonly value="<?php echo $dataPinjam['nama_anggota'] ?>">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" name="tgl_pengembalian" value="<?php echo isset($_GET['detail']) ? $dataPinjam['tgl_pengembalian'] : '' ?>" required>
                            </div>
                        </div>
                    </div>
                    <?php if (empty($_GET['detail'])): ?>
                        <div class="btn-cta d-flex justify-content-end mb-3">
                            <button type="button" id="add-row" class="btn btn-primary shadow">
                                Tambah Row
                            </button>
                        </div>
                    <?php endif ?>
                    <!-- table dari query php -->
                    <?php if (isset($_GET['detail'])): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($detailBuku = mysqli_fetch_assoc($queryDetailPinjam)): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $detailBuku['judul_buku'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <!-- table dari js -->
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-row">

                            </tbody>
                        </table>
                        <div class="btn-cta d-flex justify-content-end mb-3">
                            <button type="submit" name="simpan" class="btn btn-success shadow">
                                Simpan
                            </button>
                        </div>
                    <?php endif; ?>
                </form>
            </fieldset>
        </div>
    </div>
</div>