<?

	if(!eregi($HTTP_HOST,$HTTP_REFERER)) { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> $lang[message_access_error]</span>";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}
	if(!eregi("index.php",$HTTP_REFERER)) { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> $lang[message_access_error]</span>";
		include "layout/$hard_data[skin]/layout_bottom.php";
	exit;}

	// 디렉토리를 검사하고 없으면 만들기
	if(!is_dir("data/$member_data[user_id]")) { 
		@mkdir("data/$member_data[user_id]",0777);
		@chmod("data/$member_data[user_id]",0706);
	}

	$upload_user_id = $member_data[user_id];
	// data 디렉토리에서 디렉토리를 구함
	function folder_list() {
	global $bfolder, $bifolder, $upload_user_id;
		$data_dir="data/".$upload_user_id."/$bfolder";
		$handle=opendir($data_dir);
		while ($data_info = readdir($handle)) {
			if(!eregi("\.",$data_info)) {
				echo"<a href=\"index.php?mode=upload&filepath=/$upload_user_id$bfolder/$data_info\" class=\"folder\"><img src=\"layout/scac/images/folder.png\" border=\"0\" align=\"absmiddle\"> /$data_info/</a>&nbsp;<a href=\"index.php?mode=upload&select=folder&bfolder=$bfolder/$data_info&bifolder=$bfolder\">[하위폴더]</a><br />";
				
			} 
		} echo "<p><a href=\"http://www.hozz.net/scac_hard/index.php?mode=upload\">Main</a>";
		if($bfolder) echo "　<a href=\"index.php?mode=upload&select=folder&bfolder=$bifolder\"><u>Back</u></a>";
		echo "<br />";
		closedir($handle);
	}
?>