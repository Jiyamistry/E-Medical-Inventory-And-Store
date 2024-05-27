<?php
include("../connection.php");
if(isset($_GET["op"]) && $_GET["op"]=="edit")
{
    $b="SELECT * FROM register where log_id='".$_GET['log_id']."'; ";
    $result1=mysqli_query($db,$b);
    while($rows=mysqli_fetch_array($result1))
    {
        $Medical_name=$rows['Medical_name'];
        $Person_name=$rows['Person_name'];
        $Email=$rows['Email'];
        $Contact=$rows['Contact'];
        $Address=$rows['Address'];
    }
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Medical Details</title>
	<link rel="stylesheet" href="../assets/css/index.css">
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <h1>Edit Medical Details</h1>
    <fieldset>
      <legend><span class="number">1</span>Your Medical Store Info</legend>
      <label for="mname">Medical Name:</label>
      <input type="text" name="mname" value="<?php echo $Medical_name?>">
      <label for="pname">Owner's Name:</label>
      <input type="text" name="pname" value="<?php echo $Person_name?>">
      <label for="email">Email:</label>
      <input type="email" name="email" value="<?php echo $Email?>">
      <label for="contact">Contact:</label>
      <input type="tel" name="contact" value="<?php echo $Contact?>">
      <label for="address">Address:</label>
      <input type="text" name="address" value="<?php echo $Address?>">
    </fieldset>
    <button type="submit" name="submit">Edit</button>
  </form>
  <?php 
    
    if(isset($_POST['submit']))
    {
      $log_id=rand();
      $medical_name=$_POST['mname'];
      $person_name=$_POST['pname'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $address=$_POST['address'];
      $license = $_FILES['license']['name']; 
      $photo = $_FILES['Photo']['name']; 
      $signature = $_FILES['Signature']['name']; 
      $query="UPDATE register SET log_id='".$log_id."', Medical_name='".$medical_name."', Person_name='".$person_name."', Email='".$email."', Contact='".$contact."', Address='".$address."' WHERE log_ig='".$_GET['log_id']."';";
      echo $query;
      $result=mysqli_query($db,$query);
      if($result==true)
        header("Location:viewmedical.php");
    }
?>
</body>
</html>
<?php
}
else if(isset($_GET["op"]) && $_GET["op"]=="delete")
{
    $a="DELETE FROM register WHERE log_id='".$_GET['log_id']."' ";
    $result3=mysqli_query($db,$a);
    if($result3==true)
    {
        header("Location:viewmedical.php");
    }
}
?>