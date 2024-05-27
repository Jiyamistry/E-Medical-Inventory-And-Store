<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Medicine</title>
	<link rel="stylesheet" href="../assets/css/index.css">
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
	<h1>Add Medicine Inventory</h1>
	<fieldset>
	  <legend><span class="number">1</span>Add Medicine Inventory</legend>
      <label for="type">Medicine Name:</label>
          <select id="ma_name" name="ma_name"><optgroup>
                  <option value="none">Select Medicine</option>
        <?php
        include("../connection.php");
         $query="select * from medicinedetails";
         $result1=mysqli_query($db,$query);
          while($rows=mysqli_fetch_assoc($result1))
          {
            echo '<option value='.$rows['Medicine_name'].'>'.$rows['Medicine_name'].'</option>';            
            $i++;
          }
                echo '</optgroup>
                </select>
              ';
                ?>
	  <label for="quantity">Quantity:</label>
	  <input type="text"  name="quantity">
      <label for="manufacturer_name">Manufacturer Name:</label>
	  <input type="text"  name="manufacturer_name">
      <label for="contact">Contact:</label>
	  <input type="text"  name="contact">
	</fieldset> 
	<button type="submit" name="submit">Add</button>
  </form>
  <?php
     
	if(isset($_POST['submit']))
	{
		$medicine_name=$_POST['ma_name'];
		$quantity=$_POST['quantity'];

        $query1="SELECT * from medicinedetails where Medicine_name='$medicine_name'";
        $result1=mysqli_query($db,$query1);
        $fetch1=mysqli_fetch_array($result1);
        $medicine_no=$fetch1['Medicine_no'];
        $price=$fetch1['Price'];

		$manufacturer_name=$_POST['manufacturer_name'];
		$contact=$_POST['contact'];
		$query="INSERT INTO `inventory`( `Medicine_no`, `Medicine_name`, `Quantity`, `Manufacturer_name`, `contact`)  values ('".$medicine_no."','".$medicine_name."','".$quantity."','".$manufacturer_name."','".$contact."');";
		$result=mysqli_query($db,$query);
		if($result==true)
		header("Location:viewinventory.php");
	}
?>
</body>
</html>