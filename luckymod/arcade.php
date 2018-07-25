<?php
/***************************************************************************
 *                                arcade.php
 *                            -------------------
 *   Commencé le                : Samedi,17 Mai, 2003
 *   Par : giefca - http://www.gf-phpbb.com
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   Affichage de la liste des jeux arcades.
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include( $phpbb_root_path . 'includes/functions_arcade.' . $phpEx);
require( $phpbb_root_path . 'gf_funcs/gen_funcs.' . $phpEx);
//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_ARCADES);
init_userprefs($userdata);
//
// End session management
//
// Start auth check
//
if ( !$userdata['session_logged_in'] )
{
	$header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";
	header($header_location . append_sid("login.$phpEx?redirect=arcade.$phpEx", true));
	exit;
}
//
// End of auth check
//

$sessdo = get_var2(array('name'=>'sessdo', 'method'=>'POST', 'default'=>''));
// Est-on à l'intérieur d'un jeu ?
if ($sessdo != '')
{
  $gamename = get_var2(array('name'=>'gamename', 'method'=>'POST', 'default'=>''));
  $microone = get_var2(array('name'=>'microone', 'method'=>'POST', 'default'=>''));
  $id = get_var2(array('name'=>'id', 'method'=>'POST', 'default'=>''));
  $score = get_var2(array('name'=>'score', 'method'=>'POST', 'default'=>''));
  $fakekey = get_var2(array('name'=>'fakekey', 'method'=>'POST', 'default'=>''));
  $gametime = get_var2(array('name'=>'gametime', 'method'=>'POST', 'default'=>''));
  
  $header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";

  switch($sessdo)
  {
	case 'sessionstart' :
		//Récupération de l'id du jeu.
		$sql = "SELECT g.game_id, gh.hash_date, gh.gamehash_id FROM " . GAMES_TABLE . " g, " . GAMEHASH_TABLE . " gh WHERE g.game_id = gh.game_id AND gh.user_id = '" . $userdata['user_id'] . "' AND game_scorevar = '$gamename' ORDER BY gh.hash_date DESC" ;
		if( !($result = $db->sql_query($sql)) )
		{
	   		$connStatus = 0;
	   		echo "&connStatus=$connStatus";
			message_die(GENERAL_ERROR, "Impossible d'accéder à la table des jeux", '', __LINE__, __FILE__, $sql); 
			exit;
		}
		if( !$row = $db->sql_fetchrow($result))
		{
	   		$connStatus = 0;
	   		echo "&connStatus=$connStatus";
			message_die(GENERAL_ERROR, "Aucun jeu ne correspond à cette variable score : $gamename");
			exit;
		}
		
		$sql = "DELETE FROM " . GAMEHASH_TABLE . " WHERE gamehash_id = '" . $row['gamehash_id'] . "'" ;
		$db->sql_query($sql);
		
		$gamehash_id = md5(uniqid($user_ip)) ;
		$sql = "INSERT INTO " . GAMEHASH_TABLE . " ( gamehash_id , game_id , user_id , hash_date ) VALUES ( '$gamehash_id' , '" . $row['game_id'] . "' , '" . $userdata['user_id'] . "' , '" . time() . "')" ;
		if( !($db->sql_query($sql)) )
		{
	   		$connStatus = 0;
	   		echo "&connStatus=$connStatus";
			message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des hash game", '', __LINE__, __FILE__, $sql); 
			exit;
		}
		$sql = "UPDATE " . GAMES_TABLE . " SET game_set = game_set+1 WHERE game_id =  '" . $row['game_id'] . "' " ;
		$db->sql_query($sql) ;

   		$connStatus = 1;
   		$gametime = time();
   		$initbar = $gamename . '|' . $gamehash_id;
   		$lastid = $row['game_id'];
   		echo "&connStatus=$connStatus&gametime=$gametime&initbar=$initbar&lastid=$lastid&val=x";
		exit;
	 break;
	case 'permrequest' :
  		$validate = 1 ;
  		$microone = $score . '|'. $fakekey;
  		echo "&validate=$validate&microone=$microone&val=x";
		exit;
	 break;
	 
	case 'burn' :
   		$header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";
		$tbinfos = explode('|',$microone);
		$newhash = substr( $tbinfos[2] , 24 , 8 ) . substr( $tbinfos[2] , 0 , 24 ) ;
		header($header_location . append_sid("proarcade.$phpEx?" . $tbinfos[1] . "=" . $tbinfos[0] . "&gid=$id&newhash=$newhash&hashoffset=8&settime=$gametime&gpaver=GFARV2", true));
		exit;
	}
}


// Est-on sur la liste des catégories ou des jeux
$arcade_catid = get_var2(array('name'=>'cid', 'intval'=>true ));
$start = get_var2(array('name'=>'start', 'intval'=>true ));

$arcade_config = array();
$arcade_config = read_arcade_config();
//récupération de la liste des catégories privées auxquelles l'utilisateur à acces
$liste_cat_auth = get_arcade_categories($userdata['user_id'], $userdata['user_level'],'view');
if( $liste_cat_auth == '' ) $liste_cat_auth = "''";

$order_by = '';
switch ( $arcade_config['game_order'])
{
	case 'Alpha':
		$order_by = ' game_name ASC ';
		break;
	case 'Popular':
		$order_by = ' game_set DESC ';
		break;
	case 'Fixed':
		$order_by = ' game_order ASC ';
		break;
	case 'Random':
		$order_by = ' RAND() ';
		break;
	case 'News':
		$order_by = ' game_id DESC ';
		break;
	default :
		$order_by = ' game_order ASC ';
		break;
}
//début arcade favori
$favori = $HTTP_GET_VARS['favori'];
$delfavori = $HTTP_GET_VARS['delfavori'];
$numfav=0;
if ($actfav=$favori+$delfavori)
	{
	$sql = "SELECT * from ".ARCADE_FAV_TABLE." where user_id= ".$userdata['user_id'];
	if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'accéder à la tables des favoris", '', __LINE__, __FILE__, $sql); 
		}
	while ($row = $db->sql_fetchrow($result))
		{
		if ($actfav==$row['game_id']) $numfav=1; 
		$nbfav++; 
		}

	if( $favori and $nbfav >= $arcade_config['nbr_games_fav'] and $arcade_config['nbr_games_fav'] <>-1)
		{
			$message = $lang['non_atorized_fav'] . "<br /><br />" . sprintf($lang['Click_return_arcade'], "<a href=\"" . append_sid("arcade.$phpEx") . "\">", "</a>") . "<br />";
	
			message_die(GENERAL_MESSAGE, $message);
		}
	if ($numfav==0 and $favori and ($nbfav < $arcade_config['nbr_games_fav'] or $arcade_config['nbr_games_fav'] ==-1))
		{
			$sql = "INSERT INTO ". ARCADE_FAV_TABLE ." VALUES ('','".$userdata['user_id']."','$favori')"; 
			if( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Impossible d'accéder à la tables des favoris", '', __LINE__, __FILE__, $sql); 
				}
		}
	 		
	elseif($delfavori)
		{
			$sql = "DELETE FROM ". ARCADE_FAV_TABLE ." where user_id= ".$userdata['user_id']." AND game_id= ".$delfavori; 
			if( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Impossible d'accéder à la tables des favoris", '', __LINE__, __FILE__, $sql); 
				}
		}				
	};
//fin arcade favori
/*--------------------------------------------------/
/ Doit-on afficher la liste des catégories ?
/---------------------------------------------------*/
$games_par_categorie = $arcade_config['category_preview_games'] ; //Nombre de jeux affichés en preview pour chaque catégorie.

