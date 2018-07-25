<?php
/***************************************************************************
 *                                index.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: index.php,v 1.99.2.3 2004/07/11 16:46:15 acydburn Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

$time_end = time();
define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/bbcode.'.$phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);
//
// End session management
//
// Arcade type 4
if( isset($HTTP_GET_VARS['act']) || isset($HTTP_POST_VARS['act']) )
{ 
   $arcade = ( isset($HTTP_POST_VARS['act']) ) ? $HTTP_POST_VARS['act'] : $HTTP_GET_VARS['act']; 
} 
else 
{ 
   $arcade = '';
} 

if( isset($HTTP_GET_VARS['do']) || isset($HTTP_POST_VARS['do']) ) 
{ 
   $newscore = ( isset($HTTP_POST_VARS['do']) ) ? $HTTP_POST_VARS['do'] : $HTTP_GET_VARS['do']; 
} 
else 
{ 
   $newscore = ''; 
} 

if( ($arcade == 'Arcade') && ($newscore == 'newscore') )
{ 
 if (isset($HTTP_POST_VARS['gamesessid']) )
   {
      $gamesessid = $HTTP_POST_VARS['gamesessid'];
      if (!preg_match('/^[A-Za-z0-9]*$/', $gamesessid))
      {
         $gamesessid = '';
      }
      else
      {
         $clause_sql = " AND game_sessid = " . "'$gamesessid'";
      }
   }
   $gamename = str_replace("\'","''",$HTTP_POST_VARS['gname']); 
   $gamename = preg_replace(array('#&(?!(\#[0-9]+;))#', '#<#', '#>#'), array('&amp;', '&lt;', '&gt;'),$gamename); 
   $gamescore = intval($HTTP_POST_VARS['gscore']); 
 $gameflashtime = intval($HTTP_POST_VARS['flashgametime']);
   $gamecheattype = (isset($HTTP_POST_VARS['gcheatlm'])) ? intval($HTTP_POST_VARS['gcheatlm']) : 0;
   //Get Game ID 
   if (isset($HTTP_POST_VARS['gameid']))
   {
      $gid = intval($HTTP_POST_VARS['gameid']);
      $sql = "SELECT game_id, game_cheat_control from " . GAMES_TABLE . "
               WHERE game_id = $gid AND game_scorevar='$gamename'";
      if( !($result = $db->sql_query($sql)) )
      {
      	message_die(GENERAL_ERROR, "Impossible de trouver le jeu !", '', __LINE__, __FILE__, $sql);
      }
      $row = $db->sql_fetchrow($result);
   }
   else
   {
      $row = $db->sql_fetchrow($db->sql_query("SELECT game_id, game_cheat_control from " . GAMES_TABLE . " WHERE
                                             game_scorevar='$gamename'"));
   }
   $gid = intval($row['game_id']); 
  if ($row['game_cheat_control'])
   {
      //Calcul du temps de jeu
      $sql = "SELECT date_enreg from " . ARCADE_TIME_TEMP . " WHERE user_id = " . $userdata['user_id'] . "
                                                               AND game_id = " . $gid . $clause_sql . "
                                                               ORDER BY date_enreg DESC";
      if( !($result = $db->sql_query($sql)) )
      {
      	message_die(GENERAL_ERROR, "Impossible d'identifier votre session de jeu", '', __LINE__, __FILE__, $sql);
      }
      $row = $db->sql_fetchrow($result);

      if ( !(is_null($row['date_enreg'])) )
      {
         $time_begin = $row['date_enreg'];
         $gamerealtime = $time_end - $time_begin;
      }
      else
      {
         //Erreur lors de la sélection des valeurs du jeu !
         $message = 'Erreur lors de la sélection des valeurs de votre session de jeu' . '<br /><br />' . sprintf($lang['Click_return_index ' . $gamesessid], '<a href="' . append_sid("index.$phpEx") . '">', '</a> ');
         message_die(GENERAL_MESSAGE, $message);
      }
   }
   if (@phpversion() >= '4.0.0')
   {
      session_save_path($phpbb_root_path . './sess_arcade');
      session_name('gf_arcade');
      session_start();
      $gf_sess = session_id();
   }
    if (!empty($gf_sess))
   {
      //Passage des valeurs du jeu par une session php
      $_SESSION['gamescore'] = intval($HTTP_POST_VARS['gscore']);
      $_SESSION['gameflashtime'] = intval($HTTP_POST_VARS['flashgametime']);
      $_SESSION['gamerealtime'] = intval($gamerealtime);
      $_SESSION['gamecheattype'] = $gamecheattype;
      $_SESSION['gamesessid'] = $gamesessid;
      $header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";
      header($header_location . append_sid("proarcade.$phpEx?valid=X&gpaver=GFARV2&gid=$gid", true));
      exit;
   }
   else
   {
      //Passage des valeurs par un form HTML (méthode POST)
      echo "<form method='post' name='ibpro_score' action='proarcade.php?valid=X&gpaver=GFARV2'>";
      echo "<input type=hidden name='vscore' value='$gamescore'>";
      echo "<input type=hidden name='gameflashtime' value='$gameflashtime'>";
      echo "<input type=hidden name='gamerealtime' value='$gamerealtime'>";
      echo "<input type=hidden name='gamecheattype' value='$gamecheattype'>";
      echo "<input type=hidden name='gamesessid' value='$gamesseid'>";
      echo "<input type=hidden name='gid' value='$gid'>";
      echo "</form>";

      echo "<script type=\"text/javascript\">";
      echo "window.onload = function(){document.forms[\"ibpro_score\"].submit()}";
      echo "</script>";
      exit;
   } 
} 
// Arcade type 4

$viewcat = ( !empty($HTTP_GET_VARS[POST_CAT_URL]) ) ? $HTTP_GET_VARS[POST_CAT_URL] : -1;

if( isset($HTTP_GET_VARS['mark']) || isset($HTTP_POST_VARS['mark']) )
{
	$mark_read = ( isset($HTTP_POST_VARS['mark']) ) ? $HTTP_POST_VARS['mark'] : $HTTP_GET_VARS['mark'];
}
else
{
	$mark_read = '';
}

//
// Handle marking posts
//
if( $mark_read == 'forums' )
{
	if( $userdata['session_logged_in'] )
	{
		setcookie($board_config['cookie_name'] . '_f_all', time(), 0, $board_config['cookie_path'], $board_config['cookie_domain'], $board_config['cookie_secure']);
	}

	$template->assign_vars(array(
		"META" => '<meta http-equiv="refresh" content="3;url='  .append_sid("index.$phpEx") . '">')
	);

	$message = $lang['Forums_marked_read'] . '<br /><br />' . sprintf($lang['Click_return_index'], '<a href="' . append_sid("index.$phpEx") . '">', '</a> ');

	message_die(GENERAL_MESSAGE, $message);
}
//
// End handle marking posts
//

$tracking_topics = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_t']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_t"]) : array();
$tracking_forums = ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f']) ) ? unserialize($HTTP_COOKIE_VARS[$board_config['cookie_name'] . "_f"]) : array();

//
// If you don't use these stats on your index you may want to consider
// removing them
//
$total_posts = get_db_stat('postcount');
$total_users = get_db_stat('usercount');
$newest_userdata = get_db_stat('newestuser');
$newest_user = $newest_userdata['username'];
$newest_uid = $newest_userdata['user_id'];

if( $total_posts == 0 )
{
	$l_total_post_s = $lang['Posted_articles_zero_total'];
}
else if( $total_posts == 1 )
{
	$l_total_post_s = $lang['Posted_article_total'];
}
else
{
	$l_total_post_s = $lang['Posted_articles_total'];
}

if( $total_users == 0 )
{
	$l_total_user_s = $lang['Registered_users_zero_total'];
}
else if( $total_users == 1 )
{
	$l_total_user_s = $lang['Registered_user_total'];
}
else
{
	$l_total_user_s = $lang['Registered_users_total'];
}


//
// Start page proper
//
$sql = "SELECT c.cat_id, c.cat_title, c.cat_order
	FROM " . CATEGORIES_TABLE . " c 
	ORDER BY c.cat_order";
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query categories list', '', __LINE__, __FILE__, $sql);
}

$category_rows = array();
while ($row = $db->sql_fetchrow($result))
{
	$category_rows[] = $row;
}
$db->sql_freeresult($result);

if( ( $total_categories = count($category_rows) ) )
{
	//
	// Define appropriate SQL
	//
	switch(SQL_LAYER)
	{
		case 'postgresql':
			
			$sql = "SELECT f.*, p.post_time, p.post_username, u.username, u.user_id
				FROM " . FORUMS_TABLE . " f, " . POSTS_TABLE . " p, " . USERS_TABLE . " u
				WHERE p.post_id = f.forum_last_post_id 
					AND u.user_id = p.poster_id  
					UNION (
						SELECT f.*, NULL, NULL, NULL, NULL
						FROM " . FORUMS_TABLE . " f
						WHERE NOT EXISTS (
							SELECT p.post_time
							FROM " . POSTS_TABLE . " p
							WHERE p.post_id = f.forum_last_post_id  
						)
					)
					ORDER BY cat_id, forum_order";
					
			break;

		case 'oracle':
			
			$sql = "SELECT f.*, p.post_time, p.post_username, u.username, u.user_id
				FROM " . FORUMS_TABLE . " f, " . POSTS_TABLE . " p, " . USERS_TABLE . " u
				WHERE p.post_id = f.forum_last_post_id(+)
					AND u.user_id = p.poster_id(+)
				ORDER BY f.cat_id, f.forum_order";
				
			break;

		default:
			// Modified by Attached Forums MOD

			$sql = "SELECT f.*, p.post_time, p.post_username,  u.username, u.user_id, t.topic_id, t.topic_title
				FROM ((( " . FORUMS_TABLE . " f
				LEFT JOIN " . POSTS_TABLE . " p ON p.post_id = f.forum_last_post_id )
				LEFT JOIN " . USERS_TABLE . " u ON u.user_id = p.poster_id )
				LEFT JOIN " . TOPICS_TABLE . " t ON t.topic_last_post_id = f.forum_last_post_id)
				GROUP BY f.forum_id ORDER BY f.cat_id, f.forum_order";
				
   // END Modified by Attached Forums MOD
			break;
	}
	//-- mod : totally erc ---------------------------------------------------------
//-- add
	$sql = str_replace(', u.user_id', ', u.user_id, u.user_level, u.user_whosonline_color', $sql);
//-- fin mod : totally erc -----------------------------------------------------
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query forums information', '', __LINE__, __FILE__, $sql);
	}

	$forum_data = array();
	while( $row = $db->sql_fetchrow($result) )
	{
		$forum_data[] = $row;
	}
// Added by Attached Forums MOD
	
	$attach=$forum_data;
   // END Added by Attached Forums MOD
	$db->sql_freeresult($result);

	if ( !($total_forums = count($forum_data)) )
	{
		message_die(GENERAL_MESSAGE, $lang['No_forums']);
	}

	//
	// Obtain a list of topic ids which contain
	// posts made since user last visited
	//
	if ( $userdata['session_logged_in'] )
	{
		$sql = "SELECT t.forum_id, t.topic_id, p.post_time 
			FROM " . TOPICS_TABLE . " t, " . POSTS_TABLE . " p 
			WHERE p.post_id = t.topic_last_post_id 
				AND p.post_time > " . $userdata['user_lastvisit'] . " 
				AND t.topic_moved_id = 0"; 
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not query new topic information', '', __LINE__, __FILE__, $sql);
		}

		$new_topic_data = array();
		while( $topic_data = $db->sql_fetchrow($result) )
		{
			$new_topic_data[$topic_data['forum_id']][$topic_data['topic_id']] = $topic_data['post_time'];
		}
		$db->sql_freeresult($result);
	}

	//
	// Obtain list of moderators of each forum
	// First users, then groups ... broken into two queries
	//
	
	$sql = "SELECT aa.forum_id, u.user_id, u.username
		FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g, " . USERS_TABLE . " u
		WHERE aa.auth_mod = " . TRUE . " 
			AND g.group_single_user = 1 
			AND ug.group_id = aa.group_id 
			AND g.group_id = aa.group_id 
			AND u.user_id = ug.user_id 
		GROUP BY u.user_id, u.username, aa.forum_id 
		ORDER BY aa.forum_id, u.user_id";
		//-- mod : totally erc ---------------------------------------------------------
//-- add
	$sql = str_replace(', u.username', ', u.username, u.user_level, u.user_whosonline_color', $sql);
//-- fin mod : totally erc -----------------------------------------------------		
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
	}

	$forum_moderators = array();
	while( $row = $db->sql_fetchrow($result) )
	{
		//-- mod : totally erc ---------------------------------------------------------
//-- delete
/*-MOD
		$forum_moderators[$row['forum_id']][] = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '">' . $row['username'] . '</a>';
MOD-*/
//-- add
		$style_color = $erc->get_colors($row);
		$forum_moderators[$row['forum_id']][] = '<a href="' . append_sid('profile.' . $phpEx . '?mode=viewprofile&amp;' . POST_USERS_URL . '=' . $row['user_id']) . '"' . $style_color . '>' . $row['username'] . '</a>';
