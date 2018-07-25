<?php

/***************************************************************************
 *                                mod_toparcade.php
 *                            -------------------
 *   fait le                : Dimanche,16 Novembre, 2003
 *   Par : giefca - giefca@hotmail.com - http://www.gf-phpbb.com
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
   'body' => $phpbb_root_path . '/templates/' . $theme['template_name'] . '/modportal/mod_toparcade.tpl')
);

	$template_mod->assign_vars(array(
	"TOP_PLAYER" => $lang['Topgamers'],
	"PLAYER" => $lang['Player'],
	"LISTE" => $lang['Liste'],
	"VICTOIRES" => $lang['Victoires'])
	);
	
	$sql = "SELECT COUNT(*) AS nbvictoires, g.game_highuser, u.user_id, u.username, u.user_level, u.user_rank,u.user_whosonline_color  FROM " . GAMES_TABLE . " g LEFT JOIN
	 " . USERS_TABLE . " u on g.game_highuser = u.user_id WHERE g.game_highuser<>0 GROUP BY g.game_highuser ORDER BY nbvictoires DESC LIMIT 5 ";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, "Could not query games information", "", __LINE__, __FILE__, $sql);
	}
	$place=0;
	$nbvictprec=0;
	while ( $row = $db->sql_fetchrow($result) )
	{
	    if ($nbvictprec<>$row['nbvictoires'])
		{
		 $place++;
		 $nbvictprec=$row['nbvictoires'];
		}
		
		 $style_color = '';
			if ( $row['user_whosonline_color'] )
			{
			$row['username'] = '<b>' . $row['username'] . '</b>';
				$style_color = 'style="color:' . $id_color[$row[user_whosonline_color]] . '"';
			}
			else if ( $row['user_level'] == ADMIN )
			{
				$row['username'] = '<b>' . $row['username'] . '</b>';
				$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
			}
			else if ( $row['user_level'] == MOD )
			{
				$row['username'] = '<b>' . $row['username'] . '</b>';
				$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
			}
			else if ( $user_group_color[$row['user_id']])
			{
				$row['username'] = '<b>' . $row['username'] . '</b>';
				$style_color = 'style="color:' . $user_group_color[ $row['user_id'] ] . '"';
			}		

		$user_online_link = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '"' . $style_color .'>' . $row['username'] . '</a>';

	  	$class = ($class == 'row1') ? 'row2' : 'row1' ;

		$template_mod->assign_block_vars('player_row', array(
      			'CLASS' => $class,
			'CLASSEMENT' => $place,
			'USERNAME' => $user_online_link,
			'VICTOIRES' => $row['nbvictoires'])
		);
	}
		
$modvar = $template_mod->pparse_mod('body');

?>