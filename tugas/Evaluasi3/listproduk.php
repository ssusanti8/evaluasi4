<?php
$severname= "localhost";
$username= "root";
$password= "";
$dbname= "dts_tsa";

//create connection
$conn =mysqli_connect($severname, $username, $password, $dbname);

//check connection
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>List Produk</title>
	<style>
	table {
  border-collapse: collapse;
  width: 50%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #a3d6c8;
  color: black;
}

	</style>
</head>
<body>
	<table align="center" border="2">
		<tr>
            <th>Id Produk</th>
            <th>Nama Produk</th>
            <th>Harga produk</th>
            <th>Merk produk</th>
            <th>Gambar Produk</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM produk")
        ?>
        <?php foreach ($query as $row) : ?>
        <tr>
        	<td><?php echo $row["id_produk"]; ?></td>
        	<td><?php echo $row["nama_produk"]; ?></td>
        	<td><?php echo $row["harga_produk"]; ?></td>
        	<td><?php echo $row["merk_produk"]; ?></td>
        	<td><img width="200" title="<?php echo $row['gambar']; ?>" src="image/<?php echo $row['gambar']; ?>"></td>
        </tr>
    	<?php endforeach; ?>
	</table>
</body>
</html>