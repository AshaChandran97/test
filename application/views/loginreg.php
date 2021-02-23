<html>
<head>
<title>student portal</title>
<style>
	table
	{
		border:2px solid;
		border-collapse:collapse;
		padding:20px;
		margin: 10px;
	}
	td
	{
	border-collapse:collapse;
		padding:20px;
		margin: 10px;
	}

</style>
</head>
<body>	
	<form action="<?php echo base_url()?>main/logc" method="POST">
	<table>
		<tr>
			<td>
Email:</td>
<td><input type="email" name="email"></td>
<tr><td>password:</td>
<td><input type="password" name="password"></td></tr>
<tr><td colspan="2"><input type="submit" value="submit" name="login"></td></tr>
</table>
</form>
</body>
</html>
