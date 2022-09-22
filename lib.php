<?
	// W3C P3P 규약설정
	@header ("P3P : CP=\"ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC\"");

	// DB 접속
	function dbconn() {
		global $connect;
	include "config.php";
		if(!$connect) $connect = mysql_connect($db_host,$db_userid,$db_password) or die("dB 접속시 에러가 발생했습니다");

		mysql_select_db($db_dbname, $connect) or die("DB Select 에러가 발생했습니다");	
		return $connect;
	}

	@session_start();
?>