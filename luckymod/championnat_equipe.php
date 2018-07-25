<?php

/***************************************************************************
 *                            Stat_equipe_graph.php
 *                            ---------------------
 *   Commencé le                : Lundi, 09 mai 2005
 *   Par : Aurélien WILLEM - aurelien.willem@team-azerty.com - http://www.team-azerty.com
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

//chargement du template
$template->set_filenames(array(
   'championnatequipe' => 'championnatequipe_body.tpl')
);

$sql = "SELECT group_id, group_name
            FROM ".GROUPS_TABLE."
            WHERE group_single_user = 0 AND group_type = 1";
				
if( !$result2 = $db->sql_query($sql) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder à la table ".GROUPS_TABLE, '', __LINE__, __FILE__, $sql); 
}

$lesequipes = array();
$cat_use = $arcade_config['cat_use'];

while( $resultat2 = $db->sql_fetchrow($result2)) {
	
	$id_equipe = $resultat2["group_id"];
	
	$query = "SELECT *
	FROM ".ARCADE_CHAMPIONNAT_TABLE.", ".USER_GROUP_TABLE.", ".GAMES_TABLE.", ".USERS_TABLE."
	WHERE ( 
		(
			one_userid = ".USERS_TABLE.".user_id OR
			two_userid = ".USERS_TABLE.".user_id OR
			three_userid = ".USERS_TABLE.".user_id OR
			four_userid = ".USERS_TABLE.".user_id OR
			five_userid = ".USERS_TABLE.".user_id
		)  AND (
			".USER_GROUP_TABLE.".group_id = $id_equipe
		) AND (
			".GAMES_TABLE.".game_id = ".ARCADE_CHAMPIONNAT_TABLE.".game_id
		) AND (
			".USER_GROUP_TABLE.".user_id = ".USERS_TABLE.".user_id
		)";
	if($cat_use == 1) {
		$query .= " AND (arcade_catid = '" . $arcade_config['championnat_cat'] . "') ";
	}
	$query .= " ) ORDER BY ".USERS_TABLE.".`user_id` ASC ";
	
	//die ($query);
	if( !$result = $db->sql_query($query) )
	{
		message_die(GENERAL_ERROR, "Impossible d'acceder à la table", '', __LINE__, __FILE__, $query); 
	}
	
	$old_user_id = -1;
	$total = 0;
	
	$nbpointsone = $arcade_config['championnat_points_one'];
	$nbpointstwo = $arcade_config['championnat_points_two'];
	$nbpointsthree = $arcade_config['championnat_points_three'];
	$nbpointsfour = $arcade_config['championnat_points_four'];
	$nbpointsfive = $arcade_config['championnat_points_five'];
	
	$i = 0;
	$nbpointsperso = array();
	$nbvictoiresequipe = 0;
	while( $resultat = $db->sql_fetchrow($result)) {
		if ($old_user_id != $resultat["user_id"]) {
			$i++;
			$nom = $resultat["username"];
			$total = 0;
			$old_user_id = $resultat["user_id"];
		}		
		switch($resultat["user_id"]) {
			case $resultat["one_userid"]: $total += $nbpointsone;
																		$nbvictoiresequipe += 1;
						break;
			case $resultat["two_userid"]: $total += $nbpointstwo;
						break;
			case $resultat["three_userid"]: $total += $nbpointsthree;
						break;
			case $resultat["four_userid"]: $total += $nbpointsfour;
						break;
			case $resultat["five_userid"]: $total += $nbpointsfive;
						break;
		}
		$nbpointsperso[$i] = $total;
	}
	
	$totalequipe = 0;
	for($i=1; $i<=sizeof($nbpointsperso); $i++) {
		$totalequipe += $nbpointsperso[$i];
	}
	
	if ($totalequipe != 0) {
		$lesequipes[$j]["NB_POINTS"] = $totalequipe;
		$lesequipes[$j]["NB_VIC"] = $nbvictoiresequipe;
		$lesequipes[$j]["CLAN_NUM"] = $id_equipe;
		$lesequipes[$j]["NOM"] = $resultat2["group_name"];
		
		$j++;
	}
	
}

$lespoints = array();

foreach ($lesequipes as $key => $row) {
    $lespoints[$key]  = $row['NB_POINTS'];
}

array_multisort($lespoints, SORT_DESC, $lesequipes);

//Si vous voulez en afficher moins, mettez une valeur fixe à $fin
$fin = count($lesequipes);
$i=0;

foreach ($lesequipes as $key => $row) {
	
	$template->assign_block_vars('SCORE_GROUP_LIST', array(
	'PLACE' => $i+1,
	'CLAN' => $row["NOM"],
	'NB_POINTS' => $row["NB_POINTS"],
	'CLAN_NUM' => $row["CLAN_NUM"],
	'NB_VIC' => $row["NB_VIC"] )
	);
	
	$i++;
	if ($fin == $i)
		break;
}

$template->assign_var_from_handle('CHAMPIONNATEQUIPE', 'championnatequipe');

?>