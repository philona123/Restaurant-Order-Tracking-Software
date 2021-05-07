<?php
require_once 'connect.php';

$id = $_REQUEST['id'];

$sql = "UPDATE `order` SET order_complete = '1' WHERE order_id = '" . $id . "'";
if(mysqli_query($conn, $sql)){
  print ("Stored");
} else {
  print("Failed");
}

echo "<script>location.href='index.php'</script>";


?>