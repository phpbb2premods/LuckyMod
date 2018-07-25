<?php
/***************************************************************************
 *                                games.php
 *                            -------------------
 *   commencé le                : Samedi,17 Mai, 2003
 *   Par : giefca - http://www.gf-phpbb.com
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include( $phpbb_root_path . 'includes/functions_arcade.' . $phpEx);
include_once($phpbb_root_path . 'includes/arca_bbcode.'.$phpEx);
//
// Start session management
//

$userdata = session_pagestart($user_ip, PAGE_GAME);
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
$arcade_config = array();
$arcade_config = read_arcade_config();
if($arcade_config['limit_by_posts'] && $userdata['user_level'] != ADMIN){ 
$secs = 86400; 
$uid = $userdata['user_id']; 

$days = $arcade_config['days_limit']; 
$posts = $arcade_config['posts_needed']; 

$current_time = time(); 
$old_time = $current_time - ($secs * $days); 


if($arcade_config['limit_type']=='posts') 
{ 
$sql = "SELECT * FROM " . POSTS_TABLE . " WHERE poster_id = $uid"; 
} 
else 
{ 
$sql = "SELECT * FROM " . POSTS_TABLE . " WHERE poster_id = $uid and post_time BETWEEN $old_time AND $current_time"; 
} 
if ( !($result = $db->sql_query($sql)) ) 
   { 
      message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql); 
   } 

   $Amount_Of_Posts = $db->sql_numrows( $result ); 


   if($Amount_Of_Posts < $posts) 
   { 
   $diff_posts = $posts - $Amount_Of_Posts;              
    
   if($arcade_config['limit_type']=='posts') 
      { 
         $message = "You need $posts posts to play the arcade.<br/>You need $diff_posts more posts."; 
           } 
   else  { 
         $message = "You need $posts posts in the last $days days to play the arcade.<br/>You need $diff_posts more posts."; 

      } 
      message_die(GENERAL_MESSAGE, $message); 
   } 
} 
# Censure
$orig_word = array();
$replacement_word = array();
obtain_word_list($orig_word, $replacement_word);
// Start addon points arcade 
if ($arcade_config['use_points_mod'] && $arcade_config['use_points_pay_mod']) 
{ 
   $nbpoint = $userdata['user_points']; 
   $cost = $arcade_config['points_pay']; 
   if($nbpoint<$cost) 
   { 
      $page_title = $lang['arcade_game']; 
      include($phpbb_root_path . 'includes/page_header.'.$phpEx); 

      $message .='<br /><br /><table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline"><tr><td class="catHead" align="center" height="28"><span class="cattitle">Information</span></td></tr><tr><td class="row1" align="center"><span class="gen">'.sprintf($lang['Sorry_Arcade_Pay'], $arcade_config['points_pay'], $board_config['points_name']) . "<br /><br />" . sprintf($lang['Click_return_index'], '<a href="' . append_sid("index.$phpEx") . '">', '</a>').'</span></td></tr></table><br /><br />'; 
      echo $message; 
      include($phpbb_root_path . 'includes/page_tail.'.$phpEx); 
   } 
   else 
   { 
   if ($arcade_config['use_points_pay_charging']) 
   { 
      $nbpoint = $nbpoint-$cost; 
      $sql = "update " . USERS_TABLE . " set user_points = $nbpoint where user_id = " . $userdata['user_id'] ; 
      if( !($result = $db->sql_query($sql)) ) 
      { 
         message_die(GENERAL_ERROR, "Impossible de modifier les points du joueur.", '', __LINE__, __FILE__, $sql); 
      } 
   } 
   if (!empty($HTTP_POST_VARS['gid']) || !empty($HTTP_GET_VARS['gid'])) 
   { 
      $gid = (!empty($HTTP_POST_VARS['gid'])) ? intval($HTTP_POST_VARS['gid']) : intval($HTTP_GET_VARS['gid']); 
   } 
   else 
   { 
      message_die(GENERAL_ERROR, "Aucun jeu n'est précisé"); 
   } 

   $sql = "SELECT g.* , MAX(s.score_game) as highscore FROM " . GAMES_TABLE . " g left join " . SCORES_TABLE . " s on g.game_id = s.game_id WHERE g.game_id = $gid GROUP BY g.game_id,g.game_highscore" ; 
   if( !($result = $db->sql_query($sql)) ) 
   { 
      message_die(GENERAL_ERROR, "Impossible d'acceder à la tables des jeux", '', __LINE__, __FILE__, $sql); 
   } 
   if ( !( $row = $db->sql_fetchrow($result) ) ) 
   { 
      message_die(GENERAL_ERROR, "Ce jeu n'existe pas", '', __LINE__, __FILE__, $sql); 
   } 
$game_cheatcontrol = $row['game_cheat_control'];

   $liste_cat_auth_play = get_arcade_categories($userdata['user_id'], $userdata['user_level'],'play'); 
   $tbauth_play = array(); 
   $tbauth_play = explode(',',$liste_cat_auth_play); 
   if( !in_array($row['arcade_catid'],$tbauth_play)) 
   { 
      message_die(GENERAL_MESSAGE, $lang['game_forbidden']); 
   } 

   //chargement du template 
   $template->set_filenames(array( 
      'body' => 'games_body.tpl') 
   ); 

   $sql = "DELETE FROM " . GAMEHASH_TABLE . " WHERE hash_date < " . (time() - 72000 ) ; 
   if( !$db->sql_query($sql) ) 
   { 
      message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des hash game", '', __LINE__, __FILE__, $sql); 
   } 

   /* Le nombre de parties jouées ne sera mis à jour qu'après avoir soumis un score 
   $sql = "UPDATE " . GAMES_TABLE . " SET game_set = game_set+1 WHERE game_id = $gid"; 
   if( !$db->sql_query($sql) ) 
   { 
      message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des jeux", '', __LINE__, __FILE__, $sql); 
   }*/ 

   if ( $row['game_type'] == 3 )
{
// Jeu type V2
 	$type_v2 = true ;
	$template->assign_block_vars('game_type_V2',array());
	$gamehash_id = md5(uniqid($user_ip)) ;
	$sql = "INSERT INTO " . GAMEHASH_TABLE . " ( gamehash_id , game_id , user_id , hash_date ) VALUES ( '$gamehash_id' , '$gid' , '" . $userdata['user_id'] . "' , '" . time() . "')" ; 
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des hash game", '', __LINE__, __FILE__, $sql); 
	}

}
elseif ($row['game_type'] == 4) 
{ 
      $template->assign_block_vars('game_type_V2',array()); 
      setcookie('gidstarted', '', time() - 3600); 
      setcookie('gidstarted',$gid); 
      setcookie('timestarted', '', time() - 3600); 
      setcookie('timestarted', time()); 

      $gamehash_id = md5($user_ip); 
      $sql = "INSERT INTO " . GAMEHASH_TABLE . " (gamehash_id , game_id , user_id , hash_date) VALUES ('$gamehash_id' , '$gid' , '" . $userdata['user_id'] . "' , '" . time() . "')"; 

      if (!($result = $db->sql_query($sql))) 
      { 
            //message_die(GENERAL_ERROR, "Couldn't update hashtable", '', __LINE__, __FILE__, $sql); 
      } 
      $sql = "UPDATE " . GAMES_TABLE . " SET game_set = game_set+1 WHERE game_id =  '$gid'"; 
      $db->sql_query($sql) ; 
	    if ($game_cheatcontrol)
   {
      //Enregistrement de la session du jeu
      $gamesessid = md5(uniqid(mt_rand(), true));
      $sql = "INSERT INTO " . ARCADE_TIME_TEMP . " (game_sessid, user_id, game_id, date_enreg) VALUES ('" . $gamesessid . "', '" . $userdata['user_id'] . "','$gid', '" . time() . "')";
      if (!($result = $db->sql_query($sql)))
      {
          message_die(GENERAL_ERROR, "Couldn't insert values in table games_time", '', __LINE__, __FILE__, $sql);
      }
   }

} 
else
{
// Jeu type V1
 	$type_v2 = false ;
	$template->assign_block_vars('game_type_V1',array());
	$gamehash_id = md5(uniqid($user_ip)) ;
	$sql = "INSERT INTO " . GAMEHASH_TABLE . " ( gamehash_id , game_id , user_id , hash_date ) VALUES ( '$gamehash_id' , '$gid' , '" . $userdata['user_id'] . "' , '" . time() . "')" ; 
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des hash game", '', __LINE__, __FILE__, $sql); 
	}
	$sql = "UPDATE " . GAMES_TABLE . " SET game_set = game_set+1 WHERE game_id =  '$gid'";
	$db->sql_query($sql) ;
}

   $scriptpath = substr($board_config['script_path'] , strlen( $board_config['script_path'] ) - 1 , 1 ) == '/' ? substr( $board_config['script_path'] , 0 , strlen( $board_config['script_path'] ) - 1 ) : $board_config['script_path'] ; 
   $scriptpath = "http://" . $board_config['server_name'] .$scriptpath ; 
