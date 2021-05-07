<?php
require_once 'connect.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM `order` WHERE order_id = '" . $id . "'";
if(mysqli_query($conn, $sql)){
  print ("Stored");
} else {
  print("Failed");
}

echo "<script>location.href='index.php'</script>";


?>