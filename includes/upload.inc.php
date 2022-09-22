<?
	if(!eregi($HTTP_HOST,$HTTP_REFERER)) { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_access_error]</span>";
		include "layout/$hard_data[skin]/layout_bottom.php"; exit;}
	if(!eregi("index.php",$HTTP_REFERER)) { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> $lang[message_access_error]</span>";
		include "layout/$hard_data[skin]/layout_bottom.php"; exit;}

	if($infolder) {

		$result = mysql_query("select * from scac_filedata_table WHERE user='$member_data[user_id]' order by no desc");
		while($rows = mysql_fetch_array($result)) {
			$totalsize += $rows[filesize];
		}
		$totalsize = round($totalsize/1024/1024,2);
		if($member_data[quota]<=$totalsize&&!$member_data[quota]==0)
			{echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> 용량초과로 업로드가 불가합니다</span><br />";
			include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php"; include "layout/$hard_data[skin]/layout_bottom.php";exit;}

		if($HTTP_POST_FILES[fupload1]) {
		$file1 = $HTTP_POST_FILES[fupload1][tmp_name];
		$file1_name = $HTTP_POST_FILES[fupload1][name];
		$file1_size = $HTTP_POST_FILES[fupload1][size];
		$file1_type = $HTTP_POST_FILES[fupload1][type];
		}
		if($HTTP_POST_FILES[fupload2]) {
		$file2 = $HTTP_POST_FILES[fupload2][tmp_name];
		$file2_name = $HTTP_POST_FILES[fupload2][name];
		$file2_size = $HTTP_POST_FILES[fupload2][size];
		$file2_type = $HTTP_POST_FILES[fupload2][type];
		}
		if($HTTP_POST_FILES[fupload3]) {
		$file3 = $HTTP_POST_FILES[fupload3][tmp_name];
		$file3_name = $HTTP_POST_FILES[fupload3][name];
		$file3_size = $HTTP_POST_FILES[fupload3][size];
		$file3_type = $HTTP_POST_FILES[fupload3][type];
		}
		if($HTTP_POST_FILES[fupload4]) {
		$file4 = $HTTP_POST_FILES[fupload4][tmp_name];
		$file4_name = $HTTP_POST_FILES[fupload4][name];
		$file4_size = $HTTP_POST_FILES[fupload4][size];
		$file4_type = $HTTP_POST_FILES[fupload4][type];
		}
		if($HTTP_POST_FILES[fupload5]) {
		$file5 = $HTTP_POST_FILES[fupload5][tmp_name];
		$file5_name = $HTTP_POST_FILES[fupload5][name];
		$file5_size = $HTTP_POST_FILES[fupload5][size];
		$file5_type = $HTTP_POST_FILES[fupload5][type];
		}

		$file_num = $hard_data[file_num]+1;
		######## fupload1 부분 관리 ########
		if($file1_size>0&&$fupload1) {
			if($hard_data[max_upload_size]<$file1_size) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> <b>File1</b> '$file1_name' $lang[message_size_out]</span><br />";
			include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php"; include "layout/$hard_data[skin]/layout_bottom.php";exit;}

			// 디렉토리를 검사함
			if(!is_dir("data$infolder")) { 
			@mkdir("data$infolder",0777);
			@chmod("data$infolder",0706);
			}

			//실제 업로드
			if(!file_exists("data$infolder$file1_name")) {
				if(!move_uploaded_file($file1,"data$infolder".$file1_name)) {echo "파일 1 좆됨";}
				mysql_query("insert into scac_filedata_table (no,filename,r_filename,filesize,filetype,user) value ('$file_num','$file1_name','$infolder','$file1_size','$file1_type','$member_data[user_id]')");
				mysql_query("update scac_admin_table set file_num='$file_num'");
				$file_num = $file_num+1; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File1</b> '$file1_name' $lang[message_success_upload]</span><br />";
			} else { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File1</b> '$file1_name' $lang[message_already_exists]</span><br />";}
		}

		######## fupload2 부분 관리 ########
		if($file2_size>0&&$fupload2) {
			if($hard_data[max_upload_size]<$file2_size) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> <b>File2</b> '$file2_name' $lang[message_size_out]</span><br />";
			include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php";exit;}

			// 디렉토리를 검사함
			if(!is_dir("data$infolder")) { 
			@mkdir("data$infolder",0777);
			@chmod("data$infolder",0706);
			}

			//실제 업로드
			if(!file_exists("data$infolder$file2_name")) {
				if(!move_uploaded_file($file2,"data$infolder".$file2_name)) {echo "파일 2 좆됨";}
				mysql_query("insert into scac_filedata_table (no,filename,r_filename,filesize,filetype,user) value ('$file_num','$file2_name','$infolder','$file2_size','$file2_type','$member_data[user_id]')");
				mysql_query("update scac_admin_table set file_num='$file_num'");
				$file_num = $file_num+1; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File2</b> '$file2_name' $lang[message_success_upload]</span><br />";
			} else { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File2</b> '$file2_name' $lang[message_already_exists]</span><br />";}
		}

		######## fupload3 부분 관리 ########
		if($file3_size>0&&$fupload3) {
			if($hard_data[max_upload_size]<$file3_size) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> <b>File3</b> '$file3_name' $lang[message_size_out]</span><br />";
			include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php";exit;}

			// 디렉토리를 검사함
			if(!is_dir("data$infolder")) { 
			@mkdir("data$infolder",0777);
			@chmod("data$infolder",0706);
			}

			//실제 업로드
			if(!file_exists("data$infolder$file3_name")) {
				if(!move_uploaded_file($file3,"data$infolder".$file3_name)) {echo "파일 3 좆됨";}
				mysql_query("insert into scac_filedata_table (no,filename,r_filename,filesize,filetype,user) value ('$file_num','$file3_name','$infolder','$file3_size','$file3_type','$member_data[user_id]')");
				mysql_query("update scac_admin_table set file_num='$file_num'");
				$file_num = $file_num+1; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File3</b> '$file3_name' $lang[message_success_upload]</span><br />";
			} else { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File3</b> '$file3_name' $lang[message_already_exists]</span><br />";}
		}

		######## fupload4 부분 관리 ########
		if($file4_size>0&&$fupload4) {
			if($hard_data[max_upload_size]<$file4_size) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> <b>File4</b> '$file4_name' $lang[message_size_out]</span><br />";
			include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php";exit;}

			// 디렉토리를 검사함
			if(!is_dir("data$infolder")) { 
			@mkdir("data$infolder",0777);
			@chmod("data$infolder",0706);
			}

			//실제 업로드
			if(!file_exists("data$infolder$file4_name")) {
				if(!move_uploaded_file($file4,"data/$infolder".$file4_name)) {echo "파일 4 좆됨";}
				mysql_query("insert into scac_filedata_table (no,filename,r_filename,filesize,filetype,user) value ('$file_num','$file4_name','$infolder','$file4_size','$file4_type','$member_data[user_id]')");
				mysql_query("update scac_admin_table set file_num='$file_num'");
				$file_num = $file_num+1; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File4</b> '$file4_name' $lang[message_success_upload]</span><br />";
			} else { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File4</b> '$file4_name' $lang[message_already_exists]</span><br />";}
		}

		######## fupload5 부분 관리 ########
		if($file5_size>0&&$fupload5) {
			if($hard_data[max_upload_size]<$file5_size) {echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/error.png\" align=\"absmiddle\"> <b>File5</b> '$file5_name' $lang[message_size_out]</span>";
			include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php";exit;}

			// 디렉토리를 검사함
			if(!is_dir("data$infolder")) { 
			@mkdir("data$infolder",0777);
			@chmod("data$infolder",0706);
			}

			//실제 업로드
			if(!file_exists("data$infolder$file5_name")) {
				if(!move_uploaded_file($file5,"data$infolder".$file5_name)) {echo "파일 5 좆됨";}
				mysql_query("insert into scac_filedata_table (no,filename,r_filename,filesize,filetype,user) value ('$file_num','$file1_name','$infolder','$file5_size','$file5_type','$member_data[user_id]')");
				mysql_query("update scac_admin_table set file_num='$file_num'");
				$file_num = $file_num+1; echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File5</b> '$file5_name' $lang[message_success_upload]</span>";
			} else { echo "<span class=\"toolbarimgtd\"><img src=\"layout/$hard_data[skin]/images/info.png\" align=\"absmiddle\"> <b>File5</b> '$file5_name' $lang[message_already_exists]</span>";}
		}
		include "includes/file_list.inc.php"; include "layout/$hard_data[skin]/file_list.php"; include "layout/$hard_data[skin]/layout_bottom.php"; exit;
	}
?>