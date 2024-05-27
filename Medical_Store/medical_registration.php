<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Registration</title>
	<link rel="stylesheet" href="../assets/css/index.css">
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <h1>Medical Registration</h1>
    <fieldset>
      <legend><span class="number">1</span>Your Medical Store Info</legend>
      <label for="mname">Medical Name:</label>
      <input type="text" name="mname">
      <label for="pname">Owner's Name:</label>
      <input type="text" name="pname">
      <label for="email">Email:</label>
      <input type="email" name="email">
      <label for="contact">Contact:</label>
      <input type="tel" name="contact">
      <label for="address">Address:</label>
      <input type="text" name="address">
    </fieldset>
    <button type="submit" name="submit">Sign Up</button>
  </form>
  <?php 
    include("../connection.php");
    if(isset($_POST['submit']))
    {
      $log_id=$_GET['log'];
      $medical_name=$_POST['mname'];
      $person_name=$_POST['pname'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $address=$_POST['address'];
      $license = $_FILES['license']['name']; 
      $photo = $_FILES['Photo']['name']; 
      $signature = $_FILES['Signature']['name']; 
      $query="Insert into `register`(`log_id`, `Medical_name`, `Person_name`, `Email`, `Contact`, `Address`) values ($log_id,'$medical_name','$person_name','$email','$contact','$address')";
      echo $query;
      $result=mysqli_query($db,$query);
      if($result==true)
        header("Location:index.php");
    }
?>
</body>
</html>