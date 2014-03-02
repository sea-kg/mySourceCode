<?
  include_once("config.php");
  
  if (isset($_POST['update_code'])) {
		$id = mysql_real_escape_string($_POST['id']);
		$name = mysql_real_escape_string($_POST['name']);
		$code = mysql_real_escape_string($_POST['code']);
		$descr = mysql_real_escape_string($_POST['descr']);
		$lang = mysql_real_escape_string($_POST['lang']);
		
		mysql_query("
		update sources set 
			name = '$name',
			code = '$code',
			descr = '$descr',
			lang = '$lang',
			change_date = NOW()
		where 
			id = $id"
		);
		refreshTo("view.php?id=$id");
  }
	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> View / Edit </title>
		<link rel="stylesheet" type="text/css" href="hyperlight/style.css"/>
        <!-- link rel="stylesheet" type="text/css" href="hyperlight/colors/zenburn.css" id="theme"/ -->
        <link rel="stylesheet" type="text/css" href="hyperlight/colors/vibrant-ink.css" id="theme"/>
        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
	</head>
<body >

<?
	include_once("menu.php");
	include_once("hyperlight/hyperlight.php");
	
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$result = mysql_query("select * from sources where id = $id");
		if ($row = mysql_fetch_assoc($result)) {
			
			$id = $row['id'];
			$name = $row['name'];
			$code = $row['code'];
			$create_date = $row['create_date'];
			$change_date = $row['change_date'];
			$lang = $row['lang'];
			$descr = $row['descr'];
			
			if (isset($_GET['edit'])) {
				echo "<br><br>
				<form method='POST'>
					<table cellpadding=10 cellspacing=0>
						<tr>
							<td></td>
							<td><input type='submit' name='update_code' value='Save'> | <a href='?id=$id'>cancel</a></td>
						</tr>
						<tr>
							<td>id</td>
							<td>$id<input type='hidden' name='id' value='$id'></td>
						</tr>
						<tr>
							<td>Name: </td>
							<td><input type='text' name='name' size=70 value='".htmlspecialchars($name)."'></td>
						</tr>
						<tr>
							<td>Language: </td>
							<td>".generateSelect($lang)."</td>
						</tr>
						<tr>
							<td valign='top'>Description: </td>
							<td><textarea name='descr' rows=10 cols=100>".htmlspecialchars($descr)."</textarea></td>
						</tr>
						<tr>
							<td valign='top'>Code: </td>
							<td>
								
								<textarea name='code' rows=30 cols=100>".htmlspecialchars($code)."</textarea>
								
							</td>
						</tr>
					</table>
				</form>
				";
			} else {
				
				// $highlighter = new HyperLight($code, 'php');
				// $highlighter->theResult();
				// $highlighter->theResult();
				
				echo "<br><br><table cellpadding=10 cellspacing=0>
					<tr>
						<td></td>
						<td><a href='?id=$id&edit='>edit</a></td>
					</tr>
					<tr>
						<td>id</td>
						<td>$id</td>
					</tr>
					<tr>
						<td>Name: </td>
						<td>".htmlspecialchars($name)."</td>
					</tr>
					<tr>
						<td>Lang: </td>
						<td>".getLangCaption($lang)."</td>
					</tr>
					<tr>
						<td>Description:</td>
						<td>
							<table cellpadding=10 cellspacing=1><tr><td>
								".(strlen($descr) == 0 ? "None" : $descr)."
								</td></tr></table>
						</td>
					</tr>
					<tr>
						<td valign='top'>Code: </td>
						<td> <table cellpadding=10 cellspacing=1><tr><td> ";
					hyperlight($code, $lang);
				echo " </td></tr></table><br>
				colored by <a href='http://code.google.com/p/hyperlight/'>hyperlight</a>:
				</td>
					</tr>
					</table>
				";
			}
		}
		mysql_free_result($result);		
	}
	else
	{
		echo "Not found record";
	}
?>




</body>
</html>
