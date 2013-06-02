<?php
/**
	csv import to Mysql
	Sample file
*/
$time_start = microtime(true);

// define(FILE, "./test_data.csv");
define(FILE, "./test_data_large.csv");
require "./db.conf.php";

$link = mysql_connect(HOST, USER, PASS);
$db = mysql_select_db(DB, $link);
mysql_set_charset('utf8');

// reset tables
$reset1 = "truncate play;";
$reset2 = "truncate comment;";
$reset3 = "truncate mylist;";
$reset4 = "truncate total;";
mysql_query($reset1);
mysql_query($reset2);
mysql_query($reset3);
mysql_query($reset4);


// insert data
$file = fopen(FILE, "r");
while($data = fgetcsv($file)){
	$total = $data[0] + ($data[1]*10) + ($data[2]*100);
	$insert1 = "insert into play    values({$data[0]}, '{$data[3]}');";
	$insert2 = "insert into comment values({$data[1]}, '{$data[3]}');";
	$insert3 = "insert into mylist  values({$data[2]}, '{$data[3]}');";
	$insert4 = "insert into total   values({$total}, '{$data[3]}');";
	mysql_query($insert1);
	mysql_query($insert2);
	mysql_query($insert3);
	mysql_query($insert4);
}
// $result = mysql_query('SELECT id,name FROM shouhin');
// if (!$result) {
//     die('SELECTクエリーが失敗しました。'.mysql_error());
// }

// while ($row = mysql_fetch_assoc($result)) {
//     print('<p>');
//     print('id='.$row['id']);
//     print(',name='.$row['name']);
//     print('</p>');
// }
// $sql = "INSERT INTO shouhin (id, name) VALUES (4, 'プリンター')";
// $result_flag = mysql_query($sql);






// $redis = new Redis();
// if($redis->connect(HOST, PORT)){


// 	fclose($file);

	// $play    = $redis->zRange('play',    0, -1, true);
	// $comment = $redis->zRange('comment', 0, -1, true);
	// $mylist  = $redis->zRange('mylist',  0, -1, true);
	// $total   = $redis->zRange('total',   0, -1, true);
// }
?>




<?php
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "......$time";
?>