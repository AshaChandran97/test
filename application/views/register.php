<!DOCTYPE html>
<html>
<head>
<style>
	
	input
	{
		padding:10px;
		margin:20px;
	}
	form
	{
         border:1px dashed grey;
		margin-left:400px;
		width:550px;
          text-align:center;
          font-size:20px;
      }
	
	h1
	{
		text-align: center;
	}
</style>
<title>registration page
</title>
</head>
<body>
<h1>REGISTRATION FORM</h1>
<form method="post" action="<?php echo base_url()?>main/regi">
	<table>
		<tr><td>
First Name:</td><td>
<input type="text" name="firstname" required><br></td></tr>
<tr><td>Last Name::</td>
<td><input type="text" name="lastname" required><br></td></tr>
<tr><td>Username:</td>
<td><input type="text" name="username" required><br></td></tr>
<tr><td>Password:
<td><input type="password" name="password" required><br></td></tr>
<tr><td>Moblie:</td>
<td><input type="text" name="mobile" required><br></td></tr>
<tr><td>Email:</td>
<td><input type="email" name="email" required><br></td></tr>
</table>
<input type="submit" value="Register" align="center" name="register">
</form>
</body>
</html>



