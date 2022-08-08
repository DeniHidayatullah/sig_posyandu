<?php

/*
 * Author: doug@neverfear.org
 */

require("Dijkstra.php");

function runTest($input_a,$input_b) {
	$conn = mysqli_connect("localhost","root","","sig-posyandu");

  if($conn){
  	 //echo "koneksi host berhasil.<br/>";
  }else{
  	 echo "koneksi gagal.<br/>";
  }

	$g = new Graph();

	//contoh struktur graph
	//$g->addedge("a", "b", 4);

	$data =  mysqli_query($conn, "select * from jarak");
	while($d = mysqli_fetch_assoc($data))
	{
		$g->addedge($d['kec_awal'], $d['kec_tujuan'], $d['jarak']);
		$g->addedge($d['kec_tujuan'], $d['kec_awal'], $d['jarak']);
	}

	list($distances, $prev) = $g->paths_from($input_a);

	$path = $g->paths_to($prev, $input_b);

	//print_r($path);
	return $path;

}

function runTestold($input_a,$input_b) {
	$g = new Graph();
	$g->addedge("a", "b", 4);
	$g->addedge("a", "d", 1);

	$g->addedge("b", "a", 74);
	$g->addedge("b", "c", 2);
	$g->addedge("b", "e", 12);

	$g->addedge("c", "b", 12);
	$g->addedge("c", "j", 12);
	$g->addedge("c", "f", 74);

	$g->addedge("d", "g", 22);
	$g->addedge("d", "e", 32);

	$g->addedge("e", "h", 33);
	$g->addedge("e", "d", 66);
	$g->addedge("e", "f", 76);

	$g->addedge("f", "j", 21);
	$g->addedge("f", "i", 11);

	$g->addedge("g", "c", 12);
	$g->addedge("g", "h", 10);

	$g->addedge("h", "g", 2);
	$g->addedge("h", "i", 72);

	$g->addedge("i", "j", 7);
	$g->addedge("i", "f", 31);
	$g->addedge("i", "h", 18);

	$g->addedge("j", "f", 8);


	list($distances, $prev) = $g->paths_from($input_a);

	$path = $g->paths_to($prev, $input_b);

	//print_r($path);
	return $path;

}


//runTest();