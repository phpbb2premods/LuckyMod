<?
/***************************************************************************
 *                                topstatarcade.php
 *                            -------------------
 *   Commencé le                : samedi, 24 septembre, 2004
 *   Par : gikel - gikel@nomade.fr - http://www.gf-phpbb.com
 *
 ***************************************************************************/
//define('IN_PHPBB', true);
//chargement du template
if ( !defined('IN_PHPBB') ) 
	{ 
   		die("Hacking attempt"); 
	}


$sql = "SELECT count(game_id) AS nbj,sum(game_set) AS total_partie  FROM " .GAMES_TABLE ."";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, "Could not query games information", "", __LINE__, __FILE__, $sql);
	}

while ( $row = $db->sql_fetchrow($result) )
	{
		$res[] = $row;
	}	


$sql = "SELECT sum(score_time) AS score_time , count(DISTINCT user_id) AS total_user FROM " .SCORES_TABLE."";

	if( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, "Could not query games information", "", __LINE__, __FILE__, $sql);
	}
	

	
while ( $row = $db->sql_fetchrow($result) ){$res2[] = $row;}	

/*****/
//récupére le nom de la personne ayant le plus de victoire + nombre de victoire
$sql = "SELECT count(  `game_highuser`  ) as topVictoire,username,u.user_level,u.user_id   FROM  " .GAMES_TABLE ." g join " .USERS_TABLE ." u  where g.game_highuser=u.user_id GROUP  BY  `game_highuser` order by topVictoire DESC";
	
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, "Could not query games information", "", __LINE__, __FILE__, $sql);
	}

while ( $row = $db->sql_fetchrow($result) )
	{
		$res3[] = $row;
	}	


$maxVictoire=$res3[0]['topVictoire'];

if ( $res3[0]['user_level'] == ADMIN )
	{
		$res3[0]['username'] = '<b>' . $res3[0]['username'] . '</b>';
		$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
	}
else if ( $row['user_level'] == MOD )
	{
		$res3[0]['username'] = '<b>' . $res3[0]['username'] . '</b>';
		$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
	}
				
$nom_topVictoire = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $res3[0]['user_id']) . '"' . $style_color .'>' . $res3[0]['username'] . '</a>';


/*****/
//récupére le nom de la personne ayant joué le plus + temps
$sql = "SELECT sum(s.score_time) as topTemps,sum(score_set)as topPartie, u.username,u.user_level,u.user_id  FROM  " .SCORES_TABLE ." s join " .USERS_TABLE ." u  where s.user_id=u.user_id group by s.user_id order by TopTemps DESC";

if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible d'acceder aux tables users/scores/games", '', __LINE__, __FILE__, $sql); 
	}

while ($row=$db->sql_fetchrow($result))
	{
		$res4[] = $row ;
	}


$maxPartie=0;
$i=0;
$bool=0;
while($i<$db->sql_numrows($result)&&$bool==0){

	if ($maxPartie<$res4[$i]['topPartie']) 
		{
		    $maxPartie=$res4[$i]['topPartie'];
			if ( $res4[$i]['user_level'] == ADMIN )
				{
					$res4[$i]['username'] = '<b>' . $res4[$i]['username'] . '</b>';
					$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
				}
			else if ( $row['user_level'] == MOD )
				{
					$res4[$i]['username'] = '<b>' . $res4[$i]['username'] . '</b>';
					$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
				}
				
			$nom_topPartie = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $res4[$i]['user_id']) . '"' . $style_color .'>' . $res4[$i]['username'] . '</a>';
		}
	
	$i++;
}
if ( $res4[0]['user_level'] == ADMIN )
	{
		$res4[0]['username'] = '<b>' . $res4[0]['username'] . '</b>';
		$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
	}
else if ( $row['user_level'] == MOD )
	{
		$res4[0]['username'] = '<b>' . $res4[0]['username'] . '</b>';
		$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
	}
				
$nom_topTemps = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $res4[0]['user_id']) . '"' . $style_color .'>' . $res4[0]['username'] . '</a>';
$maxTemps=$res4[0]['topTemps'];


/*******/
$sql = sprintf("SELECT sum(s.score_time) as topTemps,sum(score_set)as topPartie,u.username FROM  " .SCORES_TABLE ." s join " .USERS_TABLE ." u  where s.user_id=u.user_id and  u.user_id=%s group by s.user_id",$userdata['user_id']);

if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible d'acceder aux tables users/scores/games", '', __LINE__, __FILE__, $sql); 
	}
while ($row=$db->sql_fetchrow($result)){$res5[] = $row ;}


$topTempsPerso=$res5[0]['topTemps'];
if ($res5[0]['topPartie']==NULL) 
	{
	    $topPartiePerso=0;
	}
else
	{
	$topPartiePerso=$res5[0]['topPartie'];
	}

$nom=$res5[0]['username'];




$sql = "SELECT  `game_highuser` , count(  `game_id`  )  AS total FROM  " . GAMES_TABLE . " GROUP  BY  `game_highuser` ORDER  BY total DESC";

