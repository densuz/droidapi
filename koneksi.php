<?php
    $mysqli = new MySQLi("103.227.252.195", "progclas_densus", "Indonesia2020", "progclas_densus");;
 
    //cek koneksi		
    if (mysqli_connect_errno()){
        echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
    }
?>