//début arcade favori
if($arcade_config['use_fav_category'])
{
	$sql = "SELECT COUNT(*) AS nbfav from ".ARCADE_FAV_TABLE." where user_id= ".$userdata['user_id']." and game_id= ".$row['game_id'];
	if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'accéder à la tables des favoris", '', __LINE__, __FILE__, $sql); 
		}
	$rowf = $db->sql_fetchrow($result); 
	$nbfav = $rowf['nbfav'];
}

include($phpbb_root_path . 'includes/functions_arcade_favoris.'.$phpEx);	

$favtest = favoris_inserted($userdata['user_id'], $gid);
if ($favtest)
{
	$template->assign_block_vars('no_fav', array(
  'ADD_FAV' => $lang['Cant_add_fav'])
  );
}
else
{
	$template->assign_block_vars('fav', array(
  'ADD_FAV' => ($arcade_config['use_fav_category'] + !$nbfav)?'<a href="' . append_sid("arcade.$phpEx?favori=" . $row['game_id'] ) .'" class="nav"><img src="' . append_sid("images/favs.gif").'" border=0 alt="'.$lang['add_fav'].'" title="'.$lang['add_fav'].'">'.$lang['add_fav'].'<img src="' . append_sid("images/favs.gif").'" border=0 alt="'.$lang['add_fav'].'" title="'.$lang['add_fav'].'"></a>':'')
  );
}
//fin arcade favori
   $template->assign_vars(array( 
      'U_URL' => append_sid("" ), 
      'MAXSIZE_AVATAR' => intval($arcade_config['maxsize_avatar']), 
      'SWF_GAME' => $row['game_swf'] , 
      'GAME_WIDTH' => $row['game_width'] , 
      'GAME_HEIGHT' => $row['game_height'] , 
      'L_GAME' => $row['game_name'] , 
      'GID' => $gid , 
	     'GSID' => $gamesessid,
      'UIP' => $user_ip , 
      'BBTITLE' => str_replace('"','',$board_config['sitename']), 
      'SCRIPT_PATH' => $scriptpath ,    
      'SID' => ( $sid != '' ) ? "&sid=$sid" : "", 
      'GAMEHASH' => $gamehash_id,    
      'USER_NAME' => $userdata['username'], 
      'L_TOP' => $lang['best_scores'] , 
      'HIGHSCORE' => $row['highscore'], 
      'SETTIME' => time(), 
      'NAV_DESC' => '><a class="nav" href="' . append_sid("arcade.$phpEx") . '">Arcade</a> ' , 
      'URL_ARCADE' => '<nobr><a class="cattitle" href="' . append_sid("arcade.$phpEx") . '">' . $lang['lib_arcade'] . '</a></nobr> ', 
      'URL_BESTSCORES' => '<nobr><a class="cattitle" href="' . append_sid("toparcade.$phpEx") . '">' . $lang['best_scores'] . '</a></nobr> ',    
      
	  'URL_STATS' => '<a class="genmed" href="' . append_sid("statarcade.$phpEx?uid=" . $userdata['user_id'] ) . '">' . $lang['statuser'] . '</a> ',
	  'URL_ARCADE' => '<nobr><a class="cattitle" href="' . append_sid("arcade.$phpEx") . '">' . $lang['lib_arcade'] . '</a></nobr> ',
	  'MANAGE_COMMENTS' => '<nobr><a class="cattitle" href="' . append_sid("comments_list.$phpEx") . '">' . $lang['comments'] . '</a></nobr> ',	  
	  'URL_SCOREBOARD' => '<nobr><a class="cattitle" href="' . append_sid("scoreboard.$phpEx?gid=$gid") . '">' . $lang['scoreboard'] . '</a></nobr> ')       
      ); 

   //Les meilleurs scores 
   $sql = "SELECT s.* , u.username, u.user_avatar_type, u.user_allowavatar, u.user_avatar FROM " . SCORES_TABLE . " s left join " . USERS_TABLE . " u on s.user_id = u.user_id WHERE game_id = $gid ORDER BY s.score_game DESC, s.score_date ASC LIMIT 0,15 " ; 

   if( !($result = $db->sql_query($sql)) ) 
   { 
      message_die(GENERAL_ERROR, "Impossible d\acceder à la tables des jeux", '', __LINE__, __FILE__, $sql); 
   } 

   # Addon arcade by Oyo & JRSweets
