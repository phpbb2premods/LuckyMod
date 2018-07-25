<?php
/***************************************************************************
 *                           usercp_viewprofile.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: usercp_viewprofile.php,v 1.5.2.4 2005/05/06 20:50:12 acydburn Exp $
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
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
	exit;
}

if ( empty($HTTP_GET_VARS[POST_USERS_URL]) || $HTTP_GET_VARS[POST_USERS_URL] == ANONYMOUS )
{
	message_die(GENERAL_MESSAGE, $lang['No_user_id_specified']);
}
$profiledata = get_userdata($HTTP_GET_VARS[POST_USERS_URL]);

if (!$profiledata)
{
	message_die(GENERAL_MESSAGE, $lang['No_user_id_specified']);
}

$sql = "SELECT *
	FROM " . RANKS_TABLE . "
	ORDER BY rank_special, rank_min";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not obtain ranks information', '', __LINE__, __FILE__, $sql);
}

$ranksrow = array();
while ( $row = $db->sql_fetchrow($result) )
{
	$ranksrow[] = $row;
}
$db->sql_freeresult($result);
$sql = 'SELECT style_name
	FROM ' . THEMES_TABLE . '
	WHERE themes_id = ' . $profiledata['user_style'];

if ( !($result = $db->sql_query($sql)) )
{
   message_die(GENERAL_ERROR, 'Style_profile_error', '', __LINE__, __FILE__, $sql);
}

$stylerow = array();
while ( $row = $db->sql_fetchrow($result) )
{
   $stylerow = $row;
}
$db->sql_freeresult($result);

$style_counts = get_style_counts();

$user_style = $stylerow['style_name'];
//
// Output page header and profile_view template
//
$template->set_filenames(array(
	'body' => 'profile_view_body.tpl')
);
make_jumpbox('viewforum.'.$phpEx);

//
// Calculate the number of days this user has been a member ($memberdays)
// Then calculate their posts per day
//
$regdate = $profiledata['user_regdate'];
$memberdays = max(1, round( ( time() - $regdate ) / 86400 ));
$posts_per_day = $profiledata['user_posts'] / $memberdays;

// Get the users percentage of total posts
if ( $profiledata['user_posts'] != 0  )
{
	$total_posts = get_db_stat('postcount');
	$percentage = ( $total_posts ) ? min(100, ($profiledata['user_posts'] / $total_posts) * 100) : 0;
}
else
{
	$percentage = 0;
}

$avatar_img = '';
if ( $profiledata['user_avatar_type'] && $profiledata['user_allowavatar'] )
{
	switch( $profiledata['user_avatar_type'] )
	{
		case USER_AVATAR_UPLOAD:
			$avatar_img = ( $board_config['allow_avatar_upload'] && ($profiledata['user_session_time'] >= ( time() - 300 )) && ($profiledata['user_allow_viewonline'])) ? '<img src="' . $board_config['avatar_path'] . '/' . $profiledata['user_avatar'] . '" alt="" class="imgfull" border="0" />' : '<img src="' . $board_config['avatar_path'] . '/' . $profiledata['user_avatar'] . '" alt="" class="imgfade" border="0" />';
			break;
		case USER_AVATAR_REMOTE:
			$avatar_img = ( $board_config['allow_avatar_remote'] && ($profiledata['user_session_time'] >= ( time() - 300 )) && ($profiledata['user_allow_viewonline'])) ? '<img src="' . $profiledata['user_avatar'] . '" alt="" class="imgfull" border="0" />' : '<img src="' . $profiledata['user_avatar'] . '" alt="" class="imgfade" border="0" />';
			break;
		case USER_AVATAR_GALLERY:
			$avatar_img = ( $board_config['allow_avatar_local'] && ($profiledata['user_session_time'] >= ( time() - 300 )) && ($profiledata['user_allow_viewonline'])) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $profiledata['user_avatar'] . '" alt="" class="imgfull" border="0" />' : '<img src="' . $board_config['avatar_gallery_path'] . '/' . $profiledata['user_avatar'] . '" alt="" class="imgfade" border="0" />';
			break;
	}
}

$poster_rank = '';
$rank_image = '';
if ( $profiledata['user_rank'] )
{
	for($i = 0; $i < count($ranksrow); $i++)
	{
		if ( $profiledata['user_rank'] == $ranksrow[$i]['rank_id'] && $ranksrow[$i]['rank_special'] )
		{
			$poster_rank = $ranksrow[$i]['rank_title'];
			$rank_image = ( $ranksrow[$i]['rank_image'] ) ? '<img src="' . $ranksrow[$i]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
		}
	}
}
else
{
	for($i = 0; $i < count($ranksrow); $i++)
	{
		if ( $profiledata['user_posts'] >= $ranksrow[$i]['rank_min'] && !$ranksrow[$i]['rank_special'] )
		{
			$poster_rank = $ranksrow[$i]['rank_title'];
			$rank_image = ( $ranksrow[$i]['rank_image'] ) ? '<img src="' . $ranksrow[$i]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
		}
	}
}

$temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=" . $profiledata['user_id']);
$pm_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
$pm = '<a href="' . $temp_url . '">' . $lang['Send_private_message'] . '</a>';

if ( !empty($profiledata['user_viewemail']) || $userdata['user_level'] == ADMIN )
{
	$email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $profiledata['user_id']) : 'mailto:' . $profiledata['user_email'];

	$email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
	$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
}
else
{
	$email_img = '&nbsp;';
	$email = '&nbsp;';
}

$www_img = ( $profiledata['user_website'] ) ? '<a href="' . $profiledata['user_website'] . '" target="_userwww"><img src="' . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '&nbsp;';
$www = ( $profiledata['user_website'] ) ? '<a href="' . $profiledata['user_website'] . '" target="_userwww">' . $profiledata['user_website'] . '</a>' : '&nbsp;';

if ( !empty($profiledata['user_icq']) )
{
	$icq_status_img = '<a href="http://wwp.icq.com/' . $profiledata['user_icq'] . '#pager"><img src="http://web.icq.com/whitepages/online?icq=' . $profiledata['user_icq'] . '&img=5" width="18" height="18" border="0" /></a>';
	$icq_img = '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $profiledata['user_icq'] . '"><img src="' . $images['icon_icq'] . '" alt="' . $lang['ICQ'] . '" title="' . $lang['ICQ'] . '" border="0" /></a>';
	$icq =  '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $profiledata['user_icq'] . '">' . $lang['ICQ'] . '</a>';
}
else
{
	$icq_status_img = '&nbsp;';
	$icq_img = '&nbsp;';
	$icq = '&nbsp;';
}

$aim_img = ( $profiledata['user_aim'] ) ? '<a href="aim:goim?screenname=' . $profiledata['user_aim'] . '&amp;message=Hello+Are+you+there?"><img src="' . $images['icon_aim'] . '" alt="' . $lang['AIM'] . '" title="' . $lang['AIM'] . '" border="0" /></a>' : '&nbsp;';
$aim = ( $profiledata['user_aim'] ) ? '<a href="aim:goim?screenname=' . $profiledata['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $lang['AIM'] . '</a>' : '&nbsp;';

$msn_img = ( $profiledata['user_msnm'] ) ? $profiledata['user_msnm'] : '&nbsp;';
$msn = $msn_img;

$yim_img = ( $profiledata['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $profiledata['user_yim'] . '&amp;.src=pg"><img src="' . $images['icon_yim'] . '" alt="' . $lang['YIM'] . '" title="' . $lang['YIM'] . '" border="0" /></a>' : '';
$yim = ( $profiledata['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $profiledata['user_yim'] . '&amp;.src=pg">' . $lang['YIM'] . '</a>' : '';

$temp_url = append_sid("search.$phpEx?search_author=" . urlencode($profiledata['username']) . "&amp;showresults=posts");
$search_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_search'] . '" alt="' . sprintf($lang['Search_user_posts'], $profiledata['username']). '" title="' . sprintf($lang['Search_user_posts'], $profiledata['username']) . '" border="0" /></a>';
$search = '<a href="' . $temp_url . '">' . sprintf($lang['Search_user_posts'], $profiledata['username']) . '</a>';

// Start add - Birthday MOD
if ($profiledata['user_birthday']!=999999)
{
	include($phpbb_root_path . 'includes/chinese.'.$phpEx);
	$chinese = get_chinese_year( realdate('Ymd', $profiledata['user_birthday']) );
	$u_chinese = $images[$chinese];
	$chinese_img = ($chinese=='Unknown') ? '' : '<img src="' . $u_chinese . '" alt="' . $lang[$chinese] . '" title="' . $lang[$chinese] . '" align="top" border="0" />';
	$user_birthdate = realdate('md', $profiledata['user_birthday']);
	$i=0;
	while ($i<26)
	{
		if ($user_birthdate>=$zodiacdates[$n] && $user_birthdate<=$zodiacdates[$i+1])
		{
			$zodiac = $lang[$zodiacs[($i/2)]];
			$u_zodiac = $images[$zodiacs[($i/2)]];
			$zodiac_img = '<img src="' . $u_zodiac . '" alt="' . $zodiac . '" title="' . $zodiac . '" align="top" border="0" />';
			$i=26;
		} else
		{
			$i=$i+2;
		}
	}
	$user_birthday = realdate($lang['DATE_FORMAT'], $profiledata['user_birthday']);
} else
{
	$user_birthday = $lang['No_birthday_specify'];
}
// End add - Birthday MOD
// Start add - Gender MOD
if ( !empty($profiledata['user_gender'])) 
{ 
           switch ($profiledata['user_gender']) 
           { 
                      case 1: $gender= "<img src=\"" . $images['icon_minigender_male'] . "\" alt=\"" . $lang['Gender'] . ":". $lang['Male'] . "\" title=\"" . $lang['Gender'] . ":" . $lang['Male'] . "\" border=\"0\" />"; break;
                      case 2: $gender= "<img src=\"" . $images['icon_minigender_female'] . "\" alt=\"" . $lang['Gender'] . ":". $lang['Female'] . "\" title=\"" . $lang['Gender'] . ":" . $lang['Female'] . "\" border=\"0\" />"; break; 
                      default:$gender=$lang['No_gender_specify']; 
           } 
} else $gender=$lang['No_gender_specify']; 
// End add - Gender MOD
// Start add - Mood MOD
if ( !empty($profiledata['user_mood'])) 
{ 
           switch ($profiledata['user_mood']) 
           { 
		    case 1 : $mood_image = "<img src=\"" . $images['icon_sad'] . "\" alt=\"" . $lang['mood'].  ":".$lang['Sad']."\" title=\"" . $lang['Mood'] . ":".$lang['Sad']. "\" border=\"0\" />"; break; 
			case 2 : $mood_image = "<img src=\"" . $images['icon_happy'] . "\" alt=\"" . $lang['mood']. ":".$lang['Happy']. "\" title=\"" . $lang['Mood'] . ":".$lang['Happy']. "\" border=\"0\" />"; break; 
			case 3 : $mood_image = "<img src=\"" . $images['icon_angry'] . "\" alt=\"" . $lang['mood'].  ":".$lang['Angry']."\" title=\"" . $lang['Mood'] . ":".$lang['Angry']. "\" border=\"0\" />"; break; 
			case 4 : $mood_image = "<img src=\"" . $images['icon_cool'] . "\" alt=\"" . $lang['mood']. ":".$lang['Cool']. "\" title=\"" . $lang['Mood'] . ":".$lang['Cool']. "\" border=\"0\" />"; break; 
			case 5 : $mood_image = "<img src=\"" . $images['icon_devil'] . "\" alt=\"" . $lang['mood'].  ":".$lang['Devil']."\" title=\"" . $lang['Mood'] . ":".$lang['Devil']. "\" border=\"0\" />"; break; 
			case 6 : $mood_image = "<img src=\"" . $images['icon_ill'] . "\" alt=\"" . $lang['mood']. ":".$lang['Ill']. "\" title=\"" . $lang['Mood'] . ":".$lang['Ill']. "\" border=\"0\" />"; break; 
			case 7 : $mood_image = "<img src=\"" . $images['icon_love'] . "\" alt=\"" . $lang['mood'].  ":".$lang['Love']."\" title=\"" . $lang['Mood'] . ":".$lang['Love']. "\" border=\"0\" />"; break; 
			case 8 : $mood_image = "<img src=\"" . $images['icon_sleep'] . "\" alt=\"" . $lang['mood']. ":".$lang['Sleep']. "\" title=\"" . $lang['Mood'] . ":".$lang['Sleep']. "\" border=\"0\" />"; break; 
			case 9 : $mood_image = "<img src=\"" . $images['icon_surprised'] . "\" alt=\"" . $lang['mood'].  ":".$lang['Surprised']."\" title=\"" . $lang['Mood'] . ":".$lang['Surprised']. "\" border=\"0\" />"; break; 
			default:$mood_image = $lang['No_mood_specify']; 
			 } 
} 
else $mood_image = $lang['No_mood_specify']; 
// End add - Mood MOD
if ( !empty($profiledata['user_miniland'])) 
{ 
           switch ($profiledata['user_miniland'])  
           { 
		    case 1 : $miniland = "<img src=\"" . $images['icon_be'] . "\" alt=\"" . $lang['Miniland'] . ":" . $lang['Be'] . "\" title=\"" . $lang['Miniland'] . ":" . $lang['Be'] . "\" border=\"0\" />"; break; 
			case 2 : $miniland = "<img src=\"" . $images['icon_fr'] . "\" alt=\"" . $lang['Miniland'] . ":" . $lang['Fr'] . "\" title=\"" . $lang['Miniland'] . ":" . $lang['Fr'] . "\" border=\"0\" />"; break; 
			case 3 : $miniland = "<img src=\"" . $images['icon_ca'] . "\" alt=\"" . $lang['Miniland'] . ":" . $lang['Ca'] . "\" title=\"" . $lang['Miniland'] . ":" . $lang['Ca'] . "\" border=\"0\" />"; break; 
			case 4 : $miniland = "<img src=\"" . $images['icon_ch'] . "\" alt=\"" . $lang['Miniland'] . ":" . $lang['Ch'] . "\" title=\"" . $lang['Miniland'] . ":" . $lang['Ch'] . "\" border=\"0\" />"; break; 
			case 5 : $miniland = "<img src=\"" . $images['icon_lu'] . "\" alt=\"" . $lang['Miniland'] . ":" . $lang['Lu'] . "\" title=\"" . $lang['Miniland'] . ":" . $lang['Lu'] . "\" border=\"0\" />"; break; 
			default:$miniland = $lang['No_miniland_specify']; 
			 } 
} 
else $miniland = $lang['No_miniland_specify']; 
//
// Generate page
//
if($userdata['user_level'] == ADMIN) 
{ 
$template->assign_vars(array( 
"L_USER_ADMIN_FOR" => $lang['User_admin_for'], 
"U_ADMIN_PROFILE" => append_sid("admin/admin_users.$phpEx?mode=edit&u=" . $profiledata['user_id']."&sid=".$userdata['session_id']), 
"L_USER_PERM_FOR" => $lang['User_perm_for'], 
"U_PERM_PROFILE" => append_sid("admin/admin_ug_auth.$phpEx?mode=user&u=" . $profiledata['user_id']."&sid=".$userdata['session_id'])) 
); 
$template->assign_block_vars("switch_user_admin", array()); 
} 
$page_title = $lang['Viewing_profile'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);
display_upload_attach_box_limits($profiledata['user_id']);
if (function_exists('get_html_translation_table'))
{
	$u_search_author = urlencode(strtr($profiledata['username'], array_flip(get_html_translation_table(HTML_ENTITIES))));
}
else
{
	$u_search_author = urlencode(str_replace(array('&amp;', '&#039;', '&quot;', '&lt;', '&gt;'), array('&', "'", '"', '<', '>'), $profiledata['username']));
}

$template->assign_vars(array(
	//-- mod : totally erc ---------------------------------------------------------
//-- delete
/*-MOD
	'USERNAME' => $profiledata['username'],
MOD-*/
//-- add
	'USERNAME' => $erc->get_colors($profiledata, $profiledata['username']),