//début arcade favori
$mode = $HTTP_GET_VARS['mode'];
if (( $arcade_catid == 0 ) and ( $arcade_config['use_category_mod'] ) and ( $mode!='favoris' ))
//fin arcade favori
{
		//chargement du template
		$template->set_filenames(array(
   		'body' => 'arcade_cat_body.tpl')
		);

		$template->assign_vars(array(
		//début arcade favori
			'ARCADE_COL' => ($arcade_config['use_fav_category'])? 6:5,
			'FAV' => $lang['fav'],
//fin arcade favori
			'URL_ARCADE' => '<nobr><a class="cattitle" href="' . append_sid("arcade.$phpEx") . '">' . $lang['lib_arcade'] . '</a></nobr> ',
			'URL_BESTSCORES' => '<nobr><a class="cattitle" href="' . append_sid("toparcade.$phpEx") . '">' . $lang['best_scores'] . '</a></nobr> ',	
			'URL_SCOREBOARD' => '<nobr><a class="cattitle" href="' . append_sid("scoreboard.$phpEx?gid=$gid") . '">' . $lang['scoreboard'] . '</a></nobr> ',
			'MANAGE_COMMENTS' => '<nobr><a class="cattitle" href="' . append_sid("comments_list.$phpEx") . '">' . $lang['comments'] . '</a></nobr> ',
'L_GAME' => $lang['games'],
			'L_HIGHSCORE' => $lang['highscore'],
			'L_YOURSCORE' => $lang['yourbestscore'],
			'L_DESC' => $lang['desc_game'],
			'L_ARCADE' => $lang['lib_arcade'])
			);
				//début arcade favori			
	include($phpbb_root_path . 'arcade_favoris.'.$phpEx);
//fin arcade favori
	$liste_jeux = array();		
	$sql = "SELECT g.*, u.username, u.user_id, s.score_game, s.score_date FROM " . GAMES_TABLE . " g LEFT JOIN " . USERS_TABLE . " u ON g.game_highuser = u.user_id LEFT JOIN " 
			. SCORES_TABLE
			. " s on s.game_id = g.game_id and s.user_id = " . $userdata['user_id'] . " WHERE g.arcade_catid IN ($liste_cat_auth) ORDER BY g.arcade_catid, $order_by" ; 


	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible d'accéder à la tables des catégories", '', __LINE__, __FILE__, $sql); 
	}
	while( $row = $db->sql_fetchrow($result))
	{
	   $liste_jeux[$row['arcade_catid']][] = $row ;
	}

	$sql = "SELECT arcade_catid, arcade_cattitle, arcade_nbelmt, arcade_catauth FROM " . ARCADE_CATEGORIES_TABLE . " WHERE arcade_catid IN ($liste_cat_auth) ORDER BY arcade_catorder";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible d'accéder à la tables des catégories", '', __LINE__, __FILE__, $sql); 
	}


	while( $row = $db->sql_fetchrow($result))
	{
			$nbjeux = sizeof($liste_jeux[$row['arcade_catid']]);
			if ($nbjeux > 0) //On affiche une catégorie seulement si elle contient au moins 1 jeu.
			{
				$template->assign_block_vars('cat_row',array(
					'U_ARCADE' => append_sid("arcade.$phpEx?cid=" . $row['arcade_catid'] ),
					'LINKCAT_ALIGN' => ( $arcade_config['linkcat_align'] == '0' ) ? 'left' : ( ( $arcade_config['linkcat_align'] == '1' ) ? 'center' : 'right'),
					'L_ARCADE' => sprintf($lang['Other_games'],$row['arcade_nbelmt']),
					'CATTITLE' => $row['arcade_cattitle'])
					);
				$nbjeux = ( $nbjeux < $games_par_categorie ) ? $nbjeux : $games_par_categorie ;
				for ($i=0 ; $i<$nbjeux ; $i++)
				{
		  			$template->assign_block_vars('cat_row.game_row',array(
						'GAMENAME' => $liste_jeux[$row['arcade_catid']][$i]['game_name'],
						'GAMELINK' => '<nobr><a href="' . append_sid("games.$phpEx?gid=" . $liste_jeux[$row['arcade_catid']][$i]['game_id'] ) . '">' . $liste_jeux[$row['arcade_catid']][$i]['game_name'] . '</a></nobr> ',
						'GAMEPIC' => ( $liste_jeux[$row['arcade_catid']][$i]['game_pic'] != '' ) ? "<a href='" . append_sid("games.$phpEx?gid=" . $liste_jeux[$row['arcade_catid']][$i]['game_id'] ) . "'><img src='" . "games/pics/" . $liste_jeux[$row['arcade_catid']][$i]['game_pic'] . "' align='absmiddle' border='0' width='30' height='30' vspace='2' hspace='2' alt='" . $liste_jeux[$row['arcade_catid']][$i]['game_name'] . "' ></a>" : '' ,
						'GAMESET' => ( $liste_jeux[$row['arcade_catid']][$i]['game_set'] != 0  ) ? $lang['game_actual_nbset'] . $liste_jeux[$row['arcade_catid']][$i]['game_set'] : '',
						'HIGHSCORE' => $liste_jeux[$row['arcade_catid']][$i]['game_highscore'],
						'YOURHIGHSCORE' => $liste_jeux[$row['arcade_catid']][$i]['score_game'],
						'NORECORD' => ( $liste_jeux[$row['arcade_catid']][$i]['game_highscore'] == 0 ) ? $lang['no_record'] : '',
						'HIGHUSER' => ( $liste_jeux[$row['arcade_catid']][$i]['game_highuser'] != 0 ) ? '(' . $liste_jeux[$row['arcade_catid']][$i]['username'] . ')' : '' ,
		    			'URL_SCOREBOARD' => '<nobr><a class="cattitle" href="' . append_sid("scoreboard.$phpEx?gid=" . $liste_jeux[$row['arcade_catid']][$i]['game_id'] ) . '">' . "<img src='templates/" . $theme['template_name'] . "/images/scoreboard.gif' align='absmiddle' border='0' alt='" . $lang['scoreboard'] . " " . $liste_jeux[$row['arcade_catid']][$i]['game_name'] . "'>" . '</a></nobr> ',
						'GAMEID' => $liste_jeux[$row['arcade_catid']][$i]['game_id'],
						'DATEHIGH' => "<nobr>" . create_date( $board_config['default_dateformat'] , $liste_jeux[$row['arcade_catid']][$i]['game_highdate'] , $board_config['board_timezone'] ) . "</nobr>",
						'YOURDATEHIGH' => "<nobr>" . create_date( $board_config['default_dateformat'] , $liste_jeux[$row['arcade_catid']][$i]['score_date'] , $board_config['board_timezone'] ) . "</nobr>",
						'IMGFIRST' => ( $liste_jeux[$row['arcade_catid']][$i]['game_highuser'] == $userdata['user_id'] ) ? "&nbsp;&nbsp;<img src='templates/" . $theme['template_name'] . "/images/couronne.gif' align='absmiddle'>" : "" ,
						
						'GAMEDESC' => $liste_jeux[$row['arcade_catid']][$i]['game_desc']
		       		  	)
						);

//début arcade favori
include_once($phpbb_root_path . 'includes/functions_arcade_favoris.'.$phpEx);	

$favtest = favoris_inserted($userdata['user_id'], $liste_jeux[$row['arcade_catid']][$i]['game_id']);
if ($favtest)
{
	$template->assign_block_vars('cat_row.game_row.no_fav', array(
  'DELFAVORI' => '<a href="' . append_sid("arcade.$phpEx?delfavori=" . $liste_jeux[$row['arcade_catid']][$i]['game_id'] ) .'"><img src="' . append_sid("images/delfavs.gif").'" border=0 alt="'.$lang['del_fav'].'" title="'.$lang['del_fav'].'"></a>')
  );
}
else
{
	$template->assign_block_vars('cat_row.game_row.fav', array(
	'ADD_FAV' => ($arcade_config['use_fav_category'])?'<td class="row1" width="25" align="center" valign="center"><a href="' . append_sid("arcade.$phpEx?favori=" . $liste_jeux[$row['arcade_catid']][$i]['game_id'] ) .'"><img src="' . append_sid("images/favs.gif").'" border=0 alt="'.$lang['add_fav'].'" title="'.$lang['add_fav'].'"></a></td>':'')	
  );
 }
//fin arcade favori

					if ( $liste_jeux[$row['arcade_catid']][$i]['game_highscore'] !=0 )
					{
						$template->assign_block_vars('cat_row.game_row.recordrow',array()) ;
					}	
					if ( $liste_jeux[$row['arcade_catid']][$i]['score_game'] !=0 )
					{
						$template->assign_block_vars('cat_row.game_row.yourrecordrow',array()) ;
					}	
				}
		}
	}	
	include($phpbb_root_path . 'whoisplaying.'.$phpEx);
    include($phpbb_root_path . 'topstatarcade.'.$phpEx);
	include($phpbb_root_path . 'headingarcade.'.$phpEx);
