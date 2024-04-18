<?php
require_once "app/mhsw.php";
$mhsw = new Mhsw();

// Retrieve the ID to update
if (!isset($_GET['id'])) {
    echo "ID mahasiswa untuk update tidak tersedia.";
    exit();
}
$idToUpdate = $_GET['id'];

// Retrieve data of the specific student to update
$dataMahasiswa = $mhsw->getDataById($idToUpdate);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get values from the form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // Call the update method from the Mhs object to update data
    $mhsw->update($idToUpdate, $nim, $nama, $alamat);
    // Redirect the user back to the main page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
</head>
<body>

    <h2>Update data mahasiswa</h2>
    <form action="update_form.php?id=<?php echo $idToUpdate; ?>" method="post">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" value="<?php echo $dataMahasiswa['mhsw_nim']; ?>"><br>
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $dataMahasiswa['mhsw_nama']; ?>"><br>
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" name="alamat" value="<?php echo $dataMahasiswa['mhsw_alamat']; ?>"><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>

</body>
</html>
