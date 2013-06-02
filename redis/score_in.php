<?php
/**
	csv import to Redis
	Sample file
*/
$time_start = microtime(true);

// define(FILE, "./test_data.csv");
define(FILE, "./test_data_large.csv");
define(HOST, "127.0.0.1");
define(PORT, "6379");

$redis = new Redis();
if($redis->connect(HOST, PORT)){

	$redis->flushAll();
	$file = fopen(FILE, "r");
	while($data = fgetcsv($file)){
		$redis->zadd("play",    $data[0], $data[3]);
		$redis->zadd("comment", $data[1], $data[3]);
		$redis->zadd("mylist",  $data[2], $data[3]);
		$redis->zadd("total",   $data[0]+($data[1]*10)+($data[2]*100), $data[3]);
	}

	fclose($file);

	// $play    = $redis->zRange('play',    0, -1, true);
	// $comment = $redis->zRange('comment', 0, -1, true);
	// $mylist  = $redis->zRange('mylist',  0, -1, true);
	// $total   = $redis->zRange('total',   0, -1, true);
}
?>


<pre>
<?php 
// print_r($play);
// print_r($comment);
// print_r($mylist);
// print_r($total);
?>
</pre>


<?php
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "......$time";
?>