include($phpbb_root_path . 'championnat_equipe.'.$phpEx);
	include($phpbb_root_path . 'championnatarcade.'.$phpEx);
	
	//
	// Output page header
	$page_title = $lang['arcade'];
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);	
	$template->pparse('body');
	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
	exit;
}

/*--------------------------------------------------/
/ Sinon, on affiche la liste des jeux ?
/---------------------------------------------------*/
$games_par_page = $arcade_config['games_par_page'] ;
$sql_where = '';
$limit = " LIMIT $start,$games_par_page ";

$total_games = 0;

if ( $arcade_config['use_category_mod'])
{
	$sql_where = " WHERE arcade_catid = $arcade_catid AND arcade_catid IN ($liste_cat_auth)"; 
	$sql = "SELECT arcade_cattitle, arcade_nbelmt AS nbgames FROM " . ARCADE_CATEGORIES_TABLE . " $sql_where";
	//début arcade favori ##add $mode=='favoris'
if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible d\acceder à la tables des catégories", '', __LINE__, __FILE__, $sql); 
	}
	if ( $row = $db->sql_fetchrow($result) or $mode=='favoris' )
	{
   		$total_games = $row['nbgames'];
	}
//fin arcade favori
	else
	{
	   message_die(GENERAL_MESSAGE,$lang['no_arcade_cat']);
	}
	$template->assign_block_vars('use_category_mod', array());
}
else
{
	$sql = "SELECT COUNT(*) AS nbgames FROM " . GAMES_TABLE ;
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible d\acceder à la tables des jeux", '', __LINE__, __FILE__, $sql); 
	}
	if ( $row = $db->sql_fetchrow($result))
	{
   		$total_games = $row['nbgames'];
	}
}
//chargement du template
$template->set_filenames(array(
   'body' => 'arcade_body.tpl')
);