//-- fin mod : totally erc -----------------------------------------------------
	'JOINED' => create_date($lang['DATE_FORMAT'], $profiledata['user_regdate'], $board_config['board_timezone']),
// Start add - Last visit MOD
    'L_LOGON' => $lang['Last_logon'], 
    'LAST_LOGON' => ($userdata['user_level'] == ADMIN || (!$board_config['hidde_last_logon'] && $profiledata['user_allow_viewonline'])) ? (($profiledata['user_lastlogon'])? create_date($board_config['default_dateformat'], $profiledata['user_lastlogon'], $board_config['board_timezone']):$lang['Never_last_logon']):$lang['Hidde_last_logon'], 

    'L_TOTAL_ONLINE_TIME' => $lang['Total_online_time'],
    'TOTAL_ONLINE_TIME' => make_hours($profiledata['user_totaltime']),
    'L_LAST_ONLINE_TIME' => $lang['Last_online_time'],
    'LAST_ONLINE_TIME' => make_hours($profiledata['user_session_time']-$profiledata['user_lastlogon']),
    'L_NUMBER_OF_VISIT' => $lang['Number_of_visit'],
    'NUMBER_OF_VISIT' => ($profiledata['user_totallogon']>0) ? $profiledata['user_totallogon']: $lang['None'],
    'L_NUMBER_OF_PAGES' => $lang['Number_of_pages'], 
    'NUMBER_OF_PAGES' => ($profiledata['user_totalpages']) ? $profiledata['user_totalpages']: $lang['None'], 
