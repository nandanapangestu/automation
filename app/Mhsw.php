<?php
// app/mhsw.php

class mhsw {
    private $conn;

    public function __construct() {
        $server = "localhost";
        $user = "root"; // Change to your database username
        $password = ""; // Change to your database password
        $db = "dbakademik"; // Change to your database name

        $this->conn = new mysqli($server, $user, $password, $db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function tampil() {
        $sql = "SELECT * FROM tb_mhsw"; // Change 'tb_mhsw' to your table name
        $result = $this->conn->query($sql);

        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function update($id, $nim, $nama, $alamat) {
        $nim = $this->conn->real_escape_string($nim);
        $nama = $this->conn->real_escape_string($nama);
        $alamat = $this->conn->real_escape_string($alamat);

        $sql = "UPDATE tb_mhsw SET mhsw_nim='$nim', mhsw_nama='$nama', mhsw_alamat='$alamat' WHERE mhsw_id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM tb_mhsw WHERE mhsw_id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahData($nim, $nama, $alamat) {
        $nim = $this->conn->real_escape_string($nim);
        $nama = $this->conn->real_escape_string($nama);
        $alamat = $this->conn->real_escape_string($alamat);

        $sql = "INSERT INTO tb_mhsw (mhsw_nim, mhsw_nama, mhsw_alamat) VALUES ('$nim', '$nama', '$alamat')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
    public function getDataById($id) {
        $sql = "SELECT * FROM tb_mhsw WHERE mhsw_id = $id";
        $result = $this->conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    
}
?>
