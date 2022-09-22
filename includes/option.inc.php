<?
	function del_html( $str ) {
		$str = str_replace( ">", "&gt;",$str );
		$str = str_replace( "<", "&lt;",$str );
		return $str;
	}

	if(getenv("REQUEST_METHOD") == 'GET' ) {echo "정상적으로 글을 쓰시기 바랍니다"; exit;}

// 멤버 정보 구해오기;;; 멤버가 있을때
	if(!$member_data[no]) { echo "회원정보가 존재하지 않습니다"; exit;}

	if($modify=="password") {
	//비밀번호가 입력되어 있다면 기존 비밀번호 DB와 일치하는지 확인하고 새 비밀번호도 같은지 확인
		if($old_password) {
			$sql = "select * from scac_member_table where no='$member_data[no]' and password='$old_password'";
			$result = mysql_fetch_array(mysql_query($sql));
			if(!$result) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_password_not_exist]</span>";
			include "layout/$hard_data[skin]/option_form.php";
			include "layout/$hard_data[skin]/layout_bottom.php";exit;}
			if(!$password) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_password_empty]</span>";
			include "layout/$hard_data[skin]/option_form.php";
			include "layout/$hard_data[skin]/layout_bottom.php";exit;}
			if(!$password2) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_password_empty]</span>";
			include "layout/$hard_data[skin]/option_form.php";
			include "layout/$hard_data[skin]/layout_bottom.php";exit;}
			if($password!=$password2) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_password_not_same]</span>";
			include "layout/$hard_data[skin]/option_form.php";
			include "layout/$hard_data[skin]/layout_bottom.php";exit;}

	//맞으면, 비밀번호만 업데이트 시작
			mysql_query("update scac_member_table set password='$password' where no='$member_data[no]'");
	$info_pass = "pass";
		}
	} elseif($modify=="name") {

	$name = str_replace("ㅤ","",$name);

	if(!($name)) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_login_blank]</span>";
			include "layout/$hard_data[skin]/option_form.php";
			include "layout/$hard_data[skin]/layout_bottom.php";exit;}
	if(eregi("<",$name)||eregi(">",$name)) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_login_blank]</span>";
			include "layout/$hard_data[skin]/option_form.php";
			include "layout/$hard_data[skin]/layout_bottom.php";exit;}

	$name = addslashes(del_html($name));
	$email = addslashes(del_html($email));

	//이름 변경 내용 저장하기
	mysql_query("update scac_member_table set name='$name',email='$email' where no='$member_data[no]'");
	$info_profile = "profile";
	}

	$info_nothing = "허공에";
?>
<? if(!$info_profile&&!$info_pass&&$info_nothing) { ?><span class="toolbarimgtd"><img src="layout/<?=$hard_data[skin]?>/images/info.png" align="absmiddle"> <?=$lang[message_password_not_change]?></span><? } ?>
<? if($info_pass) { ?><span class="toolbarimgtd"><img src="layout/<?=$hard_data[skin]?>/images/info.png" align="absmiddle"> <?=$lang[message_password_change]?></span><? } ?>
<? if($info_profile) { ?><span class="toolbarimgtd"><img src="layout/<?=$hard_data[skin]?>/images/info.png" align="absmiddle"> <?=$lang[message_profile_change]?></span><? } ?>