// End add - Last visit MOD
	'POSTER_RANK' => $poster_rank,
	'RANK_IMAGE' => $rank_image,
	'POSTS_PER_DAY' => $posts_per_day,
	'POSTS' => $profiledata['user_posts'],
	'PERCENTAGE' => $percentage . '%', 
	'POST_DAY_STATS' => sprintf($lang['User_post_day_stats'], $posts_per_day), 
	'POST_PERCENT_STATS' => sprintf($lang['User_post_pct_stats'], $percentage), 

	'SEARCH_IMG' => $search_img,
	'SEARCH' => $search,
	'PM_IMG' => $pm_img,
	'PM' => $pm,
	'EMAIL_IMG' => $email_img,
	'EMAIL' => $email,
	'WWW_IMG' => $www_img,
	'WWW' => $www,
	'ICQ_STATUS_IMG' => $icq_status_img,
	'ICQ_IMG' => $icq_img, 
	'ICQ' => $icq, 
	'AIM_IMG' => $aim_img,
	'AIM' => $aim,
	'MSN_IMG' => $msn_img,
	'MSN' => $msn,
	'YIM_IMG' => $yim_img,
	'YIM' => $yim,

	'LOCATION' => ( $profiledata['user_from'] ) ? $profiledata['user_from'] : '&nbsp;',
	'OCCUPATION' => ( $profiledata['user_occ'] ) ? $profiledata['user_occ'] : '&nbsp;',
	'INTERESTS' => ( $profiledata['user_interests'] ) ? $profiledata['user_interests'] : '&nbsp;',
	'MINILAND' => $miniland, 
	// Start add - Mood MOD
	'MOOD' => $mood_image, 
	// End add - Mood MOD