$template->assign_vars(array(
	'URL_ARCADE' => '<nobr><a class="cattitle" href="' . append_sid("arcade.$phpEx") . '">' . $lang['lib_arcade'] . '</a></nobr> ',
	'URL_BESTSCORES' => '<nobr><a class="cattitle" href="' . append_sid("toparcade.$phpEx") . '">' . $lang['best_scores'] . '</a></nobr> ',	
	'URL_SCOREBOARD' => '<nobr><a class="cattitle" href="' . append_sid("scoreboard.$phpEx?gid=$gid") . '">' . $lang['scoreboard'] . '</a></nobr> ',
	'MANAGE_COMMENTS' => '<nobr><a class="cattitle" href="' . append_sid("comments_list.$phpEx") . '">' . $lang['comments'] . '</a></nobr> ',
'CATTITLE' => $row['arcade_cattitle'],
	'L_GAME' => $lang['games'],
	//début arcade favori
	'PAGINATION' => ($mode!='favoris')? generate_pagination(append_sid("arcade.$phpEx?cid=$arcade_catid"), $total_games, $games_par_page, $start):'',
	'PAGE_NUMBER' => ($mode!='favoris')? sprintf($lang['Page_of'], ( floor( $start / $games_par_page ) + 1 ), ceil( $total_games / $games_par_page )):'',
	'ARCADE_COL' => ($arcade_config['use_fav_category'])? 6:5,
	'ARCADE_COL1' => ($arcade_config['use_fav_category'])? 2:1,
	'FAV' => $lang['fav'],
//fin arcade favori
	'L_HIGHSCORE' => $lang['highscore'],
	'L_YOURSCORE' => $lang['yourbestscore'],
	'L_DESC' => $lang['desc_game'],
	'L_ARCADE' => $lang['lib_arcade'])
	);
