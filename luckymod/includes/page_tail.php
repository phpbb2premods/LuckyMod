<?php
/***************************************************************************
 *                              page_tail.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: page_tail.php,v 1.27.2.3 2004/12/22 02:04:00 psotfx Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}
include_once( $phpbb_root_path . 'includes/functions_arcade_championnat.' . $phpEx);
if ($arcade_config['championnat_use'] == 1)
{
if ($arcade_config['use_auto_distrib'])
{
	if ($arcade_config['date_distribcagnotte'] == 0)
	{
		$date_day = time();
// Si la première date n'est pas définie (c'est le cas après l'installation), on met la date actuelle par défaut.
	 	$days = $arcade_config['day_distrib'];
		$date_day = $date_day + ($days*24*60*60);
// On met à jour la date de prochaine distribution de la cagnotte afin d'éviter qu'elle soit distribuée tout de suite.
		$sql = "UPDATE " . ARCADE_TABLE . " SET arcade_value = '$date_day' WHERE arcade_name = 'date_distribcagnotte'"; 
		if( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, "Impossible de modifier la date de distribution de la cagnotte à la date du jour.", "", __LINE__, __FILE__, $sql);
		}
	}
	else if (time() >= $arcade_config['date_distribcagnotte']) 
	{ 
		distrib_cagnotte(); 
		//cacul de la prochaine date de distribution (+X jours)
	 	$days = $arcade_config['day_distrib'];
		$next_distrib = $arcade_config['date_distribcagnotte'] + ($days*24*60*60); 
		$sql = "UPDATE " . ARCADE_TABLE . " SET arcade_value = '$next_distrib' WHERE arcade_name = 'date_distribcagnotte'"; 
		if( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, "Impossible de modifier la date de prochaine distribution.", "", __LINE__, __FILE__, $sql);
		}
	}
}
}
global $do_gzip_compress;

//
// Show the overall footer.
//
$admin_link = ( $userdata['user_level'] == ADMIN ) ? '<a href="admin/index.' . $phpEx . '?sid=' . $userdata['session_id'] . '">' . $lang['Admin_panel'] . '</a><br /><br />' : '';

$template->set_filenames(array(
	'overall_footer' => ( empty($gen_simple_header) ) ? 'overall_footer.tpl' : 'simple_footer.tpl')
);

$template->assign_vars(array(
//	'PHPBB_VERSION' => '2' . $board_config['version'],
	'PHPBB_VERSION1' =>  $board_config['version1'],
	'TRANSLATION_INFO' => (isset($lang['TRANSLATION_INFO'])) ? $lang['TRANSLATION_INFO'] : ((isset($lang['TRANSLATION'])) ? $lang['TRANSLATION'] : ''),

'ADMIN_LINK' => $admin_link)
);

$template->pparse('overall_footer');

//
// Close our DB connection.
//
$db->sql_close();


/* Un-comment the line below to restrict Admins only to view page generation info */

//if( ($userdata['session_logged_in']) and ($userdata['user_level'] == ADMIN) )
{
	$gzip_text = ($board_config['gzip_compress']) ? 'GZIP enabled' : 'GZIP disabled';

	$debug_text = (DEBUG == 1) ? 'Debug on' : 'Debug off';

	$excuted_queries = $db->num_queries;

	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$endtime = $mtime;

	$gentime = round(($endtime - $starttime), 4);

	$sql_time = round($db->sql_time, 4);

	$sql_part = round($sql_time / $gentime * 100);
	$php_part = 100 - $sql_part;

	echo '<br /><div class="gensmall" align="center">Page generation time: '. $gentime .'s (PHP: '. $php_part .'% - SQL: '. $sql_part .'%) - SQL queries: '. $excuted_queries .' - '. $gzip_text .' - '. $debug_text .'</div>';
}


//
// Compress buffered output if required and send to browser
//
if ( $do_gzip_compress )
{
	//
	// Borrowed from php.net!
	//
	$gzip_contents = ob_get_contents();
	ob_end_clean();

	$gzip_size = strlen($gzip_contents);
	$gzip_crc = crc32($gzip_contents);

	$gzip_contents = gzcompress($gzip_contents, 9);
	$gzip_contents = substr($gzip_contents, 0, strlen($gzip_contents) - 4);

	echo "\x1f\x8b\x08\x00\x00\x00\x00\x00";
	echo $gzip_contents;
	echo pack('V', $gzip_crc);
	echo pack('V', $gzip_size);
}

exit;

?>