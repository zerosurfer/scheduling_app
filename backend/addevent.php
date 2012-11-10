<?php

$name = $_GET['name'];
$date = $_GET['date'];
$event_key = $_GET['event_key'];
$email = $_GET['email'];
$phone = $_GET['phone'];

print file_get_contents("http://scheduleapp.comlu.com/api/add_event.php?name=" . urlencode($name) . "&date=" . urlencode($date) . "&event_key=" . urlencode($event_key) . "&email=" . urlencode($email) . "&phone=" . urlencode($phone));

?>