//début arcade favori
if($mode!='favoris')
	{
		if ( !$arcade_config['use_category_mod'] )
			{
			include($phpbb_root_path . 'arcade_favoris.'.$phpEx);
			}
//fin arcade favori
$sql = "SELECT g.*, u.username, u.user_id, s.score_game, s.score_date FROM " . GAMES_TABLE . " g left join " . USERS_TABLE . " u on g.game_highuser = u.user_id left join " 
. SCORES_TABLE
. " s on s.game_id = g.game_id and s.user_id = " . $userdata['user_id'] . " $sql_where ORDER BY $order_by $limit" ;

if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d\acceder à la tables des jeux", '', __LINE__, __FILE__, $sql); 
}

while( $row = $db->sql_fetchrow($result) )
{
	$template->assign_block_vars('gamerow', array(
	'GAMENAME' => $row['game_name'],
	'GAMEPIC' => ( $row['game_pic'] != '' ) ? "<a href='" . append_sid("games.$phpEx?gid=" . $row['game_id'] ) . "'><img src='" . "games/pics/" . $row['game_pic'] . "' align='absmiddle' border='0' width='30' height='30' alt='" . $row['game_name'] . "' ></a>" : '' ,
	'GAMESET' => ( $row['game_set'] != 0  ) ? $lang['game_actual_nbset'] . $row['game_set'] : '',
	'GAMEDESC' => $row['game_desc'],
	'HIGHSCORE' => $row['game_highscore'],
	'YOURHIGHSCORE' => $row['score_game'],
	'NORECORD' => ( $row['game_highscore'] == 0 ) ? $lang['no_record'] : '',
	'HIGHUSER' => ( $row['game_highuser'] != 0 ) ? '(' . $row['username'] . ')' : '' ,
    'URL_SCOREBOARD' => '<nobr><a class="cattitle" href="' . append_sid("scoreboard.$phpEx?gid=" . $row['game_id'] ) . '">' . "<img src='templates/" . $theme['template_name'] . "/images/scoreboard.gif' align='absmiddle' border='0' alt='" . $lang['scoreboard'] . " " . $row['game_name'] . "'>" . '</a></nobr> ',	
	'GAMEID' => $row['game_id'],
	'DATEHIGH' => "<nobr>" . create_date( $board_config['default_dateformat'] , $row['game_highdate'] , $board_config['board_timezone'] ) . "</nobr>",
	'YOURDATEHIGH' => "<nobr>" . create_date( $board_config['default_dateformat'] , $row['score_date'] , $board_config['board_timezone'] ) . "</nobr>",
	'IMGFIRST' => ( $row['game_highuser'] == $userdata['user_id'] ) ? "&nbsp;&nbsp;<img src='templates/" . $theme['template_name'] . "/images/couronne.gif' align='absmiddle'>" : "" ,	
	'GAMELINK' => '<nobr><a href="' . append_sid("games.$phpEx?gid=" . $row['game_id'] ) . '">' . $row['game_name'] . '</a></nobr> ' )
	);

//début arcade favori
include_once($phpbb_root_path . 'includes/functions_arcade_favoris.'.$phpEx);	

$favtest = favoris_inserted($userdata['user_id'], $row['game_id']);
if ($favtest)
{
	$template->assign_block_vars('gamerow.no_fav',array(
  'DELFAVORI' => '<a href="' . append_sid("arcade.$phpEx?delfavori=" . $row['game_id'] ) .'"><img src="' . append_sid("images/delfavs.gif").'" border=0 alt="'.$lang['del_fav'].'" title="'.$lang['del_fav'].'"></a>')
  );
}
else
{
	$template->assign_block_vars('gamerow.fav',array(
	'ADD_FAV' => ($arcade_config['use_fav_category'])?'<td class="row1" width="25" align="center" valign="center"><a href="' . append_sid("arcade.$phpEx?favori=" . $row['game_id'] ) .'"><img src="' . append_sid("images/favs.gif").'" border=0 alt="'.$lang['add_fav'].'" title="'.$lang['add_fav'].'"></a></td>':'')	
  );
 }
//fin arcade favori
	if ( $row['game_highscore'] !=0 )
	{
		$template->assign_block_vars('gamerow.recordrow',array()) ;
	}	
	if ( $row['score_game'] !=0 )
	{
		$template->assign_block_vars('gamerow.yourrecordrow',array()) ;
	}	

}
//début arcade favori		
	}
	else 
	{
	include($phpbb_root_path . 'arcade_favoris.'.$phpEx);
	}
//fin arcade favori
include($phpbb_root_path . 'whoisplaying.'.$phpEx);
include($phpbb_root_path . 'topstatarcade.'.$phpEx);
include($phpbb_root_path . 'headingarcade.'.$phpEx);
include($phpbb_root_path . 'championnat_equipe.'.$phpEx);	
include($phpbb_root_path . 'championnatarcade.'.$phpEx);
	
//
// Output page header
$page_title = $lang['arcade'];
include($phpbb_root_path . 'includes/page_header.'.$phpEx);	
$template->pparse('body');
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>
