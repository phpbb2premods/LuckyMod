<?php

/***************************************************************************
 *                                proarcade.php
 *                            -------------------
 *   fait le                : Mercredi,19 Mai, 2003
 *   Par : giefca - http://www.gf-phpbb.com
 *
 ***************************************************************************/



define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
require( $phpbb_root_path . 'gf_funcs/gen_funcs.' . $phpEx);
// Start addon points arcade 
include( $phpbb_root_path . 'includes/functions_arcade.' . $phpEx); 
// End addon points arcade 

$gid = get_var2(array('name'=>'gid', 'intval'=>true, 'default'=>0));


$header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";

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

$header_location = ( @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE")) ) ? "Refresh: 0; URL=" : "Location: ";

$sql = "SELECT * FROM " . GAMES_TABLE . " WHERE game_id = '$gid'";
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder à la table des jeux", '', __LINE__, __FILE__, $sql); 
}
if ( !( $row = $db->sql_fetchrow($result) ) )
{// Si l'utilisateur n'a encore aucun score pour ce jeu'
	message_die(GENERAL_ERROR, "Aucun jeu ne correspond.") ;
}

$hashoffset = get_var2(array('name'=>'hashoffset', 'default'=>''));
$gamehash = get_var2(array('name'=>'gamehash', 'default'=>''));
$vpaver = get_var2(array('name'=>'vpaver', 'default'=>''));
$newhash = get_var2(array('name'=>'newhash', 'default'=>''));
$gpaver = get_var2(array('name'=>'gpaver', 'default'=>''));
$settime = get_var2(array('name'=>'settime', 'intval'=>true, 'default'=>''));
$sid = get_var2(array('name'=>'sid', 'default'=>''));
$valid = get_var2(array('name'=>'valid', 'default'=>''));

$arcade_config = array();
$arcade_config = read_arcade_config();
if ( $row['game_type'] == 0 )
{
	$deb = 32 - $hashoffset ;
	$gamehash_id = substr( $newhash , $deb , $hashoffset ) . substr( $newhash , 0 , $deb ) ;
}

if ( $row['game_type'] == 1 )
{
 $gamehash_id = $gamehash ;
}

if ( $row['game_type'] == 2 )
{
 if ( $vpaver == "100B" )
 {
 $gamehash_id = $gamehash ;
 $vpaver = "100B2" ;
 }
}

if ( $row['game_type'] == 3 )
{
	$gamehash_id = substr( $newhash , $hashoffset , 32 ) . substr( $newhash , 0 , $hashoffset ) ;
	$vpaver = ( $gpaver == "GFARV2") ? '100B2' : '' ;
}

if ( $row['game_type'] == 4 ) 
{ 
      $gamehash_id = md5($user_ip); 
      $vpaver = ($gpaver == "GFARV2") ? '100B2' : ''; 
}

if ($row['game_type'] != 4) 
{ 
  $vscore = $row['game_scorevar']; 
  $score = get_var2(array('name'=>$vscore, 'intval'=>true, 'default'=>'')); 
}
else 
{ 
    if (@phpversion() >= '4.0.0')
   {
      session_save_path($phpbb_root_path . './sess_arcade');
      session_name('gf_arcade');
      session_start();
      $gf_sess = session_id();
   }
   if (!empty($gf_sess))
   {
      $score = $_SESSION['gamescore'];
      $gamerealtime = $_SESSION['gamerealtime'];
      $gameflashtime = $_SESSION['gameflashtime'];
      $gamecheattype = $_SESSION['gamecheattype'];
      $gamesessid = $_SESSION['gamesessid'];
      //Les valeurs sont récupérées => on détruit la session
      if (isset($_COOKIE[session_name()]))
      {
         setcookie(session_name(), '', time()-42000, '/');
      }
      unset($_SESSION);
      session_destroy();
   }
   else
   {
      $score = $HTTP_POST_VARS['vscore'];
      $gamerealtime = $HTTP_POST_VARS['gamerealtime'];
      $gameflashtime = $HTTP_POST_VARS['gameflashtime'];
      $gamecheattype = $HTTP_POST_VARS['gamecheattype'];
      $gamesessid = $HTTP_POSTE_VARS['gamesessid'];
   }
   $settime = $_COOKIE['timestarted']; 
} 
$$vscore = $score; 

