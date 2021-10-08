<?php
	session_start();
	include_once "lib/class_db.php";
	$aksi=$fg->post("aksi");
	if($aksi=="login")
	{
		$post=$db->sanitPost();
		extract($post);
		$password=md5($password);
		$sel=$db->select("petugas where username='$username' and password= '$password'");
		$row=$sel->fetch();
		$n=$sel->rowCount();
		if ($n>0)
		{
			
			$_SESSION['username']=$row['username'];
			$_SESSION['id_petugas']=$row['id_petugas'];
			$fg->redir("index.php");
			// 7yyn 
		}else
		{
			$fg->alert("username dan password salah");
			$fg->back();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title"> Form Login</h3>
				</div>
				<div class="card-body">
					<form method="post" action="login.php">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control"> 
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<input type="submit" name="aksi" value="login" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