$sql ='SELECT * FROM ' . COMMENTS_TABLE . ' WHERE game_id = '.$gid;
if( !($result_comment = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Error retrieving comment from comment table', '', __LINE__, __FILE__, $sql);
}
$row_comment = $db->sql_fetchrow($result_comment);
# Saut de ligne
$comment= str_replace("\n", "\n<br />\n", $row_comment['message']);
if( $comment)
{
	# Smilies
	if ( $board_config['allow_smilies'] )
	{
		$comment = smilies_pass2($comment);
	}
	# BBcode (fonction annexe créer par le fichier arca_bbcode.php)
	$comment =  bbencode_pass($comment);
	
	# Evite les déformation
	$comment = wordwrap($comment, 78, "\n", 1);
		
	# Censure
	
	if (count($orig_word))
	{
		$comment = str_replace('\"', '"', substr(preg_replace('#(\>(((?>([^><]+|(?R)))*)\<))#se', "preg_replace(\$orig_word, \$replacement_word, '\\0')", '>' . $comment . '<'), 1, -1));
	}
	
	$comment = '<img src="templates/' . $theme['template_name'] . '/images/couronne.gif" align="absmiddle">&nbsp;' .$comment .'';
}
# Addon arcade by Oyo & JRSweets
   $pos = 0 ; 
   $posreelle = 0; 
   $lastscore = 0; 
   while ( $row = $db->sql_fetchrow($result) ) 
   { 
    $posreelle++ ; 
    if ( $posreelle == 1) 
    { 
       $user_avatar_type = $row['user_avatar_type']; 
       $user_allowavatar = $row['user_allowavatar']; 
       $user_avatar = $row['user_avatar']; 
       $best_user = $row['username']; 
    } 

    if ($lastscore!=$row['score_game'])$pos = $posreelle ; 
    $lastscore = $row['score_game'] ; 
   $template->assign_block_vars('scorerow', array( 
      'POS' => $pos , 
      'USERNAME' => $row['username'] , 
      'URL_STATS' => '<nobr><a class="cattitle" href="' . append_sid("statarcade.$phpEx?uid=" . $row['user_id'] ) . '">' . "<img src='templates/" . $theme['template_name'] . "/images/loupe.gif' align='absmiddle' border='0' alt='" . $lang['statuser'] . $row['username'] . "'>" . '</a></nobr> ',    
      'GAMEDESC' => $row['game_desc'], 
      'SCORE' => $row['score_game'], 
      'DATEHIGH' => create_date( $board_config['default_dateformat'] , $row['score_date'] , $board_config['board_timezone'] ) 
      ));    
   } 

   $avatar_img = ''; 
   if ( $user_avatar_type && $user_allowavatar ) 
   { 
      switch( $user_avatar_type ) 
      { 
         case USER_AVATAR_UPLOAD: 
            $avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $user_avatar . '" alt="" border="0" hspace="20" align="center" valign="center" onload="resize_avatar(this)"/>' : ''; 
            break; 
         case USER_AVATAR_REMOTE: 
            $avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $user_avatar . '" alt="" border="0"  hspace="20" align="center" valign="center"  onload="resize_avatar(this)"/>' : ''; 
            break; 
         case USER_AVATAR_GALLERY: 
            $avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $user_avatar . '" alt="" border="0"  hspace="20" align="center" valign="center"  onload="resize_avatar(this)"/>' : ''; 
            break; 
      } 
    
   } 

   if ($arcade_config['display_winner_avatar']) 
   { 
      if ($arcade_config['winner_avatar_position']=='right') 
      { 
         $template->assign_block_vars('avatar_best_player_right',array()); 
      } 
      else 
      { 
         $template->assign_block_vars('avatar_best_player_left',array()); 
      }
	  $modo_admin_record  = (( $userdata['user_level'] == ADMIN)  OR ( $userdata['user_level'] == MOD )) ? '<a href="modoadminrecord.' . $phpEx . '?mode=edit&gid=' .$gid.'&sid=' . $userdata['session_id'] . '"><img src=templates/subSilver/images/supprecord.gif border="0"></a><br /><br />' : ''; 
      $template->assign_vars(array( 
            'L_ACTUAL_WINNER' => $lang['Actual_winner'], 
            'BEST_USER_NAME' => $best_user,
			'MODOADMINRECORD' => $modo_admin_record,
			'COMMENTS' => $comment,
            'FIRST_AVATAR' => $avatar_img) 
         ); 
   } 

   include($phpbb_root_path . 'whoisplaying.'.$phpEx);
   //-- mod : Arcade Vote ------------------------------------------------
//-- add
if ($arcade_config['use_arcade_vote'] == 1)
{
	$template->assign_block_vars('use_arcade_vote',array()) ;
	include($phpbb_root_path . 'arcade_vote.'.$phpEx);
}
//-- fin mod : Arcade Vote --------------------------------------------

   include($phpbb_root_path . 'headingarcade.'.$phpEx); 
   // 
   // Output page header 
   $page_title = $lang['arcade_game']; 
   if ($game_cheatcontrol)
{
   include($phpbb_root_path . 'includes/page_header_games.'.$phpEx);
}
else
{
   include($phpbb_root_path . 'includes/page_header.'.$phpEx);
}
$template->pparse('body');
   include($phpbb_root_path . 'includes/page_tail.'.$phpEx); 
   } 
} 
else 
{ 
// End addon points arcade 

if (!empty($HTTP_POST_VARS['gid']) || !empty($HTTP_GET_VARS['gid']))
{
	$gid = (!empty($HTTP_POST_VARS['gid'])) ? intval($HTTP_POST_VARS['gid']) : intval($HTTP_GET_VARS['gid']);
}
else
{
	message_die(GENERAL_ERROR, "Aucun jeu n'est précisé"); 
}

$sql = "SELECT g.* , MAX(s.score_game) as highscore FROM " . GAMES_TABLE . " g left join " . SCORES_TABLE . " s on g.game_id = s.game_id WHERE g.game_id = $gid GROUP BY g.game_id,g.game_highscore" ; 
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder à la tables des jeux", '', __LINE__, __FILE__, $sql); 
}

