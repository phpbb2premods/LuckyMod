<?php
/**
*
* @package totally_erc_mod
* @version $Id: class_erc.php,v 0.2 08/03/2006 20:10 reddog Exp $
* @copyright (c) 2006 reddog - http://www.reddevboard.com/
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

class erc
{
	function get_colors($erc_dta, $erc_user='', $number=false, $erc_id='', $erc_color='', $erc_level='')
	{
		global $db, $board_config, $theme;
		global $id_color, $id_group;

		$erc_id = (!$erc_id) ? (($number) ? 'user_id' . $number : 'user_id') : $erc_id;
		$erc_color = (!$erc_color) ? (($number) ? 'user_whosonline_color' . $number : 'user_whosonline_color') : $erc_color;
		$erc_level = (!$erc_level) ? (($number) ? 'user_level' . $number : 'user_level') : $erc_level;

		$theme['erc_admincolor'] = (!empty($theme['erc_admincolor'])) ? $theme['erc_admincolor'] : $theme['fontcolor3'];
		$theme['erc_modcolor'] = (!empty($theme['erc_modcolor'])) ? $theme['erc_modcolor'] : $theme['fontcolor2'];

		switch ($erc_dta[$erc_level])
		{
			case ADMIN:
				$user_color = (!empty($erc_user)) ? '<span' : '';
				$user_color .= ' style="color:#' . $theme['erc_admincolor'] . '; font-weight: bold;"';
				$user_color .= (!empty($erc_user)) ? '>' . $erc_user . '</span>' : '';
				break;
			case MOD:
				$user_color = (!empty($erc_user)) ? '<span' : '';
				$user_color .= ' style="color:#' . $theme['erc_modcolor'] . '; font-weight: bold;"';
				$user_color .= (!empty($erc_user)) ? '>'. $erc_user .'</span>' : '';
				break;
			default:
				$user_color = (!empty($erc_user) && !empty($theme['erc_usercolor'])) ? '<span' : '';
				$user_color .= (!empty($theme['erc_usercolor'])) ? ' style="color:#' . $theme['erc_usercolor'] . '"' : '';
				$user_color .= (!empty($erc_user) && !empty($theme['erc_usercolor'])) ? '>'. $erc_user .'</span>' : $erc_user;
				break;
		}
		if ($erc_dta[$erc_color] && $board_config['allow_totally_erc'])
		{
			$user_color = (!empty($erc_user)) ? '<span' : '';
			$user_color .= ' style="color:' . $id_color[$erc_dta[$erc_color]] . '; font-weight: bold;"';
			$user_color .= (!empty($erc_user)) ? '>'. $erc_user .'</span>' : '';
		}
		else if ($id_group[$erc_dta[$erc_id]] && $board_config['allow_totally_erc'])
		{
			$user_color = (!empty($erc_user)) ? '<span' : '';
			$user_color .= ' style="color:' . $id_group[$erc_dta[$erc_id]] . '; font-weight: bold;"';
			$user_color .= (!empty($erc_user)) ? '>'. $erc_user .'</span>' : '';
		}

		return $user_color;
	}

	function update_colors($user_ids, $new_color=false, $sql_in=false)
	{
		global $db;

		$sql_where = (!empty($sql_in)) ? 'IN (' . $user_ids . ')' : '= ' . $user_ids;
		$sql = 'UPDATE ' . USERS_TABLE . '
			SET user_whosonline_color = \'' . intval($new_color) . '\'
			WHERE user_id ' . $sql_where;
		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not update users table', '', __LINE__, __FILE__, $sql);
		}

		return;
	}

	function display_legend()
	{
		global $db, $board_config, $lang, $theme, $template, $phpEx;

		$theme['erc_admincolor'] = (!empty($theme['erc_admincolor'])) ? $theme['erc_admincolor'] : $theme['fontcolor3'];
		$theme['erc_modcolor'] = (!empty($theme['erc_modcolor'])) ? $theme['erc_modcolor'] : $theme['fontcolor2'];

		$user_levels = array(
			ADMIN => ($board_config['group_admin_erc'] || empty($board_config['allow_group_index']) || empty($board_config['allow_totally_erc'])) ? array('legend' => 'Administrator', 'style' => ' style="color:#' . $theme['erc_admincolor'] . '; font-weight: bold;"', 'link_pgm' => 'memberlist.', 'link_parms' => ADMIN) : '',
			MOD => ($board_config['group_mod_erc'] || empty($board_config['allow_group_index']) || empty($board_config['allow_totally_erc'])) ? array('legend' => 'Moderator', 'style' => ' style="color:#' . $theme['erc_modcolor'] . '; font-weight: bold;"', 'link_pgm' => 'memberlist.', 'link_parms' => MOD) : '',
			USER => (empty($board_config['allow_group_index']) || empty($board_config['allow_totally_erc'])) ? array('legend' => 'User', 'style' => (!empty($theme['erc_usercolor']) ? ' style="color:#' . $theme['erc_usercolor'] . '; font-weight: bold;"' : ''), 'link_pgm' => 'memberlist.', 'link_parms' => '') : '',
		);

		// display legend
		$template->assign_block_vars('stats', array(
			'L_LEGEND' => $lang['Legend']
		));

		// display default legend
		$cnt_legend = 0;
		$cnt_levels = count($user_levels);
		foreach ($user_levels as $user_level => $level_data)
		{
			if (!empty($level_data['legend']))
			{
				$template->assign_block_vars('stats.legend', array(
					'U_LEVEL' => empty($level_data['link_parms']) ? append_sid($level_data['link_pgm'].$phpEx) : append_sid($level_data['link_pgm'].$phpEx.'?level='.$level_data['link_parms']),
					'LEVEL_NAME' => $lang[$level_data['legend']],
					'STYLE' => $level_data['style'],
					'SEP' => ($cnt_legend < ($cnt_levels - 1)) ? ',' : '',
				));
				$cnt_legend++;
			}
		}

		// display whosonline color groups
		if ($board_config['allow_totally_erc'] && $board_config['allow_group_index'])
		{
			$sql = 'SELECT *
				FROM ' . WHOSONLINE_RANKS_TABLE . '
				ORDER BY whosonline_rank_order';
			if (!$result = $db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, 'Could not obtain whosonline ranks data', '', __LINE__, __FILE__, $sql);
			}

			$cnt_ranks = 0;
			$cnt_rows = $db->sql_numrows($result);
			while ($row = $db->sql_fetchrow($result))
			{
				$erc_id = $row['whosonline_rank_id'];
				if (!empty($erc_id))
				{
					$template->assign_block_vars('stats.legend', array(
						'U_LEVEL' => append_sid('memberlist.'.$phpEx.'?erc='.$erc_id),
						'LEVEL_NAME' => ($row['whosonline_lang_key'] && isset($lang[$row['whosonline_rank_name']])) ? $lang[$row['whosonline_rank_name']] : $row['whosonline_rank_name'],
						'STYLE' => ' style="color:' . $row['whosonline_rank_color'] . '; font-weight: bold;"',
						'SEP' => ($cnt_ranks < $cnt_rows) ? ',' : '',
					));
					$cnt_ranks++;
				}
			}
			$db->sql_freeresult($result);

			// display user group else
			$template->assign_block_vars('stats.legend', array(
				'U_LEVEL' => append_sid('memberlist.'.$phpEx.'?erc=-1'),
				'LEVEL_NAME' => $lang['User'],
				'STYLE' => (!empty($theme['erc_usercolor'])) ? ' style="color:#' . $theme['erc_usercolor'] . '; font-weight: bold;"' : '',
			));
		}
	}

	function check_colors()
	{
		global $db, $board_config, $phpbb_root_path, $phpEx;
		global $id_color, $id_group;

		$output = "<?php\n";

		$ranks_sql = 'SELECT * 
			FROM ' . WHOSONLINE_RANKS_TABLE . ' 
			ORDER BY whosonline_rank_order';
		if (!$ranks_result = $db->sql_query($ranks_sql))
		{
			message_die(GENERAL_ERROR, 'Could not obtain whosonline ranks data', '', __LINE__, __FILE__, $sql);
		}

		while ($ranks_row = $db->sql_fetchrow($ranks_result))
		{		
			$id_color[$ranks_row['whosonline_rank_id']] = $ranks_row['whosonline_rank_color'];
			$output .= '$id_color[' . $ranks_row['whosonline_rank_id'] . '] = \'' . $ranks_row['whosonline_rank_color'] . "';\n";
		}
		$db->sql_freeresult($result);

		$groups_sql = 'SELECT ug.group_id, ug.user_id, g.group_color
			FROM ' . USER_GROUP_TABLE . ' ug, ' . GROUPS_TABLE . ' g, ' . WHOSONLINE_RANKS_TABLE . ' wr
			WHERE  ug.group_id = g.group_id
				AND g.group_color <> 0
				AND ug.user_pending <> 1
				AND wr.whosonline_rank_id = g.group_color
			ORDER BY wr.whosonline_rank_order DESC';
		if (!$groups_result = $db->sql_query($groups_sql))
		{
			message_die(GENERAL_ERROR, 'Could not obtain groups color data', '', __LINE__, __FILE__, $sql);
		}

		while ($groups_row = $db->sql_fetchrow($groups_result))
		{
		 	$id_group[$groups_row['user_id']] = $id_color[$groups_row['group_color']];
		 	$output .= '$id_group[' . $groups_row['user_id'] . '] = \'' . $id_color[ $groups_row['group_color'] ] . "';\n";
		}
		$db->sql_freeresult($groups_result);

		$output .= "?>";

		if ($board_config['cache_erc'])
		{
			// output to file
			$cache_file_erc = $phpbb_root_path . 'cache/dta_erc.' . $phpEx;
			$fp = @fopen($cache_file_erc, 'w');
			@fwrite($fp, $output);
			@fclose($fp);
			@chmod($cache_file_erc, 0666);
		}

		return;
	}
}

// generate totally erc data
if ($board_config['allow_totally_erc'])
{
	if ($board_config['cache_erc'])
	{
		$id_color = $id_group = '';
		@include($phpbb_root_path . 'cache/dta_erc.' . $phpEx);
		if (empty($id_color) && empty($id_group))
		{
			$erc = new erc();
			$erc->check_colors();
			include($phpbb_root_path . 'cache/dta_erc.' . $phpEx);
		}
		@reset($id_color);
		@reset($id_group);
	}
	else
	{
		$erc = new erc();
		$erc->check_colors();
	}
}

?>