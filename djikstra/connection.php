<?php 
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost","root","","sig-posyandu");
 
if($conn){
	 //echo "koneksi host berhasil.<br/>";
}else{
	 echo "koneksi gagal.<br/>";
}
// isikan dengan nama database yang akan di hubungkan
//$db = mysqli_select_db("test");
 
//if($db){
	//echo "koneksi database berhasil.";
//}//else{
	//echo "koneksi database gagal.";
//}
?>