if ( !( $row = $db->sql_fetchrow($result) ) )
{
	message_die(GENERAL_ERROR, "Ce jeu n'existe pas", '', __LINE__, __FILE__, $sql); 
}
$game_cheatcontrol = $row['game_cheat_control'];


$liste_cat_auth_play = get_arcade_categories($userdata['user_id'], $userdata['user_level'],'play');
$tbauth_play = array();
$tbauth_play = explode(',',$liste_cat_auth_play);
if( !in_array($row['arcade_catid'],$tbauth_play))
{
	message_die(GENERAL_MESSAGE, $lang['game_forbidden']); 
}


//chargement du template
$template->set_filenames(array(
   'body' => 'games_body.tpl')
);

$sql = "DELETE FROM " . GAMEHASH_TABLE . " WHERE hash_date < " . (time() - 72000 ) ; 
if( !$db->sql_query($sql) )
{
	message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des hash game", '', __LINE__, __FILE__, $sql); 
}

/* Le nombre de parties jouées ne sera mis à jour qu'après avoir soumis un score
$sql = "UPDATE " . GAMES_TABLE . " SET game_set = game_set+1 WHERE game_id = $gid"; 
if( !$db->sql_query($sql) )
{
	message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des jeux", '', __LINE__, __FILE__, $sql); 
}*/


