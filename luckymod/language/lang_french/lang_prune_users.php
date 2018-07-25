<?php 
/*************************************************************
*
* MOD Title:   Prune users
* MOD Version: 1.4.3
* Translation: French
* Rev date:    13/03/2004
* 
* Translator:  kooky < n/a > (n/a) http://perso.edeign.com/kooky/
* 
**************************************************************/

// add to prune inactive
$lang['X_Days'] = '%d jours';
$lang['X_Weeks'] = '%d semaines';
$lang['X_Months'] = '%d mois';
$lang['X_Years'] = '%d ann�es';

$lang['Prune_no_users'] = 'Aucun membre supprim�';
$lang['Prune_users_number'] = '%d membres ont �t� supprim�s, ce qui suit est une liste de leurs noms';

$lang['Prune_user_list'] = 'Membres qui seront supprim�s';
$lang['Prune_on_click'] = 'Vous �tes sur le point de supprimer %d membres, souhaitez-vous continuer ?';
$lang['Prune_Action'] = 'Cliquez sur un lien ci-dessous pour valider';
$lang['Prune_users_explain'] = 'A partir de cette page vous pouvez supprimer les membres qui ne sont plus actifs. Vous pouvez choisir entre 3 liens: un qui supprimera les anciens membres qui n\'ont jamais post� de message, un qui supprimera les anciens membres qui ne se sont jamais connect�s, et un autre qui supprimera les membres qui n\'ont jamais activ� leur compte.<p/><b> Note:</b> il n\'y a pas d\'option pour annuler, tous les membres de la liste seront supprim�s quand vous aurez cliqu� sur le lien.';
$lang['Prune_commands'] = array();

// here you can make more entries if needed
$lang['Prune_commands'][0] = 'Supprimer les membres sans message';
$lang['Prune_explain'][0] = 'Qui n\'a jamais post�, <b>exclure</b> les nouveaux membres � partir des %d derniers jours';
$lang['Prune_commands'][1] = 'Supprimer les membres inactifs';
$lang['Prune_explain'][1] = 'Qui ne s\'est jamais connect�, <b>exclure</b> les nouveaux membres � partir des %d derniers jours';
$lang['Prune_commands'][2] = 'Supprimer les comptes d�sactiv�s';
$lang['Prune_explain'][2] = 'Qui n\'a jamais activ� son compte, <b>exclure</b> les nouveaux membres � partir des %d derniers jours';
$lang['Prune_commands'][3] = 'Supprimer les membres de longue date';
$lang['Prune_explain'][3] = 'Qui n\'a pas visit� le site depuis 60 jours, <b>exclure</b> les nouveaux membres � partir des %d derniers jours';
$lang['Prune_commands'][4] = 'Supprimer les membres ne postant pas souvent';
$lang['Prune_explain'][4] = 'Qui a une moyenne inf�rieure � 1 message pour 10 jours depuis son inscription, <b>exclure</b> les nouveaux membres � partir des %d derniers jours';

?>
