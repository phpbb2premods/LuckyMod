<?php
/***************************************************************************
 *                              memberlist.php
 *                            -------------------
 *   begin                : Friday, May 11, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: memberlist.php,v 1.36.2.10 2004/07/11 16:46:15 acydburn Exp $
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

define('IN_PHPBB', true);
define('IN_CASHMOD', true);
define('CM_MEMBERLIST', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
//-- début mod : Add-on pour Birthday --------------------------------------------------------------------
//-- ajouter
include_once($phpbb_root_path . 'includes/chinese.'.$phpEx);
//-- fin mod : Add-on pour Birthday ---------------------------------------------------------------- 

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_VIEWMEMBERS);
init_userprefs($userdata);
//
// End session management
//
//DEBUT MOD zone restriction
zone_de_restriction('Liste_des_membres', 'memberlist.' . $phpEx);
// FIN MOD zone de restriction
//-- mod : totally erc ---------------------------------------------------------
//-- add
$display_erc = $display_level = '';

// erc display
if (isset($HTTP_POST_VARS['erc']) || isset($HTTP_GET_VARS['erc']))
{
	$display_erc = (!empty($HTTP_POST_VARS['erc'])) ? intval($HTTP_POST_VARS['erc']) : ((!empty($HTTP_GET_VARS['erc'])) ? intval($HTTP_GET_VARS['erc']) : 0);
}

if (!empty($display_erc))
{
	$sql_where = ($display_erc != -1) ? 'user_whosonline_color = ' . intval($display_erc) . ' AND ' : 'user_whosonline_color = 0 AND user_level = ' . USER . ' AND ';
}

// level display
if (isset($HTTP_POST_VARS['level']) || isset($HTTP_GET_VARS['level']))
{
	$display_level = (!empty($HTTP_POST_VARS['level'])) ? intval($HTTP_POST_VARS['level']) : ((!empty($HTTP_GET_VARS['level'])) ? intval($HTTP_GET_VARS['level']) : 0);
}
if (!empty($display_level))
{
	$sql_where = ( $display_level != -1 ) ? 'user_level = ' . intval($display_level) . ' AND ' : 'user_level = ' . USER . ' AND ';
}

$display = (empty($display_level) ? '' : '&amp;level=' . intval($display_level)) . (empty($display_erc) ? '' : '&amp;erc=' . intval($display_erc));
//-- fin mod : totally erc -----------------------------------------------------


$start = ( isset($HTTP_GET_VARS['start']) ) ? intval($HTTP_GET_VARS['start']) : 0;
$start = ($start < 0) ? 0 : $start;
if ( isset($HTTP_GET_VARS['mode']) || isset($HTTP_POST_VARS['mode']) )
{
	$mode = ( isset($HTTP_POST_VARS['mode']) ) ? htmlspecialchars($HTTP_POST_VARS['mode']) : htmlspecialchars($HTTP_GET_VARS['mode']);
}
else
{
	$mode = 'joined';
}

if(isset($HTTP_POST_VARS['order']))
{
	$sort_order = ($HTTP_POST_VARS['order'] == 'ASC') ? 'ASC' : 'DESC';
}
else if(isset($HTTP_GET_VARS['order']))
{
	$sort_order = ($HTTP_GET_VARS['order'] == 'ASC') ? 'ASC' : 'DESC';
}
else
{
	$sort_order = 'ASC';
}

//
// Memberlist sorting
//
$mode_types_text = array($lang['Sort_Joined'], $lang['Last_logon'], $lang['Sort_Username'], $lang['Sort_Location'], $lang['Sort_Posts'], $lang['Sort_Email'],  $lang['Sort_Website'], $lang['Sort_Top_Ten'], $lang['Age']);
$mode_types = array('joined', 'lastlogon', 'username', 'location', 'posts', 'email', 'website', 'topten', 'age');
$cm_memberlist->droplists($mode_types_text,$mode_types);
$select_sort_mode = '<select name="mode">';
for($i = ($userdata['user_level'] == ADMIN ) ? 0:1; $i < count($mode_types_text); $i++)
{
	$selected = ( $mode == $mode_types[$i] ) ? ' selected="selected"' : '';
	$select_sort_mode .= '<option value="' . $mode_types[$i] . '"' . $selected . '>' . $mode_types_text[$i] . '</option>';
}
$select_sort_mode .= '</select>';

$select_sort_order = '<select name="order">';
if($sort_order == 'ASC')
{
	$select_sort_order .= '<option value="ASC" selected="selected">' . $lang['Sort_Ascending'] . '</option><option value="DESC">' . $lang['Sort_Descending'] . '</option>';
}
else
{
	$select_sort_order .= '<option value="ASC">' . $lang['Sort_Ascending'] . '</option><option value="DESC" selected="selected">' . $lang['Sort_Descending'] . '</option>';
}
$select_sort_order .= '</select>';

//
// Generate page
//
$page_title = $lang['Memberlist'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

$template->set_filenames(array(
	'body' => 'memberlist_body.tpl')
);
make_jumpbox('viewforum.'.$phpEx);

$template->assign_vars(array(
	'L_SELECT_SORT_METHOD' => $lang['Select_sort_method'],
	'L_EMAIL' => $lang['Email'],
	'L_WEBSITE' => $lang['Website'],
	'L_FROM' => $lang['Location'],
	'L_ORDER' => $lang['Order'],
	'L_SORT' => $lang['Sort'],
	'L_SUBMIT' => $lang['Sort'],
	'L_AIM' => $lang['AIM'],
	'L_YIM' => $lang['YIM'],
	'L_MSNM' => $lang['MSNM'],
	'L_ICQ' => $lang['ICQ'], 
	'L_JOINED' => $lang['Joined'],
// Start add - Last visit MOD
'L_LOGON' => $lang['Last_logon'], 
// End add - Last visit MOD
	'L_POSTS' => $lang['Posts'],
//-- début mod : Add-on pour Birthday --------------------------------------------------------------------
//-- ajouter
	'L_AGE' => $lang['Age'],
//-- fin mod : Add-on pour Birthday ---------------------------------------------------------------- 
	'L_PM' => $lang['Private_Message'],
	'L_MINILAND' => $lang['Miniland'],
    'L_GENDER' => $lang['Gender'], 

	'S_MODE_SELECT' => $select_sort_mode,
	'S_ORDER_SELECT' => $select_sort_order,
	'S_MODE_ACTION' => append_sid("memberlist.$phpEx"))
);

switch( $mode )
{
	case 'joined':
		$order_by = "user_regdate $sort_order LIMIT $start, " . $board_config['topics_per_page'];
		break;
// Start add - Last visit MOD
case 'lastlogon': 
   $order_by = ($userdata['user_level'] == ADMIN ) ? "user_lastlogon $sort_order LIMIT $start, " . $board_config['topics_per_page'] : "username $sort_order LIMIT $start, " . $board_config['topics_per_page']; 
   break; 
// End add - Last visit MOD
	case 'username':
		$order_by = "username $sort_order LIMIT $start, " . $board_config['topics_per_page'];
		break;
	case 'location':
		$order_by = "user_from $sort_order LIMIT $start, " . $board_config['topics_per_page'];
		break;
	case 'posts':
		$order_by = "user_posts $sort_order LIMIT $start, " . $board_config['topics_per_page'];
		break;
	case 'email':
		$order_by = "user_email $sort_order LIMIT $start, " . $board_config['topics_per_page'];
		break;
	case 'website':
		$order_by = "user_website $sort_order LIMIT $start, " . $board_config['topics_per_page'];
		break;
	case 'topten':
		$order_by = "user_posts $sort_order LIMIT 10";
		break;
//-- début mod : Add-on pour Birthday --------------------------------------------------------------------
//-- ajouter
	case 'age': 
         $order_by = "user_birthday $sort_order LIMIT $start," . $board_config['topics_per_page']; 
        break;
//-- fin mod : Add-on pour Birthday ----------------------------------------------------------------
case $cm_memberlist->modecheck($mode):
		$order_by = $cm_memberlist->getfield($mode) . " $sort_order LIMIT $start, " . $board_config['topics_per_page'];
		break;
	default:
		$order_by = "user_regdate $sort_order LIMIT $start, " . $board_config['topics_per_page'];
		break;
}

$sql = "SELECT username, user_id, user_viewemail, user_posts, user_regdate, user_lastlogon, user_allow_viewonline, user_from, user_website, user_email, user_icq, user_aim, user_yim, user_msnm, user_avatar, user_avatar_type, user_allowavatar
, user_birthday, user_miniland, user_gender 
	FROM " . USERS_TABLE . "
	WHERE user_id <> " . ANONYMOUS . "
	ORDER BY $order_by";
	//-- mod : totally erc ---------------------------------------------------------
//-- add
$sql = str_replace('SELECT ', 'SELECT user_level, user_whosonline_color, ', $sql);

if ( !empty($sql_where) )
{
	$sql = str_replace('WHERE ', 'WHERE ' . $sql_where, $sql);
}
//-- fin mod : totally erc -----------------------------------------------------	
$cm_memberlist->generate_columns($template,$sql,12);
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query users', '', __LINE__, __FILE__, $sql);
}

if ( $row = $db->sql_fetchrow($result) )
{
	$i = 0;
	do
	{
		$username = $row['username'];
		$user_id = $row['user_id'];

		$from = ( !empty($row['user_from']) ) ? $row['user_from'] : '&nbsp;';
		$joined = create_date($lang['DATE_FORMAT'], $row['user_regdate'], $board_config['board_timezone']);
		$posts = ( $row['user_posts'] ) ? $row['user_posts'] : 0;

		$poster_avatar = '';
		if ( $row['user_avatar_type'] && $user_id != ANONYMOUS && $row['user_allowavatar'] )
		{
			switch( $row['user_avatar_type'] )
			{
				case USER_AVATAR_UPLOAD:
					$poster_avatar = ( $board_config['allow_avatar_upload'] && ($row['user_session_time'] >= ( time() - 300 )) && ($row['user_allow_viewonline'])) ? '<img src="' . $board_config['avatar_path'] . '/' . $row['user_avatar'] . '" alt="" class="imgfull" border="0" />' : '<img src="' . $board_config['avatar_path'] . '/' . $row['user_avatar'] . '" alt="" class="imgfade" border="0" />';
					break;
				case USER_AVATAR_REMOTE:
					$poster_avatar = ( $board_config['allow_avatar_remote'] && ($row['user_session_time'] >= ( time() - 300 )) && ($row['user_allow_viewonline'])) ? '<img src="' . $row['user_avatar'] . '" alt="" class="imgfull" border="0" />' : '<img src="' . $row['user_avatar'] . '" alt="" class="imgfade" border="0" />';
					break;
				case USER_AVATAR_GALLERY:
					$poster_avatar = ( $board_config['allow_avatar_local'] && ($row['user_session_time'] >= ( time() - 300 )) && ($row['user_allow_viewonline'])) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $row['user_avatar'] . '" alt="" class="imgfull" border="0" />' : '<img src="' . $board_config['avatar_gallery_path'] . '/' . $row['user_avatar'] . '" alt="" class="imgfade" border="0" />';
					break;
			}
		}

		if ( !empty($row['user_viewemail']) || $userdata['user_level'] == ADMIN )
		{
			$email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $user_id) : 'mailto:' . $row['user_email'];

			$email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
			$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
		}
		else
		{
			$email_img = '&nbsp;';
			$email = '&nbsp;';
		}
		
		if ( !empty($row['user_miniland'])) 
{ 
           switch ($row['user_miniland'])  
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



if ( !empty($row['user_gender'])) 
{ 
           switch ($row['user_gender']) 
           { 
                      case 1: $gender= "<img src=\"" . $images['icon_minigender_male'] . "\" alt=\"" . $lang['Gender'] . ":". $lang['Male'] . "\" title=\"" . $lang['Gender'] . ":" . $lang['Male'] . "\" border=\"0\" />"; break;
                      case 2: $gender= "<img src=\"" . $images['icon_minigender_female'] . "\" alt=\"" . $lang['Gender'] . ":". $lang['Female'] . "\" title=\"" . $lang['Gender'] . ":" . $lang['Female'] . "\" border=\"0\" />"; break; 
                      default:$gender=$lang['No_gender_specify']; 
           } 
} else $gender=$lang['No_gender_specify'];

		$temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$user_id");
		$profile_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_profile'] . '" alt="' . $lang['Read_profile'] . '" title="' . $lang['Read_profile'] . '" border="0" /></a>';
		$profile = '<a href="' . $temp_url . '">' . $lang['Read_profile'] . '</a>';

		$temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=$user_id");
		$pm_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
		$pm = '<a href="' . $temp_url . '">' . $lang['Send_private_message'] . '</a>';

		$www_img = ( $row['user_website'] ) ? '<a href="' . $row['user_website'] . '" target="_userwww"><img src="' . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '';
		$www = ( $row['user_website'] ) ? '<a href="' . $row['user_website'] . '" target="_userwww">' . $lang['Visit_website'] . '</a>' : '';

		if ( !empty($row['user_icq']) )
		{
			$icq_status_img = '<a href="http://wwp.icq.com/' . $row['user_icq'] . '#pager"><img src="http://web.icq.com/whitepages/online?icq=' . $row['user_icq'] . '&img=5" width="18" height="18" border="0" /></a>';
			$icq_img = '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $row['user_icq'] . '"><img src="' . $images['icon_icq'] . '" alt="' . $lang['ICQ'] . '" title="' . $lang['ICQ'] . '" border="0" /></a>';
			$icq =  '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $row['user_icq'] . '">' . $lang['ICQ'] . '</a>';
		}
		else
		{
			$icq_status_img = '';
			$icq_img = '';
			$icq = '';
		}
//-- début mod : Add-on pour Birthday -------------------------------------------------------------------- 
//-- ajouter 
      $this_year = create_date('Y', time(), $board_config['board_timezone']); 
      $this_date = create_date('md', time(), $board_config['board_timezone']); 

      if ( $row['user_birthday'] != 999999 ) 
   { 
      $poster_birthdate=realdate('md', $row['user_birthday']); 
      $n=0; 
      while ($n<26) 
      { 
         if ($poster_birthdate>=$zodiacdates[$n] & $poster_birthdate<=$zodiacdates[$n+1]) 
         { 
            $zodiac = $lang[$zodiacs[($n/2)]]; 
            $u_zodiac = $images[$zodiacs[($n/2)]]; 
            $zodiac_img = '<img src="' . $u_zodiac . '" alt="' . $zodiac . '" title="' . $zodiac . '" align="absmiddle" border="0" />'; 
      		$chinese = get_chinese_year (realdate('Ymd', $row['user_birthday'])); 
      		$u_chinese = $images[$chinese]; 
      		$chinese_img = ($chinese=='Unknown') ? '' : '<img src="' . $u_chinese . '" alt="' . $lang[$chinese] . '" title="' . $lang[$chinese] . '" align="absmiddle" border="0" />'; 
            $n=26; 
         } else 
         { 
            $n=$n+2; 
         } 
      } 
      $poster_age = $this_year - realdate ('Y',$row['user_birthday']); 
      if ($this_date < $poster_birthdate) $poster_age--; 
      $poster_age = $poster_age . '&nbsp;' . $lang['Years']; 
   } else 
   { 
      $zodiac = ''; 
      $u_zodiac = ''; 
      $zodiac_img = ''; 
      $poster_age = $lang['No_birthday_specify'];
   } 
//-- fin mod : Add-on pour Birthday ----------------------------------------------------------------

		$aim_img = ( $row['user_aim'] ) ? '<a href="aim:goim?screenname=' . $row['user_aim'] . '&amp;message=Hello+Are+you+there?"><img src="' . $images['icon_aim'] . '" alt="' . $lang['AIM'] . '" title="' . $lang['AIM'] . '" border="0" /></a>' : '';
		$aim = ( $row['user_aim'] ) ? '<a href="aim:goim?screenname=' . $row['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $lang['AIM'] . '</a>' : '';

		$temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$user_id");
		$msn_img = ( $row['user_msnm'] ) ? '<a href="' . $temp_url . '"><img src="' . $images['icon_msnm'] . '" alt="' . $lang['MSNM'] . '" title="' . $lang['MSNM'] . '" border="0" /></a>' : '';
		$msn = ( $row['user_msnm'] ) ? '<a href="' . $temp_url . '">' . $lang['MSNM'] . '</a>' : '';

		$yim_img = ( $row['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $row['user_yim'] . '&amp;.src=pg"><img src="' . $images['icon_yim'] . '" alt="' . $lang['YIM'] . '" title="' . $lang['YIM'] . '" border="0" /></a>' : '';
		$yim = ( $row['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $row['user_yim'] . '&amp;.src=pg">' . $lang['YIM'] . '</a>' : '';

		$temp_url = append_sid("search.$phpEx?search_author=" . urlencode($username) . "&amp;showresults=posts");
		$search_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_search'] . '" alt="' . sprintf($lang['Search_user_posts'], $username) . '" title="' . sprintf($lang['Search_user_posts'], $username) . '" border="0" /></a>';
		$search = '<a href="' . $temp_url . '">' . sprintf($lang['Search_user_posts'], $username) . '</a>';

		$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
		$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

		$template->assign_block_vars('memberrow', array(
			'ROW_NUMBER' => $i + ( $HTTP_GET_VARS['start'] + 1 ).(($userdata['user_level']==ADMIN)?'<a href="' . append_sid("delete_users.$phpEx?mode=user_id&amp;del_user=$user_id") . '"><img src="' . $images['icon_delpost'] . '" alt="' . $lang['Delete'] . ' '.$username.'" title="' . $lang['Delete'] . ' '.$username.'" border="0" /></a>&nbsp;':''),
			'ROW_COLOR' => '#' . $row_color,
			'ROW_CLASS' => $row_class,
			
			//-- mod : totally erc ---------------------------------------------------------
//-- delete
/*-MOD
			'USERNAME' => $username,
MOD-*/
//-- add
			'USERNAME' => $erc->get_colors($row, $row['username']),
