<?php

$connect = mysqli_connect("localhost", "root", "", "naskul");

if(mysqli_connect_errno()){
    printf ("Koneksi Gagal : ".mysqli_connect_error());
    exit();
}

?>