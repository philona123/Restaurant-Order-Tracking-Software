<?php
require_once 'connect.php';

$category = $_REQUEST['categ'];
$text = $_REQUEST['text'];
$date = $_REQUEST['orderdate'];
$complete = $_REQUEST['done'];

if ($complete == '' || $complete == null){
  $complete = 0;
}

$sql = "INSERT INTO `order` (order_category, order_text, order_date, order_complete) VALUES ('$category', '$text', '$date', '$complete')";




if(mysqli_query($conn, $sql)){
  print ("Stored");
} else {
  print("Failed");
}

echo "<script>location.href='index.php'</script>";
 ?>