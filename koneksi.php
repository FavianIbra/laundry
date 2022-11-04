<?php
$koneksi=mysqli_connect('localhost','root','','laundry');
if (mysqli_connect_error()){
    printf ("Connect failed : %s\n", mysqli_connect_error());
        exit();
    }

?>