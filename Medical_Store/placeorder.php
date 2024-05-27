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
      <fieldset>
        <label for="mname">Customer Name:</label>
        <input type="text" name="cus_name">
        <label for="pname">Contact No.:</label>
        <input type="text" name="contact">
        <label for="type">Medicine Name:</label>
          <select id="ma_name" name="ma_name"><optgroup>
                  <option value="none">Select Medicine</option>
        <?php
        include("../connection.php");
         $query="SELECT * FROM `inventory`";
         $result1=mysqli_query($db,$query);
          while($rows=mysqli_fetch_assoc($result1))
          {
            echo '<option value='.$rows['Medicine_name'].'>'.$rows['Medicine_name'].'</option>';            $i++;
                    }
                echo '</optgroup>
                </select>
              ';
                ?>
        <label for="Quantity">Quantity:</label>
        <input type="number" name="quantity"> 
      </fieldset>
      <button type="submit" name="order">Place Order</button>
    </form>
  </body>
  </html>