// Start add - Gender MOD
    'GENDER' => $gender, 
// End add - Gender MOD
	// Start add - Birthday MOD
	'CHINESE' => $lang[$chinese],
	'CHINESE_IMG' => $chinese_img,
	'U_CHINESE' => $u_chinese,
	'L_CHINESE' => $lang['Chinese_zodiac'],
	'ZODIAC' => $zodiac,
	'ZODIAC_IMG' => $zodiac_img,
	'L_ZODIAC' => $lang['Zodiac'],
	'U_ZODIAC' => $u_zodiac,
	'BIRTHDAY' => $user_birthday,
    // End add - Birthday MOD
	'AVATAR_IMG' => $avatar_img,

	//-- mod : totally erc ---------------------------------------------------------
//-- delete
/*-MOD
	'L_VIEWING_PROFILE' => sprintf($lang['Viewing_user_profile'], $profiledata['username']),
	'L_ABOUT_USER' => sprintf($lang['About_user'], $profiledata['username']),
MOD-*/
//-- add
	'L_VIEWING_PROFILE' => sprintf($lang['Viewing_user_profile'], $erc->get_colors($profiledata, $profiledata['username'])),
	'L_ABOUT_USER' => sprintf($lang['About_user'], $erc->get_colors($profiledata, $profiledata['username'])),
