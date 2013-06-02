<?php
/**
	score_out Mysql
	Sample file
*/
$time_start = microtime(true);

require "./db.conf.php";

// db connection
$link = mysql_connect(HOST, USER, PASS);
$db = mysql_select_db(DB, $link);
mysql_set_charset('utf8');


// rank data
$play    = array();
$comment = array();
$mylist  = array();
$total   = array();


// choose sql
$select1 = "SELECT * FROM play    ORDER BY score desc";
$select2 = "SELECT * FROM comment ORDER BY score desc";
$select3 = "SELECT * FROM mylist  ORDER BY score desc";
$select4 = "SELECT * FROM total   ORDER BY score desc";

$select1 = "SELECT * FROM play    ORDER BY score desc LIMIT 10";
$select2 = "SELECT * FROM comment ORDER BY score desc LIMIT 10";
$select3 = "SELECT * FROM mylist  ORDER BY score desc LIMIT 10";
$select4 = "SELECT * FROM total   ORDER BY score desc LIMIT 10";


// go query
$result1 = mysql_query($select1);
$result2 = mysql_query($select2);
$result3 = mysql_query($select3);
$result4 = mysql_query($select4);

while ($row = mysql_fetch_assoc($result1)) {
	$play[$row["name"]]    = $row["score"];
}
while ($row = mysql_fetch_assoc($result2)) {
	$comment[$row["name"]] = $row["score"];
}
while ($row = mysql_fetch_assoc($result3)) {
	$mylist[$row["name"]]  = $row["score"];
}
while ($row = mysql_fetch_assoc($result4)) {
	$total[$row["name"]]   = $row["score"];
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