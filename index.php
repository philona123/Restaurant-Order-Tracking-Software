<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Order Tracker</title>
  
  </head>
  <body>
    <div class= "container">
        <h1 >Restaurant Order Tracker</h1><br><br>
        <form action="insertactivity.php" method="post">
          <br><br><br>
            <label for="categ"><b>Category</b></label>
            <select name="categ"  id="categ" >
              <option style="display:none;"></option>
              <option value="0">Timely Meals</option>
              <option value="1">Snacks</option>
              <option value="2">Drinks</option>
            </select><br><br>
          <label for="text">&nbsp;&nbsp;&nbsp;&nbsp;<b>Order</b></label>&nbsp;&nbsp;&nbsp;&nbsp;
          <textarea name="text" id="text"></textarea><br><br>
          <label for="orderdate"><b>Order Date</b></label>
          <input type="date" id="orderdate" name="orderdate" /><br><br>
          <label for="done"><b>Order Done</b></label>
          <input type="checkbox" id="done" name="done" value="1" /><br/><br><br>
          <button class="btn" type="submit"><b>Submit Order</b></button>
          <br><br><br>
      </form>
      <?php
      require_once 'connect.php';
      $sql = "SELECT * FROM `order`";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      print("<h2>Incomplete Orders</h2>");

      //Incomplete Goals
      while($row = mysqli_fetch_array($result)){
        if($row['order_complete'] == 0){
            if($row['order_category'] == 0){
              $categ = "Timely Meals";
            } elseif ($row['order_category' == 1]) {
              $categ = "Snacks";
            } else {
              $categ = "Drinks";
            }
            echo "<div class='orde'>";
            echo "<a href='done.php?id=" . $row['order_id'] . "'><button class='btnDone'>Done</button></a><strong>";
            echo  $categ . "</strong><p>" . $row['order_text'] . "</p>Order Date: " . $row['order_date'];
            echo "</div>";
          }
      }
      //Complete Goals
      print("<h2>Completed Orders</h2>");
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      while($row = mysqli_fetch_array($result)){
        if($row['order_complete'] != 0){
            if($row['order_category'] == 0){
              $cat = "Timely Meals";
            } elseif ($row['order_category' == 1]) {
              $cat = "Snacks";
            } else {
              $cat = "Drinks";
            }
            echo "<div class='orde'>";
            echo "<a href='delete.php?id=" . $row['order_id'] . "'><button class='btnDelete'>Delete</button></a><strong>";
            echo  $cat . "</strong><p>" . $row['order_text'] . "</p>Order Date: " . $row['order_date'];
            echo "</div>";
          }
      }
     ?>
   
    </div>
  </body>
</html>