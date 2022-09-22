<table class='toolbar' cellspacing='0' cellpadding='0' width='50%' align='center'>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/tc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tr.png'></td>
	</tr>
	<tr height='30'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png' width='10' height='30'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png' align='center' valign='middle'><b><?=$lang[menu_join]?></b></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png' width='10' height='30'></td>
	</tr>
	<tr>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png'>&nbsp;</td>
		<td valign='middle' align='center'><br><br>
			<?=$lang[explain_join]?><br><br>
			<form action="index.php?mode=join" method="POST">
			<input type="hidden" name="check" value="join">
			<table>
			<tr><td align="right"><?=$lang[label_user_id]?>&nbsp;:&nbsp;</td><td><input type='textbox' name='user_id'></td></tr>
			<tr><td align="right"><?=$lang[label_password]?>&nbsp;:&nbsp;</td><td><input type='password' name='password'></td></tr>
			<tr><td align="right"><?=$lang[label_password2]?>&nbsp;:&nbsp;</td><td><input type='password' name='password2'></td></tr>
			<tr><td align="right"><?=$lang[label_name]?>&nbsp;:&nbsp;</td><td><input type="textbox" name="name"></td></tr>
			<tr><td align="right"><?=$lang[label_email]?>&nbsp;:&nbsp;</td><td><input type="textbox" name="email"></td></tr>
			<tr><td colspan='2' align='center'><input type="hidden" name="check" value="join"><input type='submit' value='<?=$lang[button_join]?>'></td></tr>
			</table>
			</form>
		</td>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png'>&nbsp;</td>
	</tr>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/bl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/bc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/br.png'></td>
	</tr>
</table>