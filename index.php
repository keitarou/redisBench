<?php

$redis = new Redis();
if($redis->connect("127.0.0.1",6379)){
	$redis->set("foge", "Redis runnning");
	$res = $redis->get("foge");
	echo $res;
}
?>

<div><a href="./redis/score_in.php">Redis->score_in</a></div>
<div><a href="./redis/score_out.php">Redis->score_out</a></div>

<div><a href="./mysql/score_in.php">Mysql->score_in</a></div>
<div><a href="./mysql/score_out.php">Mysql->score_out</a></div>
