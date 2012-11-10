<?php

require_once("connect.php");

$name = $_GET['name'];
$date = strtotime($_GET['date']);
$event_key = $_GET['event_key'];
$email = $_GET['email'];
$phone = $_GET['phone'];

if($name == "" || $date == "" || $event_key == "" || $email == "") { die("All parameters were not sent."); }

if($date < strtotime(date("Y-m-d") . " 01:00 AM")) { print json_encode(array("status" => "DateError")); die(); }

mysql_query("INSERT INTO events(name, time, event_key, email, phone_number) VALUES('$name', '$date', '$event_key', '$email', '$phone')") or die(mysql_error());

print json_encode(array("status" => "Success"));

exit;

?>
