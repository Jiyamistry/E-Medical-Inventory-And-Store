<?php
include("../connection.php");
if($_GET['op']=="edit")
{
    $a="Select * from medicinedetails where medicine_name='".$_GET['name']."'";
    $result=mysqli_query($db,$a);
    while($fetch=mysqli_fetch_array($result))
        {
            $Medicine_no=$fetch['Medicine_no'];
            $Medicine_name=$fetch['Medicine_name'];
            $Expiry_date=$fetch['Expiry_date'];
            $Price=$fetch['Price'];
            $Dose_mg=$fetch['Dose_mg'];
        }
    
?>
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
	  <input type="text"  name="ma_no" value="<?php echo $Medicine_no?>">
	  <label for="maname">Medicine Name:</label>
	  <input type="text"  name="ma_name" value=<?php echo $Medicine_name?>>
	  <label for="expirydate">Expiry Date:</label>
	  <input type="date"  name="expirydate" value=<?php echo $Expiry_date?>>
      <label for="price">Price:</label>
	  <input type="text"  name="price" value=<?php echo $Price?>>
      <label for="Dose_MG">Dose MG:</label>
	  <input type="text"  name="dose" value=<?php echo $Dose_mg?>>
	</fieldset>
	<button type="submit" name="submit">Edit</button>
  </form>
  <?php
	if(isset($_POST['submit']))
	{
		$medicine_no=$_POST['ma_no'];
		$medicine_name=$_POST['ma_name'];
		$expirydate=$_POST['expirydate'];
		$price=$_POST['price'];
		$dose=$_POST['dose'];
		$query="update medicinedetails set Medicine_no='".$medicine_no."',Medicine_name='".$medicine_name."',expiry_date='".$expirydate."',price='".$price."',dose_MG='".$dose."' where Medicine_name='".$_GET['name']."'";
		$result=mysqli_query($db,$query);
		if($result==true)
		header("Location:viewmedicine.php");
	}
?>
</body>
</html>

<?php }
else if($_GET["op"]=="delete")
{
    $a="Delete from medicinedetails where Medicine_name='".$_GET['name']."'";
    $result=mysqli_query($db,$a);
    if($result==true)
        header("Location:viewmedicine.php");
    
}?>
