<?
	$results = mysql_query("select * from scac_filedata_table where no='$no'") or die("die");
	$file_data = mysql_fetch_array($results);
?>