//-- fin mod : totally erc -----------------------------------------------------
			'FROM' => $from,
			'JOINED' => $joined,
// Start add - Last visit MOD
           'LAST_LOGON' => ($userdata['user_level'] == ADMIN || (!$board_config['hidde_last_logon'] && $row['user_allow_viewonline'])) ? (($row['user_lastlogon'])? create_date($board_config['default_dateformat'], $row['user_lastlogon'], $board_config['board_timezone']):$lang['Never_last_logon']):$lang['Hidde_last_logon'],
// End add - Last visit MOD
			'POSTS' => $posts,
			'AVATAR_IMG' => $poster_avatar,
			'PROFILE_IMG' => $profile_img, 
			'PROFILE' => $profile, 
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
			'MINILAND' => $miniland,
            'GENDER' => $gender,
//-- début mod : Add-on pour Birthday --------------------------------------------------------------------
//-- ajouter			
			'POSTER_AGE' => $poster_age,
			'ZODIAC_IMG' => $zodiac_img,
			'ZODIAC' => $zodiac,
			'U_ZODIAC' => $u_zodiac,
			'L_ZODIAC' => ($zodiac) ? $lang['Zodiac'] . ': ' : '',
			'CHINESE' => $lang[$chinese],
			'CHINESE_IMG' => $chinese_img,
			'U_CHINESE' => $u_chinese,
			'L_CHINESE' => $lang['Chinese_zodiac'],
