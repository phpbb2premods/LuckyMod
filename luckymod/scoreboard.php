<?php

/***************************************************************************
 *                                scoreboard.php
 *                            -------------------
 *   fait le                : Dimanche,14 Juin, 2003
 *   Par : giefca - http://www.gf-phpbb.com
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include( $phpbb_root_path . 'includes/functions_arcade.' . $phpEx);

//
// Start initial var setup
//
if ( isset($HTTP_GET_VARS['gid']) || isset($HTTP_POST_VARS['gid']) )
{
	$gid = ( isset($HTTP_GET_VARS['gid']) ) ? intval($HTTP_GET_VARS['gid']) : intval($HTTP_POST_VARS['gid']);
}
else
{
	$gid = '';
}

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_SCOREBOARD);
init_userprefs($userdata);
//
// End session management
//

$sql = "SELECT arcade_catid FROM " . GAMES_TABLE . " WHERE game_id = '$gid'" ; 
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder � la tables des jeux", '', __LINE__, __FILE__, $sql); 
}

if ( !( $row = $db->sql_fetchrow($result) ) )
{
	message_die(GENERAL_MESSAGE, "Ce jeu n'existe pas", '', __LINE__, __FILE__, $sql); 
}


$liste_cat_auth_view = get_arcade_categories($userdata['user_id'], $userdata['user_level'],'view');
$tbauth_view = array();
$tbauth_view = explode(',',$liste_cat_auth_view);
if( !in_array($row['arcade_catid'],$tbauth_view))
{
	message_die(GENERAL_MESSAGE, $lang['game_forbidden']); 
}

$start = ( isset($HTTP_GET_VARS['start']) ) ? intval($HTTP_GET_VARS['start']) : 0;

if ( !empty($gid) )
{
	$sql = "SELECT *
		FROM " . SCORES_TABLE . "
		WHERE game_id = $gid";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
	}
}
else
{
	message_die(GENERAL_MESSAGE, 'Ce jeu n\'existe pas');
}

if ( !($score_row = $db->sql_fetchrow($result)) )
{
	message_die(GENERAL_MESSAGE, 'Aucun score pour ce jeu');
}

$score_count = $db->sql_numrows($result) ;

$sql = "SET OPTION SQL_BIG_SELECTS=1 ";
$db->sql_query($sql) ;
$sql = "SELECT count(*) as num, s.*, u.username, g.game_name
 FROM " . SCORES_TABLE . " s left join " . SCORES_TABLE . " s2 on s.score_game<=s2.score_game and s.game_id = s2.game_id 
 left join " . USERS_TABLE . " u on s.user_id = u.user_id  left join " . GAMES_TABLE . " g on g.game_id = s.game_id
	WHERE s.game_id = $gid and ((s.score_game<s2.score_game) or (s.user_id=s2.user_id))
	GROUP BY s.user_id 
	 	ORDER BY s.score_game DESC, s.score_date ASC
    LIMIT $start, ".$board_config['topics_per_page'];

if ( !($result = $db->sql_query($sql)) )
{
   message_die(GENERAL_ERROR, 'Impossible d\'acc�der � la table des scores', '', __LINE__, __FILE__, $sql);
}

$total_score = 0;

while( $row = $db->sql_fetchrow($result) )
{
	$score_rowset[] = $row;
	$gamename = $row['game_name'] ;		
	$total_score++;
}
$db->sql_freeresult($result);

//
// Post URL generation for templating vars
//

$template->assign_vars(array(
	'URL_ARCADE' => '<nobr><a class="cattitle" href="' . append_sid("arcade.$phpEx") . '">' . $lang['lib_arcade'] . '</a></nobr> ',
	'URL_BESTSCORES' => '<nobr><a class="cattitle" href="' . append_sid("toparcade.$phpEx") . '">' . $lang['best_scores'] . '</a></nobr> ',
	'GAMENAME' => '<nobr><a class="cattitle" href="' . append_sid("games.$phpEx?gid=" . $gid ) . '">' . $gamename . '</a></nobr> ')
);

//
// Mozilla navigation bar
//

$nav_links['up'] = array(
	'url' => append_sid('index.'.$phpEx),
	'title' => sprintf($lang['Forum_Index'], $board_config['sitename'])
);

//
// Dump out the page header and load viewforum template
//
$page_title = $lang['scoreboard'] ;

include($phpbb_root_path . 'includes/page_header.'.$phpEx);
$template->set_filenames(array(
	'body' => 'scoreboard_body.tpl')
);

$template->assign_vars(array(
	'L_POS' => $lang['boardrank'],
	'L_SCORE' => $lang['boardscore'],
	'L_DATE' => $lang['boarddate'],
	'L_USER' => $lang['boardplayer'],
	)
);

//
// End header
//

//
// Okay, lets dump out the page ...
//
if( $total_score )
{
	for($i = 0; $i < $total_score; $i++)
	{
		$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
		$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];
		$template->assign_block_vars('scorerow', array(
			'ROW_COLOR' => $row_color,
			'ROW_CLASS' => $row_class,
			'POS' =>  $score_rowset[$i]['num'],
			'SCORE' =>  $score_rowset[$i]['score_game'],
			'PLAYER' => $score_rowset[$i]['username'],
	        'URL_STATS' => '<nobr><a class="cattitle" href="' . append_sid("statarcade.$phpEx?uid=" . $score_rowset[$i]['user_id'] ) . '">' . "<img src='templates/" . $theme['template_name'] . "/images/loupe.gif' align='absmiddle' border='0' alt='" . $lang['statuser'] . " " . $score_rowset[$i]['username'] . "'>" . '</a></nobr> ',
			'GOTO_PAGE' => $goto_page,
			'DATE' => create_date( $board_config['default_dateformat'] , $score_rowset[$i]['score_date'] , $board_config['board_timezone'] ))			
		);
	}

	$template->assign_vars(array(
		'PAGINATION' => generate_pagination("scoreboard.$phpEx?gid=$gid", $score_count, $board_config['topics_per_page'], $start),
		'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $board_config['topics_per_page'] ) + 1 ), ceil( $score_count / $board_config['topics_per_page'] )), 
		'L_GOTO_PAGE' => $lang['Goto_page'])
	);
}

$template->pparse('body');
//
// Page footer
//
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>