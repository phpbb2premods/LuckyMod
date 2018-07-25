<div class="maintitle">{L_CONFIGURATION_TITLE}</div>
<br />
<p>{L_CONFIGURATION_EXPLAIN}</p>
<form action="{S_CONFIG_ACTION}" method="post">
<table width="99%" cellpadding="3" cellspacing="1" border="0" align="center" class="forumline">
<tr> 
<th colspan="2">{L_GENERAL_SETTINGS}</th>
</tr>
<!-- use_category_mod -->
<tr> 
<td class="row1" width="38%">{L_USE_CATEGORY_MOD}<br />
<span class="gensmall">{L_USE_CATEGORY_MOD_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="use_category_mod" value="1" {S_USE_CATEGORY_MOD_YES} />
{L_YES}   
<input type="radio" name="use_category_mod" value="0" {S_USE_CATEGORY_MOD_NO} />
{L_NO}
</td>
</tr>
<!-- games_cheater_submit -->
<tr>
<td class="row1" width="38%">{L_GAMES_CHEATER_SUBMIT}<br />
<span class="gensmall">{L_GAMES_CHEATER_SUBMIT_EXPLAIN}</span>
</td>
<td class="row2" width="62%">
<input type="radio" name="games_cheater_submit" value="1" {S_GAMES_CHEATER_SUBMIT_YES} />
{L_YES}  
<input type="radio" name="games_cheater_submit" value="0" {S_GAMES_CHEATER_SUBMIT_NO} />
{L_NO}
</td>
</tr>
<!-- category_preview_games -->
<tr> 
<td class="row1" width="38%">{L_CATEGORY_PREVIEW_GAMES}<br />
<span class="gensmall">{L_CATEGORY_PREVIEW_GAMES_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="text" maxlength="100" size="5" name="category_preview_games" value="{S_CATEGORY_PREVIEW_GAMES}" class="post" />
</td>
</tr>
<!-- games_par_page -->
<tr> 
<td class="row1" width="38%">{L_GAMES_PAR_PAGE}<br />
<span class="gensmall">{L_GAMES_PAR_PAGE_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="text" maxlength="100" size="5" name="games_par_page" value="{S_GAMES_PAR_PAGE}" class="post" />
</td>
</tr>
<!-- games_time_tolerance -->
<tr>
<td class="row1" width="38%">{L_GAMES_TIME_TOLERANCE}<br />
<span class="gensmall">{L_GAMES_TIME_TOLERANCE_EXPLAIN}</span>
</td>
<td class="row2" width="62%">
<input type="text" maxlength="100" size="5" name="games_time_tolerance" value="{S_GAMES_TIME_TOLERANCE}" class="post" />
</td>
</tr>
<!-- game_order -->
<tr> 
<td class="row1" width="38%">{L_GAME_ORDER}<br />
<span class="gensmall">{L_GAME_ORDER_EXPLAIN}</span></td>
<td class="row2" width="62%"> 
<select name='game_order' class="post" >
{S_GAME_ORDER}
</select>
</td>
</tr>
<!-- linkcat_align -->
<tr> 
<td class="row1" width="38%">{L_LINKCAT_ALIGN}<br />
<span class="gensmall">{L_LINKCAT_ALIGN_EXPLAIN}</span></td>
<td class="row2" width="62%"> 
<select name='linkcat_align' class="post" >
{S_LINKCAT_ALIGN}
</select>
</td>
</tr>
<tr> 
<th colspan="2">{L_GAME_ACCESS_SETTINGS}</th> 
</tr> 
<!-- limit_by_posts --> 
<tr> 
<td class="row1" width="38%">{L_LIMIT_BY_POSTS}<br /> 
<span class="gensmall">{L_LIMIT_BY_POSTS_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="radio" name="limit_by_posts" value="1" {S_LIMIT_BY_POSTS_YES} /> 
{L_YES}   
<input type="radio" name="limit_by_posts" value="0" {S_LIMIT_BY_POSTS_NO} /> 
{L_NO} 
</td> 
</tr> 
<!-- limit_type --> 
<tr> 
<td class="row1" width="38%">{L_LIMIT_TYPE}<br /> 
<span class="gensmall">{L_LIMIT_TYPE_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="radio" name="limit_type" value="posts" {S_LIMIT_TYPE_POSTS} /> 
{L_POSTS_ONLY}<br /> 
<input type="radio" name="limit_type" value="date" {S_LIMIT_TYPE_DATE} /> 
{L_POSTS_DATE} 
</td> 
</tr> 
<!-- posts_needed --> 
<tr> 
<td class="row1" width="38%">{L_POSTS_NEEDED}<br /> 
<span class="gensmall">{L_POSTS_NEEDED_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="text" maxlength="100" size="5" name="posts_needed" value="{S_POSTS_NEEDED}" class="post" /> 
</td> 
</tr> 
<!-- days_limit --> 
<tr> 
<td class="row1" width="38%">{L_DAYS_LIMIT}<br /> 
<span class="gensmall">{L_DAYS_LIMIT_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="text" maxlength="100" size="5" name="days_limit" value="{S_DAYS_LIMIT}" class="post" /> 
</td> 
</tr> 

<tr> 
<th colspan="2">{L_GAMES_AREA_SETTINGS}</th>
</tr>
<!-- display_winner_avatar -->
<tr> 
<td class="row1" width="38%">{L_DISPLAY_WINNER_AVATAR}<br />
<span class="gensmall">{L_DISPLAY_WINNER_AVATAR_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="display_winner_avatar" value="1" {S_DISPLAY_WINNER_AVATAR_YES} />
{L_YES}   
<input type="radio" name="display_winner_avatar" value="0" {S_DISPLAY_WINNER_AVATAR_NO} />
{L_NO}
</td>
</tr>
<tr> 
<td class="row1" width="38%">{L_WINNER_AVATAR_POSITION}<br />
<span class="gensmall">{L_WINNER_AVATAR_POSITION_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="winner_avatar_position" value="left" {S_WINNER_AVATAR_LEFT} />
{L_LEFT}<br />
<input type="radio" name="winner_avatar_position" value="right" {S_WINNER_AVATAR_RIGHT} />
{L_RIGHT}
</td>
</tr>
<!-- maxsize_avatar -->
<tr> 
<td class="row1" width="38%">{L_MAXSIZE_AVATAR}<br />
<span class="gensmall">{L_MAXSIZE_AVATAR_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="text" maxlength="10" size="5" name="maxsize_avatar" value="{S_MAXSIZE_AVATAR}" class="post" />
</td>
</tr>
<tr> 
<th colspan="2">{L_RATING_AREA}</th>
</tr>
<!-- use_arcade_vote -->
<tr> 
<td class="row1" width="38%">{L_USE_ARCADE_VOTE}<br />
<span class="gensmall">{L_USE_ARCADE_VOTE_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="use_arcade_vote" value="1" {S_USE_ARCADE_VOTE_YES} />
{L_YES}   
<input type="radio" name="use_arcade_vote" value="0" {S_USE_ARCADE_VOTE_NO} />
{L_NO}
</td>
</tr>
<!-- max_rating -->
<tr> 
<td class="row1" width="38%">{L_RATING_MAX}<br />
<span class="gensmall">{L_RATING_MAX_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="text" maxlength="100" size="2" name="rating_max" value="{S_RATING_MAX}" class="post" />
</td>
</tr>
<tr> 
<th colspan="2">{L_FAV_SETTINGS}</th>
</tr>
<!-- use_fav_category -->
<tr> 
<td class="row1" width="38%">{L_USE_FAV_CATEGORY}<br />
<span class="gensmall">{L_USE_FAV_CATEGORY_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="use_fav_category" value="1" {S_USE_FAV_CATEGORY_YES} />
{L_YES}   
<input type="radio" name="use_fav_category" value="0" {S_USE_FAV_CATEGORY_NO} />
{L_NO}
</td>
</tr>
<!-- nbr_games_fav -->
<tr> 
<td class="row1" width="38%">{L_NBR_GAMES_FAV}<br />
<span class="gensmall">{L_NBR_GAMES_FAV_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="text" maxlength="100" size="5" name="nbr_games_fav" value="{S_NBR_GAMES_FAV}" class="post" />
</td>
</tr>
<!-- use_hide_fav -->
<tr> 
<td class="row1" width="38%">{L_USE_HIDE_FAV}<br />
<span class="gensmall">{L_USE_HIDE_FAV_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="use_hide_fav" value="1" {S_USE_HIDE_FAV_YES} />
{L_YES}   
<input type="radio" name="use_hide_fav" value="0" {S_USE_HIDE_FAV_NO} />
{L_NO}
</td>
</tr>
<!-- fav_nbr_in_page -->
<tr> 
<td class="row1" width="38%">{L_FAV_NBR_IN_PAGE}<br />
<span class="gensmall">{L_FAV_NBR_IN_PAGE_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="text" maxlength="100" size="5" name="fav_nbr_in_page" value="{S_FAV_NBR_IN_PAGE}" class="post" />
</td>
</tr>
<tr> 
<th colspan="2">{L_STATARCADE_SETTINGS}</th>
</tr>
<!-- stat_par_page -->
<tr> 
<td class="row1" width="38%">{L_STAT_PAR_PAGE}<br />
<span class="gensmall">{L_STAT_PAR_PAGE_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="text" maxlength="100" size="5" name="stat_par_page" value="{S_STAT_PAR_PAGE}" class="post" />
</td>
</tr>
<tr> 
<th colspan="2">{L_POINTS_ARCADE_AREA_SETTINGS}</th> 
</tr> 
<!-- use_points_mod --> 
<tr> 
<td class="row1" width="38%">{L_USE_POINTS_MOD}<br /> 
<span class="gensmall">{L_USE_POINTS_MOD_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="radio" name="use_points_mod" value="1" {S_USE_POINTS_MOD_YES} /> 
{L_YES}   
<input type="radio" name="use_points_mod" value="0" {S_USE_POINTS_MOD_NO} /> 
{L_NO} 
</td> 
</tr> 
<!-- use_points_win_mod --> 
<tr> 
<td class="row1" width="38%">{L_USE_POINTS_WIN_MOD}<br /> 
<span class="gensmall">{L_USE_POINTS_WIN_MOD_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="radio" name="use_points_win_mod" value="1" {S_USE_POINTS_WIN_MOD_YES} /> 
{L_YES}   
<input type="radio" name="use_points_win_mod" value="0" {S_USE_POINTS_WIN_MOD_NO} /> 
{L_NO} 
</td> 
</tr> 
<tr> 
<td class="row1" width="38%">{L_POINTS_WINNER}<br /><span class="gensmall">{L_POINTS_WINNER_EXPLAIN}</span></td> 
<td class="row2"> <input type="text" maxlength="100" name="points_winner" value="{S_POINTS_WINNER}" /> 
</td> 
</tr> 
<!-- use_points_pay_mod --> 
<tr> 
<td class="row1" width="38%">{L_USE_POINTS_PAY_MOD}<br /> 
<span class="gensmall">{L_USE_POINTS_PAY_MOD_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="radio" name="use_points_pay_mod" value="1" {S_USE_POINTS_PAY_MOD_YES} /> 
{L_YES}   
<input type="radio" name="use_points_pay_mod" value="0" {S_USE_POINTS_PAY_MOD_NO} /> 
{L_NO} 
</td> 
</tr> 
<tr> 
<td class="row1" width="38%">{L_USE_POINTS_PAY_CHARGING}<br /> 
<span class="gensmall">{L_USE_POINTS_PAY_CHARGING_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="radio" name="use_points_pay_charging" value="1" {S_USE_POINTS_PAY_CHARGING_YES} /> 
{L_YES}   
<input type="radio" name="use_points_pay_charging" value="0" {S_USE_POINTS_PAY_CHARGING_NO} /> 
{L_NO} 
</td> 
</tr> 
<tr> 
<td class="row1" width="38%">{L_USE_POINTS_PAY_SUBMIT}<br /> 
<span class="gensmall">{L_USE_POINTS_PAY_SUBMIT_EXPLAIN}</span> 
</td> 
<td class="row2" width="62%"> 
<input type="radio" name="use_points_pay_submit" value="1" {S_USE_POINTS_PAY_SUBMIT_YES} /> 
{L_YES}   
<input type="radio" name="use_points_pay_submit" value="0" {S_USE_POINTS_PAY_SUBMIT_NO} /> 
{L_NO} 
</td> 
</tr> 
<tr> 
<td class="row1" width="38%">{L_POINTS_PAY}<br /><span class="gensmall">{L_POINTS_PAY_EXPLAIN}</span></td> 
<td class="row2"> <input type="text" maxlength="100" name="points_pay" value="{S_POINTS_PAY}" /> 
</td> 
</tr> 
<tr> 
<th colspan="2">{L_ARCADE_CHAMPIONNAT_AREA_SETTINGS}</th>
</tr>
<tr> 
<td class="row1" width="38%">{L_CHAMPIONNAT_USE}<br />
<span class="gensmall">{L_CHAMPIONNAT_USE_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="championnat_use" value="1" {S_CHAMPIONNAT_USE_YES} />
{L_YES}   
<input type="radio" name="championnat_use" value="0" {S_CHAMPIONNAT_USE_NO} />
{L_NO}
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_POINTS_ONE}<br /><span class="gensmall">{L_CHAMPIONNAT_POINTS_ONE_EXPLAIN}</span></td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_points_one" value="{S_CHAMPIONNAT_POINTS_ONE}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_POINTS_TWO}<br /><span class="gensmall">{L_CHAMPIONNAT_POINTS_TWO_EXPLAIN}</span></td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_points_two" value="{S_CHAMPIONNAT_POINTS_TWO}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_POINTS_THREE}<br /><span class="gensmall">{L_CHAMPIONNAT_POINTS_THREE_EXPLAIN}</span></td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_points_three" value="{S_CHAMPIONNAT_POINTS_THREE}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_POINTS_FOUR}<br /><span class="gensmall">{L_CHAMPIONNAT_POINTS_FOUR_EXPLAIN}</span></td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_points_four" value="{S_CHAMPIONNAT_POINTS_FOUR}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_POINTS_FIVE}<br /><span class="gensmall">{L_CHAMPIONNAT_POINTS_FIVE_EXPLAIN}</span></td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_points_five" value="{S_CHAMPIONNAT_POINTS_FIVE}" /> 
</td>
</tr>
<tr>
<td class="catBottom" colspan="6" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="reset" value="{L_CHAMPIONNAT_RESET}" class="mainoption" /></td>
</tr>
<tr> 
<td class="row1" width="38%">{L_USE_CAGNOTTE_MOD}<br />
<span class="gensmall">{L_USE_CAGNOTTE_MOD_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="use_cagnotte_mod" value="1" {S_USE_CAGNOTTE_MOD_YES} />
{L_YES}   
<input type="radio" name="use_cagnotte_mod" value="0" {S_USE_CAGNOTTE_MOD_NO} />
{L_NO}
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CAGNOTTE}<br /><span class="gensmall">{L_CAGNOTTE_EXPLAIN}</span></td>
<td class="row2"> <input type="text" maxlength="100" name="cagnotte" value="{S_CAGNOTTE}" /> 
</td>
</tr>
<tr> 
<td class="row1" width="38%">{L_USE_POINTS_CAGNOTTE}<br />
<span class="gensmall">{L_USE_POINTS_CAGNOTTE_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="use_points_cagnotte" value="1" {S_USE_POINTS_CAGNOTTE_YES} />
{L_YES}   
<input type="radio" name="use_points_cagnotte" value="0" {S_USE_POINTS_CAGNOTTE_NO} />
{L_NO}
</td>
</tr>
<tr>
<td class="catBottom" colspan="6" align="center">{S_HIDDEN_FIELDS}<input type="submit" name="cagnotte_distrib" value="{L_CAGNOTTE_DISTRIB}" class="mainoption" /></td>
</tr>
<tr> 
<td class="row1" width="38%">{L_CAT_USE}<br />
<span class="gensmall">{L_CAT_USE_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="cat_use" value="1" {S_CAT_USE_YES} />
{L_YES}   
<input type="radio" name="cat_use" value="0" {S_CAT_USE_NO} />
{L_NO}
</td>
</tr>
<tr>
	<td class="row1" width="38%">{L_CHAMPIONNAT_CATEGORIE}<br />
<span class="gensmall">{L_CHAMPIONNAT_CATEGORIE_EXPLAIN}</span>
</td>
	<td class="row2" width="62%">{CHAMPIONNAT_CAT_SELECT}</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX}<br /><span class="gensmall">{L_CHAMPIONNAT_TAUX_EXPLAIN}</span></td>
</td>
<td class="row2" width="62%"></td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_UN}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_un" value="{S_CHAMPIONNAT_TAUX_UN}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_DEUX}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_deux" value="{S_CHAMPIONNAT_TAUX_DEUX}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_TROIS}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_trois" value="{S_CHAMPIONNAT_TAUX_TROIS}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_QUATRE}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_quatre" value="{S_CHAMPIONNAT_TAUX_QUATRE}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_CINQ}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_cinq" value="{S_CHAMPIONNAT_TAUX_CINQ}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_SIX}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_six" value="{S_CHAMPIONNAT_TAUX_SIX}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_SEPT}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_sept" value="{S_CHAMPIONNAT_TAUX_SEPT}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_HUIT}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_huit" value="{S_CHAMPIONNAT_TAUX_HUIT}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_NEUF}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_neuf" value="{S_CHAMPIONNAT_TAUX_NEUF}" /> 
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_CHAMPIONNAT_TAUX_DIX}</td>
<td class="row2"> <input type="text" maxlength="100" name="championnat_taux_dix" value="{S_CHAMPIONNAT_TAUX_DIX}" /> 
</td>
</tr>
<tr> 
<td class="row1" width="38%">{L_USE_AUTO_DISTRIB}<br />
<span class="gensmall">{L_USE_AUTO_DISTRIB_EXPLAIN}</span>
</td>
<td class="row2" width="62%"> 
<input type="radio" name="use_auto_distrib" value="1" {S_USE_AUTO_DISTRIB_YES} />
{L_YES}   
<input type="radio" name="use_auto_distrib" value="0" {S_USE_AUTO_DISTRIB_NO} />
{L_NO}
</td>
</tr>
<tr>
<td class="row1" width="38%">{L_DAY_DISTRIB}<br /><span class="gensmall">{L_DAY_DISTRIB_EXPLAIN}</span></td>
<td class="row2"> <input type="text" maxlength="100" name="day_distrib" value="{S_DAY_DISTRIB}" /> 
</td>
</tr>
<tr> 
<td class="cat" colspan="2" align="center">{S_HIDDEN_FIELDS} 
<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
   
<input type="reset" value="{L_RESET}" class="button" />
</td>
</tr>

</table>
</form>
<br clear="all" />