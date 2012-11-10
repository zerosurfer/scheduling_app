<?php

require_once("connect.php");

$feed_array = array();

$btime = strtotime(date("d F Y") . " 8:00 AM");

$query = mysql_query("SELECT * FROM events WHERE time > '$btime'");

while($row = mysql_fetch_array($query)) {

  $event = array();

  $event["title"] = "Taken";
  $event["start"] = date("Y-m-d h:i A", $row["time"]);
  $event["end"] = date("Y-m-d h:i A", strtotime("+1 hour", $row["time"]));
  $event["allDay"] = false;

  $feed_array[] = $event;

}

print json_encode($feed_array);

exit;
?>