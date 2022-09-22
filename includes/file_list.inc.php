<?
	if(!$page) $page = 1;
	$num_per_page = $hard_data[f_num];

	$row = mysql_fetch_row(mysql_query("select count(*) from scac_filedata_table where user='$member_data[user_id]'"));
	$total_record = $row[0];

	$offset = $num_per_page*($page-1);

	$page_num = 10; //페이지 수 나중에 고침!

	$total_page = ceil($total_record/$num_per_page);
	$total_block = ceil($total_page/$page_num);
	$block=ceil($page/$page_num);
	$first=($block-1)*$page_num;
	$last=$block*$page_num;

	if($block >= $total_block) {
		$last = $total_page;
	}
	//$article_num = $total_record - $num_per_page*($page-1);

	$result = mysql_query("select * from scac_filedata_table where user='$member_data[user_id]' order by no desc limit $offset, $num_per_page");

	function file_list() { echo "<table width=100% cellpadding=5><tr><td width=1%></td><td width=64% align=left></td><td width=25%></td><td width=10% align=left></td></tr>";
		global $result, $page_num, $total_page, $total_block, $block, $first, $last, $page;

	echo "<tr><td colspan=4>";
	if($block > 1) {
		$prev=$first-1;
		echo "<a href=index.php?page=1>[처음]</a>&nbsp;";
		echo "<a href=index.php?page=$prev>[".$page_num."개 앞으로]</a>&nbsp;";
	}
	if($page > 1) {
		$go_page=$page-1;
		echo "<a href=index.php?page=$go_page>[이전]</a>&nbsp;";
	}
	for ($page_link=$first+1;$page_link<=$last;$page_link++) {
		if($page_link==$page) {
			echo "<font color=green><b>$page_link</b></font>&nbsp;";
		} else {
			echo "<a href=index.php?page=$page_link>[$page_link]</a>&nbsp;";
		}
	}
	if($total_page > $page) {
		$go_page=$page+1;
		echo "&nbsp;<a href=index.php?page=$go_page>[다음]</a>&nbsp;";
	}
	if($block < $total_block) {
		$next = $last+1;
		echo "<a href=index.php?page=$next>[".$page_num."개 뒤로]</a>&nbsp;";
		echo "<a href=index.php?page=$total_page>[마지막]</a>";
	}

		while($rows = mysql_fetch_array($result)) {
		$rows[filesize] = round($rows[filesize]/1024/1024,2);
		echo "<tr height=20><td></td><td align=left><a href=index.php?mode=viewfile&no=$rows[no] title=$rows[r_filename]>$rows[filename]</a></td><td >$rows[filetype]</td><td align=left>$rows[filesize] MB</td></tr>";
		}
	echo "</td></tr></table>";
	}

	$account = $member_data[user_id];
	$quota = $member_data[quota];
	$explain_quota = $lang[explain_quota];
	function dir_size() {
		global $account, $quota, $explain_quota;
		$result = mysql_query("select * from scac_filedata_table WHERE user='$account' order by no desc");
		while($rows = mysql_fetch_array($result)) {
			$totalsize += $rows[filesize];
		}
		$totalsize = round($totalsize/1024/1024,2);
		echo "".$totalsize." MB / ".$quota." MB";
	}

	function folder_list() {
		$data_dir="data";
		$handle=opendir($data_dir); echo "<table width=50%>";
		while ($data_info = readdir($handle)) {
			if(!eregi("\.",$data_info)) {
				echo"<tr height=15><td align=left><a href=\"index.php?filepath=$data_info\" class=\"folder\"><img src=\"layout/scac/images/folder.png\" border=\"0\" align=\"absmiddle\"> /$data_info/</a></td></tr>";
				
			} 
		} echo "</table>"; closedir($handle);
	}
?>
