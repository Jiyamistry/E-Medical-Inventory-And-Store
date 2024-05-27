<?php
include("../connection.php");
if(isset($_GET['opin']) && $_GET['opin']=="edit")
{

?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Medicine Inventory</title>
	<link rel="stylesheet" href="../assets/css/index.css">
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
	<h1>Edit Medicine Inventory</h1>
	<fieldset>
	  <legend><span class="number">1</span>Edit Medicine Inventory</legend>
      <label for="type">Medicine Name:</label>
          <select id="ma_name" name="ma_name"><optgroup>
                  <option value="none">Select Medicine</option>
        <?php
        
         $query="SELECT * FROM medicinedetails";
         $query1="SELECT * FROM inventory WHERE Medicine_name='".$_GET['name']."'";
         $result1=mysqli_query($db,$query);
         $result2=mysqli_query($db,$query1);
		 while($rows1=mysqli_fetch_assoc($result2))
		 {
			$Quantity=$rows1['Quantity'];
			$Manufacturer_name=$rows1['Manufacturer_name'];
			$Contact=$rows1['contact'];
		 }
          while($rows=mysqli_fetch_assoc($result1))
          {
			  echo '<option selected value='.$rows['Medicine_name'].'>'.$rows['Medicine_name'].'</option>';            $i++;
			}
			echo '</optgroup>
			</select>
			';
			?>

	  <label for="quantity">Quantity:</label>
	  <input type="text"  name="quantity" value="<?php echo $Quantity; ?>">
      <label for="manufacturer_name">Manufacturer Name:</label>
	  <input type="text"  name="manufacturer_name" value="<?php echo $Manufacturer_name; ?>">
      <label for="contact">Contact:</label>
	  <input type="text"  name="contact" value="<?php echo $Contact; ?>">
	</fieldset> 
	<button type="submit" name="submit">Edit</button>
  </form>
  <?php
	if(isset($_POST['submit']))
	{
		$medicine_name=$_POST['ma_name'];
		$quantity=$_POST['quantity'];
        $query1="SELECT * FROM medicinedetails WHERE Medicine_name='$medicine_name'";
        $result1=mysqli_query($db,$query1);
        $fetch1=mysqli_fetch_array($result1);
        $medicine_no=$fetch1['Medicine_no'];
        $price=$fetch1['Price'];
		$manufacturer_name=$_POST['manufacturer_name'];
		$contact=$_POST['contact'];
		$query="UPDATE inventory SET Medicine_no='".$medicine_no."', Medicine_name='".$medicine_name."', Quantity='".$quantity."', Manufacturer_name='".$manufacturer_name."', contact='".$contact."' WHERE Medicine_name='".$_GET['name']."';";
		$result=mysqli_query($db,$query);
		if($result==true)
		header("Location:viewinventory.php");
	}
?>
</body>
</html>
<?php
}
else if(isset($_GET['opin']) && $_GET['opin']=="delete")
{
	$a="Delete from inventory where Medicine_name='".$_GET['name']."'";
    $result=mysqli_query($db,$a);
    if($result==true)
        header("Location:viewinventory.php");
}
?>