<?php
/***************************************************************************
 *                              admin/admin_zone_restriction.php
 *                            -------------------
 *   begin                : 29 mai 2004
 *   Fait par             : Dark_Génova
 *   email                : genovakiller@yahoo.fr
 *
 *
 *
 ***************************************************************************/

/*
* Ce fichier va s'occuper de gérer les restrictions de zones.
*/

define('IN_PHPBB', true);

if( !empty($setmodules) )
{
        $file = basename(__FILE__);
        $module['General']['Zones de restriction'] = "$file";
        return;
}

//
// Let's set the root dir for phpBB
$phpbb_root_path = "./../";
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_ZONE_RESTRICTION);
init_userprefs($userdata);

//
// On récupère les zones
$requete = 'SELECT * FROM ' . ZONE_RESTRICTION_TABLE;
$resultat = $db->sql_query($requete);
$k=0;
$zone = array();
while ( $recup_data = $db->sql_fetchrow($resultat) )
{
	$zone[$k] = array('name'=>$recup_data['ZR_zone']);
	$k++;
}

//
// Si le formulaire est passé on traite les données
if ( isset($HTTP_POST_VARS['submit_ZR']) )
{
	for ( $i=0; $i<count($zone); $i++ )
	{
		$requete = 'UPDATE ' . ZONE_RESTRICTION_TABLE . ' SET 
				   ZR_value=\'' . $HTTP_POST_VARS[$zone[$i]['name']][0] . '\' 
				WHERE ZR_zone=\'' . $zone[$i]['name'] . '\'';

		$db->sql_query($requete);
	}
}

$template->set_filenames(array(
	"body" => "admin/restriction_zone_body.tpl")
);

//
// On passe les variables simples
$template->assign_vars( array(

	'L_ZR_TITLE' =>	$lang['ZR_title'],
	'L_ZR_EXPLAIN' =>	$lang['ZR_description'],

	'L_NONE' =>		$lang['ZR_none'],
	'L_INVITE' =>	$lang['ZR_invite'],
	'L_MEMBER' =>	$lang['ZR_member'],
	'L_MODO' =>		$lang['ZR_modo'],
	'L_ADMIN' =>	$lang['ZR_admin'],

	'L_SUBMIT' =>	$lang['ZR_submit'],
	'L_RESET' =>	$lang['ZR_reset']

));

//
// On créé tous les champs dans le panneau d'administration
for ( $j=0; $j<count($zone); $j++ )
{
	//
	// On récupère les valeurs des champs
	$requete = 'SELECT * FROM ' . ZONE_RESTRICTION_TABLE . ' 
			WHERE ZR_zone=\'' . $zone[$j]['name'] . '\'';
	$resultat = $db->sql_query($requete);
	$zone_data = $db->sql_fetchrow($resultat);

	$value_none = 	( $zone_data['ZR_value'] == -1 ) ? 'selected' : '';
	$value_member = 	( $zone_data['ZR_value'] == 0 ) ? 'selected' : '';
	$value_modo = 	( $zone_data['ZR_value'] == 2 ) ? 'selected' : '';
	$value_admin = 	( $zone_data['ZR_value'] == 1 ) ? 'selected' : '';

	//
	// On passe les variables dans le template
	$template->assign_block_vars('line', array(

		'L_ZR_NAME' =>		$zone[$j]['name'],
		'L_ZR_FORM_NAME' =>	$zone[$j]['name'],

		'VALUE_NONE' =>		$value_none,
		'VALUE_MEMBER' =>		$value_member,
		'VALUE_MODO' =>		$value_modo,
		'VALUE_ADMIN' =>		$value_admin

	));
}

$template->pparse("body");

include('./page_footer_admin.'.$phpEx);
?>