if( !$result = $db->sql_query($sql))
	{
	message_die(GENERAL_ERROR, 'Could not obtain games information', '', __LINE__, __FILE__, $sql);
	}


while ($row=$db->sql_fetchrow($result))
	{
		$res6[] = $row ;
	}
$i=0;
while($res6[$i]['game_highuser']!=$userdata['user_id']&&$i<$db->sql_numrows($result))
	{
		$i++;
	} 

if ($i==$db->sql_numrows($result))
	{
	   	$nbvictoires=0;
	}
else
	{
		$nbvictoires = $res6[$i]['total'];
	}


$j=0;
if ($nbvictoires!=0)
	{
		while($res6[$j]['total']!=$nbvictoires)
		{
			$j++;
		} 
	}

if ($nbvictoires==0) 
	{
    	$Class_Vict_perso=$lang['topstatNoClass'];
	}
else
	{
		$Class_Vict_perso=$j+1;
		
		if ($Class_Vict_perso==1)
		{
		  $Class_Vict_perso= sprintf("%s %s",$Class_Vict_perso,$lang['topstatTypeClass1'] ); 
		}
		else
		{
			$Class_Vict_perso= sprintf("%s %s",$Class_Vict_perso,$lang['topstatTypeClass2'] );
		}
	}

$top=$maxTemps;

if ( $top != 0 ||$res2[0]['score_time']!=0||$topTempsPerso!=0)
	{
	$heur = intval( $top/ 3600) ;
	$min = intval($top / 60  - ( $heur * 60 ));
	$sec = $top - (( $min * 60 )+ ( $heur * 3600 ));
		
	$heur2 = intval( $res2[0]['score_time']/ 3600) ;
	$min2 = intval($res2[0]['score_time'] / 60  - ( $heur2 * 60 ));
	$sec2 = $res2[0]['score_time'] - (( $min2 * 60 )+ ( $heur2 * 3600 ));
	
	$heur3 = intval( $topTempsPerso/ 3600) ;
	$min3 = intval($topTempsPerso / 60  - ( $heur3 * 60 ));
	$sec3 = $topTempsPerso - (( $min3 * 60 )+ ( $heur3 * 3600 ));
	}

// traitement des données concernant le championnat
$cat_use = $arcade_config['cat_use'];
if($cat_use == 1)
{
	$sql = "SELECT c.* FROM " . GAMES_TABLE . " g LEFT JOIN " . ARCADE_CHAMPIONNAT_TABLE . " c ON g.game_id = c.game_id WHERE g.arcade_catid = '" . $arcade_config['championnat_cat'] . "'";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Impossible d'acceder à la table du championnat ou à la table des jeux", '', __LINE__, __FILE__, $sql); 
	}
}
else
{
$sql = "SELECT * FROM " . ARCADE_CHAMPIONNAT_TABLE . "";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Impossible d'acceder à la table du championnat", '', __LINE__, __FILE__, $sql); 
	}
}
$i = 0; 
$tabscore = array();
$tabtri = array();
$tabusers = array();

$nbpointsone = $arcade_config['championnat_points_one'];
$nbpointstwo = $arcade_config['championnat_points_two'];
$nbpointsthree = $arcade_config['championnat_points_three'];
$nbpointsfour = $arcade_config['championnat_points_four'];
$nbpointsfive = $arcade_config['championnat_points_five'];
$pos = 0;
while($row = $db->sql_fetchrow($result)) 
{ 

	if ($row['one_userid']>0)
	{
	  if (!isset($tabscore[$row['one_userid']]))
	  {
  	    $tabscore[$row['one_userid']] = $nbpointsone ;
  	    $tabtri[$row['one_userid']] = $row['one_userid'] ;
	  }
	  else
	  {
		$tabscore[$row['one_userid']] += $nbpointsone ;
	  }
	}

	if ($row['two_userid']>0)
	{	
	  if (!isset($tabscore[$row['two_userid']]))
	  {
  	    $tabscore[$row['two_userid']] = $nbpointstwo ;
  	    $tabtri[$row['two_userid']] = $row['two_userid'];
	  }
	  else
	  {
  	    $tabscore[$row['two_userid']]+= $nbpointstwo ;
	  }
	}

	if ($row['three_userid']>0)
	{
	  if (!isset($tabscore[$row['three_userid']]))
	  {
	    $tabscore[$row['three_userid']] = $nbpointsthree ;
  	    $tabtri[$row['three_userid']] = $row['three_userid'] ;
	  }
	  else
	  {
	    $tabscore[$row['three_userid']] += $nbpointsthree ;
	  }
	}

	if ($row['four_userid']>0)
	{
	  if (!isset($tabscore[$row['four_userid']]))
	  {
	    $tabscore[$row['four_userid']] = $nbpointsfour ;
  	    $tabtri[$row['four_userid']] = $row['four_userid'] ;
	  }
	  else
	  {
	    $tabscore[$row['four_userid']] += $nbpointsfour ;
	  }
	}

	if ($row['five_userid']>0)
	{
	  if (!isset($tabscore[$row['five_userid']]))
	  {
	    $tabscore[$row['five_userid']] = $nbpointsfive ;
  	    $tabtri[$row['five_userid']] = $row['five_userid'] ;
	  }
	  else
	  {
	    $tabscore[$row['five_userid']] += $nbpointsfive ;
	  }
	}
} 