//-- fin mod : totally erc -----------------------------------------------------
	}
	$db->sql_freeresult($result);

	$sql = "SELECT aa.forum_id, g.group_id, g.group_name 
		FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g 
		WHERE aa.auth_mod = " . TRUE . " 
			AND g.group_single_user = 0 
			AND g.group_type <> " . GROUP_HIDDEN . "
			AND ug.group_id = aa.group_id 
			AND g.group_id = aa.group_id 
		GROUP BY g.group_id, g.group_name, aa.forum_id 
		ORDER BY aa.forum_id, g.group_id";
		//-- mod : totally erc ---------------------------------------------------------
//-- add
	$sql = str_replace(', g.group_name', ', g.group_name, g.group_color', $sql);
//-- fin mod : totally erc -----------------------------------------------------		
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
	}

	while( $row = $db->sql_fetchrow($result) )
	{
		//-- mod : totally erc ---------------------------------------------------------
//-- delete
/*-MOD
		$forum_moderators[$row['forum_id']][] = '<a href="' . append_sid("groupcp.$phpEx?" . POST_GROUPS_URL . "=" . $row['group_id']) . '">' . $row['group_name'] . '</a>';
MOD-*/
//-- add
		$style_color = (!empty($row['group_color']) && $board_config['allow_totally_erc']) ? ' style="color:' . $id_color[$row['group_color']] . '; font-weight: bold;"' : '';
		$forum_moderators[$row['forum_id']][] = '<a href="' . append_sid('groupcp.' . $phpEx . '?' . POST_GROUPS_URL . '=' . $row['group_id']) . '"' . $style_color . '>' . $row['group_name'] . '</a>';
//-- fin mod : totally erc -----------------------------------------------------
	}
	$db->sql_freeresult($result);

	//
	// Find which forums are visible for this user
	//
	$is_auth_ary = array();
	$is_auth_ary = auth(AUTH_VIEW, AUTH_LIST_ALL, $userdata, $forum_data);

	//
	// Start output of page
	//
	define('SHOW_ONLINE', true);
	$page_title = $lang['Index'];
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);
	
	// Start Add - Birthday MOD with cache system, & Extend Rank Color
