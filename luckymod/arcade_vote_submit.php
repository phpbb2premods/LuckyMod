<?php

/***************************************************************************
 *                                arcade_vote_submit.php
 *                            -------------------
 *   Commencé le                : Dimanche,27 Mars, 2005
 *   Par : NiCo[L_aS] - neointhematrix@fr.st - http://www.neointhematrix.fr.st
 *   Corrigé par : Minaskin
 *
 ***************************************************************************/


define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/functions_arcade_vote.'.$phpEx);
require( $phpbb_root_path . 'gf_funcs/gen_funcs.' . $phpEx);

$userdata = session_pagestart($user_ip, PAGE_GAME);
init_userprefs($userdata);

$header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";

if ( !$userdata['session_logged_in'] )
{
	header($header_location . append_sid("login.$phpEx?redirect=games.$phpEx", true));
	exit;
}
//
// End of auth check
//
//$mode = $HTTP_GET_VARS['mode'];
/*if($mode == "submit")
{*/
	$game_id = get_var2(array('name'=>'game_id', 'default'=>''));
	$rating = get_var2(array('name'=>'rating', 'default'=>''));
	$user_id = $userdata['user_id'];
	rate_game($user_id, $game_id, $rating);
//}
?>