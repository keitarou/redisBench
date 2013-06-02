<?php
/**
	csv import to Redis
	Sample file
*/
$time_start = microtime(true);

define(FILE, "./test_data.csv");
define(HOST, "127.0.0.1");
define(PORT, "6379");

$redis = new Redis();
if($redis->connect(HOST, PORT)){

	// get all sorted recoreds
	// $play    = $redis->zRange('play',    0, -1, true);
	// $comment = $redis->zRange('comment', 0, -1, true);
	// $mylist  = $redis->zRange('mylist',  0, -1, true);
	// $total   = $redis->zRange('total',   0, -1, true);

	// get top10 sorted recoreds
	$play    = $redis->zrevRange('play',    0, 9, true);
	$comment = $redis->zrevRange('comment', 0, 9, true);
	$mylist  = $redis->zrevRange('mylist',  0, 9, true);
	$total   = $redis->zrevRange('total',   0, 9, true);

}
?>

<h1>play rank</h1>
<pre>
<?php 
print_r($play);
?>
</pre>

<h1>comment rank</h1>
<pre>
<?php 
print_r($comment);
?>
</pre>

<h1>mylist rank</h1>
<pre>
<?php 
print_r($mylist);
?>
</pre>

<h1>total rank</h1>
<pre>
<?php 
print_r($total);
?>
</pre>


<?php
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "......$time";
?>