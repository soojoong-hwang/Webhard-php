<?
	include "lib.php";

	$connect = dbconn();

	// ������ ���� �ε�
	$result = mysql_query("select * from scac_admin_table");
	$hard_data = mysql_fetch_array($result);

	include "langs/$hard_data[language].lang.php";

	//�α��� �����ֱ� (������ �������� ���� �ذ�)
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

	// ȸ���α����� �����Ͽ��� ��� ������ �����ϰ� �������� �̵���
	if($login_data[no]) { 
		if($login_data[level]!=1) {
			// 4.0x �� ���� ó��
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
	//���н� ���� �༭ ���� �޽��� ǥ�� ����(���)
	$login_fail = "b"; }
	}

	// �α׾ƿ� �������� ���� �ذ�
	if($_GET['mode']=="logout") { include "includes/logout.inc.php"; }
	if($_GET['mode']=="join"||!$HTTP_SESSION_VARS["sc_logged_no"]) { include "includes/join.inc.php"; }

	//�α��� ���� Ȯ��
	if($HTTP_SESSION_VARS["sc_logged_no"]) $member_data = mysql_fetch_array(mysql_query("select * from scac_member_table where no='".$HTTP_SESSION_VARS["sc_logged_no"]."'"));

	//��Ų ���̾ƿ� ��Ŭ���
	include "layout/$hard_data[skin]/layout_top.php";

	//mode �� ���� (GET �����θ� ����)
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
			if($modify) {include "includes/option.inc.php"; $member_data = mysql_fetch_array(mysql_query("select * from scac_member_table where no='$member_data[no]'"));} // �������� �� ���ε�
			include "layout/$hard_data[skin]/option_form.php";
		} else { echo "�α���"; }
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
		} else { echo "�α���"; }
	} else { echo "��Ÿ"; }

	//��Ų ���̾ƿ� ǲ ��Ŭ���
	include "layout/$hard_data[skin]/layout_bottom.php";
?>