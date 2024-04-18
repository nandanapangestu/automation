<?php

require_once "app/mhsw.php";

$mhs = new mhs();


$rows = $mhs->ambilData();
if (!empty($rows)) {
    echo "<h2>DataMahasiswa:</h2>";
    echo "<table border>='1'>
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            </tr>";
    foreach ($rowss as $row) {
        echo "<tr>
                <td>{$row['mhsw_id']}</td>
                <td>{$row['mhsw_nim']}</td>
                <td>{$row['mhsw_nama']}</td>
                <td>{$row['mhsw_alamat']}</td>
            </tr>";
     }
    echo "</table>";
) else {
    echo "tidak ada data mahasiswa.<br>";
}