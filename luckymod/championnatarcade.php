<?php

/***************************************************************************
 *                                championnatarcade.php
 *                            -------------------
 *   Commencé le                : Dimanche,15 Aout, 2004
 *   Par : NiCo[L-aS] - neointhematrix@fr.st - http://www.neointhematrix.fr.st
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

	
//chargement du template
$template->set_filenames(array(
   'championnatarcade' => 'championnatarcade_body.tpl')
);
if ($arcade_config['championnat_use'] == 1)
{
	if($arcade_config['cat_use'] == 1)
	{
		$sql = "SELECT c.*, k.arcade_cattitle, k.arcade_catid  FROM " 
		. GAMES_TABLE . " g LEFT JOIN "
		. ARCADE_CATEGORIES_TABLE ." k ON k.arcade_catid = '" . $arcade_config['championnat_cat'] . "' LEFT JOIN "
		. ARCADE_CHAMPIONNAT_TABLE . " c ON g.game_id = c.game_id WHERE g.arcade_catid = '" . $arcade_config['championnat_cat'] . "'";
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
	
	
	// i=5 représente le nombre de joueurs représentés dans le classement du block 
	array_multisort($tabscore, SORT_DESC, $tabtri);
	
	for ($i = 0; $i < 10; $i++) 
	{
		  $place = $i+1;
		  $usr = $tabusers[ $tabtri[$i] ];
		  $nb_victory = $tabscore[$i]; 
		  $class = ($class == 'row1') ? 'row2' : 'row1' ;
	$template->assign_block_vars( 'championnat_row', array( 
		'CLASS' => $class,
		'POINTS_NAME' => $board_config['points_name'],
		'TAUX' => ($place==1)?$arcade_config['championnat_taux_un']:
		(($place==2)?$arcade_config['championnat_taux_deux']:
		(($place==3)?$arcade_config['championnat_taux_trois']:
		(($place==4)?$arcade_config['championnat_taux_quatre']:
		(($place==5)?$arcade_config['championnat_taux_cinq']:
		(($place==6)?$arcade_config['championnat_taux_six']:
		(($place==7)?$arcade_config['championnat_taux_sept']:
		(($place==8)?$arcade_config['championnat_taux_huit']:
		(($place==9)?$arcade_config['championnat_taux_neuf']:
		(($place==10)?$arcade_config['championnat_taux_dix']:''))))))))),
		'PCAGNOTTE' => ($place==1)? intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_un']/100)).' '.$board_config['points_name']:
		(($place==2)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_deux']/100)).' '.$board_config['points_name']:
		(($place==3)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_trois']/100)).' '.$board_config['points_name']:
		(($place==4)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_quatre']/100)).' '.$board_config['points_name']:
		(($place==5)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_cinq']/100)).' '.$board_config['points_name']:
		(($place==6)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_six']/100)).' '.$board_config['points_name']:
		(($place==7)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_sept']/100)).' '.$board_config['points_name']:
		(($place==8)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_huit']/100)).' '.$board_config['points_name']:
		(($place==9)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_neuf']/100)).' '.$board_config['points_name']:
		(($place==10)?intval($arcade_config['cagnotte']*($arcade_config['championnat_taux_dix']/100)).' '.$board_config['points_name']:''))))))))),
		'CHAMPIONNAT_PLACE' => $place,
		'CHAMPIONNAT_USER' => $usr, 
		'CHAMPIONNAT_VICTORY' => $nb_victory
		)); 
	}
}
if ($arcade_config['championnat_use'] == 1)
{
	$template->assign_block_vars( 'championnat_use', array());
	$sql = "SELECT arcade_catid, arcade_cattitle
		FROM " . ARCADE_CATEGORIES_TABLE . "
		WHERE arcade_catid = '" . $arcade_config['championnat_cat'] . "'";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible d'accèder à la table des catégories", "", __LINE__, __FILE__, $sql);
	}
	$row = $db->sql_fetchrow($result);
	$template->assign_vars( array(
		'TPS_RESTANT' => ($arcade_config['use_auto_distrib']) ? sprintf($lang['tp_restant'],intval(($arcade_config['date_distribcagnotte']-time())/(24*60*60)),intval((($arcade_config['date_distribcagnotte']-time())/(24*60*60)-intval(($arcade_config['date_distribcagnotte']-time())/(24*60*60)))*24) ):'Temps illimité',
		'CAGNOTTE' => ($arcade_config['use_points_mod']) ? 'Cagnotte : <span class=nav>'. $arcade_config['cagnotte'] .'</span> '. $board_config['points_name']: 'indisponible',
		'CAT_TITLE'=> ($arcade_config['cat_use']==1)? "Section : <a class=nav href=" . append_sid("arcade.$phpEx?cid=" . $row['arcade_catid'] ) . ">".$row['arcade_cattitle']."</a>": "<span class=nav>Toutes sections</span>"
		));
}
else
{
	$template->assign_vars( array(
		'TPS_RESTANT'=> "<span class=nav>indisponible</span>",
		'CAGNOTTE'=> "<span class=nav>&nbsp;</span>",
		'CAT_TITLE'=> "<span class=nav>Championnat</span>"
		));
}
$template->assign_var_from_handle('CHAMPIONNATARCADE', 'championnatarcade');

?>