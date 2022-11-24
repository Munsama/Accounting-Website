<?php
$conn = mysqli_connect 
   (
    "localhost",
    "root",
    "",
    "sia_jayarent1"
   );
if (mysqli_connect_errno())
 {
  echo "Koneksi Gagal"
  .mysqli_connect_error();
 }
 $base_url="http://localhost/sia_jayarent1/"
?>