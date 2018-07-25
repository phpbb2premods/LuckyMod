<?php
/***************************************************************************
 *                              admin_arcade.php
 *                            -------------------
 *   begin                : Mardi 13 Avril 2004
 *   email                : giefca@hotmail.com
 *
 *
 ***************************************************************************/

define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['Admin_arcade_games']['Config_arcade'] = "$file";
	return;
}

//
// Let's set the root dir for phpBB
//
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
require( $phpbb_root_path . 'gf_funcs/gen_funcs.' . $phpEx);
//
// Pull all config data
//
$sql = "SELECT *
	FROM " . ARCADE_TABLE;
if(!$result = $db->sql_query($sql))
{
	message_die(CRITICAL_ERROR, "Could not query config information in admin_arcade", "", __LINE__, __FILE__, $sql);
}
else
{
	while( $row = $db->sql_fetchrow($result) )
	{
		$arcade_name = $row['arcade_name'];
		$arcade_value = $row['arcade_value'];
		$default_arcade[$arcade_name] = $arcade_value;
		
		$new[$arcade_name] = ( isset($HTTP_POST_VARS[$arcade_name]) ) ? $HTTP_POST_VARS[$arcade_name] : $default_arcade[$arcade_name];

		if( isset($HTTP_POST_VARS['submit']) )
		{
			$sql = "UPDATE " . ARCADE_TABLE . " SET
				arcade_value = '" . str_replace("\'", "''", $new[$arcade_name]) . "'
				WHERE arcade_name = '$arcade_name'";
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, "Failed to update arcade configuration for $arcade_name", "", __LINE__, __FILE__, $sql);
			}
		}
	}

	if( isset($HTTP_POST_VARS['submit']) )
	{
		$message = $lang['Arcade_config_updated'] . "<br /><br />" . sprintf($lang['Click_return_arcade_config'], "<a href=\"" . append_sid("admin_arcade.$phpEx") . "\">", "</a>") . "<br /><br />" . sprintf($lang['Click_return_admin_index'], "<a href=\"" . append_sid("index.$phpEx?pane=right") . "\">", "</a>");

		message_die(GENERAL_MESSAGE, $message);
	}
}


$header_forum_yes = ( $new['forum_header'] ) ? "checked=\"checked\"" : "";
$header_forum_no = ( !$new['forum_header'] ) ? "checked=\"checked\"" : "";

$bodyline_yes = ( $new['bodyline'] ) ? "checked=\"checked\"" : "";
$bodyline_no = ( !$new['bodyline'] ) ? "checked=\"checked\"" : "";

$head_out_bodyline_yes = ( $new['head_out_bodyline'] ) ? "checked=\"checked\"" : "";
$head_out_bodyline_no = ( !$new['head_out_bodyline'] ) ? "checked=\"checked\"" : "";

$s_alpha = ( $new['game_order'] == 'Alpha' ) ? "selected" : "";
$s_popular = ( $new['game_order'] == 'Popular' ) ? "selected" : "";
$s_fixed = ( $new['game_order'] == 'Fixed') ? "selected" : "";
$s_random = ( $new['game_order'] == 'Random') ? "selected" : "";
$s_news = ( $new['game_order'] == 'News') ? "selected" : "";

$s_order  = "<option value='Alpha' $s_alpha >" . $lang['game_order_alpha'] . "</option>\n";
$s_order .= "<option value='Popular' $s_popular >" . $lang['game_order_popular'] . "</option>\n";
$s_order .= "<option value='Fixed' $s_fixed >" . $lang['game_order_fixed'] . "</option>\n";
$s_order .= "<option value='Random' $s_random >" . $lang['game_order_random'] . "</option>\n";
$s_order .= "<option value='News' $s_news >" . $lang['game_order_news'] . "</option>\n";

