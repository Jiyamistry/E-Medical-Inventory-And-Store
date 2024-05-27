<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <form action="order_details.php" method="post" enctype="multipart/form-data">
      <h1>Place Order</h1>
      <?php
       $name= $_GET['name'];
      ?>
      <fieldset>
        <label for="mname">Customer Name:</label>
        <input type="text" name="cus_name">
        <label for="pname">Contact No.:</label>
        <input type="text" name="contact">
        <label for="type">Medicine Name:</label>
        <input type="text" name="ma_name" value=<?php echo $name?> readonly>
        <label for="Quantity">Quantity:</label>
        <input type="number" name="quantity"> 
      </fieldset>
      <button type="submit" name="order">Place Order</button>
    </form>
  </body>
  </html>