if (  !$userdata['session_logged_in']  && ($valid=='') )
{
	header($header_location . append_sid("proarcade.$phpEx?$vscore=$score&gid=$gid&valid=X&newhash=$newhash&gamehash_id=$gamehash_id&gamehash=$gamehash&hashoffset=$hashoffset&settime=$settime&sid=$sid&vpaver=$vpaver", true));
	exit;
}

if ( !$userdata['session_logged_in'] )
{
	header($header_location . append_sid("login.$phpEx?redirect=arcade.$phpEx", true));
	exit;
}

if($row['game_type'] != 4) 
{ 
  $sql = "SELECT * FROM " . GAMEHASH_TABLE . " WHERE gamehash_id = '$gamehash_id' and game_id = '$gid' and user_id = '" . $userdata['user_id'] . "'";

  if (!($result = $db->sql_query($sql))) 
  {
        message_die(GENERAL_ERROR, "Impossible d'acceder à la tables des hash game", '', __LINE__, __FILE__, $sql); 
  } 

  // Tentative de hack ?
  if (!($row = $db->sql_fetchrow($result)) or ($vpaver != "100B2") or (!isset($$vscore))) 
  { 
        $sql = "INSERT INTO " . HACKGAME_TABLE . " (user_id , game_id , date_hack) VALUES ('" . $userdata['user_id'] . "' , '$gid' , '" . time() . "')"; 
        $db->sql_query($sql);
        header($header_location . append_sid("arcade.$phpEx", true)); 
        exit; 
  } 
}


$sql = "DELETE FROM " . GAMEHASH_TABLE . " WHERE gamehash_id = '$gamehash_id' and game_id = $gid and user_id = " . $userdata['user_id'] ;

$db->sql_query($sql) ;

if ($row['game_type'] == 4) 
{ 
  //IBProArcade Game Check
  if($_COOKIE['gidstarted'] != $gid || !isset($_COOKIE['gidstarted']))
  {
    $sql = "INSERT INTO " . HACKGAME_TABLE . " (user_id , game_id , date_hack) VALUES ('" . $userdata['user_id'] . "' , '$gid' , '" . time() . "')";
    $db->sql_query($sql);
    header($header_location . append_sid("arcade.$phpEx", true)); 
    exit; 
  } 
   if ($row['game_cheat_control'])
   {
      //Si le jeu a envoyé le temps total
      if ( ($gameflashtime != 0) || ($gamecheattype) )
      {
         //Suppression des enregistrements temporaires vieux de plus de 48h pour le joueur
         $sql = "DELETE FROM " . ARCADE_TIME_TEMP . " WHERE user_id = " . $userdata['user_id'] .  " AND date_enreg < " . (time() - 172800) ;
         $result = $db->sql_query($sql);
         $games_tolerance = $arcade_config['games_time_tolerance']; 
         $gamenotrealtime = array(-1, 0, 1, 2, 3); 
         if (!in_array($gamerealtime, $gamenotrealtime, TRUE)) 
         { 
            //Si triche archivage des valeurs temps php, temps flash, jeu, joueur, date, score 
            if ( ( ($gameflashtime > ($gamerealtime + $games_tolerance)) || ($gameflashtime < ($gamerealtime - $games_tolerance)) ) || ($gamecheattype) ) 
            { 
               $sql = "INSERT INTO " . ARCADE_CHEATER_TABLE . " (user_id, game_id, score_game, date_cheat, flashtime, realtime, cheattype) 
               VALUES (" . $userdata['user_id'] . ", $gid, $score, '" . time() . "', $gameflashtime, $gamerealtime, $gamecheattype)"; 
               $db->sql_query($sql); 
               if ( ( !($arcade_config['games_cheater_submit']) ) || ($gamecheattype == 1) ) 
               { 
                  //Envoyer un message au joueur indiquant la tentative de triche 
                  $message = sprintf($lang['Info_arcade_cheater'], $score, $row['game_name']); 
                  message_die(GENERAL_MESSAGE, $message); 
               } 
            } 
         } 


      }
      if ( !empty($gamesessid) )
      {
         $sql = "DELETE FROM " . ARCADE_TIME_TEMP . " WHERE user_id = " . $userdata['user_id'] . " AND game_id = " . $gid . " AND game_sessid = '" . $gamesessid . "'";
         $result = $db->sql_query($sql);
      }
   }
} 


