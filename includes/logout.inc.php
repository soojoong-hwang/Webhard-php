<?
	if(!$HTTP_SESSION_VARS["sc_logged_no"]) {
		include "layout/$hard_data[skin]/layout_top.php";
		echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> $lang[message_already_logout]</span>";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	//세션 삭제
		$sc_logged_no = '';
		$sc_logged_time = '';
		$sc_logged_ip = '';
		$sc_last_connect_check = '0';

		session_register("sc_logged_no");
		session_register("sc_logged_time");
		session_register("sc_logged_ip");
		session_register("sc_last_connect_check");
		session_destroy();

?>