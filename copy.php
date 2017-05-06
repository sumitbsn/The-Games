<html>
	<head>
		<title>User Account</title>
		<style>
			body{
				background-image:url(11.jpg);
				color:white;
				overflow:hidden;
				font-family:"Trebuchet MS", Helvetica, sans-serif;
			}
			
			#head{
				font-size:30px;
			}
			
			#subhead{
				font-size:15px;
			}
			
			.head{
				font-family:"Trebuchet MS", Helvetica, sans-serif;
				font-size:350%;
				position:relative;
				float: right;
			}

			.subhead{
				font-family:"Trebuchet MS", Helvetica, sans-serif;
				font-size:100%;
				position:relative;
				right:-85%;
				top:10%;
			}
				
			.icon{
				height:135px;
				position:relative;
				top:-20px;
				left:0%;
			}
			
			#logout{
				position:relative;
				float: right;
				font-size:15px;
			}
			#logout:hover{
				color:gold;
				transition:0.5s;
				font-size:16px;
			}
		</style>
		<div class="head">The Games</div>
		<div class="subhead">The Ultimate Game Portal</div>
		<a href="Homepage.html"><img class="icon" src="01.jpg"></a><hr>
	</head>
	
	<body>
		<div id="head">
		<div id="logout" onclick="location.href='WelPage.html'"> LOGOUT </div>
			<?php
			$con=mysqli_connect("localhost","root","","dataset");
			if(!$con){
			  die("Couldn't Connect".mysqli_error());
			}
			extract($_POST);
			$us=$_POST['username'];
			$pw=$_POST['password'];
			$query = mysqli_query($con,"select * from info where password='$pw' AND username='$us'");
			if(!$query)
			{
				die("Error in database 101");
			}
			$rows = mysqli_num_rows($query);
			
			if($row=NULL)
			{
				echo "no login data found";
			}
			if ($rows == 1) {
				while($row=mysqli_fetch_assoc($query)){
				  echo "Welcome {$row['name']} <br />".
						"<hr>";
						?>
		</div>
		<div id="subhead">
		<div style="float:right; "> <?php echo "Email id: {$row['email']} <br />"?> </div>
			<?php
					echo	"</br></br>Your played Games are: </br> {$row['Game_List']} <br />";
				}
			} 
			else {
				header('Location: LoginFailed.html');
			}
			mysqli_close($con);
			?>
		</div>
	</body>
</html>