//
// End of auth check
//
// Start addon points arcade 
$arcade_config = array(); 
$arcade_config = read_arcade_config(); 
$nbpoints = $userdata['user_points']; 
// End addon points arcade 
$sql = "SELECT * FROM " . SCORES_TABLE . " WHERE game_id = $gid and user_id = " . $userdata['user_id'] ;

if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder à la tables des scores", '', __LINE__, __FILE__, $sql); 
}

$datenow = time();
$ecart = $datenow - $settime ;

if ( !( $row = $db->sql_fetchrow($result) ) )
{// Si l'utilisateur n'a encore aucun score pour ce jeu'
	$sql = "INSERT INTO " . SCORES_TABLE . " (game_id , user_id , score_game , score_date , score_time , score_set ) 
	VALUES ( $gid , " . $userdata['user_id'] . " , $score , $datenow , $ecart , 1 ) ";
	$result = $db->sql_query($sql) ;
}
else
{
  if ( $row['score_game'] < $score )
  {
  $sql = "UPDATE " . SCORES_TABLE . " set score_game = $score , score_set = score_set + 1 , score_date = $datenow , score_time = score_time + $ecart  
	WHERE game_id = $gid and user_id = " . $userdata['user_id'] ;
  $result = $db->sql_query($sql) ;
  }	
  else
  {
    $sql = "UPDATE " . SCORES_TABLE . " set score_set = score_set + 1  , score_time = score_time + $ecart 
	WHERE game_id = $gid and user_id = " . $userdata['user_id'] ;
    $result = $db->sql_query($sql) ;
  }
}


$sql = "SELECT * FROM " . GAMES_TABLE . " WHERE game_id = " . $gid ; 
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder à la tables des jeux", '', __LINE__, __FILE__, $sql); 
}

