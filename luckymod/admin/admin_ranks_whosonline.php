<?php
/***************************************************************************
 *                         whosonline_admin_ranks.php
 *                            -------------------
 *   begin                :  Feb 12, 2004
 *   copyright            : (C) 2004 The phpBB Group, gendo, bigz
 *   email                : bigz@denturax.com || gendo@denturax.com
 *   $Id: whosonline_admin_ranks.php, v 1.6.3 2005/01/09 19:07 gendo Exp $
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

define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['Users']['Ranks_whosonline'] = "$file";
	return;
}

//
// Include required files, get $phpEx and check permissions
//
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
include($phpbb_root_path . 'language/lang_' . $userdata['user_lang'] . 	'/lang_erc.' . 	$phpEx);

$mode = '';
if ( isset($HTTP_POST_VARS['mode']) || isset($HTTP_GET_VARS['mode']) )
{
	$mode = isset($HTTP_POST_VARS['mode']) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
}
if ( !empty($mode) && !in_array( $mode, array('delete', 'save', 'edit', 'move_up', 'move_down', 'add') ) )
{
	$mode = '';
}

if( $mode != "" )
{
	if( $mode == "edit" || $mode == "add" )
	{
		//
		// They want to add a new rank, show the form.
		//
		$rank_id = ( isset($HTTP_GET_VARS['id']) ) ? intval($HTTP_GET_VARS['id']) : 0;

		$s_hidden_fields = "";

		if( $mode == "edit" )
		{
			if( empty($rank_id) )
			{
				message_die(GENERAL_MESSAGE, $lang['Must_select_rank']);
			}

			$sql = "SELECT * FROM " . WHOSONLINE_RANKS_TABLE . "
				WHERE whosonline_rank_id = $rank_id";
			if(!$result = $db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, "Couldn't obtain rank data", "", __LINE__, __FILE__, $sql);
			}

			$rank_info = $db->sql_fetchrow($result);
			$s_hidden_fields .= '<input type="hidden" name="id" value="' . $rank_id . '" />';

		}

		$s_hidden_fields .= '<input type="hidden" name="mode" value="save" />';

		$template->set_filenames(array(
			"body" => "admin/whosonline_ranks_edit_body.tpl")
		);

		$template->assign_vars(array(
			"RANK" => $rank_info['whosonline_rank_name'],
			"RANK_COLOR" => $rank_info['whosonline_rank_color'],

			"L_RANKS_TITLE" => $lang['Ranks_title'],
			"L_RANKS_TEXT" => $lang['Ranks_explain'],
			"L_RANK_TITLE" => $lang['Rank_title'],
			"L_SUBMIT" => $lang['Submit'],
			"L_RESET" => $lang['Reset'],
			"L_RANK_COLOR" => $lang['color'],
			"L_COLOR_DARK_RED" => $lang['color_dark_red'],
			"L_COLOR_RED" => $lang['color_red'],
			"L_COLOR_ORANGE" => $lang['color_orange'],
			"L_COLOR_BROWN" => $lang['color_brown'],
			"L_COLOR_YELLOW" => $lang['color_yellow'],
			"L_COLOR_GREEN" => $lang['color_green'],
			"L_COLOR_OLIVE" => $lang['color_olive'],
			"L_COLOR_CYAN" => $lang['color_cyan'],
			"L_COLOR_BLUE" => $lang['color_blue'],
			"L_COLOR_DARK_BLUE" => $lang['color_dark_blue'],
			"L_COLOR_INDIGO" => $lang['color_indigo'],
			"L_COLOR_VIOLET" => $lang['color_violet'],
			"L_COLOR_WHITE" => $lang['color_white'],
			"L_COLOR_BLACK" => $lang['color_black'],
			"L_YES" => $lang['Yes'],
			"L_NO" => $lang['No'],
			"L_USE_LANG_KEY" => $lang['use_lang_key'],
			"L_USE_LANG_KEY_EXPLAIN" => $lang['use_lang_key_explain'],
			"L_USE_COLOR_EXPLAIN" => $lang['use_colour_explain'], 

			"S_LANG_KEY_YES" => ($rank_info['whosonline_lang_key']) ? 'checked="checked"' : '', 
			"S_LANG_KEY_NO" => (!$rank_info['whosonline_lang_key']) ? 'checked="checked"' : '', 
			"S_RANK_ACTION" => append_sid("admin_ranks_whosonline.$phpEx"),
			"S_HIDDEN_FIELDS" => $s_hidden_fields)
		);
		
	}
	else if( $mode == "save" )
	{
		//
		// Ok, they sent us our info, let's update it.
		//

		$rank_id = ( isset($HTTP_POST_VARS['id']) ) ? intval($HTTP_POST_VARS['id']) : 0;
		$rank_name = htmlspecialchars($HTTP_POST_VARS['rank_name']);
		$rank_color = htmlspecialchars($HTTP_POST_VARS['rank_color']);
		$rank_lang_key = htmlspecialchars(trim($HTTP_POST_VARS['lang_key']));
		

		if( $rank_name == "" )
		{
			message_die(GENERAL_MESSAGE, "<b>" . $lang['Must_select_rank'] . "</b><br /><br />" . sprintf($lang['Click_return_rankadmin'], "<a href=\"" . append_sid("admin_ranks_whosonline.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>"));
		}


		if ($rank_id)
		{
			$sql = "UPDATE " . WHOSONLINE_RANKS_TABLE . "
				SET whosonline_rank_name = '" . str_replace("\'", "''", $rank_name) . "', whosonline_rank_color = '" . str_replace("\'", "''", $rank_color) . "',
				whosonline_lang_key = $rank_lang_key
				WHERE whosonline_rank_id = $rank_id";
			$message = $lang['Rank_updated'];
		}
		else
		{

			$sql = "SELECT MAX(whosonline_rank_order) AS max_order
				FROM " . WHOSONLINE_RANKS_TABLE;
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't get order number from who is online ranks table", "", __LINE__, __FILE__, $sql);
			}
			$row = $db->sql_fetchrow($result);

			$max_order = $row['max_order'];
			$rank_order = $max_order + 10;

			$sql = "INSERT INTO " . WHOSONLINE_RANKS_TABLE . " (whosonline_rank_id, whosonline_rank_name, whosonline_rank_color, whosonline_rank_order)
				VALUES ('', '" . str_replace("\'", "''", $rank_name) . "', '$rank_color', $rank_order)";

			$message = $lang['Rank_added'];
		}

		if( !$result = $db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, "Couldn't update/insert into who is online ranks table", "", __LINE__, __FILE__, $sql);
		}

		//-- mod : totally erc ---------------------------------------------------------
//-- add
		// recache whosonline color groups
		if ($board_config['allow_totally_erc'] && $board_config['cache_erc'])
		{
			$erc->check_colors();
		}
//-- fin mod : totally erc -----------------------------------------------------
		
		$message .= "<br /><br />" . sprintf($lang['Click_return_rankadmin'], "<a href=\"" . append_sid("admin_ranks_whosonline.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

		message_die(GENERAL_MESSAGE, $message);

	}
	else if( $mode == "delete" )
	{
		//
		// Ok, they want to delete their rank
		//		
		if( isset($HTTP_POST_VARS['id']) || isset($HTTP_GET_VARS['id']) )
		{
			$rank_id = ( isset($HTTP_POST_VARS['id']) ) ? intval($HTTP_POST_VARS['id']) : intval($HTTP_GET_VARS['id']);
		}
		else
		{
			$rank_id = 0;
		}

		if( $rank_id )
		{
			$sql = "DELETE FROM " . WHOSONLINE_RANKS_TABLE . "
				WHERE   whosonline_rank_id = $rank_id";

			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't delete rank data", "", __LINE__, __FILE__, $sql);
			}

			//-- mod : totally erc ---------------------------------------------------------
//-- add
			// delete user whosonline color
			$whosonline_rank = 0;
			$sql = 'UPDATE ' . USERS_TABLE . '
				SET user_whosonline_color = \'' . $whosonline_rank . '\'
				WHERE user_whosonline_color = ' . $rank_id;
			if (!$db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, 'Could not update users table', '', __LINE__, __FILE__, $sql);
			}

			// recache whosonline color groups
			if ($board_config['allow_totally_erc'] && $board_config['cache_erc'])
			{
				$erc->check_colors();
			}
//-- fin mod : totally erc -----------------------------------------------------
			
			$message = $lang['Rank_removed'] . "<br /><br />" . sprintf($lang['Click_return_rankadmin'], "<a href=\"" . append_sid("admin_ranks_whosonline.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

			message_die(GENERAL_MESSAGE, $message);

		}
		else
		{
			message_die(GENERAL_MESSAGE, $lang['Must_select_rank']);
		}
	}
	else if( $mode == "move_up" || $mode == "move_down")
	{
		$inc = ( $mode == "move_down") ? +15 : -15;
		$rank_id = ( isset($HTTP_GET_VARS['id']) ) ? intval($HTTP_GET_VARS['id']) : 0;

			if( empty($rank_id) )
			{
				message_die(GENERAL_MESSAGE, $lang['Must_select_rank']);
			}

			$sql = "UPDATE " . WHOSONLINE_RANKS_TABLE . "
				SET  whosonline_rank_order = whosonline_rank_order + $inc
				WHERE whosonline_rank_id = $rank_id";
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't change who is online rank order", "", __LINE__, __FILE__, $sql);
			}

			$sql = "SELECT * FROM " . WHOSONLINE_RANKS_TABLE . "
					ORDER BY whosonline_rank_order";
			if( !$result = $db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Couldn't obtain who is online ranks data", "", __LINE__, __FILE__, $sql);
			}

			$inc = 10;
			while( $row = $db->sql_fetchrow($result) )
			{
				$sql = "UPDATE " . WHOSONLINE_RANKS_TABLE . "
					SET whosonline_rank_order = $inc
					WHERE whosonline_rank_id = " . $row['whosonline_rank_id'];
				if( !$db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, "Couldn't update order fields", "", __LINE__, __FILE__, $sql);
				}
				$inc += 10;
			}
			
			$message = $lang['Rank_order_updated'] . "<br /><br />" . sprintf($lang['Click_return_rankadmin'], "<a href=\"" . append_sid("admin_ranks_whosonline.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

			message_die(GENERAL_MESSAGE, $message);
	}
}
else
{
	//
	// Show the default page
	//
	$template->set_filenames(array(
		"body" => "admin/whosonline_ranks_list_body.tpl")
	);

	$sql = "SELECT * FROM " . WHOSONLINE_RANKS_TABLE . "
			ORDER BY whosonline_rank_order";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Couldn't obtain who is online ranks data", "", __LINE__, __FILE__, $sql);
	}
	$rank_count = $db->sql_numrows($result);

	$rank_rows = $db->sql_fetchrowset($result);

	$template->assign_vars(array(
		"L_RANKS_TITLE" => $lang['whosonline_ranks_title'],
		"L_RANKS_TEXT" => $lang['whosonline_ranks_explain'],
		"L_RANK" => $lang['whosonline_rank_title'],
		"L_EDIT" => $lang['Edit'],
		"L_DELETE" => $lang['Delete'],
		"L_PRIORITY" => $lang['Order_and_priority'],
		"L_ADD_RANK" => $lang['Add_new_rank'],
		"L_ACTION" => $lang['Action'],
		"L_COLOR" => $lang['color'],
		"L_MOVE_UP" => $lang['Move_up'],
		"L_MOVE_DOWN" => $lang['Move_down'],

		"S_RANKS_ACTION" => append_sid("admin_ranks_whosonline.$phpEx?mode=add"))
	);

	for($i = 0; $i < $rank_count; $i++)
	{
		$rank = $rank_rows[$i]['whosonline_rank_name'];
		$rank_color = $rank_rows[$i]['whosonline_rank_color'];
		$rank = '<font color="' . $rank_color . '">' . $rank . '</font>';
		$rank_id = $rank_rows[$i]['whosonline_rank_id'];

		$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
		$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

		$rank_is_special = ( $special_rank ) ? $lang['Yes'] : $lang['No'];

		$template->assign_block_vars("ranks", array(
			"ROW_COLOR" => "#" . $row_color,
			"ROW_CLASS" => $row_class,
			"RANK" => $rank,
			"RANK_COLOR" => $rank_color,

			"U_RANK_MOVE_UP" => append_sid("admin_ranks_whosonline.$phpEx?mode=move_up&amp;id=$rank_id"),
			"U_RANK_MOVE_DOWN" => append_sid("admin_ranks_whosonline.$phpEx?mode=move_down&amp;id=$rank_id"),
			"U_RANK_EDIT" => append_sid("admin_ranks_whosonline.$phpEx?mode=edit&amp;id=$rank_id"),
			"U_RANK_DELETE" => append_sid("admin_ranks_whosonline.$phpEx?mode=delete&amp;id=$rank_id"))
		);
	}
}

$template->pparse("body");

include('./page_footer_admin.'.$phpEx);

?>
