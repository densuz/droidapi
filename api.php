<?php
include "koneksi.php";
header("Content-Type: application/json");
$response = array();
$access_key = "123456";
//ambil data sensor
if(isset($_POST['get_data_produk'])){
	if($access_key != $_POST['access_key']){
		$response['error'] = "true";
		$response['message'] = "Invalid Access Key";
		print_r(json_encode($response));
		return false;
	}	
		$query = $mysqli->query("SELECT id_produk,Nama_produk,Harga_produk,Jumlah_produk from produkk order by id DESC LIMIT 4");
	
		while($result  = $query->fetch_array(MYSQLI_ASSOC)){
			$data_arr []= $result;			
		}		
		
		if (!empty($data_arr)) {			
			$response['error'] = "false";
			$response['data'] = $data_arr;
		}else{
			$response['error'] = "true";
			$response['message'] = "No data found!";
		}
		print_r(json_encode($response));
	
}
//menambah data produk
if(isset($_POST['set_data_produk'])){
	if($access_key != $_POST['access_key']){
		$response['error'] = "true";
		$response['message'] = "Invalid Access Key";
		print_r(json_encode($response));
		return false;
	}
	$id_produk = $mysqli->escape_string($_POST['id_produk']);
	$Nama_produk = $mysqli->escape_string($_POST['Nama_produk']);
	$Harga_produk = $mysqli->escape_string($_POST['Harga_produk']);
	$query = $mysqli->query("INSERT INTO produkk (id_produk,Nama_produk,Harga_produk) VALUES ('$id_produk','$Nama_produk','$Harga_produk')");
	
	if($query){
		$response['error'] = "false";
		$response['message'] = "data berhasil disimpan";
	} else {
		$response['error'] = "true";
		$response['message'] = "data gagal disimpan!";
	}
	print_r(json_encode($response));
}

//edit data produk
if(isset($_POST['edit_data_produk'])){
	if($access_key != $_POST['access_key']){
		$response['error'] = "true";
		$response['message'] = "Invalid Access Key";
		print_r(json_encode($response));
		return false;
	}
	$id_produk = $mysqli->escape_string($_POST['id_produk']);
	$Nama_produk = $mysqli->escape_string($_POST['Nama_produk']);
	$Harga_produk = $mysqli->escape_string($_POST['Harga_produk']);
	$query = $mysqli->query("UPDATE INTO produkk (id_produk,Nama_produk,Harga_produk) VALUES ('$id_produk','$Nama_produk','$Harga_produk')");
	
	if($query){
		$response['error'] = "false";
		$response['message'] = "data berhasil diedit";
	} else {
		$response['error'] = "true";
		$response['message'] = "data gagal diedit!";
	}
	print_r(json_encode($response));
}

//hapusdata
if(isset($_POST['delete_data_produk'])){
	if($access_key != $_POST['access_key']){
		$response['error'] = "true";
		$response['message'] = "Invalid Access Key";
		print_r(json_encode($response));
		return false;
	}
	$query = $mysqli->query("DELETE INTO produkk (id_produk,Nama_produk,Harga_produk) VALUES ('$id_produk','$Nama_produk','$Harga_produk')");
	if($query){
		$response['error'] = "false";
		$response['message'] = "data berhasil dihapus";
	} else {
		$response['error'] = "true";
		$response['message'] = "data gagal dihapus!";
	}
	print_r(json_encode($response));
}
?>