//-- fin mod : totally erc -----------------------------------------------------
	'L_AVATAR' => $lang['Avatar'], 
	'L_POSTER_RANK' => $lang['Poster_rank'], 
	'L_JOINED' => $lang['Joined'], 
	'L_TOTAL_POSTS' => $lang['Total_posts'], 
	//-- mod : totally erc ---------------------------------------------------------
//-- delete
/*-MOD
	'L_SEARCH_USER_POSTS' => sprintf($lang['Search_user_posts'], $profiledata['username']),
MOD-*/
//-- add
	'L_SEARCH_USER_POSTS' => sprintf($lang['Search_user_posts'], $erc->get_colors($profiledata, $profiledata['username'])),
//-- fin mod : totally erc ----------------------------------------------------- 
	'L_CONTACT' => $lang['Contact'],
	'L_EMAIL_ADDRESS' => $lang['Email_address'],
	'L_EMAIL' => $lang['Email'],
	'L_PM' => $lang['Private_Message'],
	'L_ICQ_NUMBER' => $lang['ICQ'],
	'L_YAHOO' => $lang['YIM'],
	'L_AIM' => $lang['AIM'],
	'L_MESSENGER' => $lang['MSNM'],
	'L_WEBSITE' => $lang['Website'],
	'L_LOCATION' => $lang['Location'],
	'L_OCCUPATION' => $lang['Occupation'],
	'L_INTERESTS' => $lang['Interests'],
	'L_MINILAND' => $lang['Miniland'],
	// Start add - Mood MOD
	'L_MOOD' => $lang['Mood'], 
	// End add - Mood MOD
// Start add - Gender MOD
    'L_GENDER' => $lang['Gender'], 
// End add - Gender MOD
     'L_MINILAND' =>$lang['Miniland'],
     'L_ARCADE' => $lang['lib_arcade'], 
     'URL_STATS' => '<a class="genmed" href="' . append_sid("statarcade.$phpEx?uid=" . $profiledata['user_id'] ) . '">' . $lang['statuser'] . '</a> ',
	// Start add - Birthday MOD
	'L_BIRTHDAY' => $lang['Birthday'],
    // End add - Birthday MOD
    'L_USER_STYLE' => $lang['Style'],
	'USER_STYLE' => $user_style,
	'STYLE_NUM' => sprintf($lang['Style_theme_num'], $style_counts[$profiledata['user_style']]),
	'THEME_ID' => $profiledata['user_style'],

	'U_SEARCH_USER' => append_sid("search.$phpEx?search_author=" . $u_search_author),

	'S_PROFILE_ACTION' => append_sid("profile.$phpEx"))
);
$cm_viewprofile->post_vars($template,$profiledata,$userdata);
$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>