$cache_data_file = $phpbb_root_path."cache/index/birthday_". $board_config['board_timezone'] . ".dat";
		if (@is_file($cache_data_file)  && empty($SID))
		{
			$valid = (date('YzH',time()) - date('YzH',@filemtime($cache_data_file))<1) ? true : false;
		}
		else
		{
			$valid = false;
		}
		
		if ($valid )
		{
			include ($cache_data_file);
			$birthday_today_list = stripslashes($birthday_today_list);
			$birthday_week_list = stripslashes($birthday_week_list);
		}
		else
		{
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
						}
						else if ( $user_birthday2 == $date_today )
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
				if (empty($SID))
				{
					// stores the data set in a cache file
					$data = "<?php\n";
					$data .='$birthday_today_list = \'' . addslashes($birthday_today_list) . "';\n";
					$data .='$birthday_week_list = \''.addslashes($birthday_week_list) . "';\n?>";
					$fp = fopen( $cache_data_file, "w" );
					fwrite($fp, $data);
					fclose($fp);
				}
			}
		}
// End Add - Birthday MOD with cache system, & Extend Rank Color	
// Start add - Last visit MOD, & extend rank color
	$cache_data_file = $phpbb_root_path."cache/index/last_visit_". $userdata['user_level'] . "_". $board_config['board_timezone'] . ".dat";
	if (@is_file($cache_data_file)  && empty($SID))
	{
		$valid = (date('YzH',time()) - date('YzH',@filemtime($cache_data_file))<1) ? true : false;
	}
	else
	{
		$valid = false;
	}
	
	if ($valid )
	{
		include ($cache_data_file);
		$total_users_today = stripslashes($total_users_today);
		$users_lasthour = stripslashes($users_lasthour);
		$guests_todayy = stripslashes($guests_today);
		$logged_visible_today = stripslashes($logged_visible_today);
		$logged_hidden_today = stripslashes($logged_hidden_today);
		$users_today_list = stripslashes($users_today_list);
	}
	else
	{
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
				default :
					$todayrow['username'] = '<b>' . $todayrow['username'] . '</b>'; 
					$style_color = '';
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
		if (empty($SID))
		{
			// stores the data set in a cache file
			$data = "<?php\n";
			$data .='$total_users_today = \'' . addslashes($total_users_today) . "';\n";
			$data .='$users_lasthour = \'' . addslashes($users_lasthour) . "';\n";
			$data .='$guests_today = \'' . addslashes($guests_today) . "';\n";
			$data .='$logged_visible_today = \'' . addslashes($logged_visible_today) . "';\n";
			$data .='$logged_hidden_today = \'' . addslashes($logged_hidden_today) . "';\n";
			$data .='$users_today_list = \'' . addslashes($users_today_list) . "';\n?>";
			$fp = fopen( $cache_data_file, "w" );
			fwrite($fp, $data);
			fclose($fp);
		}
	}
	$users_today_list = $lang['Registered_users'].' ' . $users_today_list;
	$l_today_user_s = ($total_users_today) ? ( ( $total_users_today == 1 )? $lang['User_today_total'] : $lang['Users_today_total'] ) : $lang['Users_today_zero_total'];
	$l_today_r_user_s = ($logged_visible_today) ? ( ( $logged_visible_today == 1 ) ? $lang['Reg_user_total'] : $lang['Reg_users_total'] ) : $lang['Reg_users_zero_total'];
	$l_today_h_user_s = ($logged_hidden_today) ? (($logged_hidden_today == 1) ? $lang['Hidden_user_total'] : $lang['Hidden_users_total'] ) : $lang['Hidden_users_zero_total'];
	$l_today_g_user_s = ($guests_today) ? (($guests_today == 1) ? $lang['Guest_user_total'] : $lang['Guest_users_total']) : $lang['Guest_users_zero_total'];
	$l_today_users = sprintf($l_today_user_s, $total_users_today);
	$l_today_users .= sprintf($l_today_r_user_s, $logged_visible_today); 
	$l_today_users .= sprintf($l_today_h_user_s, $logged_hidden_today); 
	$l_today_users .= sprintf($l_today_g_user_s, $guests_today);
