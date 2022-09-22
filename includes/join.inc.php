<?
	if($_POST['check']=="join") {

	if(!eregi($HTTP_HOST,$HTTP_REFERER)) {echo "referer";exit;}
	if(!eregi("index.php",$HTTP_REFERER)) {echo "referer";exit;}
	if(getenv("REQUEST_METHOD") == 'GET' ) {echo "method error";exit;}

// 체크
	$user_id = str_replace("ㅤ","",$user_id);
	$name = str_replace("ㅤ","",$name);

        if(!get_magic_quotes_gpc()) {
          $user_id = addslashes($user_id);
          $password = addslashes($password);
        }
	
	$user_id=trim($user_id);
	if(empty($user_id)) { include "layout/$hard_data[skin]/layout_top.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_login_blank]</span>";
		include "layout/$hard_data[skin]/join_form.php";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	$check=mysql_fetch_array(mysql_query("select count(*) from scac_member_table where user_id='$user_id'",$connect));
	if($check[0]>0) { include "layout/$hard_data[skin]/layout_top.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_already_user_id]</span>";
		include "layout/$hard_data[skin]/join_form.php";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	unset($check);
	$check=mysql_fetch_array(mysql_query("select count(*) from scac_member_table where email='$email'",$connect));
	if($check[0]>0) { include "layout/$hard_data[skin]/layout_top.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_already_email]</span>";
		include "layout/$hard_data[skin]/join_form.php";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	if(empty($password)) { include "layout/$hard_data[skin]/layout_top.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_password_empty]</span>";
		include "layout/$hard_data[skin]/join_form.php";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}
	if(empty($password2)) { include "layout/$hard_data[skin]/layout_top.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_password_empty]</span>";
		include "layout/$hard_data[skin]/join_form.php";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	if($password!=$password2) { include "layout/$hard_data[skin]/layout_top.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_password_not_same2]</span>";
		include "layout/$hard_data[skin]/join_form.php";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	if(empty($name)) { include "layout/$hard_data[skin]/layout_top.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_login_blank]</span>";
		include "layout/$hard_data[skin]/join_form.php";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	if(empty($email)) { include "layout/$hard_data[skin]/layout_top.php"; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_login_blank]</span>";
		include "layout/$hard_data[skin]/join_form.php";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	if(eregi("<",$name)||eregi(">",$name)) { include "layout/$hard_data[skin]/layout_top.php"; echo "이름을 영문, 한글, 숫자등으로 입력하여 주십시요";exit;}

	$user_id=addslashes($user_id);
	$password=addslashes($password);
	$name=addslashes($name);
	$email=addslashes($email);
	$reg_date=time();
	$member_num=$hard_data[member_num]+1;

//집어넣기
	mysql_query("insert into scac_member_table (no,user_id,password,name,email,level,reg_date,last_date,code) value ('$member_num','$user_id','$password','$name','$email','$hard_data[basic_level]','$reg_date','$reg_date',md5('$reg_date'))");
	mysql_query("update scac_admin_table set member_num='$member_num'");

//
	if(!$admin) {
		$member_data=mysql_fetch_array(mysql_query("select * from scac_member_table where user_id='$user_id' and password='$password'"));

		// 4.0x 용 세션 처리
		$sc_logged_no = $member_data[no];
		$sc_logged_time = time();
		$sc_logged_ip = $REMOTE_ADDR;
		$sc_last_connect_check = '0';

		session_register("sc_logged_no");
		session_register("sc_logged_time");
		session_register("sc_logged_ip");
		session_register("sc_last_connect_check");
	}
}
?>