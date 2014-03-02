<?
	// error_reporting(0);
	$db = mysql_connect("127.0.0.1","my_sources","my_sources") or die( 'could not connecting to mysql: "localhost@my_sources"');
	mysql_select_db( "my_sources", $db) or die('could not select database: "my_sources"');
	mysql_set_charset("utf8");

	function refreshTo($new_page)
	{
		header ("Location: $new_page");
		exit;
	};
	
	function listOfLangs()
	{
		$arr = array();
		$arr['cpp'] = 'C++';
		$arr['python'] = 'Python';
		$arr['csharp'] = 'C#';
		$arr['php'] = 'PHP';
		$arr['iphp'] = 'Java Script';
		$arr['vb'] = 'Visual Basic';
		$arr['xml'] = 'XML';
		$arr['css'] = 'CSS';
		// $arr['iphp'] = 'Java Script';
		return $arr;
	}
	function getLangCaption($lang) {
		$arr = listOfLangs();
		return isset($arr[$lang]) ? $arr[$lang] : "Unknown";
	}
	
	function generateSelect($selected) {
		$res = "<select name='lang'>";
		$arr = listOfLangs();
		foreach ($arr as $key => $value) {
			$sel = '';
			if ($key == $selected) $sel = ' selected ';
			$res .= "<option $sel value='$key'>$value</option>";
		}
		$res .= "</select>";
		return $res;
	}
?>
