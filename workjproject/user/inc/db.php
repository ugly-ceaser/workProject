<?php 

// define("HOST", "localhost");
// define("USERNAME", "skyraikc_lincom");
// define("PASSWORD", "1Lone2wolf@");
// define("DBNAME", "skyraikc_lloyd");

// $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);


define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "lloyd");

$link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);


function fetch_all_team(){
	global $link;
	$sql = "SELECT * FROM team ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
		}return $inv;
	}
}