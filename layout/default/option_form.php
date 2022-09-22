<table class="toolbar" cellspacing="0" cellpadding="0" width="95%" align="center">
	<tr height="10">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/tl.png"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/tc.png"></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/tr.png"></td>
	</tr>
	<tr height="30">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/lc.png" width="10" height="30"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png" align="center" valign="middle"><b><?=$lang[menu_option]?></b></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/rc.png" width="10" height="30"></td>
	</tr>
	<tr>
		<td width="10" background="layout/<?=$hard_data[skin]?>/images/sidebar/lc.png">&nbsp;</td>
		<td valign="middle" align="center" style="padding: 3px"><br>
			<?=$lang[explain_options]?><br><br>
		</td>
		<td width="10" background="layout/<?=$hard_data[skin]?>/images/sidebar/rc.png">&nbsp;</td>
	</tr>
	<tr height="10">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/bl.png"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/bc.png"></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/br.png"></td>
	</tr>
</table>

<br>
<table class="toolbar" cellspacing="0" cellpadding="0" width="95%" align="center">
	<tr height="10">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/tl.png"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/tc.png"></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/tr.png"></td>
	</tr>
	<tr height="30">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/lc.png" width="10" height="30"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png" align="center" valign="middle"><b><?=$lang[title_change_password]?></b></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/rc.png" width="10" height="30"></td>
	</tr>
	<tr>
		<td width="10" background="layout/<?=$hard_data[skin]?>/images/sidebar/lc.png">&nbsp;</td>
		<td valign="middle" align="center" style="padding: 3px"><br>
			<table><form action="index.php?mode=option" method="POST">
			<tr><td align="right"><?=$lang[label_old_password]?>&nbsp;:&nbsp;</td><td><input type="password" name="old_password"></td></tr>
			<tr><td align="right"><?=$lang[label_new_password]?>&nbsp;:&nbsp;</td><td><input type="password" name="password"></td></tr>
			<tr><td align="right"><?=$lang[label_repeat_new_password]?>&nbsp;:&nbsp;</td><td><input type="password" name="password2"></td></tr>
			<tr><td colspan="2" align="center"><input type="hidden" name="modify" value="password"><input type="submit" value="<?=$lang[button_change_password]?>"></td></tr>
			</form></table><br>
		</td>
		<td width="10" background="layout/<?=$hard_data[skin]?>/images/sidebar/rc.png">&nbsp;</td>
	</tr>
	<tr height="10">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/bl.png"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/bc.png"></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/br.png"></td>
	</tr>
</table>

<br>
<table class="toolbar" cellspacing="0" cellpadding="0" width="95%" align="center">
	<tr height="10">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/tl.png"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/tc.png"></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/tr.png"></td>
	</tr>
	<tr height="30">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/lc.png" width="10" height="30"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png" align="center" valign="middle"><b><?=$lang[title_profile]?></b></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/rc.png" width="10" height="30"></td>
	</tr>
	<tr>
		<td width="10" background="layout/<?=$hard_data[skin]?>/images/sidebar/lc.png">&nbsp;</td>
		<td valign="middle" align="center" style="padding: 3px"><br>
			<table><form action="index.php?mode=option" method="POST">
				<tr><td align="right"><?=$lang[label_name]?>&nbsp;:&nbsp;</td><td><input type="textbox" name="name" size="40" value="<?=$member_data[name]?>"></td></tr>
				<tr><td align="right"><?=$lang[label_email]?>&nbsp;:&nbsp;</td><td><input type="textbox" name="email" size="40" value="<?=$member_data[email]?>"></td></tr>
				<tr><td colspan="2" align="center"><input type="hidden" name="modify" value="name"><input type="submit" value="<?=$lang[button_save_profile]?>"></td></tr>
			</form></table><br>
		</td>
		<td width="10" background="layout/<?=$hard_data[skin]?>/images/sidebar/rc.png">&nbsp;</td>
	</tr>
	<tr height="10">
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/bl.png"></td>
		<td background="layout/<?=$hard_data[skin]?>/images/sidebar/bc.png"></td>
		<td width="10"><img src="layout/<?=$hard_data[skin]?>/images/sidebar/br.png"></td>
	</tr>
</table>