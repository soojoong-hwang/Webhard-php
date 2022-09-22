<?
	if(!eregi($HTTP_HOST,$HTTP_REFERER)) { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_access_error]</span>";
	include "layout/$hard_data[skin]/layout_bottom.php"; exit;}
	if(!eregi("index.php",$HTTP_REFERER)) { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_access_error]</span>";
	include "layout/$hard_data[skin]/layout_bottom.php"; exit;}

	if($infolder) {
		if(!is_dir("data$infolder$new_folder")) { 
			@mkdir("data$infolder$new_folder",0777);
			@chmod("data$infolder$new_folder",0706);
			echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> Folder '$new_folder' $lang[message_folder_success]</span>";
			include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php"; include "layout/$hard_data[skin]/layout_bottom.php"; exit;
		} include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php"; include "layout/$hard_data[skin]/layout_bottom.php"; exit;
	}

	// 디렉토리를 검사하고 없으면 만들기
	if(!is_dir("data/$member_data[user_id]")) { 
		@mkdir("data/$member_data[user_id]",0777);
		@chmod("data/$member_data[user_id]",0706);
	}

	$addfolder_user_id = $member_data[user_id];
	// data 디렉토리에서 디렉토리를 구함
	function addfolder_list() {
	global $bfolder, $bifolder, $addfolder_user_id;
		$data_dir="data/".$addfolder_user_id."/$bfolder";
		$handle=opendir($data_dir);
		while ($data_info = readdir($handle)) {
			if(!eregi("\.",$data_info)) {
				echo"<a href=\"index.php?mode=addfolder&folderpath=/$addfolder_user_id$bfolder/$data_info\" class=\"folder\"><img src=\"layout/scac/images/folder.png\" border=\"0\" align=\"absmiddle\"> $bfolder/$data_info/</a>&nbsp;<a href=\"index.php?mode=addfolder&select=folder&bfolder=$bfolder/$data_info&bifolder=$bfolder\">[하위폴더]</a><br />";
				
			} 
		} echo "<p><a href=\"http://www.hozz.net/scac_hard/index.php?mode=addfolder\">Main</a>";
		if($bfolder) echo "　<a href=\"index.php?mode=addfolder&select=folder&bfolder=$bifolder\"><u>Back</u></a>";
		echo "<br />";
		closedir($handle);
	}
?>