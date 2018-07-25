<?php
/***************************************************************************
 *				totally_erc.php
 *				---------------
 *   begin		: Saturday, Mar 19, 2005
 *   copyright		: reddog - http://www.reddevboard.com/
 *   version		: 1.0.4 - 27/05/2005
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

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

//--------------------------------------------------------------------------------------------------
//
// totally_erc() : the color will be with you ;)
//
//--------------------------------------------------------------------------------------------------
function totally_erc($erc,$number=0)
{
	global $whosonline_color, $id_color, $user_group_color;
	global $board_config, $theme, $db;

	$erc_level = ($number) ? 'user_level' . $number : 'user_level';
	$erc_user = ($number) ? 'username' . $number : 'username';
	$erc_color = ($number) ? 'user_whosonline_color' . $number : 'user_whosonline_color';
	$erc_id = ($number) ? 'user_id' . $number : 'user_id';

	switch ( $erc[$erc_level] )
	{
		case ADMIN:
			$username_erc = '<strong>' . $erc[$erc_user] . '</strong>';
			$style_color = ' style="color:#' . $theme['fontcolor3'] . '"';
			break;
		case MOD:
			$username_erc = '<strong>' . $erc[$erc_user] . '</strong>';
			$style_color = ' style="color:#' . $theme['fontcolor2'] . '"';
			break;
		default:
			$username_erc = '<strong>' . $erc[$erc_user] . '</strong>';
			$style_color = '';
			break;
	}
	if ( $erc[$erc_color] && $board_config['allow_totally_erc'] )
	{
		$username_erc = '<strong>' . $erc[$erc_user] . '</strong>';
		$style_color = ' style="color:' . $id_color[$erc[$erc_color]] . '"';
	}
	else if ( $user_group_color[$erc[$erc_id]] && $board_config['allow_totally_erc'] )
	{
		$username_erc = '<strong>' . $erc[$erc_user] . '</strong>';
		$style_color = ' style="color:' . $user_group_color[$erc[$erc_id]] . '"';
	}
	return array('username_erc' => $username_erc, 'style_color' => $style_color);
}

//--------------------------------------------------------------------------------------------------
//
// check_erc() : check color from erc and build the cache erc file
//
//--------------------------------------------------------------------------------------------------
function check_erc()
{
	global $phpbb_root_path, $phpEx, $db, $board_config, $lang;
	global $whosonline_color, $id_color, $user_group_color;

	$data = "<?php\n";

	$ranks_sql= " SELECT * 
		FROM " . WHOSONLINE_RANKS_TABLE . " 
		ORDER BY whosonline_rank_order";
	if ( !($ranks_result = $db->sql_query($ranks_sql)) )
	{
		message_die(GENERAL_MESSAGE, 'Fatal Error into getting extend rank color');
	}
	while( $rank_row = $db->sql_fetchrow($ranks_result) )
	{
		$rank_name = ($rank_row['whosonline_lang_key'] && isset($lang[$rank_row['whosonline_rank_name']])) ? $lang[$rank_row['whosonline_rank_name']] : $rank_row['whosonline_rank_name'];
		$whosonline_color .= '[ <span style="color:' . $rank_row['whosonline_rank_color'] . '"><strong>' . $rank_name . '</strong></span> ]&nbsp;&nbsp;';
		$id_color[$rank_row['whosonline_rank_id']] = $rank_row['whosonline_rank_color'];
		$data .= '$id_color[' . $rank_row['whosonline_rank_id'] . '] = \'' . $rank_row['whosonline_rank_color'] . "';\n";
	}

	$data .= '$whosonline_color = \'' . addslashes($whosonline_color) . "';\n";

	$group_user_sql= "SELECT ug.group_id, ug.user_id, g.group_color
		FROM " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g, " . WHOSONLINE_RANKS_TABLE . " wr
		WHERE  ug.group_id = g.group_id
			AND g.group_color <> '0' 
			AND ug.user_pending <> '1'
			AND wr.whosonline_rank_id = g.group_color
		ORDER BY wr.whosonline_rank_order DESC";
	if ( !($group_user_result = $db->sql_query($group_user_sql)) )
	{
		message_die(GENERAL_MESSAGE, 'Fatal Error into getting user in group');
	}
	while( $group_user_row = $db->sql_fetchrow($group_user_result) )
	{
	 	$user_group_color[$group_user_row['user_id']] = $id_color[$group_user_row['group_color']];
	 	$data .= '$user_group_color[' . $group_user_row['user_id'] . '] = \'' . $id_color[ $group_user_row['group_color'] ] . "';\n";
	}

	$data .= "?>";

	if ($board_config['cache_erc'])
	{
		// output to file
		$cache_file_erc = $phpbb_root_path . 'cache/def_erc.' . $phpEx;
		$fp = @fopen( $cache_file_erc, 'w' );
		@fwrite($fp, $data);
		@fclose($fp);
		@chmod($cache_file_erc, 0666);	
	}
	return;
}

//
// Generate erc data
//
if ( $board_config['allow_totally_erc'] )
{
	if ($board_config['cache_erc'])
	{
		$whosonline_color = '';
		@include( $phpbb_root_path . 'cache/def_erc.' . $phpEx );
		if ( empty($whosonline_color) )
		{
			check_erc();
			include( $phpbb_root_path . 'cache/def_erc.' . $phpEx );
		}
		@reset($whosonline_color);
	}
	else
	{
		check_erc();
	}
}

?>