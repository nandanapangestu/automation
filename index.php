<?php
require_once "app/mhsw.php";
$mhsw = new Mhsw();

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if "Tambah Data" button is clicked
    if (isset($_POST['tambah'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $mhsw->tambahData($nim, $nama, $alamat);
        // Refresh halaman untuk menampilkan data terbaru
        header("Location: index.php");
        exit();
    }

    // Check if "Update" button is clicked
    if (isset($_POST['update'])) {
        $idToUpdate = $_POST['id_to_update'];
        header("Location: update_form.php?id=$idToUpdate");
        exit();
    }

    // Check if "Delete" button is clicked
    if (isset($_POST['delete'])) {
        $idToDelete = $_POST['id_to_delete'];
        $mhsw->delete($idToDelete);
        // Refresh halaman untuk menampilkan data terbaru
        header("Location: index.php");
        exit();
    }
}

// Fetch data to display
$rows = $mhsw->tampil();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>

    <h2>Tambah Data Mahasiswa</h2>
    <form action="index.php" method="post">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim"><br>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat"><br><br>
        <input type="submit" name="tambah" value="Tambah Data">
    </form>

    <h2>Data Mahasiswa</h2>
    <table border="1">
        <tr>
            <td>NO</td>
            <td>NIM</td>
            <td>NAMA</td>
            <td>ALAMAT</td>
            <td>Action</td>
        </tr>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $row['mhsw_id']; ?></td>
                <td><?php echo $row['mhsw_nim']; ?></td>
                <td><?php echo $row['mhsw_nama']; ?></td>
                <td><?php echo $row['mhsw_alamat']; ?></td>
                <td>
                    <form action="index.php" method="post" style="display: inline;">
                        <input type="hidden" name="id_to_update" value="<?php echo $row['mhsw_id']; ?>">
                        <input type="submit" name="update" value="Update">
                    </form>
                    <form action="index.php" method="post" style="display: inline;">
                        <input type="hidden" name="id_to_delete" value="<?php echo $row['mhsw_id']; ?>">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
