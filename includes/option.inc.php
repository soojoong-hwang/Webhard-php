<?
	function del_html( $str ) {
		$str = str_replace( ">", "&gt;",$str );
		$str = str_replace( "<", "&lt;",$str );
		return $str;
	}

	if(getenv("REQUEST_METHOD") == 'GET' ) {echo "���������� ���� ���ñ� �ٶ��ϴ�"; exit;}

// ��� ���� ���ؿ���;;; ����� ������
	if(!$member_data[no]) { echo "ȸ�������� �������� �ʽ��ϴ�"; exit;}

	if($modify=="password") {
	//��й�ȣ�� �ԷµǾ� �ִٸ� ���� ��й�ȣ DB�� ��ġ�ϴ��� Ȯ���ϰ� �� ��й�ȣ�� ������ Ȯ��
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

	//������, ��й�ȣ�� ������Ʈ ����
			mysql_query("update scac_member_table set password='$password' where no='$member_data[no]'");
	$info_pass = "pass";
		}
	} elseif($modify=="name") {

	$name = str_replace("��","",$name);

	if(!($name)) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_login_blank]</span>";
			include "layout/$hard_data[skin]/option_form.php";
			include "layout/$hard_data[skin]/layout_bottom.php";exit;}
	if(eregi("<",$name)||eregi(">",$name)) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_login_blank]</span>";
			include "layout/$hard_data[skin]/option_form.php";
			include "layout/$hard_data[skin]/layout_bottom.php";exit;}

	$name = addslashes(del_html($name));
	$email = addslashes(del_html($email));

	//�̸� ���� ���� �����ϱ�
	mysql_query("update scac_member_table set name='$name',email='$email' where no='$member_data[no]'");
	$info_profile = "profile";
	}

	$info_nothing = "�����";
?>
<? if(!$info_profile&&!$info_pass&&$info_nothing) { ?><span class="toolbarimgtd"><img src="layout/<?=$hard_data[skin]?>/images/info.png" align="absmiddle"> <?=$lang[message_password_not_change]?></span><? } ?>
<? if($info_pass) { ?><span class="toolbarimgtd"><img src="layout/<?=$hard_data[skin]?>/images/info.png" align="absmiddle"> <?=$lang[message_password_change]?></span><? } ?>
<? if($info_profile) { ?><span class="toolbarimgtd"><img src="layout/<?=$hard_data[skin]?>/images/info.png" align="absmiddle"> <?=$lang[message_profile_change]?></span><? } ?>