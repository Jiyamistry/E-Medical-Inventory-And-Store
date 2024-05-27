<?php
   $db=mysqli_connect("localhost", "root", "", "medical");
   if (!$db) echo "Failed to connect DB";
   else "DB connected";
?>