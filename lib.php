<?
	// W3C P3P �Ծ༳��
	@header ("P3P : CP=\"ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC\"");

	// DB ����
	function dbconn() {
		global $connect;
	include "config.php";
		if(!$connect) $connect = mysql_connect($db_host,$db_userid,$db_password) or die("dB ���ӽ� ������ �߻��߽��ϴ�");

		mysql_select_db($db_dbname, $connect) or die("DB Select ������ �߻��߽��ϴ�");	
		return $connect;
	}

	@session_start();
?>