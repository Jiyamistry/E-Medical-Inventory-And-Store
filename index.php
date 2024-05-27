<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/index.css">
	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <form action="" method="post">
	<h1>Login</h1>
	<fieldset>
	  <label for="name">Username:</label>
	  <input type="text" id="name" name="username">
	  <label for="password">Password:</label>
	  <input type="password" id="password" name="password">
	</fieldset>
	<button type="submit" name="login">Login</button>
	<button type="submit" name="signup">Sign Up</button>
  <button type="submit" name="customer">Customer</button>
  </form>
</body>
</html>
<?php
  include("connection.php");
  if(isset($_POST['login']))
  {
    $db=mysqli_connect("localhost", "root", "", "medical");
    if (!$db) echo "Failed to connect DB";
    else "DB connected";
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="Select * from login where username='".$username."' and password='".$password."';";
    $result=mysqli_query($db,$query);
    $fetch=mysqli_fetch_array($result);
    $type=$fetch['type'];
    echo $type;
    if(mysqli_num_rows($result)==1 && $type=="medical")
    {
      header("Location:Medical_Store/index.php");
    }
    else if(mysqli_num_rows($result)==1 && $type=="admin")
    {
      header("Location:Admin/index.php");
    } 
}
else if(isset($_POST['signup']))
{
    header("Location:register.php");
}
else if(isset($_POST['customer']))
{
  header("Location:Customer/index.php");
}
else
{

}   
?>