//-- fin mod : Add-on pour Birthday ----------------------------------------------------------------
			
			'U_VIEWPROFILE' => append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$user_id"))
);

		$cm_memberlist->listing($template,$row
		);

		$i++;
	}
	while ( $row = $db->sql_fetchrow($result) );
	$db->sql_freeresult($result);
}
//-- mod : totally erc ---------------------------------------------------------
//-- add
else
{
	$message = $lang['No_match'] . '<br /><br />' . sprintf($lang['Click_return_index'], '<a href="' . append_sid("index.$phpEx") . '">', '</a>');

	message_die(GENERAL_MESSAGE, $message);
}
//-- fin mod : totally erc -----------------------------------------------------

if ( $mode != 'topten' || $board_config['topics_per_page'] < 10 )
{
	$sql = "SELECT count(*) AS total
		FROM " . USERS_TABLE . "
		WHERE user_id <> " . ANONYMOUS;
		//-- mod : totally erc ---------------------------------------------------------
//-- add
	if ( !empty($sql_where) )
	{
		$sql = str_replace('WHERE ', 'WHERE ' . $sql_where, $sql);
	}
//-- fin mod : totally erc -----------------------------------------------------

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Error getting total users', '', __LINE__, __FILE__, $sql);
	}

	if ( $total = $db->sql_fetchrow($result) )
	{
		$total_members = $total['total'];

		//-- mod : totally erc ---------------------------------------------------------
// here we added
//	" . $display . "
//-- modify
		$pagination = generate_pagination("memberlist.$phpEx?mode=$mode" . $display . "&amp;order=$sort_order", $total_members, $board_config['topics_per_page'], $start). '&nbsp;';
	//-- fin mod : totally erc -----------------------------------------------------
	}
	$db->sql_freeresult($result);
}
else
{
	$pagination = '&nbsp;';
	$total_members = 10;
}

$template->assign_vars(array(
	'PAGINATION' => $pagination,
	'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $board_config['topics_per_page'] ) + 1 ), ceil( $total_members / $board_config['topics_per_page'] )), 

	'L_GOTO_PAGE' => $lang['Goto_page'])
);

$template->pparse('body');

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>