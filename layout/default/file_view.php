<table width="100%" align="center">
    <tr>
        <td width="250"><table class='toolbar' cellspacing='0' cellpadding='0' width='100%' align='center'>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/tc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tr.png'></td>
	</tr>
	<tr height='30'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png' width='10' height='30'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png' align='center' valign='middle'><b><?=$lang[title_view_method]?></b></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png' width='10' height='30'></td>
	</tr>
	<tr>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png'>&nbsp;</td>
		<td valign='middle' align='center'><br>모드<br><br> </td>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png'>&nbsp;</td>
	</tr>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/bl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/bc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/br.png'></td>
	</tr>
</table></td>
        <td rowspan=3 valign='top'><table class='toolbar' cellspacing='0' cellpadding='0' width='100%' align='center'>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/tc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tr.png'></td>
	</tr>
	<tr height='30'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png' width='10' height='30'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png' align='center' valign='middle'><?=$file_data[r_filename]?><b><?=$file_data[filename]?></b></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png' width='10' height='30'></td>
	</tr>
	<tr>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png'>&nbsp;</td>
		<td align='center'><br>파일명 : <?=$file_data[filename]?><br></td>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png'>&nbsp;</td>
	</tr>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/bl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/bc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/br.png'></td>
	</tr>
</table></td>
    </tr>
    <tr>
        <td width="250"><table class='toolbar' cellspacing='0' cellpadding='0' width='100%' align='center'>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/tc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tr.png'></td>
	</tr>
	<tr height='30'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png' width='10' height='30'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png' align='center' valign='middle'><b><?=$lang[title_quota]?></b></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png' width='10' height='30'></td>
	</tr>
	<tr>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png'>&nbsp;</td>
		<td valign='middle' align='center'><br><? $size=dir_size(); ?><br><br> </td>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png'>&nbsp;</td>
	</tr>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/bl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/bc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/br.png'></td>
	</tr>
</table></td>
    </tr>
    <tr>
        <td width="250"><table class='toolbar' cellspacing='0' cellpadding='0' width='100%' align='center'>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/tc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/tr.png'></td>
	</tr>
	<tr height='30'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png' width='10' height='30'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/titlebg.png' align='center' valign='middle'><b><?=$lang[title_folder]?></b></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png' width='10' height='30'></td>
	</tr>
	<tr>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/lc.png'>&nbsp;</td>
		<td valign='middle' align='center'><br><? @folder_list(); ?><br> </td>
		<td width='10' background='layout/<?=$hard_data[skin]?>/images/sidebar/rc.png'>&nbsp;</td>
	</tr>
	<tr height='10'>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/bl.png'></td>
		<td background='layout/<?=$hard_data[skin]?>/images/sidebar/bc.png'></td>
		<td width='10'><img src='layout/<?=$hard_data[skin]?>/images/sidebar/br.png'></td>
	</tr>
</table></td>
    </tr>
</table>