if ( ( $row = $db->sql_fetchrow($result) ) && ( $row['game_highscore']< $score) )
{// Si l'utilisateur a battu le record du jeu
	$sql = "UPDATE " . GAMES_TABLE . " SET game_highscore = $score , game_highuser = "
	. $userdata['user_id'] . " , game_highdate = " . time() . " WHERE game_id = $gid" ;
	$result = $db->sql_query($sql) ;
// Start addon points arcade 
if ($arcade_config['use_points_mod'] && $arcade_config['use_points_win_mod']) 
{ 
   $pointswin = $arcade_config['points_winner']; 
   $nbpoints = $nbpoints+$pointswin; 
} 
// End addon points arcade 
# Addon arcade by Oyo & JRSweets
	if($row['game_highuser'] != $userdata['user_id'])
	{
		$sql = 'UPDATE ' . COMMENTS_TABLE . ' SET message = \'\' WHERE game_id = '.$gid;
		$result = $db->sql_query($sql) ;
		$flag = 1;
		
		$sql = 'SELECT * FROM ' . SCORES_TABLE . ' WHERE game_id = '.$gid.' ORDER BY score_game DESC LIMIT 1,1';
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Error accessing scores table', '', __LINE__, __FILE__, $sql); 
		}

		if ( $row = $db->sql_fetchrow($result) )
		{
			//Current Champion
			$sql= 'SELECT s.score_game, s.game_id, g.game_name, u.user_id, u.username FROM ' . SCORES_TABLE . ' s 
			LEFT JOIN ' . USERS_TABLE . ' u ON s.user_id = u.user_id 
			LEFT JOIN ' . GAMES_TABLE . '  g ON s.game_id = g.game_id 
			WHERE s.game_id = ' . $gid . ' ORDER BY score_game DESC LIMIT 0 , 1'; 
			$row[0] = $db->sql_fetchrow($db->sql_query($sql));

			//Old Champion
			$sql= 'SELECT s.score_game, s.game_id, g.game_name, u.user_id, u.username 
			FROM ' . SCORES_TABLE . ' s 
			LEFT JOIN ' . USERS_TABLE . ' u ON s.user_id = u.user_id 
			LEFT JOIN ' . GAMES_TABLE . ' g ON s.game_id = g.game_id 
			WHERE s.game_id = ' . $gid . ' ORDER BY score_game DESC LIMIT 1 , 1'; 
			$row[1] = $db->sql_fetchrow($db->sql_query($sql));
			
			// START - SEND PM ON REGISTER MOD - AbelaJohnB
			//
			// According to 'netclectic' we need to set the datastamp to '9999999999' in order to
			// insure the pop-up notification about a new message existing. I concur with 'netclectic'
			// and have thus made the change to his suggestion. Thanks netclectic!
			//
			$user_id = $row[1]['user_id'];
			$sql = 'UPDATE ' . USERS_TABLE . '  SET user_new_privmsg = \'1\', user_last_privmsg = \'9999999999\' WHERE user_id = '.$user_id;
			if ( !($result = $db->sql_query($sql)) )
			{
				    message_die(GENERAL_ERROR, 'Could not update users table', '', __LINE__, __FILE__, $sql);
			}
		
			$link = '<a href="' . append_sid('games.'.$phpEx.'?gid=' . $row[0]['game_id']) .'">Ici</a>';

			$privmsgs_date = date('U');
			$privmsgs_subject = str_replace("\'", "''", addslashes(sprintf($lang['arcade_pm_subject'],$row[0]['game_name'])));
			$sql = "INSERT INTO " . PRIVMSGS_TABLE . " (privmsgs_type, privmsgs_subject, privmsgs_from_userid, privmsgs_to_userid, privmsgs_date, privmsgs_enable_html, privmsgs_enable_bbcode, privmsgs_enable_smilies, privmsgs_attach_sig) VALUES ('1', '$privmsgs_subject', '2', " . $user_id . ", " . $privmsgs_date . ", '0', '1', '1', '0')";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not insert private message sent info', '', __LINE__, __FILE__, $sql);
			}
		
			$privmsg_sent_id = $db->sql_nextid();
			$privmsgs_text = str_replace("\'", "''", addslashes(sprintf($lang['arcade_pm_text'],$row[1]['score_game'],$row[0]['game_name'],$row[0]['username'],$row[0]['score_game'],$link)));
				
			$sql = "INSERT INTO " . PRIVMSGS_TEXT_TABLE . " (privmsgs_text_id, privmsgs_text) VALUES ($privmsg_sent_id, '$privmsgs_text')";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not insert private message sent text', '', __LINE__, __FILE__, $sql);
			}
			// END - SEND PM ON REGISTER MOD - AbelaJohnB
		}
	} 
	# Addon arcade by Oyo & JRSweets
}
// Start addon Arcade Championnat
if ($arcade_config['championnat_use'] == 1)
{
$sql = "SELECT user_id FROM " . SCORES_TABLE . " WHERE game_id = $gid ORDER BY score_game DESC, score_date ASC LIMIT 0,5";
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder à la table des scores", '', __LINE__, __FILE__, $sql);
}

