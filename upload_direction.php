<?
	include "lib.php";

	$connect = dbconn();

	// 관리자 정보 로딩
	$result = mysql_query("select * from scac_admin_table");
	$hard_data = mysql_fetch_array($result);

	include "langs/$hard_data[language].lang.php";
?>
<html>
<head>
<link rel='stylesheet' type='text/css' title='Style' href='layout/<?=$hard_data[skin]?>/style.css' />
<title><?=$lang[title_upload]?></title>
<meta http-equiv="refresh" content="2; URL=upload_direction.php">
</head>
<body><center><br>
<font size='+1'><?=$lang[title_upload]?></font><br>
<font size='-1'><?=$lang[explain_uploading]?></font><br><br>
<img src='layout/<?=$hard_data[skin]?>/images/transfer.gif' />
</body>
</html>