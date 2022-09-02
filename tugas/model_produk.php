<?php
function buatKoneksi(){
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dts_tsa";
	return mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
}
function getTableProduk(){
	$link = buatKoneksi();
	$query = "SELECT * FROM produk";
	$result = mysqli_query($link, $query);

	$hasil = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $hasil;
}

?>