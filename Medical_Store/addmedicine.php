<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Medicine</title>
	<link rel="stylesheet" href="../assets/css/index.css">
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
	<h1>Add Medicine Details</h1>
	<fieldset>
	  <legend><span class="number">1</span>Your Medicine Info</legend>
	  <label for="mano">Medicine No.:</label>
	  <input type="text"  name="ma_no">
	  <label for="maname">Medicine Name:</label>
	  <input type="text"  name="ma_name">
	  <label for="expirydate">Expiry Date:</label>
	  <input type="date"  name="expirydate">
      <label for="price">Price:</label>
	  <input type="text"  name="price">
      <label for="Dose_MG">Dose MG:</label>
	  <input type="text"  name="dose">
	</fieldset> 
	<button type="submit" name="submit">Add</button>
  </form>
  <?php
    include("../connection.php"); 
	if(isset($_POST['submit']))
	{
		$medicine_no=$_POST['ma_no'];
		$medicine_name=$_POST['ma_name'];
		$expirydate=$_POST['expirydate'];
		$price=$_POST['price'];
		$dose=$_POST['dose'];
		$query="Insert into medicinedetails (medicine_no,medicine_name,expiry_date,price,dose_MG
			) values ('".$medicine_no."','".$medicine_name."','".$expirydate."','".$price."','".$dose."');";
		$result=mysqli_query($db,$query);
		if($result==true)
		header("Location:viewmedicine.php");
	}

?>
</body>
</html>