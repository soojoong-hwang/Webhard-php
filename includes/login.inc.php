<?
	if(!$HTTP_SESSION_VARS["sc_logged_no"]) {
		$result = "select * from scac_admin_table";
		$hard_data = mysql_fetch_array(mysql_query($result));
			include "layout/$hard_data[skin]/login_form.php";
	}
?>