if ( $row['game_type'] == 3 )
{
// Jeu type V2
 	$type_v2 = true ;
	$template->assign_block_vars('game_type_V2',array());
	$gamehash_id = md5(uniqid($user_ip)) ;
	$sql = "INSERT INTO " . GAMEHASH_TABLE . " ( gamehash_id , game_id , user_id , hash_date ) VALUES ( '$gamehash_id' , '$gid' , '" . $userdata['user_id'] . "' , '" . time() . "')" ; 
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des hash game", '', __LINE__, __FILE__, $sql); 
	}

}
elseif ($row['game_type'] == 4) 
{ 
      $template->assign_block_vars('game_type_V2',array()); 
      setcookie('gidstarted', '', time() - 3600); 
      setcookie('gidstarted',$gid); 
      setcookie('timestarted', '', time() - 3600); 
      setcookie('timestarted', time()); 

      $gamehash_id = md5($user_ip); 
      $sql = "INSERT INTO " . GAMEHASH_TABLE . " (gamehash_id , game_id , user_id , hash_date) VALUES ('$gamehash_id' , '$gid' , '" . $userdata['user_id'] . "' , '" . time() . "')"; 

      if (!($result = $db->sql_query($sql))) 
      { 
            //message_die(GENERAL_ERROR, "Couldn't update hashtable", '', __LINE__, __FILE__, $sql); 
      } 
      $sql = "UPDATE " . GAMES_TABLE . " SET game_set = game_set+1 WHERE game_id =  '$gid'"; 
      $db->sql_query($sql) ;
	    if ($game_cheatcontrol)
   {
      //Enregistrement de la session du jeu
      $gamesessid = md5(uniqid(mt_rand(), true));
      $sql = "INSERT INTO " . ARCADE_TIME_TEMP . " (game_sessid, user_id, game_id, date_enreg) VALUES ('" . $gamesessid . "', '" . $userdata['user_id'] . "','$gid', '" . time() . "')";
      if (!($result = $db->sql_query($sql)))
      {
          message_die(GENERAL_ERROR, "Couldn't insert values in table games_time", '', __LINE__, __FILE__, $sql);
      }
   }
 
} 
else
{
// Jeu type V1
 	$type_v2 = false ;
	$template->assign_block_vars('game_type_V1',array());
	$gamehash_id = md5(uniqid($user_ip)) ;
	$sql = "INSERT INTO " . GAMEHASH_TABLE . " ( gamehash_id , game_id , user_id , hash_date ) VALUES ( '$gamehash_id' , '$gid' , '" . $userdata['user_id'] . "' , '" . time() . "')" ; 
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible de mettre à jour la table des hash game", '', __LINE__, __FILE__, $sql); 
	}
	$sql = "UPDATE " . GAMES_TABLE . " SET game_set = game_set+1 WHERE game_id =  '$gid'";
	$db->sql_query($sql) ;
}