$un = 0;
$deux = 0;
$trois = 0;
$quatre = 0;
$cinq = 0;

$j = 0;

if ($arcade_config['use_cagnotte_mod'] && $arcade_config['use_points_cagnotte'] && $arcade_config['use_points_mod'] && $arcade_config['use_points_pay_mod'])
{
	$cagnotte = $arcade_config['cagnotte'];
	$cost = $arcade_config['points_pay'];
	if ($arcade_config['use_points_pay_submit'])
	{
	$cagnotte = $cagnotte + $cost;
	}
	if ($arcade_config['use_points_pay_charging'])
	{
	$cagnotte = $cagnotte + $cost;
	}
	$sql = "UPDATE " . ARCADE_TABLE . " SET arcade_value = $cagnotte WHERE arcade_name = 'cagnotte'";
	if( !$db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Impossible de modifier le montant de la cagnotte.", "", __LINE__, __FILE__, $sql);
	}
}

while ($row = $db->sql_fetchrow($result)) 
{ 
 	$j++; 
 	$user_id = $row['user_id']; 
	switch($j)
	{
		case 1 :
		 $un = $user_id; 
 		 break;
		case 2 :
		 $deux = $user_id; 
 		 break;
		case 3 :
		 $trois = $user_id; 
 		 break;
		case 4 :
		 $quatre = $user_id; 
 		 break;
		case 5 :
		 $cinq = $user_id; 
 		 break;
		default :
		 break;
	}
} 
  
//on vérifie l'existence de l'enregistrement pour ce jeu 
$sql = "SELECT game_id FROM " . ARCADE_CHAMPIONNAT_TABLE . " WHERE game_id = $gid"; 
if( !$result=$db->sql_query($sql) ) 
{ 
   message_die(GENERAL_ERROR, "Impossible d'acceder à la table du championnat", '', __LINE__, __FILE__, $sql); 
} 

if ( $row = $db->sql_fetchrow($result)) 
{ 
//l'enregistrement existe : on le met à jour 
   $sql = "UPDATE " . ARCADE_CHAMPIONNAT_TABLE . " 
       SET one_userid = $un, 
        two_userid = $deux, 
        three_userid = $trois, 
        four_userid = $quatre, 
        five_userid = $cinq 
   WHERE game_id = $gid"; 
} 
else 
{ 
//l'enregistrement n'existe pas, on le crée 
   $sql = " INSERT INTO " . ARCADE_CHAMPIONNAT_TABLE . " (game_id, one_userid, two_userid, three_userid, four_userid, five_userid) VALUES($gid, $un, $deux, $trois, $quatre, $cinq)"; 
} 

if( !$db->sql_query($sql) ) 
{ 
   message_die(GENERAL_ERROR, "Impossible d'acceder à la table du championnat", '', __LINE__, __FILE__, $sql); 
}
}
//End addon Arcade Championnat
	
// Start addon points arcade 
if ($arcade_config['use_points_mod'] && $arcade_config['use_points_pay_mod'] && $arcade_config['use_points_pay_submit']) 
{ 
   $cost = $arcade_config['points_pay']; 
   $nbpoints = $nbpoints-$cost; 
} 
if ($arcade_config['use_points_mod']) 
{ 
   $sql = "update " . USERS_TABLE . " set user_points = $nbpoints where user_id = " . $userdata['user_id'] ; 
   if( !($result = $db->sql_query($sql)) ) 
   { 
      message_die(GENERAL_ERROR, "Impossible de modifier les points du joueur.", '', __LINE__, __FILE__, $sql); 
   } 
} 
// End addon points arcade  
if($flag == 1){
	header($header_location . append_sid("comments_new.$phpEx?gid=$gid", true));
	exit;
}
else
{
	header($header_location . append_sid("games.$phpEx?gid=$gid", true));
	exit;
}
?>
