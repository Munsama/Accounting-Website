<?php
include "../config/koneksi.php";
if(@$_GET['pages']) {
	include $_GET['pages'].".php";
}else {
	include "index2.php";
}
?>