$use_category_mod_yes = ( $new['use_category_mod'] ) ? "checked=\"checked\"" : "";
$use_category_mod_no = ( !$new['use_category_mod'] ) ? "checked=\"checked\"" : "";
//début arcade favori
$use_fav_category_yes = ( $new['use_fav_category'] ) ? "checked=\"checked\"" : "";
$use_fav_category_no = ( !$new['use_fav_category'] ) ? "checked=\"checked\"" : "";
$use_hide_fav_yes = ( $new['use_hide_fav'] ) ? "checked=\"checked\"" : "";
$use_hide_fav_no = ( !$new['use_hide_fav'] ) ? "checked=\"checked\"" : "";
//fin arcade favori
$games_cheater_submit_yes = ( $new['games_cheater_submit'] ) ? "checked=\"checked\"" : "";
$games_cheater_submit_no = ( !$new['games_cheater_submit'] ) ? "checked=\"checked\"" : "";

// Start addon points arcade 
$use_points_mod_yes = ( $new['use_points_mod'] ) ? "checked=\"checked\"" : ""; 
$use_points_mod_no = ( !$new['use_points_mod'] ) ? "checked=\"checked\"" : ""; 
$use_points_win_mod_yes = ( $new['use_points_win_mod'] ) ? "checked=\"checked\"" : ""; 
$use_points_win_mod_no = ( !$new['use_points_win_mod'] ) ? "checked=\"checked\"" : ""; 
$use_points_pay_mod_yes = ( $new['use_points_pay_mod'] ) ? "checked=\"checked\"" : ""; 
$use_points_pay_mod_no = ( !$new['use_points_pay_mod'] ) ? "checked=\"checked\"" : ""; 
$use_points_pay_submit_yes = ( $new['use_points_pay_submit'] ) ? "checked=\"checked\"" : ""; 
$use_points_pay_submit_no = ( !$new['use_points_pay_submit'] ) ? "checked=\"checked\"" : ""; 
$use_points_pay_charging_yes = ( $new['use_points_pay_charging'] ) ? "checked=\"checked\"" : ""; 
$use_points_pay_charging_no = ( !$new['use_points_pay_charging'] ) ? "checked=\"checked\"" : ""; 
$points_winner = $new['points_winner']; 
$points_pay = $new['points_pay']; 
// End addon points arcade 

// Start addon Arcade Championnat

include( $phpbb_root_path . 'includes/functions_arcade_championnat.' . $phpEx);

include( $phpbb_root_path . 'includes/functions_arcade.' . $phpEx);

$arcade_config = array();
$arcade_config = read_arcade_config();

$championnat_cat_select = championnat_cat_select($new['championnat_cat'], 'championnat_cat');
if( isset($HTTP_POST_VARS['mode']) || isset($HTTP_GET_VARS['mode']) )
{
	$mode = ( isset($HTTP_POST_VARS['mode']) ) ? $HTTP_POST_VARS['mode'] : $HTTP_GET_VARS['mode'];
	$mode = htmlspecialchars($mode);
}
else
{
	$mode = "";
}

if( isset($HTTP_POST_VARS['reset']) || isset($HTTP_GET_VARS['reset']) )
{
	arcade_championnat_reset();
}
if( isset($HTTP_POST_VARS['cagnotte_distrib']) || isset($HTTP_GET_VARS['cagnotte_distrib']) )
{
	distrib_cagnotte();
}
$championnat_points_one = $new['championnat_points_one'];
$championnat_points_two = $new['championnat_points_two'];
$championnat_points_three = $new['championnat_points_three'];
$championnat_points_four = $new['championnat_points_four'];
$championnat_points_five = $new['championnat_points_five'];
$use_cagnotte_mod_yes = ( $new['use_cagnotte_mod'] ) ? "checked=\"checked\"" : "";
$use_cagnotte_mod_no = ( !$new['use_cagnotte_mod'] ) ? "checked=\"checked\"" : "";
$use_points_cagnotte_yes = ( $new['use_points_cagnotte'] ) ? "checked=\"checked\"" : "";
$use_points_cagnotte_no = ( !$new['use_points_cagnotte'] ) ? "checked=\"checked\"" : "";
$cat_use_yes = ( $new['cat_use'] ) ? "checked=\"checked\"" : "";
$cat_use_no = ( !$new['cat_use'] ) ? "checked=\"checked\"" : "";
$cagnotte = $new['cagnotte'];
$championnat_taux_un = $new['championnat_taux_un'];
$championnat_taux_deux = $new['championnat_taux_deux'];
$championnat_taux_trois = $new['championnat_taux_trois'];
$championnat_taux_quatre = $new['championnat_taux_quatre'];
$championnat_taux_cinq = $new['championnat_taux_cinq'];
$championnat_taux_six = $new['championnat_taux_six'];
$championnat_taux_sept = $new['championnat_taux_sept'];
$championnat_taux_huit = $new['championnat_taux_huit'];
$championnat_taux_neuf = $new['championnat_taux_neuf'];
$championnat_taux_dix = $new['championnat_taux_dix'];
$day_distrib = $new['day_distrib'];
$use_auto_distrib_yes = ( $new['use_auto_distrib'] ) ? "checked=\"checked\"" : "";
$use_auto_distrib_no = ( !$new['use_auto_distrib'] ) ? "checked=\"checked\"" : "";
$championnat_use_yes = ( $new['championnat_use'] ) ? "checked=\"checked\"" : "";
$championnat_use_no = ( !$new['championnat_use'] ) ? "checked=\"checked\"" : "";
//End addon arcade championnat

