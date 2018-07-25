<?php

/***************************************************************************
 *                            Stat_equipe_graph.php
 *                            ---------------------
 *   Commencé le                : Lundi, 09 mai 2005
 *   Par : Aurélien WILLEM - aurelien.willem@team-azerty.com - http://www.team-azerty.com
 *	 Description: Affiche un camember de répartition des point d'une équipe passée en paramètre
 *								(id_equipe)
 *
 ***************************************************************************/

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include( $phpbb_root_path . 'includes/functions_arcade.' . $phpEx);
include( $phpbb_root_path . 'includes/graph/jpgraph.php');
include( $phpbb_root_path . 'includes/graph/jpgraph_pie.php');

$arcade_config = array();
$arcade_config = read_arcade_config();

$cat_use = $arcade_config['cat_use'];

if (isset($_GET["id_equipe"])) $id_equipe = $_GET["id_equipe"];
else message_die(GENERAL_ERROR, "Pas d'équipe passé en paramètres");


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

$i = 0;
$xdata = array();
$ydata = array();
$old_user_id = -1;
$total = 0;

$nbpointsone = $arcade_config['championnat_points_one'];
$nbpointstwo = $arcade_config['championnat_points_two'];
$nbpointsthree = $arcade_config['championnat_points_three'];
$nbpointsfour = $arcade_config['championnat_points_four'];
$nbpointsfive = $arcade_config['championnat_points_five'];

while( $resultat = $db->sql_fetchrow($result)) {
	if ($old_user_id != $resultat["user_id"]) {
		$i++;
		$nom = $resultat["username"];
		$total = 0;
		$ydata[$i] = $nom;
		$old_user_id = $resultat["user_id"];
	}		
	switch($resultat["user_id"]) {
		case $resultat["one_userid"]: $total += $nbpointsone;
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
	$xdata[$i] = $total;
}

$total_gen = 0;
for($i=1; $i<=sizeof($xdata); $i++) {
	$total_gen += $xdata[$i];
}

$graph = new PieGraph(600,400,"auto");

$query = "SELECT `group_name` FROM ".GROUPS_TABLE." WHERE `group_id` = $id_equipe";
if( !$result = $db->sql_query($query) )
{
	message_die(GENERAL_ERROR, "Impossible d'acceder à la table ".GROUPS_TABLE, '', __LINE__, __FILE__, $query); 
}
while( $resultat = $db->sql_fetchrow($result)) {
	$titre = "Répartition des $total_gen points dans l'équipe ".$resultat["group_name"];
}

$graph->title->Set($titre);


$pie1 = new PiePlot($xdata);
$pie1->SetLegends($ydata);
$pie1->SetCenter(0.33);

$pie1->SetLabelType(PIE_VALUE_ABS);

// Display each label with postfix 'kr', e.g. each label will
// look like (for example) 23.5 kr
$pie1->value->SetFormat('%d points');
$pie1->value->Show(); 

$graph->Add($pie1);
$graph->Stroke();
?>