// End add - Last visit MOD with system cache, & extend rank color

	//-- mod : totally erc ---------------------------------------------------------
//-- add
	$erc->display_legend();
	$newest_color = $erc->get_colors($newest_userdata);
//-- fin mod : totally erc -----------------------------------------------------
	$template->set_filenames(array(
		'body' => 'index_body.tpl')
	);

	$template->assign_vars(array(
		'TOTAL_POSTS' => sprintf($l_total_post_s, $total_posts),
		'TOTAL_USERS' => sprintf($l_total_user_s, $total_users),
		//-- mod : totally erc ---------------------------------------------------------
//-- delete
/*-MOD
		'NEWEST_USER' => sprintf($lang['Newest_user'], '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$newest_uid") . '">', $newest_user, '</a>'),
MOD-*/
//-- add
		'NEWEST_USER' => sprintf($lang['Newest_user'], '<a href="' . append_sid('profile.' . $phpEx . '?mode=viewprofile&amp;' . POST_USERS_URL . '=' . $newest_uid) . '"' . $newest_color . '>', $newest_user, '</a>'),
//-- fin mod : totally erc ----------------------------------------------------- 

		'FORUM_IMG' => $images['forum'],
		'FORUM_NEW_IMG' => $images['forum_new'],
		'FORUM_LOCKED_IMG' => $images['forum_locked'],
// Start add - Last visit MOD
'USERS_TODAY_LIST' => $users_today_list,

'L_USERS_LASTHOUR' =>($users_lasthour)?sprintf($lang['Users_lasthour_explain'],$users_lasthour):$lang['Users_lasthour_none_explain'],
'L_USERS_TODAY' =>$l_today_users,
// End add - Last visit MOD

		// Start add - Birthday MOD
		'L_WHOSBIRTHDAY_WEEK' => ($board_config['birthday_check_day'] > 1) ? sprintf( (($birthday_week_list) ? $lang['Birthday_week'] : $lang['Nobirthday_week']), $board_config['birthday_check_day']).$birthday_week_list : '',
		'L_WHOSBIRTHDAY_TODAY' => ($board_config['birthday_check_day']) ? ($birthday_today_list) ? $lang['Birthday_today'].$birthday_today_list : $lang['Nobirthday_today'] : '',
        // End add - Birthday MOD
		'L_FORUM' => $lang['Forum'],
		'L_TOPICS' => $lang['Topics'],
		'L_REPLIES' => $lang['Replies'],
		'L_VIEWS' => $lang['Views'],
		'L_POSTS' => $lang['Posts'],
		'L_LASTPOST' => $lang['Last_Post'], 
		'L_NO_NEW_POSTS' => $lang['No_new_posts'],
		'L_NEW_POSTS' => $lang['New_posts'],
		'L_NO_NEW_POSTS_LOCKED' => $lang['No_new_posts_locked'], 
		'L_NEW_POSTS_LOCKED' => $lang['New_posts_locked'], 
		'L_ONLINE_EXPLAIN' => $lang['Online_explain'], 

		'L_MODERATOR' => $lang['Moderators'], 
		'L_FORUM_LOCKED' => $lang['Forum_is_locked'],
		'L_MARK_FORUMS_READ' => $lang['Mark_all_forums'], 

		'U_MARK_READ' => append_sid("index.$phpEx?mark=forums"))
	);

	//
	// Let's decide which categories we should display
	//
	$display_categories = array();

	for ($i = 0; $i < $total_forums; $i++ )
	{
		if ($is_auth_ary[$forum_data[$i]['forum_id']]['auth_view'])
		{
			$display_categories[$forum_data[$i]['cat_id']] = true;
		}
	}

	//
	// Okay, let's build the index
	//
	for($i = 0; $i < $total_categories; $i++)
	{
		$cat_id = $category_rows[$i]['cat_id'];

		//
		// Yes, we should, so first dump out the category
		// title, then, if appropriate the forum list
		//
		if (isset($display_categories[$cat_id]) && $display_categories[$cat_id])
		{
			$template->assign_block_vars('catrow', array(
				'CAT_ID' => $cat_id,
				'CAT_DESC' => $category_rows[$i]['cat_title'],
				'U_VIEWCAT' => append_sid("index.$phpEx?" . POST_CAT_URL . "=$cat_id"))
			);

			if ( $viewcat == $cat_id || $viewcat == -1 )
			{
				for($j = 0; $j < $total_forums; $j++)
				{
					if ( $forum_data[$j]['cat_id'] == $cat_id )
					{
						$forum_id = $forum_data[$j]['forum_id'];
// Added by Attached Forums MOD

   $attached_id = $forum_data[$j]['attached_forum_id'];
$attached_sub_forum = 0;
						if ( $is_auth_ary[$forum_id]['auth_view'] && $attached_id == -1 )
						{
							$attached_forums = array();
							foreach ($attach as $key => $value)
							{
								$sub_forum_id = $value['forum_id'];
								if ($value['attached_forum_id']==$forum_id && $is_auth_ary[$sub_forum_id]['auth_view'])
								{
									//combining topic and post count for forum and subforums
									$forum_data[$j]['forum_posts']=$forum_data[$j]['forum_posts']+$value['forum_posts'];
									$forum_data[$j]['forum_topics']=$forum_data[$j]['forum_topics']+$value['forum_topics'];
									//END combining topic and post count

									//Last post link - check if any of subforums have newest posts and link to them instead
									if ($value['post_time']>$forum_data[$j]['post_time'])
									{
										$forum_data[$j]['user_id'] = $value['user_id'];
										$forum_data[$j]['post_username'] = $value['post_username'];
										$forum_data[$j]['forum_last_post_id'] = $value['forum_last_post_id'];
										$forum_data[$j]['post_time'] = $value['post_time'];
										$forum_data[$j]['username'] = $value['username'];
										$forum_data[$j]['user_level'] = $value['user_level']; 
                                        $forum_data[$j]['user_whosonline_color'] = $value['user_whosonline_color'];
										$forum_data[$j]['topic_title'] = $value['topic_title'];
									}
									// END last post check

									$unread_topics = false;if ($userdata['session_logged_in'])
	{
		// 60 days limit
		if ($userdata['user_lastvisit'] < (time() - 5184000))
		{
			$userdata['user_lastvisit'] = time() - 5184000;
		}
if (check_unread($value['forum_id']))
										{
											$attach_img = $images['icon_minipost_new'];
											$l_attach_img = $lang['New_posts'];
$attached_sub_forum = $attached_sub_forum + 1;
										}
										else
										{
											$attach_img = $images['icon_minipost'];
											$l_attach_img = $lang['No_new_posts'];
										}
									}
									else
									{
										$attach_img = $images['icon_minipost'];
										$l_attach_img = $lang['No_new_posts'];
									}

									$attached_forums[] = array(
										'sub_img'=>$attach_img,
										'sub_alt'=>$l_attach_img,
										'sub_name'=>$value['forum_name'],
										'sub_url'=>append_sid ('viewforum.php?f=' . $value['forum_id'] )
										);
								}
							}
							
// END Added by Attached Forums MOD

						if ( $is_auth_ary[$forum_id]['auth_view'] )
						{
if ( $forum_data[$j]['forum_name'] == "Arcade" ) 
{ 
   $folder_image = "<img src=\"games/pics/arcade.gif\" alt=\"Arcade\" />"; 
   $template->assign_block_vars("catrow.arcaderow",array(
   'FORUM_NAME' => $forum_data[$j]['forum_name'], 
   'FORUM_DESC' => $forum_data[$j]['forum_desc'],
   'U_VIEWFORUM' => append_sid("arcade.$phpEx"), 
   'U_TOPARCADE' => append_sid("toparcade.$phpEx"), 
   'BEST_SCORES' => $lang['best_scores'], 
   'FOLDER' => $folder_image)
   );

    
   // Recupération du dernier record aux jeux 
   $sqlArcade = " SELECT g.* , u.username FROM " . GAMES_TABLE . " g left join " . USERS_TABLE . " u on g.game_highuser = u.user_id ORDER BY game_highdate DESC LIMIT 0,1 " ;
   if ( !($resultArcade = $db->sql_query($sqlArcade)) ) 
   {
      message_die(GENERAL_ERROR, 'Impossible d\'acceder aux tables games/users', '', __LINE__, __FILE__, $sqlArcade); 
   } 
   if ($rowArcade = $db->sql_fetchrow($resultArcade))
   { 
     if ( $rowArcade['game_highuser']!=0 )
      { 
      $template->assign_block_vars("catrow.arcaderow.bestscore",array( 
      'LAST_SCOREGAME' => '<a href="' . append_sid("games.$phpEx?gid=" . $rowArcade['game_id']) . '">' . $rowArcade['game_name'] . '</a>', 
      'LAST_SCOREDATE' => create_date($board_config['default_dateformat'], $rowArcade['game_highdate'] , $board_config['board_timezone']), 
      'LAST_SCOREUSER' => '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $rowArcade['game_highuser']) . '">' . $rowArcade['username'] . '</a>', 
      'LAST_SCORE' => $rowArcade['game_highscore']) 
      ); 
      }
   } 
}                                                                                        
else 
{
							if ( $forum_data[$j]['forum_status'] == FORUM_LOCKED )
							{
								$folder_image = $images['forum_locked']; 
								$folder_alt = $lang['Forum_locked'];
							}
							else
							{
								$unread_topics = false;
								if ( $userdata['session_logged_in'] )
								{
									// Added by Attached Forums MOD
$unread_topics=check_unread($forum_id);
   // END Added by Attached Forums MOD
								}

								$folder_image = ( $unread_topics || ($attached_sub_forum != 0) ) ? $images['forum_new'] : $images['forum'];
                        $folder_alt = ( $unread_topics || ($attached_sub_forum != 0) ) ? $lang['New_posts'] : $lang['No_new_posts'];
							}

							$posts = $forum_data[$j]['forum_posts'];
							$topics = $forum_data[$j]['forum_topics'];

							if ( $forum_data[$j]['forum_last_post_id'] )
							{
								// Modified by Attached Forums MOD

								if (strlen($forum_data[$j]['topic_title'])>=25)
								{
									$forum_data[$j]['topic_title']=substr($forum_data[$j]['topic_title'],0,25). "...";
								}

								$last_post_time = '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $forum_data[$j]['forum_last_post_id']) . '#' . $forum_data[$j]['forum_last_post_id'] . '">'.$forum_data[$j]['topic_title'].' <img src="' . $images['icon_latest_reply'] . '" border="0" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" /></a>' . '<br />' . create_date($board_config['default_dateformat'], $forum_data[$j]['post_time'], $board_config['board_timezone']);
								$last_post = '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $forum_data[$j]['forum_last_post_id']) . '#' . $forum_data[$j]['forum_last_post_id'] . '">'.$forum_data[$j]['topic_title'].' <img src="' . $images['icon_latest_reply'] . '" border="0" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" /></a>';

								$last_post .= '<br /> '; 
							// OLD
								// $last_post = $last_post_time . '<br />';
								//
                                			// MOD - TODAY AT - BEGIN
								//
								if ( $board_config['time_today'] < $forum_data[$j]['post_time'])
								{ 
									$last_post = '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $forum_data[$j]['forum_last_post_id']) . '#' . $forum_data[$j]['forum_last_post_id'] . '">'.$forum_data[$j]['topic_title'].' <img src="' . $images['icon_latest_reply'] . '" border="0" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" /></a>' . '<br />' . sprintf($lang['Today_at'], create_date($board_config['default_timeformat'], $forum_data[$j]['post_time'], $board_config['board_timezone'])) . '<br />'; 
								}
								else if ( $board_config['time_yesterday'] < $forum_data[$j]['post_time'])
								{ 
									$last_post = '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $forum_data[$j]['forum_last_post_id']) . '#' . $forum_data[$j]['forum_last_post_id'] . '">'.$forum_data[$j]['topic_title'].' <img src="' . $images['icon_latest_reply'] . '" border="0" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" /></a>' . '<br />' . sprintf($lang['Yesterday_at'], create_date($board_config['default_timeformat'], $forum_data[$j]['post_time'], $board_config['board_timezone'])) . '<br />'; 
								}
								else
								{ 
									$last_post = $last_post_time . '<br />'; 
								} 
                                			// MOD - TODAY AT - END							
								$last_post .= ''; 
								//-- mod : totally erc ---------------------------------------------------------
//-- delete
/*-MOD
								$last_post .= ( $forum_data[$j]['user_id'] == ANONYMOUS ) ? ( ($forum_data[$j]['post_username'] != '' ) ? $forum_data[$j]['post_username'] . ' ' : $lang['Guest'] . ' ' ) : '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '='  . $forum_data[$j]['user_id']) . '">' . $forum_data[$j]['username'] . '</a> ';
MOD-*/
//-- add
								$style_color = $erc->get_colors($forum_data[$j]);
								$last_post .= ($forum_data[$j]['user_id'] == ANONYMOUS) ? ((($forum_data[$j]['post_username'] != '') ? $forum_data[$j]['post_username'] : $lang['Guest']) . '&nbsp;') : '<a href="' . append_sid('profile.' . $phpEx . '?mode=viewprofile&amp;' . POST_USERS_URL . '='  . $forum_data[$j]['user_id']) . '"' . $style_color . '>' . $forum_data[$j]['username'] . '</a>&nbsp;';
//-- fin mod : totally erc -----------------------------------------------------
   // END Modified by Attached Forums MOD
							}
							else
							{
								$last_post = $lang['No_Posts'];
							}

							if ( count($forum_moderators[$forum_id]) > 0 )
							{
								$l_moderators = ( count($forum_moderators[$forum_id]) == 1 ) ? $lang['Moderator'] : $lang['Moderators'];
								$moderator_list = implode(', ', $forum_moderators[$forum_id]);
							}
							else
							{
								// Modified by Attached Forums MOD

								$l_moderators = '';
								$moderator_list = '';
   // END Modified by Attached Forums MOD
							}

							$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
							$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

							$forum_data[$j]['forum_desc'] = ( $board_config['allow_smilies'] ) ? smilies_pass($forum_data[$j]['forum_desc']) : $forum_data[$j]['forum_desc']; 
                     $forum_data[$j]['forum_desc'] = ( $board_config['allow_bbcode'] ) ? make_clickable(bbencode_second_pass($forum_data[$j]['forum_desc'], $forum_data[$j]['bbcode_uid'])) : preg_replace('/\:[0-9a-z\:]+\]/si', ']', $forum_data[$j]['forum_desc']); 
							$template->assign_block_vars('catrow.forumrow',	array(
								'ROW_COLOR' => '#' . $row_color,
								'ROW_CLASS' => $row_class,
								'FORUM_FOLDER_IMG' => $folder_image, 
								'FORUM_NAME' => $forum_data[$j]['forum_name'],
								'FORUM_DESC' => $forum_data[$j]['forum_desc'],
								'POSTS' => $forum_data[$j]['forum_posts'],
								'TOPICS' => $forum_data[$j]['forum_topics'],
								'LAST_POST' => $last_post,
								'MODERATORS' => $moderator_list,

								'L_MODERATOR' => $l_moderators, 
								'L_FORUM_FOLDER_ALT' => $folder_alt, 

								'U_VIEWFORUM' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id"))
							);
} // == "Arcade"
// Added by Attached Forums MOD
                     $attached_forum_count = count($attached_forums);
                     if($attached_forum_count)
                     {
                       
					   $template->assign_block_vars('catrow.forumrow.switch_attached_forums', array(
                        'L_ATTACHED_FORUMS' => ($attached_forum_count ==1)? $lang['Attached_forum']: $lang['Attached_forums']
						));
						if (count($forum_moderators[$forum_id]) > 0 )
						{
						   $template->assign_block_vars('catrow.forumrow.switch_attached_forums.br', array());
						}
                        for($k = 0; $k < $attached_forum_count; $k++)
                        {
                           $template->assign_block_vars('catrow.forumrow.switch_attached_forums.attached_forums', array(
                              'FORUM_IMAGE' => $attached_forums[$k]['sub_img'],
                              'FORUM_NAME' => $attached_forums[$k]['sub_name'],
                              'L_FORUM_IMAGE' => $attached_forums[$k]['sub_alt'],
                              'U_VIEWFORUM' => $attached_forums[$k]['sub_url']
                           ));
                        }
                     }
   // END added by Attached Forums MOD
						}
					}
				}
			}
		}
	} // for ... categories
   }

}// if ... total_categories
else
{
	message_die(GENERAL_MESSAGE, $lang['No_forums']);
}

//
// Generate the page
//
$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>