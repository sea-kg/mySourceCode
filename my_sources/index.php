<?
  include_once("config.php");
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> All codes </title>
		<link rel="stylesheet" type="text/css" href="styles/main.css"/>
	</head>
<body>

<?
	include_once("menu.php");
	
	
	if (false)
	{
		
	} else {
		echo "<br><br><table cellpadding=10 cellspacing=1>
			<tr>
				<td>ID</td>
				<td>Language</td>
				<td>Name</td>
				<td>Create Date</td>
				<td>Change Date</td>
			</tr>
		";
		$result = mysql_query("select id, lang, name, create_date, change_date from sources");
		while ($row = mysql_fetch_assoc($result)) {
			$id = $row['id'];
			$lang = $row['lang'];
			$name = $row['name'];
			$create_date = $row['create_date'];
			$change_date = $row['change_date'];
			
			echo "
			<tr>
				<td>$id</td>
				<td>".getLangCaption($lang)."</td>
				<td><a href='view.php?id=$id'>$name</a></td>
				<td>$create_date</td>
				<td>$change_date</td>
			</tr>
			";
		}
		mysql_free_result($result);
		echo "</table>";
	}
?>




</body>
</html>
