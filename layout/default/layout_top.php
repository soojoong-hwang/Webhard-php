<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title><?=$hard_data[title] ?><? if($menu_name) {?> :: <?=$title ?><? } ?></title>
<link rel='stylesheet' type='text/css' title='Style' href='layout/<?=$hard_data[skin] ?>/style.css' />
</head>

<body>
<table width='100%' height='100%' align='center' cellspacing='0' cellpadding='0'>
    <tr height="71">
        <td background="layout/<?=$hard_data[skin] ?>/images/topbarbgt.png" style="background-repeat: repeat-x;" class="toptitle" valign="middle"><? if(!$member_data[no]) {echo "guest";} else { echo "$member_data[user_id]";} ?> @ <?=$hard_data[title] ?></td>
    </tr>
    <tr height="29">
        <td background="layout/<?=$hard_data[skin] ?>/images/topbarbgb.png" valign="middle" style="background-repeat: repeat-x;" class="toolbarimgtd"><? if(!$HTTP_SESSION_VARS["sc_logged_no"]) { ?><a href="index.php"><img src="layout/<?=$hard_data[skin] ?>/images/main.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_index] ?></a>&nbsp;&nbsp;<a href="index.php?mode=login"><img src="layout/<?=$hard_data[skin] ?>/images/login.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_login] ?></a>&nbsp;&nbsp;<a href="index.php?mode=join"><img src="layout/<?=$hard_data[skin] ?>/images/signup.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_join] ?></a>&nbsp;&nbsp;<a href="index.php?mode=lostid"><img src="layout/<?=$hard_data[skin] ?>/images/passreset.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_lostid] ?></a><? } else { ?><a href="index.php"><img src="layout/<?=$hard_data[skin] ?>/images/main.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_index] ?></a>&nbsp;&nbsp;<a href="index.php?mode=logout"><img src="layout/<?=$hard_data[skin] ?>/images/logout.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_logout]?></a>&nbsp;&nbsp;<a href="index.php?mode=upload"><img src="layout/<?=$hard_data[skin] ?>/images/upload.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_upload]?></a>&nbsp;&nbsp;<a href="index.php?mode=addfolder"><img src="layout/<?=$hard_data[skin] ?>/images/addfolder.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_addfolder]?></a>&nbsp;&nbsp;<a href="index.php?mode=option"><img src="layout/<?=$hard_data[skin] ?>/images/option.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_option]?></a><? } if($member_data[no]==1) { ?>&nbsp;&nbsp;<a href="index.php?mode=admin"><img src="layout/<?=$hard_data[skin] ?>/images/option.png" border="0" align="absmiddle">&nbsp;<?=$lang[menu_admin]?></a><? } ?></td>
    </tr>
    <tr>
        <td height="100%"><br />