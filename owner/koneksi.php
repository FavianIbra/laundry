<?php
$koneksi=mysqli_connect('localhost','root','','login');
if (mysqli_connect_error()){
    printf ("Connect failed : %s\n", mysqli_connect_error());
        exit();
    }

?>