$liste_userid = '';
foreach ( $tabtri as $key=>$val)
{
  $liste_userid = ( $liste_userid == '') ? $key : $liste_userid . ' ,' . $key;
}

if ($liste_userid!='')
{
	$sql = "SELECT user_id,username,user_level FROM " . USERS_TABLE . " WHERE user_id IN ($liste_userid)";
	if( !$result = $db->sql_query($sql) )
	{
		message_die(GENERAL_ERROR, "Impossible d'acceder à la table des utilisateurs", '', __LINE__, __FILE__, $sql);
	}
	
	while( $row = $db->sql_fetchrow($result))
	{
		$style_color = '';
		if ( $row['user_level'] == ADMIN )
		{
			$row['username'] = '<b>' . $row['username'] . '</b>';
			$style_color = 'style="color:#' . $theme['fontcolor3'] . '"';
		}
		else if ( $row['user_level'] == MOD )
		{
			$row['username'] = '<b>' . $row['username'] . '</b>';
			$style_color = 'style="color:#' . $theme['fontcolor2'] . '"';
		}
		$row['username'] = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '"' . $style_color .'>' . $row['username'] . '</a>';

		$tabusers[$row['user_id']] = $row['username'];
		
	}
}
array_multisort($tabscore, SORT_DESC, $tabtri);
$x=0;
$i=0;
while($x!=1&&$i<$res2[0]['total_user']){

	if ($tabtri[$i]==$userdata['user_id']) 
	{ 	
		$x=1;
	}
$i++;
}

if ($x!=1) 
	{
		$Class_Champ_perso = $lang['topstatNoClass'];
		$Score_Champ_perso = 0;  
	}
else
	{
		if($i==1)
		{
			$Class_Champ_perso = sprintf("%s %s",$i,$lang['topstatTypeClass1'] );
		}
		else
		{
			$Class_Champ_perso = sprintf("%s %s",$i,$lang['topstatTypeClass2']);
		}
	
	$Score_Champ_perso = $tabscore[$i-1];
	}


		$template->assign_vars(array(
			'ARCADE_TIME' => ( $res2[0]['score_time'] == 0 ) ? "n/a" :  ( ($heur2 >0 ) ? $heur2 . "" . $lang['topstatheure'] . ":" .$min2 . "" . $lang['topstatminute'] . ":" . $sec2 . "" . $lang['topstatseconde'] : (($min2 >0 ) ? $min2 . "" . $lang['topstatminute'] . ":" . $sec2 . "" . $lang['topstatseconde']: $sec2 . "" . $lang['topstatseconde'])),
			'ARCADE_JEUX' => $res[0]['nbj'],
			'ARCADE_TOTAL_USER' =>$res2[0]['total_user'],
			'ARCADE_TOTAL_PARTIE' =>$res[0]['total_partie'],
			'ARCADE_TOP_VICTOIRE' =>sprintf("%s %s %s",$nom_topVictoire,$maxVictoire,$lang['topstatvictoire']),
			'TOP_TEMPS'=>sprintf("%s %s",$nom_topTemps,( $top == 0 ) ? "n/a" :  ( ($heur >0 ) ? $heur . "" . $lang['topstatheure'] . ":" .$min . "" . $lang['topstatminute'] . ":" . $sec. "" . $lang['topstatseconde'] : (($min >0 ) ? $min . "" . $lang['topstatminute'] . ":" . $sec . "" . $lang['topstatseconde']: $sec . "" . $lang['topstatseconde']))),
		   	'TOP_PARTIE' =>sprintf("%s %s %s",$nom_topPartie,$maxPartie,$lang['topstatpartie']),
		  	'TOP_CHAMPIONNAT'=>sprintf("%s %s %s",$tabusers[$tabtri[0]],$tabscore[0],$lang['topstatpoint']),
		   	'TOP_TEMPS_PERSO'=>( $topTempsPerso == 0 ) ? "n/a" :  ( ($heur3 >0 ) ? $heur3 . "" . $lang['topstatheure'] . ":" .$min3 . "" . $lang['topstatminute'] . ":" . $sec3 . "" . $lang['topstatseconde'] : (($min3 >0 ) ? $min3 . "" . $lang['topstatminute'] . ":" . $sec3 . "" . $lang['topstatseconde']: $sec3 . "" . $lang['topstatseconde'])),
			'TOP_PARTIE_PERSO' =>sprintf("%s %s",$topPartiePerso,$lang['topstatpartie']),
		   	'CHAMP_PERSO'=>sprintf("%s %s %s",$Class_Champ_perso,$Score_Champ_perso,$lang['topstatpoint']),
			'VICTOIRE_PERSO'=>sprintf("%s %s",$nbvictoires,$lang['topstatvictoire']),
		   ) 
		); 

$template->set_filenames(array(
   'topstatarcade' => 'topstatarcade_body.tpl')
);

$template->assign_var_from_handle('TOPSTATARCADE', 'topstatarcade');		

?>