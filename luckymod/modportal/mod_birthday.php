<?php


/***************************************************************************
 *                                mod_birthday.php
 *                            -------------------
 *   fait le                : Samedi,18 Avril, 2004
 *   Par : gigaboss - elias_chedid@hotmail.com - http://www.gigaboss-leforum.fr.st
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
   'body' => $phpbb_root_path . '/templates/' . $theme['template_name'] . '/modportal/mod_birthday.tpl')
);
// Birthday Mod, Show users with birthday 
$sql = ($board_config['birthday_check_day']) ? "SELECT user_id, username, user_birthday,user_level,user_whosonline_color FROM " . USERS_TABLE. " WHERE user_birthday!=999999 ORDER BY username" :"";
if($result = $db->sql_query($sql)) 
{ 
	if (!empty($result)) 
	{ 
		$time_now = time();
		$this_year = create_date('Y', $time_now, $board_config['board_timezone']);
		$date_today = create_date('Ymd', $time_now, $board_config['board_timezone']);
		$date_forward = create_date('Ymd', $time_now+($board_config['birthday_check_day']*86400), $board_config['board_timezone']);
	      while ($birthdayrow = $db->sql_fetchrow($result))
		{ 
usleep(2);
		      $user_birthday2 = $this_year.($user_birthday = realdate("md",$birthdayrow['user_birthday'] )); 
      		if ( $user_birthday2 < $date_today ) $user_birthday2 += 10000;
			if ( $user_birthday2 > $date_today  && $user_birthday2 <= $date_forward ) 
			{ 
				// user are having birthday within the next days
				$user_age = ( $this_year.$user_birthday < $date_today ) ? $this_year - realdate ('Y',$birthdayrow['user_birthday'])+1 : $this_year- realdate ('Y',$birthdayrow['user_birthday']); 
				switch ($birthdayrow['user_level'])
							{
								case ADMIN :
									$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
									$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
									break;
								case MOD :
									$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
									$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
									break;
								default:
									$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
									$style_color = '';
									break;
							}
							if ( $birthdayrow['user_whosonline_color'] )
							{
								$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
								$style_color = 'style="color:' . $id_color[$birthdayrow[user_whosonline_color]] . '"';
							}
							else if ( $user_group_color[$birthdayrow['user_id']] )
							{
								$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
								$style_color = 'style="color:' . $user_group_color[$birthdayrow['user_id']] . '"';
							}
				$birthday_week_list .= ' <a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $birthdayrow['user_id']) . '"' . $style_color .'>' . $birthdayrow['username'] . ' ('.$user_age.')</a>,'; 
			} else if ( $user_birthday2 == $date_today ) 
      		{ 
				//user have birthday today 
				$user_age = $this_year - realdate ( 'Y',$birthdayrow['user_birthday'] ); 
				switch ($birthdayrow['user_level'])
							{
								case ADMIN :
									$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
									$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
									break;
								case MOD :
									$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
									$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
									break;
								default:
									$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
									$style_color = '';
									break;
							}
							if ( $birthdayrow['user_whosonline_color'] )
							{
								$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
								$style_color = 'style="color:' . $id_color[$birthdayrow[user_whosonline_color]] . '"';
							}
							else if ( $user_group_color[$birthdayrow['user_id']] )
							{
								$birthdayrow['username'] = '<b>' . $birthdayrow['username'] . '</b>';
								$style_color = 'style="color:' . $user_group_color[$birthdayrow['user_id']] . '"';
							}
							$birthday_today_list .= ' <a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $birthdayrow['user_id']) . '"' . $style_color .'>' . $birthdayrow['username'] . ' ('.$user_age.')</a>,';
						}
			         
					}
		if ($birthday_today_list) $birthday_today_list[ strlen( $birthday_today_list)-1] = ' ';
		if ($birthday_week_list) $birthday_week_list[ strlen( $birthday_week_list)-1] = ' ';
	} 
	$db->sql_freeresult($result);
}
$template_mod->assign_vars( array(
		'L_WHOSBIRTHDAY_WEEK' => ($board_config['birthday_check_day']>1) ? sprintf((($birthday_week_list) ? $lang['Birthday_week'].$birthday_week_list : $lang['Nobirthday_week']), $board_config['birthday_check_day']) : '',
		'L_WHOSBIRTHDAY_TODAY' => ($board_config['birthday_check_day']) ? ($birthday_today_list) ? $lang['Birthday_today'].$birthday_today_list : $lang['Nobirthday_today'] : '',)
);

$modvar = $template_mod->pparse_mod('body');
?>