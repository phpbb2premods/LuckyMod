<?php

/***************************************************************************
 *                                mod_lastvisite.php
 *                            -------------------
 *   fait le                : Samedi,11 Octobre, 2003
 *   Par : sjpphpbb - sjpdivx_fr@hotmail.com - http://sjpphpbb.net
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   Minimodule à intégrer dans un Gf-Portail
 *
 ***************************************************************************/


if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

//chargement du template
$template_mod->set_filenames(array(
   'body' => $phpbb_root_path . '/templates/' . $theme['template_name'] . '/modportal/mod_lastvisite.tpl')
);


//show dayly users mod 
$time_now=time();
$time1Hour=$time_now-3600;
$minutes = date('is', $time_now);
$hour_now = $time_now - (60*($minutes[0].$minutes[1])) - ($minutes[2].$minutes[3]); 
$dato=create_date('H', $time_now,$board_config['board_timezone']);
$timetoday = $hour_now - (3600*$dato); 
$sql = 'SELECT session_ip, MAX(session_time) as session_time FROM '.SESSIONS_TABLE.' WHERE session_user_id="'.ANONYMOUS.'" AND session_time >= '.$timetoday.' AND session_time< '.($timetoday+86399).' GROUP BY session_ip';
if (!$result = $db->sql_query($sql)) message_die(GENERAL_ERROR, "Couldn't retrieve guest user today data", "", __LINE__, __FILE__, $sql); 
while( $guest_list = $db->sql_fetchrow($result))
{ 
	if ($guest_list['session_time'] >$time1Hour) $users_lasthour++;
}
$guests_today = $db->sql_numrows($result);
$sql = 'SELECT user_id,username,user_allow_viewonline,user_level,user_lastlogon,user_whosonline_color FROM ' . USERS_TABLE . ' WHERE user_id!="'.ANONYMOUS.'" AND user_session_time >= '.$timetoday.' AND user_session_time< '.($timetoday+86399).' ORDER BY username'; 
if (!$result = $db->sql_query($sql)) message_die(GENERAL_ERROR, "Couldn't retrieve user today data", "", __LINE__, __FILE__, $sql); 
while( $todayrow = $db->sql_fetchrow($result)) 
{ 
	$style_color = ""; 
		if ($todayrow['user_lastlogon']>=$time1Hour)
		{
			$users_lasthour++;
		}
		if ( $user_group_color[$todayrow['user_id']] )
		{
			$todayrow['username'] = '<b>' . $todayrow['username'] . '</b>';
			$style_color .= 'style="color:' . $user_group_color[$todayrow['user_id']] . '"';
		}
		switch ($todayrow['user_level'])
		{
			case ADMIN :
				$todayrow['username'] = '<b>' . $todayrow['username'] . '</b>'; 
				$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
				break;
			case MOD :
				$todayrow['username'] = '<b>' . $todayrow['username'] . '</b>'; 
				$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
				break;
		}
		if ( $todayrow['user_whosonline_color'] )
		{
			$todayrow['username'] = '<b>' . $todayrow['username'] . '</b>';
			$style_color = 'style="color:' . $id_color[$todayrow[user_whosonline_color]] . '"';
		}
		else if ( $user_group_color[$todayrow['user_id']] )
							{
								$todayrow['username'] = '<b>' . $todayrow['username'] . '</b>';
								$style_color = 'style="color:' . $user_group_color[$todayrow['user_id']] . '"';
							}
 	$users_today_list.=( $todayrow['user_allow_viewonline'])?' <a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $todayrow['user_id']) . '"' . $style_color .'>' . $todayrow['username'] . '</a>,' : (($userdata[user_level]==ADMIN) ? ' <a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $todayrow['user_id']) . '"' . $style_color .'><i>' . $todayrow['username'] . '</i></a>,' : '');
	if (!$todayrow['user_allow_viewonline']) $logged_hidden_today++;
	else $logged_visible_today++;
}
if ($users_today_list) 
{
	$users_today_list[ strlen( $users_today_list)-1] = ' '; 
} else
{
	$users_today_list = $lang['None'];
}
$total_users_today = $db->sql_numrows($result)+$guests_today;

$users_today_list = $lang['Registered_users'].' ' . $users_today_list;
$l_today_user_s = ($total_users_today) ? ( ( $total_users_today == 1 )? $lang['User_today_total'] : $lang['Users_today_total'] ) : $lang['Users_today_zero_total'];
$l_today_r_user_s = ($logged_visible_today) ? ( ( $logged_visible_today == 1 ) ? $lang['Reg_user_total'] : $lang['Reg_users_total'] ) : $lang['Reg_users_zero_total'];
$l_today_h_user_s = ($logged_hidden_today) ? (($logged_hidden_today == 1) ? $lang['Hidden_user_total'] : $lang['Hidden_users_total'] ) : $lang['Hidden_users_zero_total'];
$l_today_g_user_s = ($guests_today) ? (($guests_today == 1) ? $lang['Guest_user_total'] : $lang['Guest_users_total']) : $lang['Guest_users_zero_total'];
$l_today_users = sprintf($l_today_user_s, $total_users_today);
$l_today_users .= sprintf($l_today_r_user_s, $logged_visible_today); 
$l_today_users .= sprintf($l_today_h_user_s, $logged_hidden_today); 
$l_today_users .= sprintf($l_today_g_user_s, $guests_today); 


$template_mod->assign_vars( array(
	'USERS_TODAY_LIST' => $users_today_list,
	'L_USERS_LASTHOUR' =>($users_lasthour)?sprintf($lang['Users_lasthour_explain'],$users_lasthour):$lang['Users_lasthour_none_explain'],
	'L_USERS_TODAY' =>$l_today_users)
);

$modvar = $template_mod->pparse_mod('body');

?>
