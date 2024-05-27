<?php

include("../connection.php");

if(isset($_GET['oporder']) && $_GET['oporder']=="edit")
{
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <form action="" method="post" enctype="multipart/form-data">
      <h1>Edit Order</h1>
      <?php
        $a="SELECT * FROM orderdetails where customer_name='".$_GET['cuname']."'";
        $result=mysqli_query($db,$a);
        while($row=mysqli_fetch_assoc($result))
        {
            $Customer_name=$row['Customer_name'];  
            $Quantity=$row['Quantity']; 
            $Contact=$row['Contact'];
        }
      ?>
      <fieldset>
        <label for="mname">Customer Name:</label>
        <input type="text" name="cus_name" value="<?php echo $Customer_name?>">
        <label for="pname">Contact No.:</label>
        <input type="text" name="contact" value="<?php echo $Contact?>">
        <label for="type">Medicine Name:</label>
          <select id="ma_name" name="ma_name"><optgroup>
                  <option value="none">Select Medicine</option>
        <?php
         $query="SELECT * FROM `medicinedetails`";
         $result4=mysqli_query($db,$query);
          while($rows=mysqli_fetch_assoc($result4))
          {
            echo '<option value='.$rows['Medicine_name'].'>'.$rows['Medicine_name'].'</option>';            
            }
                echo '</optgroup>
                </select>
            ';
                ?>
        <label for="Quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $Quantity?>">
      </fieldset>
      <button type="submit" name="order">Edit Order</button>
    </form>
    <?php
    if(isset($_POST['order']))
    {
      $cus_name=$_POST['cus_name'];
      $contact=$_POST['contact'];
      $medicine_name=$_POST['ma_name'];
      $query1="SELECT * from medicinedetails where Medicine_name='$medicine_name'";
      $result1=mysqli_query($db,$query1);
      $fetch1=mysqli_fetch_array($result1);
      $medicine_no=$fetch1['Medicine_no'];
      $quantity=$_POST['quantity'];
      $price=$fetch1['Price']*$quantity;
      $b="UPDATE orderdetails SET Medicine_no='".$medicine_no."', Medicine_name='".$medicine_name."', Customer_name='".$cus_name."', Quantity='".$quantity."', Price='".$price."', Contact='".$contact."' where Customer_name='".$_GET['cuname']."';";
      $result3=mysqli_query($db,$b);
          if($result3==true)    
          {
              header("Location:view_order_details.php");
          }
    }
    ?>
  </body>
  </html>
  <?php
  }
  else if(isset($_GET['oporder']) && $_GET['oporder']=="delete")
  {
    $c="DELETE FROM orderdetails WHERE Customer_name='".$_GET['cuname']."'";
    $result2=mysqli_query($db,$c);
        if($result2==true)
        {
            header("Location:view_order_details.php");
        }
  }
  
  ?>