$scriptpath = substr($board_config['script_path'] , strlen( $board_config['script_path'] ) - 1 , 1 ) == '/' ? substr( $board_config['script_path'] , 0 , strlen( $board_config['script_path'] ) - 1 ) : $board_config['script_path'] ;
$scriptpath = "http://" . $board_config['server_name'] .$scriptpath ;

$template->assign_vars(array(
	'U_URL' => append_sid("" ),
	'MAXSIZE_AVATAR' => intval($arcade_config['maxsize_avatar']),
	'SWF_GAME' => $row['game_swf'] ,
    'GAME_WIDTH' => $row['game_width'] , 
    'GAME_HEIGHT' => $row['game_height'] , 
	'L_GAME' => $row['game_name'] ,
	'GID' => $gid ,
	   'GSID' => $gamesessid,
	'UIP' => $user_ip ,
	'BBTITLE' => str_replace('"','',$board_config['sitename']),
	'SCRIPT_PATH' => $scriptpath ,	
	'SID' => ( $sid != '' ) ? "&sid=$sid" : "",
	'GAMEHASH' => $gamehash_id,	
	'USER_NAME' => $userdata['username'],
	'L_TOP' => $lang['best_scores'] ,
	'HIGHSCORE' => $row['highscore'],
	'SETTIME' => time(),
	'URL_STATS' => '<a class="genmed" href="' . append_sid("statarcade.$phpEx?uid=" . $userdata['user_id'] ) . '">' . $lang['statuser'] . '</a> ',
	'NAV_DESC' => '><a class="nav" href="' . append_sid("arcade.$phpEx") . '">Arcade</a> ' ,
	'URL_ARCADE' => '<nobr><a class="cattitle" href="' . append_sid("arcade.$phpEx") . '">' . $lang['lib_arcade'] . '</a></nobr> ',
	'URL_BESTSCORES' => '<nobr><a class="cattitle" href="' . append_sid("toparcade.$phpEx") . '">' . $lang['best_scores'] . '</a></nobr> ',
    'MANAGE_COMMENTS' => '<nobr><a class="cattitle" href="' . append_sid("comments_list.$phpEx") . '">' . $lang['comments'] . '</a></nobr> ',
	'URL_SCOREBOARD' => '<nobr><a class="cattitle" href="' . append_sid("scoreboard.$phpEx?gid=$gid") . '">' . $lang['scoreboard'] . '</a></nobr> ')		
	);

