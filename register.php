<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<link rel="stylesheet" href="assets/css/index.css">
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <form action="" method="post">
	<h1>Sign Up</h1>
	<fieldset>
	  <legend><span class="number">1</span>Your basic info</legend>
	  <label for="name">Username:</label>
	  <input type="text" id="name" name="username"> 
	  <label for="mail">Email:</label>
	  <input type="email" id="mail" name="user_email">
	  <label for="password">Password:</label>
	  <input type="password" id="password" name="user_password">
	</fieldset>
	<fieldset>
    <label for="type">Type:</label>
    <select id="job" name="user_type">
      <optgroup>
        <option value="admin">admin</option>
        <option value="medical">medical</option>
      </optgroup>
    </select>
  </fieldset>
	<button type="submit" name="submit">NEXT</button>
  </form>
  <?php
    include("connection.php");
    if(isset($_POST['submit']))
    {
      $username=$_POST['username'];
      $password=$_POST['user_password'];
      $type=$_POST['user_type'];
      if($type=="medical")
      {
        $query="INSERT INTO `login`( `username`, `password`, `type`) VALUES ('$username','$password','$type')";
        $result=mysqli_query($db,$query);
        if($result==true)
        header("Location:Medical_Store/medical_registration.php?log='$log_id'");
      }
      else
      {
        $query="INSERT INTO `login`( `username`, `password`, `type`) VALUES ('$username','$password','$type')";
        $result=mysqli_query($db,$query);
        if($result==true)
        header("Location:admin/index.php?log='$log_id'"); 
      }
    }
?>
</body>
</html>