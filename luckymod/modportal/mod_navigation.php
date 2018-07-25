<?php

/***************************************************************************
 *                                mod_navigation.php
 *                            -------------------
 *   fait le                : Dimanche,20 Juillet, 2003
 *   Par : giefca - giefca@hotmail.com - http://www.gf-phpbb.fr.st
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   Minimodule à intégrer dans un Gf-Portail
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

//chargement du template
$template_mod->set_filenames(array(
   'body' => $phpbb_root_path . '/templates/' . $theme['template_name'] . '/modportal/mod_navigation.tpl')
);


$template_mod->assign_vars( array(
	'L_FORUM' => $lang['Forum'],
	'L_BOARD_NAVIGATION' => $lang['Board_navigation']));
	
$modvar = $template_mod->pparse_mod('body');

?>