$display_winner_avatar_yes = ( $new['display_winner_avatar'] ) ? "checked=\"checked\"" : "";
$display_winner_avatar_no = ( !$new['display_winner_avatar'] ) ? "checked=\"checked\"" : "";

$winner_avatar_left = ( $new['winner_avatar_position']=='left' ) ? "checked=\"checked\"" : "";
$winner_avatar_right = ( $new['winner_avatar_position']!='left' ) ? "checked=\"checked\"" : "";

$s_linkcat_align_left = ( $new['linkcat_align'] == '0' ) ? "selected" : "";
$s_linkcat_align_center = ( $new['linkcat_align'] == '1' ) ? "selected" : "";
$s_linkcat_align_right = ( $new['linkcat_align'] == '2') ? "selected" : "";
$limit_by_posts_yes = ( $new['limit_by_posts'] ) ? "checked=\"checked\"" : ""; 
$limit_by_posts_no = ( !$new['limit_by_posts'] ) ? "checked=\"checked\"" : ""; 

$limit_type_posts = ( $new['limit_type']=='posts' ) ? "checked=\"checked\"" : ""; 
$limit_type_date = ( $new['limit_type']=='date' ) ? "checked=\"checked\"" : ""; 
$s_linkcat_align  = "<option value='0' $s_linkcat_align_left >" . $lang['linkcat_left'] . "</option>\n";
$s_linkcat_align .= "<option value='1' $s_linkcat_align_center >" . $lang['linkcat_center'] . "</option>\n";
$s_linkcat_align .= "<option value='2' $s_linkcat_align_right >" . $lang['linkcat_right'] . "</option>\n";

//-- mod : Arcade Vote ------------------------------------------------
//-- add
$arcade_vote_max = $new['rating_max'];
$use_arcade_vote_yes = ( $new['use_arcade_vote'] ) ? "checked=\"checked\"" : "";
$use_arcade_vote_no = ( !$new['use_arcade_vote'] ) ? "checked=\"checked\"" : "";
//-- fin mod : Arcade Vote --------------------------------------------
$template->set_filenames(array(
	"body" => "admin/arcade_config_body.tpl")
);


