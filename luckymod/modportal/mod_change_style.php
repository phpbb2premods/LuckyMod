<?php

/***************************************************************************
 *                                mod_change_style.php
 *                            -------------------
 *   fait le                : Dimanche,3 Aout, 2003
 *   Par : giefca - giefca@hotmail.com - http://www.gf-phpbb.fr.st
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   Minimodule à intégrer dans un Gf-Portail
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') and ( isset($HTTP_POST_VARS['cstyle']) ) )
{
	define('IN_PHPBB', true);
	$phpbb_root_path = '../';
	include($phpbb_root_path . 'extension.inc');
	include($phpbb_root_path . 'common.'.$phpEx);
	
	$userdata = session_pagestart($user_ip, PAGE_INDEX);
	init_userprefs($userdata);
	
	$newstyle = intval($HTTP_POST_VARS['cstyle']);
	if ( $newstyle != $userdata['user_style'] )
	{
		$sql = "UPDATE " . USERS_TABLE . " SET user_style = '$newstyle' WHERE user_id = '" . $userdata['user_id'] . "'" ;

		if(!($result = $db->sql_query($sql)))
		{
			message_die(GENERAL_ERROR, 'Could not update user\'s theme', '', __LINE__, __FILE__, $sql);
		}
	 }		
	 $header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";
	 header($header_location . append_sid( $phpbb_root_path . "portal.$phpEx", true));
	 exit;
}

if (( !$userdata['session_logged_in'] ) or ( $board_config['override_user_style'] ) )
{
	return ;
}

//chargement du template
$template_mod->set_filenames(array(
   'body' => $phpbb_root_path . '/templates/' . $theme['template_name'] . '/modportal/mod_change_style.tpl')
);

$sql = "SELECT themes_id, style_name FROM " . THEMES_TABLE . 
		" ORDER BY style_name ASC " ;

if(!($result = $db->sql_query($sql)))
{
	message_die(GENERAL_ERROR, 'Could not query themes information', '', __LINE__, __FILE__, $sql);
}

$liste_styles = "" ;

if ( $row = $db->sql_fetchrow( $result ) )
{
	do
	{
		$selected = ( $row['themes_id'] == $userdata['user_style'] ) ? "selected" : "" ;
		$liste_styles .= "<option value='" . $row['themes_id'] . "' $selected >" . $row['style_name'] . "</ option>" ;
	}
	while ( $row = $db->sql_fetchrow( $result ) );
}
else
{
	return ;
}

$template_mod->assign_vars( array(
	'L_STYLE' => $lang['Title_styles'],
	'S_STYLES' => $liste_styles,
	'S_ACTION' =>  append_sid("modportal/mod_change_style.$phpEx"),
	'L_CHG_STYLE' => $lang['But_change_style'] )
);
	
$modvar = $template_mod->pparse_mod('body');

?>