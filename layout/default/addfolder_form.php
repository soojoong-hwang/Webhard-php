<table class='toolbar' cellspacing='0' cellpadding='0' width='50%' align='center'>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/tc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tr.png'></td>
	</tr>
	<tr height='30'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png' width='10' height='30'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png' align='center' valign='middle'><b><?=$lang[title_add_folder]?></b></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png' width='10' height='30'></td>
	</tr>
	<tr>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png'>&nbsp;</td>
		<td valign='middle' align='center'><br><br>

			
			
			<table>
			<tr><td align='center' colspan='2'>
			<?=$lang[explain_add_folder]?><br><br>
			<form action='index.php?mode=addfolder&select=folder' method='POST'>
			<?=$lang[label_create_in]?>&nbsp;:&nbsp;<? if(!$folderpath) {echo "/$member_data[user_id]";} else { echo "$folderpath"; } ?>/ <input type='submit' value='<?=$lang[button_change_folder]?>'>
			</form>
			<br><br>
			</td></tr>
			<form action='index.php?mode=addfolder' method='POST'>
			<tr>
			<td align='center'>
				<?=$lang[label_folder_name]?>&nbsp;:&nbsp;<input type='textbox' name='new_folder'>
			</td>
			<td align='center'>
				 <input type='hidden' name='infolder' value='<? if(!$folderpath) {echo "/$member_data[user_id]";} else { echo "$folderpath"; } ?>/'><input type='submit' value='<?=$lang[button_add_folder]?>'>
			</td>
			</tr>
			</form>
			</table>
		<br></td>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png'>&nbsp;</td>
	</tr>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/bl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/bc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/br.png'></td>
	</tr>
</table>