$template->assign_vars(array(
	"S_CONFIG_ACTION" => append_sid("admin_arcade.$phpEx"),

	"L_YES" => $lang['Yes'],
	"L_NO" => $lang['No'],
	"L_CONFIGURATION_TITLE" => $lang['Arcade_Config'],
	"L_CONFIGURATION_EXPLAIN" => $lang['Arcade_config_explain'],
	"L_GENERAL_SETTINGS" => $lang['General_arcade_settings'],
	"L_STATARCADE_SETTINGS" => $lang['statarcade_settings'],
	"L_GAMES_AREA_SETTINGS" => $lang['games_area_settings'],
	"L_USE_CATEGORY_MOD" => $lang['use_category_mod'],
	"L_USE_CATEGORY_MOD_EXPLAIN" => $lang['use_category_mod_explain'],
	//-- mod : Arcade Vote ------------------------------------------------
//-- add
	"L_RATING_AREA" => $lang['rating_area'],
	"S_RATING_MAX" => $arcade_vote_max,
	"L_RATING_MAX" => $lang['rating_max'],
	"L_RATING_MAX_EXPLAIN" => $lang['rating_max_explain'],
	"L_USE_ARCADE_VOTE" => $lang['use_arcade_vote'],
	"L_USE_ARCADE_VOTE_EXPLAIN" => $lang['use_arcade_vote_explain'],
	"S_USE_ARCADE_VOTE_YES" => $use_arcade_vote_yes,
	"S_USE_ARCADE_VOTE_NO" => $use_arcade_vote_no,
//-- fin mod : Arcade Vote --------------------------------------------
	//début arcade favori
	"L_USE_FAV_CATEGORY" => $lang['use_fav_category'],
	"L_USE_FAV_CATEGORY_EXPLAIN" => $lang['use_fav_category_explain'],
	"L_NBR_GAMES_FAV" => $lang['nbr_games_fav'], 
   	"L_NBR_GAMES_FAV_EXPLAIN" => $lang['nbr_games_fav_explain'],
	"L_FAV_SETTINGS" => $lang['Favoris_settings'],
	"L_USE_HIDE_FAV" => $lang['use_hide_fav'],
	"L_USE_HIDE_FAV_EXPLAIN" => $lang['use_hide_fav_explain'],
	"L_FAV_NBR_IN_PAGE" => $lang['fav_nbr_in_page'],
	"L_FAV_NBR_IN_PAGE_EXPLAIN" => $lang['fav_nbr_in_page_explain'],
//fin arcade favori
	"L_GAMES_CHEATER_SUBMIT" => $lang['games_cheater_submit'],
	"L_GAMES_CHEATER_SUBMIT_EXPLAIN" => $lang['games_cheater_submit_explain'],
// Start addon points arcade 
   "L_POINTS_ARCADE_AREA_SETTINGS" => $lang['points_arcade_area_settings'], 
   "L_USE_POINTS_MOD" => $lang['use_points_mod'], 
   "L_USE_POINTS_MOD_EXPLAIN" => $lang['use_points_mod_explain'], 
   "L_USE_POINTS_WIN_MOD" => $lang['use_points_win_mod'], 
   "L_USE_POINTS_WIN_MOD_EXPLAIN" => $lang['use_points_win_mod_explain'], 
   "L_USE_POINTS_PAY_MOD" => $lang['use_points_pay_mod'], 
   "L_USE_POINTS_PAY_MOD_EXPLAIN" => $lang['use_points_pay_mod_explain'], 
   "L_USE_POINTS_PAY_CHARGING" => $lang['use_points_pay_charging'], 
   "L_USE_POINTS_PAY_CHARGING_EXPLAIN" => $lang['use_points_pay_charging_explain'], 
   "L_USE_POINTS_PAY_SUBMIT" => $lang['use_points_pay_submit'], 
   "L_USE_POINTS_PAY_SUBMIT_EXPLAIN" => $lang['use_points_pay_submit_explain'], 
   "L_POINTS_WINNER" => $lang['points_winner'], 
   "L_POINTS_PAY" => $lang['points_pay'], 
   "L_POINTS_WINNER_EXPLAIN" => $lang['points_winner_explain'], 
   "L_POINTS_PAY_EXPLAIN" => $lang['points_pay_explain'], 
// End addon points arcade 
// Start addon arcade championnat
	"L_CHAMPIONNAT_POINTS_ONE" => $lang['championnat_points_one'],
	"L_CHAMPIONNAT_POINTS_ONE_EXPLAIN" => $lang['championnat_points_one_explain'],
	"L_CHAMPIONNAT_POINTS_TWO" => $lang['championnat_points_two'],
	"L_CHAMPIONNAT_POINTS_TWO_EXPLAIN" => $lang['championnat_points_two_explain'],
	"L_CHAMPIONNAT_POINTS_THREE" => $lang['championnat_points_three'],
	"L_CHAMPIONNAT_POINTS_THREE_EXPLAIN" => $lang['championnat_points_three_explain'],
	"L_CHAMPIONNAT_POINTS_FOUR" => $lang['championnat_points_four'],
	"L_CHAMPIONNAT_POINTS_FOUR_EXPLAIN" => $lang['championnat_points_four_explain'],
	"L_CHAMPIONNAT_POINTS_FIVE" => $lang['championnat_points_five'],
	"L_CHAMPIONNAT_POINTS_FIVE_EXPLAIN" => $lang['championnat_points_five_explain'],
	"L_CHAMPIONNAT_RESET" => $lang['championnat_reset'],
	"L_ARCADE_CHAMPIONNAT_AREA_SETTINGS" => $lang['arcade_championnat_area_settings'],
	"L_USE_CAGNOTTE_MOD" => $lang['use_cagnotte_mod'],
	"L_USE_CAGNOTTE_MOD_EXPLAIN" => $lang['use_cagnotte_mod_explain'],
	"L_USE_AUTO_DISTRIB" => $lang['use_auto_distrib'],
	"L_USE_AUTO_DISTRIB_EXPLAIN" => $lang['use_auto_distrib_explain'],
	"L_CAT_USE" => $lang['cat_use'],
	"L_CAT_USE_EXPLAIN" => $lang['cat_use_explain'],
	"L_USE_POINTS_CAGNOTTE" => $lang['use_points_cagnotte'],
	"L_USE_POINTS_CAGNOTTE_EXPLAIN" => $lang['use_points_cagnotte_explain'],
	"L_CHAMPIONNAT_USE" => $lang['championnat_use'],
	"L_CHAMPIONNAT_USE_EXPLAIN" => $lang['championnat_use_explain'],
	"L_CAGNOTTE" => $lang['cagnotte'],
	"L_CAGNOTTE_EXPLAIN" => $lang['cagnotte_explain'],
	"S_CHAMPIONNAT_POINTS_ONE" => $championnat_points_one,
	"S_CHAMPIONNAT_POINTS_TWO" => $championnat_points_two,
	"S_CHAMPIONNAT_POINTS_THREE" => $championnat_points_three,
	"S_CHAMPIONNAT_POINTS_FOUR" => $championnat_points_four,
	"S_CHAMPIONNAT_POINTS_FIVE" => $championnat_points_five,
	"S_USE_CAGNOTTE_MOD_YES" => $use_cagnotte_mod_yes,
	"S_USE_CAGNOTTE_MOD_NO" => $use_cagnotte_mod_no,
	"S_USE_AUTO_DISTRIB_YES" => $use_auto_distrib_yes,
	"S_USE_AUTO_DISTRIB_NO" => $use_auto_distrib_no,
	"S_CAT_USE_YES" => $cat_use_yes,
	"S_CAT_USE_NO" => $cat_use_no,
	"S_USE_POINTS_CAGNOTTE_YES" => $use_points_cagnotte_yes,
	"S_USE_POINTS_CAGNOTTE_NO" => $use_points_cagnotte_no,
	"S_CHAMPIONNAT_USE_YES" => $championnat_use_yes,
	"S_CHAMPIONNAT_USE_NO" => $championnat_use_no,
	"S_CAGNOTTE" => $cagnotte,
	"L_CAGNOTTE_DISTRIB" => $lang['cagnotte_distrib'],
	"L_CHAMPIONNAT_CATEGORIE" => $lang['championnat_categorie'],
	"L_CHAMPIONNAT_CATEGORIE_EXPLAIN" => $lang['championnat_categorie_explain'],
	"CHAMPIONNAT_CAT_SELECT" => $championnat_cat_select,
	"S_CHAMPIONNAT_TAUX_UN" => $championnat_taux_un,
	"L_CHAMPIONNAT_TAUX_UN" => $lang['championnat_taux_un'],
	"S_CHAMPIONNAT_TAUX_DEUX" => $championnat_taux_deux,
	"L_CHAMPIONNAT_TAUX_DEUX" => $lang['championnat_taux_deux'],
	"S_CHAMPIONNAT_TAUX_TROIS" => $championnat_taux_trois,
	"L_CHAMPIONNAT_TAUX_TROIS" => $lang['championnat_taux_trois'],
	"S_CHAMPIONNAT_TAUX_QUATRE" => $championnat_taux_quatre,
	"L_CHAMPIONNAT_TAUX_QUATRE" => $lang['championnat_taux_quatre'],
	"S_CHAMPIONNAT_TAUX_CINQ" => $championnat_taux_cinq,
	"L_CHAMPIONNAT_TAUX_CINQ" => $lang['championnat_taux_cinq'],
	"S_CHAMPIONNAT_TAUX_SIX" => $championnat_taux_six,
	"L_CHAMPIONNAT_TAUX_SIX" => $lang['championnat_taux_six'],
	"S_CHAMPIONNAT_TAUX_SEPT" => $championnat_taux_sept,
	"L_CHAMPIONNAT_TAUX_SEPT" => $lang['championnat_taux_sept'],
	"S_CHAMPIONNAT_TAUX_HUIT" => $championnat_taux_huit,
	"L_CHAMPIONNAT_TAUX_HUIT" => $lang['championnat_taux_huit'],
	"S_CHAMPIONNAT_TAUX_NEUF" => $championnat_taux_neuf,
	"L_CHAMPIONNAT_TAUX_NEUF" => $lang['championnat_taux_neuf'],
	"S_CHAMPIONNAT_TAUX_DIX" => $championnat_taux_dix,
	"L_CHAMPIONNAT_TAUX_DIX" => $lang['championnat_taux_dix'],
	"L_CHAMPIONNAT_TAUX" => $lang['championnat_taux'],
	"L_CHAMPIONNAT_TAUX_EXPLAIN" => $lang['championnat_taux_explain'],
	"L_DAY_DISTRIB" => $lang['day_distrib'],
	"S_DAY_DISTRIB" => $day_distrib,
	"L_DAY_DISTRIB_EXPLAIN" => $lang['day_distrib_explain'],
// End addon arcade championnat
	"L_CATEGORY_PREVIEW_GAMES" => $lang['category_preview_games'],
	"L_CATEGORY_PREVIEW_GAMES_EXPLAIN" => $lang['category_preview_games_explain'],
	"L_GAMES_PAR_PAGE" => $lang['games_par_page'],
	"L_GAMES_PAR_PAGE_EXPLAIN" => $lang['games_par_page_explain'],
	"L_GAMES_TIME_TOLERANCE" => $lang['games_time_tolerance'],
	"L_GAMES_TIME_TOLERANCE_EXPLAIN" => $lang['games_time_tolerance_explain'],
	"L_GAME_ORDER" => $lang['games_order'],
	"L_GAME_ORDER_EXPLAIN" => $lang['games_order_explain'],
	"L_DISPLAY_WINNER_AVATAR" => $lang['display_winner_avatar'],
	"L_DISPLAY_WINNER_AVATAR_EXPLAIN" => $lang['display_winner_avatar_explain'],
	"L_WINNER_AVATAR_POSITION" => $lang['winner_avatar_position'],
	"L_WINNER_AVATAR_POSITION_EXPLAIN" => $lang['winner_avatar_position_explain'],
	"L_RIGHT" => $lang['Right_avatar'],
	"L_LEFT" => $lang['Left_avatar'],
	"L_MAXSIZE_AVATAR" => $lang['maxsize_avatar'],
	"L_MAXSIZE_AVATAR_EXPLAIN" => $lang['maxsize_avatar_explain'],
	"L_STAT_PAR_PAGE" => $lang['stat_par_page'],
	"L_STAT_PAR_PAGE_EXPLAIN" => $lang['stat_par_page_explain'],
	"L_LINKCAT_ALIGN" => $lang['linkcat_align'],
	"L_LINKCAT_ALIGN_EXPLAIN" => $lang['linkcat_align_explain'],
	//Limit Post Mod 
	"L_POSTS_ONLY" => $lang['posts_only'], 
	"L_POSTS_DATE" => $lang['posts_date'], 
	"L_LIMIT_TYPE" => $lang['limit_type'], 
	"L_LIMIT_TYPE_EXPLAIN" => $lang['limit_type_explain'], 
	"L_GAME_ACCESS_SETTINGS" => $lang['game_access_settings'], 
	"L_LIMIT_BY_POSTS" => $lang['limit_by_posts'], 
	"L_POSTS_NEEDED" => $lang['posts_needed'], 
	"L_DAYS_LIMIT" => $lang['days_limit'], 
	"L_LIMIT_BY_POSTS_EXPLAIN" => $lang['limit_by_posts_explain'], 
	"L_POSTS_NEEDED_EXPLAIN" => $lang['posts_needed_explain'], 
	"L_DAYS_LIMIT_EXPLAIN" => $lang['days_limit_explain'], 
   //Limit Post Mod 
	"S_CATEGORY_PREVIEW_GAMES" => intval($new['category_preview_games']),
	"S_GAMES_PAR_PAGE" => intval($new['games_par_page']),
	"S_GAMES_TIME_TOLERANCE" => intval($new['games_time_tolerance']),
	"S_STAT_PAR_PAGE" => intval($new['stat_par_page']),
	"S_GAME_ORDER" => $s_order,
	"S_USE_CATEGORY_MOD_YES" => $use_category_mod_yes,
	"S_USE_CATEGORY_MOD_NO" => $use_category_mod_no,
	//début arcade favori
	"S_USE_FAV_CATEGORY_YES" => $use_fav_category_yes,
	"S_USE_FAV_CATEGORY_NO" => $use_fav_category_no,
	"S_NBR_GAMES_FAV" => intval($new['nbr_games_fav']), 
	"S_USE_HIDE_FAV_YES" => $use_hide_fav_yes,
	"S_USE_HIDE_FAV_NO" => $use_hide_fav_no,
	"S_FAV_NBR_IN_PAGE" => intval($new['fav_nbr_in_page']),
//fin arcade favori
	"S_GAMES_CHEATER_SUBMIT_YES" => $games_cheater_submit_yes,
	"S_GAMES_CHEATER_SUBMIT_NO" => $games_cheater_submit_no,
// Start addon points arcade 
   "S_USE_POINTS_MOD_YES" => $use_points_mod_yes, 
   "S_USE_POINTS_MOD_NO" => $use_points_mod_no, 
   "S_USE_POINTS_WIN_MOD_YES" => $use_points_win_mod_yes, 
   "S_USE_POINTS_WIN_MOD_NO" => $use_points_win_mod_no, 
   "S_USE_POINTS_PAY_MOD_YES" => $use_points_pay_mod_yes, 
   "S_USE_POINTS_PAY_MOD_NO" => $use_points_pay_mod_no, 
   "S_USE_POINTS_PAY_CHARGING_YES" => $use_points_pay_charging_yes, 
   "S_USE_POINTS_PAY_CHARGING_NO" => $use_points_pay_charging_no, 
   "S_USE_POINTS_PAY_SUBMIT_YES" => $use_points_pay_submit_yes, 
   "S_USE_POINTS_PAY_SUBMIT_NO" => $use_points_pay_submit_no, 
   'S_POINTS_WINNER' => $points_winner, 
   'S_POINTS_PAY' => $points_pay, 
// End addon points arcade 
	
	"S_DISPLAY_WINNER_AVATAR_YES" => $display_winner_avatar_yes,
	"S_DISPLAY_WINNER_AVATAR_NO" => $display_winner_avatar_no,	
	"S_WINNER_AVATAR_LEFT" => $winner_avatar_left,
	"S_WINNER_AVATAR_RIGHT" => $winner_avatar_right,	
	"S_MAXSIZE_AVATAR" => intval($new['maxsize_avatar']),
	"S_LINKCAT_ALIGN" => $s_linkcat_align,
	//Limit Post Mod 
   "S_LIMIT_TYPE_POSTS" => $limit_type_posts, 
   "S_LIMIT_TYPE_DATE" => $limit_type_date, 
   "S_LIMIT_BY_POSTS_YES" => $limit_by_posts_yes, 
   "S_LIMIT_BY_POSTS_NO" => $limit_by_posts_no, 
   "S_POSTS_NEEDED" => intval($new['posts_needed']), 
   "S_DAYS_LIMIT" => intval($new['days_limit']), 
   //Limit Post Mod 	
	"LAST_SEEN" => $new['last_seen'],

	"L_SUBMIT" => $lang['Submit'], 
	"L_RESET" => $lang['Reset'])
);

// Génération de la page

$template->pparse("body");

include('./page_footer_admin.'.$phpEx);

?>