//Les meilleurs scores
$sql = "SELECT s.* , u.username, u.user_avatar_type, u.user_allowavatar, u.user_avatar FROM " . SCORES_TABLE . " s left join " . USERS_TABLE . " u on s.user_id = u.user_id WHERE game_id = $gid ORDER BY s.score_game DESC, s.score_date ASC LIMIT 0,15 " ;

if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d\acceder à la tables des jeux", '', __LINE__, __FILE__, $sql); 
}
# Addon arcade by Oyo & JRSweets
$sql ='SELECT * FROM ' . COMMENTS_TABLE . ' WHERE game_id = '.$gid;
if( !($result_comment = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Error retrieving comment from comment table', '', __LINE__, __FILE__, $sql);
}
$row_comment = $db->sql_fetchrow($result_comment);
# Saut de ligne
$comment= str_replace("\n", "\n<br />\n", $row_comment['message']);
if( $comment)
{
	# Smilies
	if ( $board_config['allow_smilies'] )
	{
		$comment = smilies_pass2($comment);
	}
	# BBcode (fonction annexe créer par le fichier arca_bbcode.php)
	$comment =  bbencode_pass($comment);
	
	# Evite les déformation
	$comment = wordwrap($comment, 78, "\n", 1);
		
	# Censure
	
	if (count($orig_word))
	{
		$comment = str_replace('\"', '"', substr(preg_replace('#(\>(((?>([^><]+|(?R)))*)\<))#se', "preg_replace(\$orig_word, \$replacement_word, '\\0')", '>' . $comment . '<'), 1, -1));
	}
	
	$comment = '<img src="templates/' . $theme['template_name'] . '/images/couronne.gif" align="absmiddle">&nbsp;' .$comment .'';
}
# Addon arcade by Oyo & JRSweets
$pos = 0 ;
$posreelle = 0;
$lastscore = 0;
while ( $row = $db->sql_fetchrow($result) ) 
{
 $posreelle++ ;
 if ( $posreelle == 1) 
 { 
    $user_avatar_type = $row['user_avatar_type']; 
    $user_allowavatar = $row['user_allowavatar']; 
    $user_avatar = $row['user_avatar']; 
    $best_user = $row['username']; 
 }

 if ($lastscore!=$row['score_game'])$pos = $posreelle ;
 $lastscore = $row['score_game'] ;
$template->assign_block_vars('scorerow', array(
	'POS' => $pos ,
	'USERNAME' => $row['username'] ,
    'URL_STATS' => '<nobr><a class="cattitle" href="' . append_sid("statarcade.$phpEx?uid=" . $row['user_id'] ) . '">' . "<img src='templates/" . $theme['template_name'] . "/images/loupe.gif' align='absmiddle' border='0' alt='" . $lang['statuser'] . $row['username'] . "'>" . '</a></nobr> ',	
	'GAMEDESC' => $row['game_desc'],
	'SCORE' => $row['score_game'],
	'DATEHIGH' => create_date( $board_config['default_dateformat'] , $row['score_date'] , $board_config['board_timezone'] )
	));	
}

$avatar_img = ''; 
if ( $user_avatar_type && $user_allowavatar ) 
{ 
   switch( $user_avatar_type ) 
   { 
      case USER_AVATAR_UPLOAD: 
         $avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $user_avatar . '" alt="" border="0" hspace="20" align="center" valign="center" onload="resize_avatar(this)"/>' : ''; 
         break; 
      case USER_AVATAR_REMOTE: 
         $avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $user_avatar . '" alt="" border="0"  hspace="20" align="center" valign="center"  onload="resize_avatar(this)"/>' : ''; 
         break; 
      case USER_AVATAR_GALLERY: 
         $avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $user_avatar . '" alt="" border="0"  hspace="20" align="center" valign="center"  onload="resize_avatar(this)"/>' : ''; 
         break; 
   } 
    
}
IF ( empty($avatar_img) ) 
{ 
   $avatar_img = '<img src="images/noavatar.gif" alt="Aucun Avatar" border="0" />'; 
}

if ($arcade_config['display_winner_avatar'])
{
	if ($arcade_config['winner_avatar_position']=='right')
	{
		$template->assign_block_vars('avatar_best_player_right',array());
	}
	else
	{
		$template->assign_block_vars('avatar_best_player_left',array());
	}
$modo_admin_record  = (( $userdata['user_level'] == ADMIN)  OR ( $userdata['user_level'] == MOD )) ? '<a href="modoadminrecord.' . $phpEx . '?mode=edit&gid=' .$gid.'&sid=' . $userdata['session_id'] . '"><img src=templates/subSilver/images/supprecord.gif border="0"></a><br /><br />' : '';
	$template->assign_vars(array( 
   		'L_ACTUAL_WINNER' => $lang['Actual_winner'],
   		'BEST_USER_NAME' => $best_user,
		'MODOADMINRECORD' => $modo_admin_record, 
        'COMMENTS' => $comment,
   		'FIRST_AVATAR' => $avatar_img) 
   	); 
}

include($phpbb_root_path . 'whoisplaying.'.$phpEx);
//-- mod : Arcade Vote ------------------------------------------------
//-- add
if ($arcade_config['use_arcade_vote'] == 1)
{
	$template->assign_block_vars('use_arcade_vote',array()) ;
	include($phpbb_root_path . 'arcade_vote.'.$phpEx);
}
//-- fin mod : Arcade Vote --------------------------------------------

include($phpbb_root_path . 'headingarcade.'.$phpEx);
//
// Output page header
$page_title = $lang['arcade_game'];
if ($game_cheatcontrol)
{
   include($phpbb_root_path . 'includes/page_header_games.'.$phpEx);
}
else
{
   include($phpbb_root_path . 'includes/page_header.'.$phpEx);
}
$template->pparse('body');include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
// Start addon points arcade 
} 
// End addon points arcade 
?>
