<?
	include "lib.php";

	$connect = dbconn();

	// 관리자 정보 로딩
	$result = mysql_query("select * from scac_admin_table");
	$hard_data = mysql_fetch_array($result);

	include "langs/$hard_data[language].lang.php";

	//로그인 세션주기 (페이지 리프레스 문제 해결)
	if($_POST['check']=="login") {

	$user_id = trim($user_id);
	$password = trim($password);

	if(!$user_id||!$password) { include "layout/$hard_data[skin]/layout_top.php";
		echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_login_blank]</span>";
		include "includes/login.inc.php";
		include "layout/$hard_data[skin]/layout_bottom.php"; exit;
	}

	$result = mysql_query("select * from scac_member_table where user_id='$user_id' and password='$password'") or die("die");
	$login_data = mysql_fetch_array($result);

	// 회원로그인이 성공하였을 경우 세션을 생성하고 페이지를 이동함
	if($login_data[no]) { 
		if($login_data[level]!=1) {
			// 4.0x 용 세션 처리
			$sc_logged_no = $login_data[no];
			$sc_logged_time = time();
			$sc_logged_ip = $REMOTE_ADDR;
			$sc_last_connect_check = '0';

			session_register("sc_logged_no");
			session_register("sc_logged_time");
			session_register("sc_logged_ip");
			session_register("sc_last_connect_check");
		} else { $login_fail="a"; }
	} else {
	//실패시 값을 줘서 실패 메시지 표현 수단(편법)
	$login_fail = "b"; }
	}

	// 로그아웃 리프레스 문제 해결
	if($_GET['mode']=="logout") { include "includes/logout.inc.php"; }
	if($_GET['mode']=="join"||!$HTTP_SESSION_VARS["sc_logged_no"]) { include "includes/join.inc.php"; }

	//로그인 여부 확인
	if($HTTP_SESSION_VARS["sc_logged_no"]) $member_data = mysql_fetch_array(mysql_query("select * from scac_member_table where no='".$HTTP_SESSION_VARS["sc_logged_no"]."'"));

	//스킨 레이아웃 인클루드
	include "layout/$hard_data[skin]/layout_top.php";

	//mode 값 정렬 (GET 값으로만 받음)
	if(empty($_GET['mode'])) {
		if(!$member_data[no]) {
			include "layout/$hard_data[skin]/index.php";
		} else { include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php"; }
	} elseif($_GET['mode']=="login") {
		if($member_data[no]) { include "includes/file_list.inc.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> $member_data[name]$lang[message_loginsucces]</span>"; include "layout/$hard_data[skin]/file_list.php";
		} else { if($login_fail=="b") {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_loginfail]</span>";} elseif($login_fail=="a") {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_mailfail]</span>";} include "layout/$hard_data[skin]/login_form.php";}
	} elseif($_GET['mode']=="join") {
		if($member_data[no]) {
			include "includes/file_list.inc.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> $member_data[name]$lang[message_joinsucces]</span>"; include "layout/$hard_data[skin]/file_list.php";
		} else { include "layout/$hard_data[skin]/join_form.php";}
	} elseif($_GET['mode']=="lostid") {
		include "lostid.php";
	} elseif($_GET['mode']=="logout") {
		echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> $lang[message_logout]</span>";
	} elseif($_GET['mode']=="upload") {
		if($select=="folder") {
			include "includes/folder_list.inc.php";
			include "layout/$hard_data[skin]/folder_list.php";
		} elseif(!$select&&!$infolder) {
			include "includes/upload.inc.php";
			include "layout/$hard_data[skin]/upload.php";
		} elseif($infolder) {
			include "includes/upload.inc.php";
		}
	} elseif($_GET['mode']=="option") {
		if($member_data[no]) {
			if($modify) {include "includes/option.inc.php"; $member_data = mysql_fetch_array(mysql_query("select * from scac_member_table where no='$member_data[no]'"));} // 수정정보 재 리로드
			include "layout/$hard_data[skin]/option_form.php";
		} else { echo "로그인"; }
	} elseif($_GET['mode']=="addfolder") {
		if($select=="folder") {
			include "includes/addfolder.inc.php";
			include "layout/$hard_data[skin]/addfolder_list.php";
		} elseif(!$select&&!$infolder) {
			include "includes/addfolder.inc.php";
			include "layout/$hard_data[skin]/addfolder_form.php";
		} elseif($infolder) {
			include "includes/addfolder.inc.php";
		}
	} elseif($_GET['mode']=="viewfile") {
		if($member_data[no]) {
			include "includes/file_list.inc.php";
			include "includes/file_view.inc.php";
			include "layout/$hard_data[skin]/file_view.php";
		} else { echo "로그인"; }
	} else { echo "기타"; }

	//스킨 레이아웃 풋 인클루드
	include "layout/$hard_data[skin]/layout_bottom.php";
?>