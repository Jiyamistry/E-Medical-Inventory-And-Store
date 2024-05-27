<?php
    include("../connection.php");
    $medicine_name=$_POST['ma_name'];
    $cus_name=$_POST['cus_name'];
    $quantity=$_POST['quantity'];
    $contact=$_POST['contact'];
    $query1="SELECT * from medicinedetails where Medicine_name='$medicine_name'";
    $result1=mysqli_query($db,$query1);
    $fetch1=mysqli_fetch_array($result1);
    $medicine_no=$fetch1['Medicine_no'];
    $price=$fetch1['Price']*$quantity;
    $query2="SELECT * from inventory where Medicine_name='$medicine_name'";
    $result2=mysqli_query($db,$query2);
    $fetch2=mysqli_fetch_array($result2);
    if($fetch2['Quantity']<$quantity)
    {
        echo "alert('Out of Stock')";
    }
    else
    {
        $final=$fetch2['Quantity']-$quantity;
        $query2="UPDATE `inventory` SET `Quantity`='$final'";
        $execute=mysqli_query($db,$query2);
        $query="INSERT INTO `orderdetails`( `Medicine_no`, `Medicine_name`, `Customer_name`, `Quantity`, `Price`, `Contact`) values ('".$medicine_no."','".$medicine_name."','".$cus_name."','".$quantity."','".$price."','".$contact."');";
        $result=mysqli_query($db,$query);
        if($result==true)
        {
            header("Location:view_order_details.php");
        }

    }
?>