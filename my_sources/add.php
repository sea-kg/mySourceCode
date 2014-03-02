<?
	include_once("config.php");
  
	if (isset($_POST['insert_code'])) {
		$name = mysql_real_escape_string($_POST['name']);
		$code = mysql_real_escape_string($_POST['code']);
		$descr = mysql_real_escape_string($_POST['descr']);
		$lang = mysql_real_escape_string($_POST['lang']);
		mysql_query("insert into sources(name, code, descr, lang, create_date, change_date) values('$name', '$code', '$descr', '$lang', NOW(), NOW())");
		refreshTo("add.php");
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Add code </title>
		<link rel="stylesheet" type="text/css" href="styles/main.css"/>
	</head>
<body>

<?
	include_once("menu.php");

	echo "<br><br>
		<form method='POST'>
			<table cellpadding=10 cellspacing=0>
				<tr>
					<td></td>
					<td><input type='submit' name='insert_code' value='Insert code'/></td>
				</tr>
				<tr>
					<td>Name: </td>
					<td><input name='name' type='text' size=70/></td>
				</tr>
				<tr>
					<td>Language: </td>
					<td>".generateSelect('')."
					</td>
				</tr>
				<tr>
					<td>Description: </td>
					<td><textarea name='descr' rows=10 cols=100></textarea></td>
				</tr>
				<tr>
					<td>Code: </td>
					<td><textarea name='code' rows=30 cols=100></textarea></td>
				</tr>
			</table>
		</form>
	";
?>

</body>
</html>
