<?php function redirect_to($lk){
	header("Location :".$lk);
}

?>
<?php
extract($_POST);
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$Game_List=$_POST['Game_List'];
echo "<h1 style='font-family:Trebuchet MS, Helvetica, sans-serif;'>Account Created.</h1> <br> <a style='font-size:20px; text-decoration:none''font-family:Trebuchet MS, Helvetica, sans-serif;' href='login.html'>Click here to Sign In.</a>";
$server="localhost";
$user="root";
$pass="";
$con=mysqli_connect($server,$user,$pass,"dataset");
if(!$con)
{
	die("Could not connect".mysqli_error());
	
}?>
<pre>
<?php
if(isset($_POST))
{
	$query="INSERT INTO info(name,username,password,email,Game_List) VALUES ('$name','$username','$password','$email','$Game_List')";
	/*if(!$query)
	{
		die("database entry failed".mysqli_error());
	}*/
}
$result=mysqli_query($con,$query);
if(!$result)
{
	
}
else{
	redirect_to("http://localhost/The_Games/WelPage.html");
}

/*$retval=mysqli_query("select * from ",$con);
if(!$retval)
{
	die("could not get the data:".mysqli_error());
}*/


mysqli_close($con);
?>



