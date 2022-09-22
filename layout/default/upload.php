<script type="text/javascript">
new_win = 0;

function popUP(mypage, myname, w, h, scroll, titlebar) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable'
	new_win = window.open(mypage, myname, winprops)
	if (parseInt(navigator.appVersion) >= 4) {
		new_win.window.focus();
	}
}

function ClosePopup() {
if(new_win) {
new_win.close();
new_win = 0;
}
}
</script>
<body onunload="ClosePopup();">
<table class='toolbar' cellspacing='0' cellpadding='0' width='75%' align='center'>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/tc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tr.png'></td>
	</tr>
	<tr height='30'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png' width='10' height='30'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png' align='center' valign='middle'><b><?=$lang[menu_upload]?></b></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png' width='10' height='30'></td>
	</tr>
	<tr>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png'>&nbsp;</td>
		<td valign='middle' align='center'><br><br>
			<table>
			<tr><td align='center' colspan='2'>
			<?=$lang[explain_upload]?><br><br>
			<form action='index.php?mode=upload&select=folder' method='POST'>
			<?=$lang[label_uploading_to]?> : <? if(!$filepath) {echo "/$member_data[user_id]";} else { echo "$filepath"; } ?>/ &nbsp; <input type='submit' value='<?=$lang[button_change_folder]?>'>
			</form>
			<br><br>
			</td></tr>
			<form action='index.php?mode=upload' method='POST' enctype='multipart/form-data' name='uploadform'>
			<tr>
			<td align='center'>
				<input type='file' name='fupload1' value=''><br>
				<input type='file' name='fupload2' value=''><br>
				<input type='file' name='fupload3' value=''><br>
				<input type='file' name='fupload4' value=''><br>
				<input type='file' name='fupload5' value=''><br>
			</td>
			<td align='center'>
				<input type='hidden' name='infolder' value='<? if(!$filepath) {echo "/$member_data[user_id]";} else { echo "$filepath"; } ?>/'><input type='submit' value='<?=$lang[button_upload]?>' onClick="popUP('upload_direction.php','uploadwin',350,200,false,false);">
			</td>
			</tr>
			</form>
			</table><br>
		</td>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png'>&nbsp;</td>
	</tr>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/bl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/bc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/br.png'></td>
	</tr>
</table>