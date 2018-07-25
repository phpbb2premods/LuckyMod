<?php
//-- mod : bbcode box reloaded -------------------------------------------------
/***************************************************************************
 *                            lang_main.php [French]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_main.php,v 1.85.2.16 2005/05/06 20:50:13 acydburn Exp $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/* CONTRIBUTORS 
	Translation produced by Helix
	http://www.phpbb-fr.com/
*/ 

//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//

$lang['ENCODING'] = 'ISO-8859-1';
$lang['DIRECTION'] = 'LTR';
$lang['LEFT'] = 'GAUCHE';
$lang['RIGHT'] = 'DROITE';
$lang['DATE_FORMAT'] =  'd M Y'; // This should be changed to the default date format for your language, php date() format

// This is optional, if you would like a _SHORT_ message output
// along with our copyright message indicating you are the translator
// please add it here.
$lang['TRANSLATION'] = 'Traduction par : <a href="http://www.phpbb-fr.com/" target="_blank" class="copyright">phpBB-fr.com</a>';
$lang['TRANSLATION_INFO'] = 'Traduction par : <a href="http://www.phpbb-fr.com/" target="_blank" class="copyright">phpBB-fr.com</a>';

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = 'Forum';
$lang['Category'] = 'Cat�gorie';
$lang['Topic'] = 'Sujet';
$lang['Topics'] = 'Sujets';
$lang['Replies'] = 'R�ponses';
$lang['Views'] = 'Vus';
$lang['Post'] = 'Message';
$lang['Posts'] = 'Messages';
$lang['Posted'] = 'Post� le';
$lang['Username'] = 'Nom d\'utilisateur';
$lang['Password'] = 'Mot de passe';
$lang['Email'] = 'E-mail';
$lang['Poster'] = 'Poster';
$lang['Author'] = 'Auteur';
$lang['Time'] = 'Temps';
$lang['Hours'] = 'Heures';
$lang['Message'] = 'Message';

$lang['1_Day'] = '1 Jour';
$lang['7_Days'] = '7 Jours';
$lang['2_Weeks'] = '2 Semaines';
$lang['1_Month'] = '1 Mois';
$lang['3_Months'] = '3 Mois';
$lang['6_Months'] = '6 Mois';
$lang['1_Year'] = '1 An';

$lang['Go'] = 'Aller';
$lang['Jump_to'] = 'Sauter vers';
$lang['Submit'] = 'Envoyer';
$lang['Reset'] = 'R�initialiser';
$lang['Cancel'] = 'Annuler';
$lang['Preview'] = 'Pr�visualisation';
$lang['Confirm'] = 'Confirmer';
$lang['Spellcheck'] = 'V�rificateur d\'orthographe';
$lang['Yes'] = 'Oui';
$lang['No'] = 'Non';
$lang['Enabled'] = 'Activ�';
$lang['Disabled'] = 'D�sactiv�';
$lang['Error'] = 'Erreur';

$lang['Next'] = 'Suivante';
$lang['Previous'] = 'Pr�c�dente';
$lang['Goto_page'] = 'Aller � la page';
$lang['Joined'] = 'Inscrit le';
$lang['IP_Address'] = 'Adresse IP';

$lang['Select_forum'] = 'S�lectionner un forum';
$lang['View_latest_post'] = 'Voir le dernier message';
$lang['View_newest_post'] = 'Voir le message le plus r�cent';
$lang['Page_of'] = 'Page <b>%d</b> sur <b>%d</b>'; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = 'Num�ro ICQ';
$lang['AIM'] = 'Adresse AIM';
$lang['MSNM'] = 'MSN Messenger';
$lang['YIM'] = 'Yahoo Messenger';

$lang['Forum_Index'] = '%s Index du Forum';  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = 'Poster un nouveau sujet';
$lang['Reply_to_topic'] = 'R�pondre au sujet';
$lang['Reply_with_quote'] = 'R�pondre en citant';

$lang['Click_return_topic'] = 'Cliquez %sici%s pour retourner au sujet de discussion'; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = 'Cliquez %sici%s pour r�essayer';
$lang['Click_return_forum'] = 'Cliquez %sici%s pour retourner au forum';
$lang['Click_view_message'] = 'Cliquez %sici%s pour voir votre message';
$lang['Click_return_modcp'] = 'Cliquez %sici%s pour retourner au Panneau de Contr�le du Mod�rateur';
$lang['Click_return_group'] = 'Cliquez %sici%s pour retourner aux informations du groupe';

$lang['Admin_panel'] = 'Aller au Panneau d\'administration';

$lang['Board_disable'] = 'D�sol�, mais ce forum est actuellement indisponible. Veuillez r�essayer ult�rieurement.';


//
// Global Header strings
//
$lang['Registered_users'] = 'Utilisateurs enregistr�s:';
$lang['Browsing_forum'] = 'Utilisateurs parcourant actuellement ce forum:';
$lang['Online_users_zero_total'] = 'Il y a en tout <b>0</b> utilisateur en ligne :: ';
$lang['Online_users_total'] = 'Il y a en tout <b>%d</b> utilisateurs en ligne :: ';
$lang['Online_user_total'] = 'Il y a en tout <b>%d</b> utilisateur en ligne :: ';
$lang['Reg_users_zero_total'] = '0 Enregistr�, ';
$lang['Reg_users_total'] = '%d Enregistr�s, ';
$lang['Reg_user_total'] = '%d Enregistr�, ';
$lang['Hidden_users_zero_total'] = '0 Invisible et ';
$lang['Hidden_user_total'] = '%d Invisible et ';
$lang['Hidden_users_total'] = '%d Invisibles et ';
$lang['Guest_users_zero_total'] = '0 Invit�';
$lang['Guest_users_total'] = '%d Invit�s';
$lang['Guest_user_total'] = '%d Invit�';
$lang['Record_online_users'] = 'Le record du nombre d\'utilisateurs en ligne est de <b>%s</b> le %s'; // first %s = number of users, second %s is the date.

$lang['Admin_online_color'] = '%sAdministrateur%s';
$lang['Mod_online_color'] = '%sMod�rateur%s';

$lang['You_last_visit'] = 'Derni�re visite le %s'; // %s replaced by date/time
$lang['Current_time'] = 'La date/heure actuelle est %s'; // %s replaced by date/time

$lang['Search_new'] = 'Voir les nouveaux messages depuis votre derni�re visite';
$lang['Search_your_posts'] = 'Voir ses messages';
$lang['Search_unanswered'] = 'Voir les messages sans r�ponses';

$lang['Register'] = 'S\'enregistrer';
$lang['Profile'] = 'Profil';
$lang['Edit_profile'] = 'Editer votre profil';
$lang['Search'] = 'Rechercher';
$lang['Memberlist'] = 'Liste des Membres';
$lang['FAQ'] = 'FAQ';
$lang['BBCode_guide'] = 'Guide du BBCode';
$lang['Usergroups'] = 'Groupes d\'utilisateurs';
$lang['Last_Post'] = 'Derniers Messages';
$lang['Moderator'] = 'Mod�rateur';
$lang['Moderators'] = 'Mod�rateurs';


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = 'Nos membres ont post� un total de <b>0</b> message'; // Number of posts
$lang['Posted_articles_total'] = 'Nos membres ont post� un total de <b>%d</b> messages'; // Number of posts
$lang['Posted_article_total'] = 'Nos membres ont post� un total de <b>%d</b> message'; // Number of posts
$lang['Registered_users_zero_total'] = 'Nous avons <b>0</b> utilisateur enregistr�'; // # registered users
$lang['Registered_users_total'] = 'Nous avons <b>%d</b> membres enregistr�s'; // # registered users
$lang['Registered_user_total'] = 'Nous avons <b>%d</b> membre enregistr�'; // # registered users
$lang['Newest_user'] = 'L\'utilisateur enregistr� le plus r�cent est <b>%s%s%s</b>'; // a href, username, /a 

$lang['No_new_posts_last_visit'] = 'Pas de nouveaux messages depuis votre derni�re visite';
$lang['No_new_posts'] = 'Pas de nouveaux messages';
$lang['New_posts'] = 'Nouveaux messages';
$lang['New_post'] = 'Nouveau message';
$lang['No_new_posts_hot'] = 'Pas de nouveaux messages [ Populaire ]';
$lang['New_posts_hot'] = 'Nouveaux messages [ Populaire ]';
$lang['No_new_posts_locked'] = 'Pas de nouveaux messages [ Verrouill� ]';
$lang['New_posts_locked'] = 'Nouveaux messages [ Verrouill� ]';
$lang['Forum_is_locked'] = 'Forum Verrouill�';


//
// Login
//
$lang['Enter_password'] = 'Veuillez entrer votre nom d\'utilisateur et votre mot de passe pour vous connecter.';
$lang['Login'] = 'Connexion';
$lang['Logout'] = 'D�connexion';

$lang['Forgotten_password'] = 'J\'ai oubli� mon mot de passe';

$lang['Log_me_in'] = 'Se connecter automatiquement � chaque visite';

$lang['Error_login'] = 'Vous avez sp�cifi� un nom d\'utilisateur incorrect ou inactif ou un mot de passe invalide';


//
// Index page
//
$lang['Index'] = 'Index';
$lang['No_Posts'] = 'Pas de Messages';
$lang['No_forums'] = 'Ce Forum n\'a pas de sous-forums';

$lang['Private_Message'] = 'Message Priv�';
$lang['Private_Messages'] = 'Messages Priv�s';
$lang['Who_is_Online'] = 'Qui est en ligne ?';

$lang['Mark_all_forums'] = 'Marquer tous les forums comme lus';
$lang['Forums_marked_read'] = 'Tous les forums ont �t� marqu�s comme lus';


//
// Viewforum
//
$lang['View_forum'] = 'Voir le Forum';

$lang['Forum_not_exist'] = 'Le forum que vous avez s�lectionn� n\'existe pas.';
$lang['Reached_on_error'] = 'Vous avez atteint cette page par erreur.';

$lang['Display_topics'] = 'Montrer les sujets depuis';
$lang['All_Topics'] = 'Tous les Sujets';

$lang['Topic_Announcement'] = '<b>Annonce:</b>';
$lang['Topic_Sticky'] = '<b>Post-it:</b>';
$lang['Topic_Moved'] = '<b>D�plac�:</b>';
$lang['Topic_Poll'] = '<b>[ Sondage ]</b>';

$lang['Mark_all_topics'] = 'Marquez tous les sujets comme lus';
$lang['Topics_marked_read'] = 'Les sujets de ce forum sont � pr�sent marqu�s comme lus.';

$lang['Rules_post_can'] = 'Vous <b>pouvez</b> poster de nouveaux sujets dans ce forum';
$lang['Rules_post_cannot'] = 'Vous <b>ne pouvez pas</b> poster de nouveaux sujets dans ce forum';
$lang['Rules_reply_can'] = 'Vous <b>pouvez</b> r�pondre aux sujets dans ce forum';
$lang['Rules_reply_cannot'] = 'Vous <b>ne pouvez pas</b> r�pondre aux sujets dans ce forum';
$lang['Rules_edit_can'] = 'Vous <b>pouvez</b> �diter vos messages dans ce forum';
$lang['Rules_edit_cannot'] = 'Vous <b>ne pouvez pas</b> �diter vos messages dans ce forum';
$lang['Rules_delete_can'] = 'Vous <b>pouvez</b> supprimer vos messages dans ce forum';
$lang['Rules_delete_cannot'] = 'Vous <b>ne pouvez pas</b> supprimer vos messages dans ce forum';
$lang['Rules_vote_can'] = 'Vous <b>pouvez</b> voter dans les sondages de ce forum';
$lang['Rules_vote_cannot'] = 'Vous <b>ne pouvez pas</b> voter dans les sondages de ce forum';
$lang['Rules_moderate'] = 'Vous <b>pouvez</b> %smod�rer ce forum%s'; // %s replaced by a href links, do not remove! 

$lang['No_topics_post_one'] = 'Il n\'y a pas de messages dans ce forum<br />Cliquez sur le lien <b>Poster un Nouveau Sujet</b> sur cette page pour en poster un.';


//
// Viewtopic
//
$lang['View_topic'] = 'Voir le sujet';

$lang['Guest'] = 'Invit�';
$lang['Post_subject'] = 'Sujet du message';
$lang['View_next_topic'] = 'Voir le sujet suivant';
$lang['View_previous_topic'] = 'Voir le sujet pr�c�dent';
$lang['Submit_vote'] = 'Envoyer le vote';
$lang['View_results'] = 'Voir les r�sultats';

$lang['No_newer_topics'] = 'Il n\'y a pas de nouveaux sujets dans ce forum';
$lang['No_older_topics'] = 'Il n\'y a pas d\'anciens sujets dans ce forum';
$lang['Topic_post_not_exist'] = 'Le sujet ou message que vous recherchez n\'existe pas';
$lang['No_posts_topic'] = 'Il n\'existe pas de messages pour ce sujet';

$lang['Display_posts'] = 'Montrer les messages depuis';
$lang['All_Posts'] = 'Tous les messages';
$lang['Newest_First'] = 'Le plus r�cent en premier';
$lang['Oldest_First'] = 'Le plus ancien en premier';

$lang['Back_to_top'] = 'Revenir en haut de page';

$lang['Read_profile'] = 'Voir le profil de l\'utilisateur';
$lang['Visit_website'] = 'Visiter le site web de l\'utilisateur';
$lang['ICQ_status'] = 'Statut ICQ';
$lang['Edit_delete_post'] = 'Editer/Supprimer ce message';
$lang['View_IP'] = 'Voir l\'adresse IP de l\'utilisateur';
$lang['Delete_post'] = 'Supprimer ce message';

$lang['wrote'] = 'a �crit'; // proceeds the username and is followed by the quoted text
$lang['Quote'] = 'Citation'; // comes before bbcode quote output.
$lang['Code'] = 'Code'; // comes before bbcode code output.

$lang['Edited_time_total'] = 'Derni�re �dition par %s le %s; �dit� %d fois'; // Last edited by me on 12 Oct 2001, edited 1 time in total
$lang['Edited_times_total'] = 'Derni�re �dition par %s le %s; �dit� %d fois'; // Last edited by me on 12 Oct 2001, edited 2 times in total

$lang['Lock_topic'] = 'Verrouiller le sujet';
$lang['Unlock_topic'] = 'D�verrouiller le sujet';
$lang['Move_topic'] = 'D�placer le sujet';
$lang['Delete_topic'] = 'Supprimer le sujet';
$lang['Split_topic'] = 'Diviser le sujet';

$lang['Stop_watching_topic'] = 'Arr�ter de surveiller ce sujet';
$lang['Start_watching_topic'] = 'Surveiller les r�ponses de ce sujet';
$lang['No_longer_watching'] = 'Vous ne surveillez plus ce sujet';
$lang['You_are_watching'] = 'Vous surveillez ce sujet � pr�sent';

$lang['Total_votes'] = 'Total des votes';

//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = 'Corps du message';
$lang['Topic_review'] = 'Revue du sujet';

$lang['No_post_mode'] = 'Mode du sujet non sp�cifi�'; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)

$lang['Post_a_new_topic'] = 'Poster un nouveau sujet';
$lang['Post_a_reply'] = 'Poster une r�ponse';
$lang['Post_topic_as'] = 'Poster le sujet en tant que';
$lang['Edit_Post'] = 'Editer le sujet';
$lang['Options'] = 'Options';

$lang['Post_Announcement'] = 'Annonce';
$lang['Post_Sticky'] = 'Post-it';
$lang['Post_Normal'] = 'Normal';

$lang['Confirm_delete'] = 'Etes-vous s�r de vouloir supprimer ce message ?';
$lang['Confirm_delete_poll'] = 'Etes-vous s�r de vouloir supprimer ce sondage ?';

$lang['Flood_Error'] = 'Vous ne pouvez pas poster un autre sujet en si peu de temps apr�s le dernier; veuillez r�essayer dans un court instant.';
$lang['Empty_subject'] = 'Vous devez pr�ciser le nom du sujet avant de pouvoir poster un nouveau sujet.';
$lang['Empty_message'] = 'Vous devez entrer un message avant de poster.';
$lang['Forum_locked'] = 'Ce forum est verrouill�; vous ne pouvez pas poster, ni r�pondre, ni �diter les sujets.';
$lang['Topic_locked'] = 'Ce sujet est verrouill�; vous ne pouvez pas �diter les messages ou faire de r�ponses.';
$lang['No_post_id'] = 'Vous devez s�lectionner un message � �diter';
$lang['No_topic_id'] = 'Vous devez s�lectionner le sujet auquel r�pondre';
$lang['No_valid_mode'] = 'Vous pouvez seulement poster, r�pondre, �diter ou citer des messages; veuillez revenir en arri�re et r�essayer.';
$lang['No_such_post'] = 'Il n\'y a pas de message de ce type; veuillez revenir en arri�re et r�essayer.';
$lang['Edit_own_posts'] = 'D�sol�, mais vous pouvez seulement �diter vos propres messages.';
$lang['Delete_own_posts'] = 'D�sol�, mais vous pouvez uniquement supprimer vos propres messages.';
$lang['Cannot_delete_replied'] = 'D�sol�, mais vous ne pouvez pas supprimer un message ayant eu des r�ponses.';
$lang['Cannot_delete_poll'] = 'D�sol�, mais vous ne pouvez pas supprimer un sondage actif.';
$lang['Empty_poll_title'] = 'Vous devez entrer un titre pour le sondage.';
$lang['To_few_poll_options'] = 'Vous devez au moins entrer deux options pour le sondage.';
$lang['To_many_poll_options'] = 'Vous avez entr� trop d\'options pour le sondage.';
$lang['Post_has_no_poll'] = 'Ce sujet n\'a pas de sondage.';
$lang['Already_voted'] = 'Vous avez d�j� particip� � ce sondage.'; 
$lang['No_vote_option'] = 'Vous devez choisir une option avant de voter.';

$lang['Add_poll'] = 'Ajouter un sondage';
$lang['Add_poll_explain'] = 'Si vous ne voulez pas ajouter de sondage � votre sujet, laissez ces champs vides.';
$lang['Poll_question'] = 'Question du sondage';
$lang['Poll_option'] = 'Option du sondage';
$lang['Add_option'] = 'Ajouter l\'option';
$lang['Update'] = 'Mettre � jour';
$lang['Delete'] = 'Supprimer';
$lang['Poll_for'] = 'Sondage pendant';
$lang['Days'] = 'Jours'; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = '[ Entrez 0 ou laissez vide pour ne jamais terminer le sondage ]';
$lang['Delete_poll'] = 'Supprimer le sondage';

$lang['Disable_HTML_post'] = 'D�sactiver le HTML dans ce message';
$lang['Disable_BBCode_post'] = 'D�sactiver le BBCode dans ce message';
$lang['Disable_Smilies_post'] = 'D�sactiver les Smileys dans ce message';

$lang['HTML_is_ON'] = 'Le HTML est <u>Activ�</u>';
$lang['HTML_is_OFF'] = 'Le HTML est <u>D�sactiv�</u>';
$lang['BBCode_is_ON'] = 'Le %sBBCode%s est <u>Activ�</u>'; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = 'Le %sBBCode%s est <u>D�sactiv�</u>';
$lang['Smilies_are_ON'] = 'Les Smileys sont <u>Activ�s</u>';
$lang['Smilies_are_OFF'] = 'Les Smileys sont <u>D�sactiv�s</u>';

$lang['Attach_signature'] = 'Attacher sa signature (les signatures peuvent �tre modifi�es dans le profil)';
$lang['Notify'] = 'M\'avertir lorsqu\'une r�ponse est post�e';

$lang['Stored'] = 'Message enregistr� avec succ�s.';
$lang['Deleted'] = 'Message supprim� avec succ�s.';
$lang['Poll_delete'] = 'Votre sondage a �t� supprim� avec succ�s.';
$lang['Vote_cast'] = 'Votre vote a �t� pris en compte.';

$lang['Topic_reply_notification'] = 'Notification de R�ponse au Sujet';

$lang['bbcode_b_help'] = 'Texte gras: [b]texte[/b] (alt+b)';
$lang['bbcode_i_help'] = 'Texte italique: [i]texte[/i] (alt+i)';
$lang['bbcode_u_help'] = 'Texte soulign�: [u]texte[/u] (alt+u)';
$lang['bbcode_q_help'] = 'Citation: [quote]texte cit�[/quote] (alt+q)';
$lang['bbcode_c_help'] = 'Afficher du code: [code]code[/code] (alt+c)';
$lang['bbcode_l_help'] = 'Liste: [list]texte[/list] (alt+l)';
$lang['bbcode_o_help'] = 'Liste ordonn�e: [list=]texte[/list] (alt+o)';
$lang['bbcode_p_help'] = 'Ins�rer une image: [img]http://image_url/[/img] (alt+p)';
$lang['bbcode_w_help'] = 'Ins�rer un lien: [url]http://url/[/url] ou [url=http://url/]Nom[/url] (alt+w)';
$lang['bbcode_a_help'] = 'Fermer toutes les balises BBCode ouvertes';
$lang['bbcode_s_help'] = 'Couleur du texte: [color=red]texte[/color] ce rouge fait partie du code, l\'astuce: #FF0000 fonctionne aussi';
$lang['bbcode_f_help'] = 'Taille du texte: [size=x-small]texte en petit[/size]';


$lang['Emoticons'] = 'Smileys';
$lang['More_emoticons'] = 'Voir plus de Smileys';

$lang['Font_color'] = 'Couleur';
$lang['color_default'] = 'D�faut';
$lang['color_dark_red'] = 'Rouge fonc�';
$lang['color_red'] = 'Rouge';
$lang['color_orange'] = 'Orange';
$lang['color_brown'] = 'Marron';
$lang['color_yellow'] = 'Jaune';
$lang['color_green'] = 'Vert';
$lang['color_olive'] = 'Olive';
$lang['color_cyan'] = 'Cyan';
$lang['color_blue'] = 'Bleu';
$lang['color_dark_blue'] = 'Bleu fonc�';
$lang['color_indigo'] = 'Indigo';
$lang['color_violet'] = 'Violet';
$lang['color_white'] = 'Blanc';
$lang['color_black'] = 'Noir';

$lang['Font_size'] = 'Taille';
$lang['font_tiny'] = 'Tr�s petit';
$lang['font_small'] = 'Petit';
$lang['font_normal'] = 'Normal';
$lang['font_large'] = 'Grand';
$lang['font_huge'] = 'Tr�s grand';

$lang['Close_Tags'] = 'Fermer les Balises';
$lang['Styles_tip'] = 'Astuce: Une mise en forme peut �tre appliqu�e au texte s�lectionn�.';


//
// Private Messaging
//
$lang['Private_Messaging'] = 'Messages Priv�s';

$lang['Login_check_pm'] = 'Se connecter pour v�rifier ses messages priv�s';
$lang['New_pms'] = 'Vous avez %d nouveaux messages'; // You have 2 new messages
$lang['New_pm'] = 'Vous avez %d nouveau message'; // You have 1 new message
$lang['No_new_pm'] = 'Vous n\'avez pas de nouveaux messages';
$lang['Unread_pms'] = 'Vous avez %d messages non lus';
$lang['Unread_pm'] = 'Vous avez %d message non lu';
$lang['No_unread_pm'] = 'Vous n\'avez pas de messages non lus';
$lang['You_new_pm'] = 'Un nouveau message priv� vous attend dans votre Bo�te de r�ception';
$lang['You_new_pms'] = 'De nouveaux messages priv�s vous attendent dans votre Bo�te de r�ception';
$lang['You_no_new_pm'] = 'Aucun nouveau message priv� ne vous attend dans votre Bo�te de r�ception';

$lang['Unread_message'] = 'Message Non-lu'; 
$lang['Read_message'] = 'Message d�j� lu';

$lang['Read_pm'] = 'Lire le message'; 
$lang['Post_new_pm'] = 'Poster le message'; 
$lang['Post_reply_pm'] = 'R�pondre au message'; 
$lang['Post_quote_pm'] = 'Citer le message'; 
$lang['Edit_pm'] = 'Editer le message'; 

$lang['Inbox'] = 'Bo�te de r�ception';
$lang['Outbox'] = 'Bo�te d\'envoi';
$lang['Savebox'] = 'Archives';
$lang['Sentbox'] = 'Messages envoy�s';
$lang['Flag'] = 'Flag';
$lang['Subject'] = 'Sujet';
$lang['From'] = 'De';
$lang['To'] = 'A';
$lang['Date'] = 'Date';
$lang['Mark'] = 'Marquer';
$lang['Sent'] = 'Envoy�';
$lang['Saved'] = 'Archiv�';
$lang['Delete_marked'] = 'Supprimer la S�lection';
$lang['Delete_all'] = 'Tout Supprimer';
$lang['Save_marked'] = 'Sauvegarder la S�lection'; 
$lang['Save_message'] = 'Sauvegarder le Message';
$lang['Delete_message'] = 'Supprimer le Message';

$lang['Display_messages'] = 'Montrer les messages depuis'; // Followed by number of days/weeks/months
$lang['All_Messages'] = 'Tous les Messages';

$lang['No_messages_folder'] = 'Vous n\'avez pas de messages dans ce dossier';

$lang['PM_disabled'] = 'Les messages priv�s ont �t� d�sactiv�s sur ce forum.';
$lang['Cannot_send_privmsg'] = 'D�sol�, mais l\'administrateur vous a emp�ch� d\'envoyer des messages priv�s.';
$lang['No_to_user'] = 'Vous devez pr�ciser un nom d\'utilisateur pour envoyer ce message.';
$lang['No_such_user'] = 'D�sol�, mais cet utilisateur n\'existe pas.';

$lang['Disable_HTML_pm'] = 'D�sactiver le HTML dans ce message';
$lang['Disable_BBCode_pm'] = 'D�sactiver le BBCode dans ce message';
$lang['Disable_Smilies_pm'] = 'D�sactiver les Smileys dans ce message';

$lang['Message_sent'] = 'Votre message a �t� envoy�.';

$lang['Click_return_inbox'] = 'Cliquez %sici%s pour retourner � votre Bo�te de r�ception';
$lang['Click_return_index'] = 'Cliquez %sici%s pour retourner � l\'Index';

$lang['Send_a_new_message'] = 'Envoyer un nouveau message priv�';
$lang['Send_a_reply'] = 'R�pondre � un message priv�';
$lang['Edit_message'] = 'Editer un message priv�';

$lang['Notification_subject'] = 'Un Nouveau Message Priv� vient d\'arriver.';

$lang['Find_username'] = 'Trouver un nom d\'utilisateur';
$lang['Find'] = 'Trouver';
$lang['No_match'] = 'Aucun enregistrement trouv�.';

$lang['No_post_id'] = 'L\'ID du message n\'a pas �t� sp�cifi�e';
$lang['No_such_folder'] = 'Le dossier n\'existe pas';
$lang['No_folder'] = 'Pas de dossier sp�cifi�';

$lang['Mark_all'] = 'Tout s�lectionner';
$lang['Unmark_all'] = 'Tout d�s�lectionner';

$lang['Confirm_delete_pm'] = 'Etes-vous s�r de vouloir supprimer ce message ?';
$lang['Confirm_delete_pms'] = 'Etes-vous s�r de vouloir supprimer ces messages ?';

$lang['Inbox_size'] = 'Votre Bo�te de r�ception est pleine � %d%%'; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = 'Votre Bo�te des Messages envoy�s est pleine � %d%%'; 
$lang['Savebox_size'] = 'Votre Bo�te des Archives est pleine � %d%%'; 

$lang['Click_view_privmsg'] = 'Cliquez %sici%s pour voir votre Bo�te de r�ception';
// START - SEND PM ON REGISTER MOD - AbelaJohnB
$lang['register_pm_subject'] = 'Bienvenue sur %s';
$lang['register_pm'] = 'Hello!<br /><br />Bienvenue sur %s. <br /><br />Nous esperons que vous passerez du bon temps sur ce site !<br /><br />Amusez vous bien!!<br />Le staff de%s ';
// END - SEND PM ON REGISTER MOD - AbelaJohnB


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = 'Voir le profil :: %s'; // %s is username 
$lang['About_user'] = 'Tout � propos de %s'; // %s is username
$lang['User_admin_for'] = 'Gestion du membre'; 
$lang['User_perm_for'] = 'Permissions'; 


$lang['Preferences'] = 'Pr�f�rences';
$lang['Items_required'] = 'Les champs marqu�s d\'un * sont obligatoires.';
$lang['Registration_info'] = 'Enregistrement';
$lang['Profile_info'] = 'Profil';
$lang['Profile_info_warn'] = 'Ces informations seront visibles publiquement';
$lang['Avatar_panel'] = 'Panneau de contr�le des Avatars';
$lang['Avatar_gallery'] = 'Galerie des Avatars';

$lang['Website'] = 'Site Web';
$lang['Location'] = 'Localisation';
$lang['Contact'] = 'Contact';
$lang['Email_address'] = 'Adresse e-mail';
$lang['Send_private_message'] = 'Envoyer un message priv�';
$lang['Hidden_email'] = '[ Invisible ]';
$lang['Interests'] = 'Loisirs';
$lang['Occupation'] = 'Emploi'; 
$lang['Poster_rank'] = 'Rang de l\'utilisateur';

$lang['Total_posts'] = 'Messages';
$lang['User_post_pct_stats'] = '%.2f%% du total'; // 1.25% of total
$lang['User_post_day_stats'] = '%.2f messages par jour'; // 1.5 posts per day
$lang['Search_user_posts'] = 'Trouver tous les messages de %s'; // Find all posts by username

$lang['No_user_id_specified'] = 'D�sol�, mais cet utilisateur n\'existe pas.';
$lang['Wrong_Profile'] = 'Vous ne pouvez pas modifier un profil qui n\'est pas le v�tre.';

$lang['Only_one_avatar'] = 'Seul un type d\'avatar peut �tre sp�cifi�';
$lang['File_no_data'] = 'Le fichier de l\'URL que vous avez donn� ne contient aucune donn�es';
$lang['No_connection_URL'] = 'Une connexion ne peut �tre �tablie avec l\'URL que vous avez donn�e';
$lang['Incomplete_URL'] = 'L\'URL que vous avez entr�e est incompl�te';
$lang['Wrong_remote_avatar_format'] = 'L\'URL de l\'avatar est invalide';
$lang['No_send_account_inactive'] = 'D�sol�, mais votre mot de passe ne peut pas �tre renouvel� �tant donn� que votre compte est actuellement inactif. Veuillez contacter l\'administrateur du forum afin d\'obtenir de plus amples informations.';

$lang['Always_smile'] = 'Toujours activer les Smileys';
$lang['Always_html'] = 'Toujours autoriser le HTML';
$lang['Always_bbcode'] = 'Toujours autoriser le BBCode';
$lang['Always_add_sig'] = 'Toujours attacher sa signature';
$lang['Always_notify'] = 'Toujours m\'avertir des r�ponses';
$lang['Always_notify_explain'] = 'Envoie un e-mail lorsque quelqu\'un r�pond aux sujets que vous avez post�. Ceci peut �tre chang� chaque fois que vous postez.';

$lang['Board_style'] = 'Th�me du Forum';
$lang['Board_lang'] = 'Langue du Forum';
$lang['No_themes'] = 'Pas de Th�me dans la base de donn�es';
$lang['Timezone'] = 'Fuseau horaire';
$lang['Date_format'] = 'Format de la date';
$lang['Date_format_explain'] = 'La syntaxe utilis�e est identique � la fonction <a href=\'http://www.php.net/manual/fr/function.date.php\' target=\'_other\'>date()</a> du PHP.';
$lang['Signature'] = 'Signature';
$lang['Signature_explain'] = 'Ceci est un bloc de texte qui peut �tre ajout� aux messages que vous postez. Il y a une limite de %d caract�res';
$lang['Public_view_email'] = 'Toujours montrer son adresse e-mail';

$lang['Current_password'] = 'Mot de passe actuel';
$lang['New_password'] = 'Nouveau mot de passe';
$lang['Confirm_password'] = 'Confirmer le mot de passe';
$lang['Confirm_password_explain'] = 'Vous devez confirmer votre mot de passe si vous souhaitez modifier votre adresse e-mail';
$lang['password_if_changed'] = 'Vous avez seulement besoin de fournir un mot de passe si vous voulez le changer';
$lang['password_confirm_if_changed'] = 'Vous avez seulement besoin de confirmer votre mot de passe si vous l\'avez chang� ci-dessus';

$lang['Avatar'] = 'Avatar';
$lang['Avatar_explain'] = 'Affiche une petite image au-dessous de vos d�tails dans vos messages. Seule une image peut �tre affich�e � la fois; sa largeur ne peut pas d�passer %d pixels, sa hauteur %d pixels et la taille du fichier, pas plus de %d ko.';
$lang['Upload_Avatar_file'] = 'Envoyer l\'Avatar depuis votre ordinateur';
$lang['Upload_Avatar_URL'] = 'Envoyer l\'Avatar � partir d\'une URL';
$lang['Upload_Avatar_URL_explain'] = 'Entrez l\'URL de l\'image Avatar; elle sera copi�e sur ce site.';
$lang['Pick_local_Avatar'] = 'S�lectionner un Avatar de la Galerie';
$lang['Link_remote_Avatar'] = 'Lier l\'Avatar � partir d\'un autre site';
$lang['Link_remote_Avatar_explain'] = 'Entrez l\'URL de l\'image Avatar que vous voulez lier.';
$lang['Avatar_URL'] = 'URL de l\'Image Avatar';
$lang['Select_from_gallery'] = 'S�lectionner un Avatar � partir de la Galerie';
$lang['View_avatar_gallery'] = 'Montrer la Galerie';

$lang['Select_avatar'] = 'S�lectionner l\'avatar';
$lang['Return_profile'] = 'Annuler l\'avatar';
$lang['Select_category'] = 'S�lectionner une cat�gorie';

$lang['Delete_Image'] = 'Supprimer l\'Image';
$lang['Current_Image'] = 'Image Actuelle';

$lang['Notify_on_privmsg'] = 'M\'avertir des nouveaux Messages Priv�s';
$lang['Popup_on_privmsg'] = 'Ouverture d\'une Pop-Up lors de nouveaux Messages Priv�s.'; 
$lang['Popup_on_privmsg_explain'] = 'Certains th�mes peuvent ouvrir une nouvelle fen�tre pour vous informer de l\'arriv�e de nouveaux messages priv�s'; 
$lang['Hide_user'] = 'Cacher sa pr�sence en ligne';

$lang['Profile_updated'] = 'Votre profil a �t� mis � jour';
$lang['Profile_updated_inactive'] = 'Votre profil a �t� mis � jour. Toutefois, vous avez modifi� des d�tails vitaux; ainsi, votre compte redevient inactif. V�rifiez votre bo�te e-mail pour savoir comment r�activer votre compte ou, si l\'activation par l\'administrateur est requise, patientez jusqu\'� ce qu\'il le r�active.';

$lang['Password_mismatch'] = 'Les mots de passe que avez entr�s sont diff�rents.';
$lang['Current_password_mismatch'] = 'Le mot de passe que vous avez fourni est diff�rent de celui stock� sur la base de donn�es.';
$lang['Password_long'] = 'Votre mot de passe ne doit pas d�passer 32 caract�res.';

$lang['Username_taken'] = 'D�sol�, mais ce nom d\'utilisateur est d�j� pris.';
$lang['Username_invalid'] = 'D�sol�, mais ce nom d\'utilisateur contient un caract�re invalide comme \' par exemple.';
$lang['Username_disallowed'] = 'D�sol�, mais ce nom d\'utilisateur a �t� interdit d\'utilisation.';
$lang['Email_taken'] = 'D�sol�, mais cette adresse e-mail est d�j� enregistr�e par un autre utilisateur.';
$lang['Email_banned'] = 'D�sol�, mais cette adresse e-mail a �t� bannie.';
$lang['Email_invalid'] = 'D�sol�, mais cette adresse e-mail est invalide.';
$lang['Signature_too_long'] = 'Votre signature est trop longue.';
$lang['Fields_empty'] = 'Vous devez compl�ter les champs obligatoires.';
$lang['Avatar_filetype'] = 'Le type de fichier de l\'avatar doit �tre .jpg, .gif ou .png';
$lang['Avatar_filesize'] = 'La taille de l\'image de l\'avatar doit �tre inf�rieure � %d ko'; // The avatar image file size must be less than 6 ko
$lang['Avatar_imagesize'] = 'La taille de l\'avatar doit �tre de %d pixels de largeur et de %d pixels de hauteur'; 

$lang['Welcome_subject'] = 'Bienvenue sur les Forums de %s'; // Welcome to my.com forums
$lang['New_account_subject'] = 'Nouveau compte utilisateur';
$lang['Account_activated_subject'] = 'Compte activ�';

$lang['Account_added'] = 'Merci de vous �tre enregistr�; votre compte a �t� cr��. Vous pouvez vous connecter avec votre nom d\'utilisateur et mot de passe';
$lang['Account_inactive'] = 'Votre compte a �t� cr��. Toutefois, ce forum requiert que votre compte soit activ�, et donc une clef d\'activation a �t� envoy�e � l\'adresse e-mail que vous avez fournie. Veuillez v�rifier votre bo�te e-mail pour de plus amples informations.';
$lang['Account_inactive_admin'] = 'Votre compte a �t� cr��. Toutefois, ce forum requiert que votre compte soit activ� par l\'administrateur. Un e-mail lui a �t� envoy� et vous serez inform� lorsque votre compte sera activ�.';
$lang['Account_active'] = 'Votre compte a �t� activ�. Merci de vous �tre enregistr�';
$lang['Account_active_admin'] = 'Le compte a �t� activ�';
$lang['Reactivate'] = 'R�activez votre compte !';
$lang['Already_activated'] = 'Votre compte est d�j� activ�';
$lang['COPPA'] = 'Votre compte a �t� cr��, mais il doit �tre approuv�. Veuillez v�rifier votre bo�te e-mail pour plus de d�tails.';

$lang['Registration'] = 'Enregistrement - R�glement';
$lang['Reg_agreement'] = 'Les administrateurs et mod�rateurs de ce forum s\'efforceront de supprimer ou �diter tous les messages � caract�re r�pr�hensible aussi rapidement que possible. Toutefois, il leur est impossible de passer en revue tous les messages. Vous admettez donc que tous les messages post�s sur ces forums expriment la vue et opinion de leurs auteurs respectifs, et non pas des administrateurs, ou mod�rateurs, ou webmestres (except� les messages post�s par eux-m�me) et par cons�quent ne peuvent pas �tre tenus pour responsables.<br /><br />Vous consentez � ne pas poster de messages injurieux, obsc�nes, vulgaires, diffamatoires, mena�ants, sexuels ou tout autre message qui violeraient les lois applicables. Le faire peut vous conduire � �tre banni imm�diatement de fa�on permanente (et votre fournisseur d\'acc�s � internet en sera inform�). L\'adresse IP de chaque message est enregistr�e afin d\'aider � faire respecter ces conditions. Vous �tes d\'accord sur le fait que le webmestre, l\'administrateur et les mod�rateurs de ce forum ont le droit de supprimer, �diter, d�placer ou verrouiller n\'importe quel sujet de discussion � tout moment. En tant qu\'utilisateur, vous �tes d\'accord sur le fait que toutes les informations que vous donnerez ci-apr�s seront stock�es dans une base de donn�es. Cependant, ces informations ne seront divulgu�es � aucune tierce personne ou soci�t� sans votre accord. Le webmestre, l\'administrateur, et les mod�rateurs ne peuvent pas �tre tenus pour responsables si une tentative de piratage informatique conduit � l\'acc�s de ces donn�es.<br /><br />Ce forum utilise les cookies pour stocker des informations sur votre ordinateur. Ces cookies ne contiendront aucune information que vous aurez entr� ci-apr�s; ils servent uniquement � am�liorer le confort d\'utilisation. L\'adresse e-mail est uniquement utilis�e afin de confirmer les d�tails de votre enregistrement ainsi que votre mot de passe (et aussi pour vous envoyer un nouveau mot de passe dans le cas o� vous l\'oublieriez).<br /><br />En vous enregistrant, vous vous portez garant du fait d\'�tre en accord avec le r�glement ci-dessus.';

$lang['Agree_under_13'] = 'J\'accepte le r�glement et j\'ai <b>moins</b> de 13 ans';
$lang['Agree_over_13'] = 'J\'accepte le r�glement et j\'ai <b>exactement</b> ou <b>plus</b> de 13 ans';
$lang['Agree_not'] = 'Je n\'accepte pas le r�glement';

$lang['Wrong_activation'] = 'La clef d\'activation que vous avez fournie ne correspond pas � celle de la base de donn�es.';
$lang['Send_password'] = 'Envoyez-moi un nouveau mot de passe'; 
$lang['Password_updated'] = 'Un nouveau mot de passe a �t� cr��; veuillez v�rifier votre bo�te e-mail pour plus de d�tails concernant l\'activation de celui-ci.';
$lang['No_email_match'] = 'L\'adresse e-mail que vous avez fournie ne correspond pas avec celle qui a �t� utilis�e pour ce nom d\'utilisateur.';
$lang['New_password_activation'] = 'Activation d\'un nouveau mot de passe';
$lang['Password_activated'] = 'Votre compte a �t� r�activ�. Pour vous connecter, veuillez utiliser le mot de passe fourni dans l\'e-mail que vous avez re�u.';

$lang['Send_email_msg'] = 'Envoyer un message e-mail';
$lang['No_user_specified'] = 'Aucun utilisateur sp�cifi�';
$lang['User_prevent_email'] = 'Cet utilisateur ne souhaite pas recevoir d\'e-mail. Essayez de lui envoyer un message priv�.';
$lang['User_not_exist'] = 'Cet utilisateur n\'existe pas';
$lang['CC_email'] = 'Envoyer une copie de cet e-mail � soi-m�me';
$lang['Email_message_desc'] = 'Ce message sera envoy� en mode texte uniquement; n\'ins�rez aucun code HTML ou BBCode. L\'adresse de r�ponse pour ce message sera celle de votre e-mail.';
$lang['Flood_email_limit'] = 'Vous ne pouvez pas envoyer un autre e-mail pour le moment; essayez plus tard';
$lang['Recipient'] = 'Destinataire';
$lang['Email_sent'] = 'L\'e-mail a �t� envoy�.';
$lang['Send_email'] = 'Envoyer un e-mail';
$lang['Empty_subject_email'] = 'Vous devez sp�cifier le sujet pour l\'e-mail.';
$lang['Empty_message_email'] = 'Vous devez entrer un message pour qu\'il soit exp�di�.';


//
// Visual confirmation system settings
//
$lang['Confirm_code_wrong'] = 'Le code de confirmation que vous avez entr� ne correspond pas � celui de l\'image. Veuillez r�essayer ult�rieurement.';
$lang['Too_many_registers'] = 'Vous avez d�pass� le nombre de tentatives d\'enregistrement pour cette session. Veuillez r�essayer ult�rieurement.';
$lang['Confirm_code_impaired'] = 'Si vous �tes visuellement d�ficient ou si vous ne pouvez lire ce code, veuillez contacter l\'%sadministrateur%s afin d\'obtenir de l\'aide.';
$lang['Confirm_code'] = 'Code de confirmation';
$lang['Confirm_code_explain'] = 'Entrez exactement le code que vous voyez sur l\'image';



//
// Memberslist
//
$lang['Select_sort_method'] = 'S�lectionner la m�thode de tri';
$lang['Sort'] = 'Trier';
$lang['Sort_Top_Ten'] = 'Top 10 des Posteurs';
$lang['Sort_Joined'] = 'Inscrit le';
$lang['Sort_Username'] = 'Nom d\'utilisateur';
$lang['Sort_Location'] = 'Localisation';
$lang['Sort_Posts'] = 'Messages';
$lang['Sort_Email'] = 'E-mail';
$lang['Sort_Website'] = 'Site Web';
$lang['Sort_Ascending'] = 'Croissant';
$lang['Sort_Descending'] = 'D�croissant';
$lang['Order'] = 'Ordre';


//
// Group control panel
//
$lang['Group_Control_Panel'] = 'Panneau de Contr�le des Groupes';
$lang['Group_member_details'] = 'Appartenance � un groupe';
$lang['Group_member_join'] = 'Rejoindre un Groupe';

$lang['Group_Information'] = 'Informations du groupe';
$lang['Group_name'] = 'Nom du groupe';
$lang['Group_description'] = 'Description du groupe';
$lang['Group_membership'] = 'Votre statut';
$lang['Group_Members'] = 'Membres du groupe';
$lang['Group_Moderator'] = 'Mod�rateur du groupe';
$lang['Pending_members'] = 'Membres en attente';

$lang['Group_type'] = 'Type du groupe';
$lang['Group_open'] = 'Groupe ouvert';
$lang['Group_closed'] = 'Groupe ferm�';
$lang['Group_hidden'] = 'Groupe invisible';

$lang['Current_memberships'] = 'Membre du groupe';
$lang['Non_member_groups'] = 'Non-membre du groupe';
$lang['Memberships_pending'] = 'Adh�sions en attente';

$lang['No_groups_exist'] = 'Aucun groupe n\'existe';
$lang['Group_not_exist'] = 'Ce groupe d\'utilisateurs n\'existe pas';

$lang['Join_group'] = 'Rejoindre le Groupe';
$lang['No_group_members'] = 'Ce groupe n\'a pas de membres';
$lang['Group_hidden_members'] = 'Ce groupe est invisible; vous ne pouvez pas voir son effectif';
$lang['No_pending_group_members'] = 'Ce groupe n\'a pas d\'utilisateurs en attente';
$lang['Group_joined'] = 'Vous vous �tes inscrit � ce groupe avec succ�s.<br />Vous serez averti lorsque votre inscription sera approuv�e par le mod�rateur du groupe.';
$lang['Group_request'] = 'Une requ�te d\'adh�sion � votre groupe a �t� faite.';
$lang['Group_approved'] = 'Votre requ�te a �t� approuv�e.';
$lang['Group_added'] = 'Vous avez �t� rajout� � ce groupe d\'utilisateurs.';
$lang['Already_member_group'] = 'Vous �tes d�j� membre de ce groupe';
$lang['User_is_member_group'] = 'L\'utilisateur est d�j� membre de ce groupe';
$lang['Group_type_updated'] = 'Vous avez mis � jour le type du groupe avec succ�s.';

$lang['Could_not_add_user'] = 'L\'utilisateur que vous avez s�lectionn� n\'existe pas.';
$lang['Could_not_anon_user'] = 'Vous ne pouvez pas rendre des utilisateurs anonymes, membres d\'un groupe.';

$lang['Confirm_unsub'] = 'Etes-vous s�r de vouloir vous d�sinscrire de ce groupe ?';
$lang['Confirm_unsub_pending'] = 'Votre inscription � ce groupe n\'a pas encore �t� approuv�e; �tes-vous s�r de vouloir vous d�sinscrire ?';

$lang['Unsub_success'] = 'Vous avez �t� d�sinscrit de ce groupe.';

$lang['Approve_selected'] = 'Approuver la s�lection';
$lang['Deny_selected'] = 'Refuser la s�lection';
$lang['Not_logged_in'] = 'Vous devez �tre connect� pour joindre un groupe.';
$lang['Remove_selected'] = 'Supprimer la s�lection';
$lang['Add_member'] = 'Ajouter le Membre';
$lang['Not_group_moderator'] = 'Vous n\'�tes pas le mod�rateur de ce groupe; vous ne pouvez donc pas accomplir cette action.';

$lang['Login_to_join'] = 'Connectez-vous pour joindre ou g�rer les adh�sions du groupe';
$lang['This_open_group'] = 'Ceci est un groupe ouvert: cliquez pour faire une demande d\'adh�sion';
$lang['This_closed_group'] = 'Ceci est un groupe ferm�: plus aucun utilisateur n\'est accept�';
$lang['This_hidden_group'] = 'Ceci est groupe invisible: l\'ajout automatique d\'utilisateurs n\'est pas autoris�';
$lang['Member_this_group'] = 'Vous �tes Membre du groupe';
$lang['Pending_this_group'] = 'Votre adh�sion � ce groupe est en attente';
$lang['Are_group_moderator'] = 'Vous �tes le Mod�rateur du groupe';
$lang['None'] = 'Aucun';

$lang['Subscribe'] = 'S\'inscrire';
$lang['Unsubscribe'] = 'Se d�sinscrire';
$lang['View_Information'] = 'Voir les Informations';


//
// Search
//
$lang['Search_query'] = 'Rechercher';
$lang['Search_options'] = 'Options de Recherche';

$lang['Search_keywords'] = 'Recherche par Mots-cl�s';
$lang['Search_keywords_explain'] = 'Vous pouvez utiliser <u>AND</u> pour d�terminer les mots qui doivent �tre pr�sents dans les r�sultats, <u>OR</u> pour d�terminer les mots qui peuvent �tre pr�sents dans les r�sultats et <u>NOT</u> pour d�terminer les mots qui ne devraient pas �tre pr�sents dans les r�sultats. Utilisez * comme un joker pour des recherches partielles';
$lang['Search_author'] = 'Recherche par Auteur';
$lang['Search_author_explain'] = 'Utilisez * comme un joker pour des recherches partielles';

$lang['Search_for_any'] = 'Rechercher n\'importe quel de ces termes';
$lang['Search_for_all'] = 'Rechercher tous les termes';
$lang['Search_title_msg'] = 'Rechercher dans les titres et messages';
$lang['Search_msg_only'] = 'Rechercher dans les messages uniquement';

$lang['Return_first'] = 'Retourner les'; // followed by xxx characters in a select box
$lang['characters_posts'] = 'premiers caract�res des messages';

$lang['Search_previous'] = 'Rechercher depuis'; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = 'Trier par';
$lang['Sort_Time'] = 'Heure du Message';
$lang['Sort_Post_Subject'] = 'Sujet du Message';
$lang['Sort_Topic_Title'] = 'Titre du Sujet';
$lang['Sort_Author'] = 'Auteur';
$lang['Sort_Forum'] = 'Forum';

$lang['Display_results'] = 'Afficher les r�sultats sous forme de';
$lang['All_available'] = 'Tous disponible';
$lang['No_searchable_forums'] = 'Vous n\'avez pas la permission de rechercher quelconque forum sur ce site.';

$lang['No_search_match'] = 'Aucun sujet ou message ne correspond � vos crit�res de recherche';
$lang['Found_search_match'] = '%d r�sultat trouv�'; // eg. Search found 1 match
$lang['Found_search_matches'] = '%d r�sultats trouv�s'; // eg. Search found 24 matches
$lang['Search_Flood_Error'] = 'Vous ne pouvez pas lancer une autre recherche si rapidement apr�s la derni�re effectu�e; veuillez r�essayer � nouveau dans un court moment.';

$lang['Close_window'] = 'Fermer la Fen�tre';


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = 'D�sol�, mais seuls les %s peuvent poster des annonces dans ce forum.';
$lang['Sorry_auth_sticky'] = 'D�sol�, mais seuls les %s peuvent poster des post-it dans ce forum.';
$lang['Sorry_auth_read'] = 'D�sol�, mais seuls les %s peuvent lire des sujets dans ce forum.';
$lang['Sorry_auth_post'] = 'D�sol�, mais seuls les %s peuvent poster dans ce forum.';
$lang['Sorry_auth_reply'] = 'D�sol�, mais seuls les %s peuvent r�pondre aux messages dans ce forum.';
$lang['Sorry_auth_edit'] = 'D�sol�, mais seuls les %s peuvent �diter des messages dans ce forum.';
$lang['Sorry_auth_delete'] = 'D�sol�, mais seuls les %s peuvent supprimer des messages dans ce forum.';
$lang['Sorry_auth_vote'] = 'D�sol�, mais seuls les %s peuvent voter aux sondages dans ce forum.';

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = '<b>utilisateurs anonymes</b>';
$lang['Auth_Registered_Users'] = '<b>utilisateurs enregistr�s</b>';
$lang['Auth_Users_granted_access'] = '<b>utilisateurs avec un acc�s sp�cial</b>';
$lang['Auth_Moderators'] = '<b>mod�rateurs</b>';
$lang['Auth_Administrators'] = '<b>administrateurs</b>';

$lang['Not_Moderator'] = 'Vous n\'�tes pas mod�rateur sur ce forum.';
$lang['Not_Authorised'] = 'Non Autoris�';

$lang['You_been_banned'] = 'Vous avez �t� banni de ce forum.<br />Veuillez contacter le webmestre ou l\'administrateur du forum pour plus d\'informations.';


//
// Viewonline
//
$lang['Reg_users_zero_online'] = 'Il y a 0 utilisateur enregistr� et '; // There are 5 Registered and
$lang['Reg_users_online'] = 'Il y a %d utilisateurs enregistr�s et '; // There are 5 Registered and
$lang['Reg_user_online'] = 'Il y a %d utilisateur enregistr� et '; // There is 1 Registered and
$lang['Hidden_users_zero_online'] = '0 utilisateur invisible en ligne'; // 6 Hidden users online
$lang['Hidden_users_online'] = '%d utilisateurs invisibles en ligne'; // 6 Hidden users online
$lang['Hidden_user_online'] = '%d utilisateur invisible en ligne'; // 6 Hidden users online
$lang['Guest_users_online'] = 'Il y a %d invit�s en ligne'; // There are 10 Guest users online
$lang['Guest_users_zero_online'] = 'Il y a 0 invit� en ligne'; // There are 10 Guest users online
$lang['Guest_user_online'] = 'Il y a %d invit� en ligne'; // There is 1 Guest user online
$lang['No_users_browsing'] = 'Il n\'y a actuellement personne sur ce forum';

$lang['Online_explain'] = 'Ces donn�es sont bas�es sur les utilisateurs actifs des cinq derni�res minutes';

$lang['Forum_Location'] = 'Localisation sur le Forum';
$lang['Last_updated'] = 'Derni�re mise � jour';

$lang['Forum_index'] = 'Index du Forum';
$lang['Logging_on'] = 'Se connecte';
$lang['Posting_message'] = 'Poste un message';
$lang['Searching_forums'] = 'Recherche sur le forum';
$lang['Viewing_profile'] = 'Regarde un profil';
$lang['Viewing_online'] = 'Regarde qui est en ligne';
$lang['Viewing_member_list'] = 'Regarde la liste des membres';
$lang['Viewing_priv_msgs'] = 'Regarde ses Messages Priv�s';
$lang['Viewing_FAQ'] = 'Regarde la FAQ';


//
// Moderator Control Panel
//
$lang['Mod_CP'] = 'Panneau de Contr�le de Mod�ration';
$lang['Mod_CP_explain'] = 'En utilisant le formulaire ci-dessous, vous pouvez accomplir des op�rations de mod�ration de masse sur ce forum. Vous pouvez verrouiller, d�verrouiller, d�placer ou supprimer n\'importe quel nombre de sujets.';

$lang['Select'] = 'S�lectionner';
$lang['Delete'] = 'Supprimer';
$lang['Move'] = 'D�placer';
$lang['Lock'] = 'Verrouiller';
$lang['Unlock'] = 'D�verrouiller';

$lang['Topics_Removed'] = 'Le(s) sujet(s) s�lectionn�(s) a/ont �t� retir�(s) de la base de donn�es avec succ�s.';
$lang['Topics_Locked'] = 'Le(s) sujet(s) s�lectionn�(s) a/ont �t� verrouill�(s).';
$lang['Topics_Moved'] = 'Le(s) sujet(s) s�lectionn�(s) a/ont �t� d�plac�(s).';
$lang['Topics_Unlocked'] = 'Le(s) sujet(s) s�lectionn�(s) a/ont �t� d�verrouill�(s).';
$lang['No_Topics_Moved'] = 'Aucun sujet n\'a �t� d�plac�.';

$lang['Confirm_delete_topic'] = 'Etes-vous s�r de vouloir supprimer le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_lock_topic'] = 'Etes-vous s�r de vouloir verrouiller le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_unlock_topic'] = 'Etes-vous s�r de vouloir d�verrouiller le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_move_topic'] = 'Etes-vous s�r de vouloir d�placer le(s) sujet(s) s�lectionn�(s) ?';

$lang['Move_to_forum'] = 'D�placer vers le forum';
$lang['Leave_shadow_topic'] = 'Laisser un sujet-traceur dans l\'ancien forum.';

$lang['Split_Topic'] = 'Panneau de Contr�le de la division des Sujets';
$lang['Split_Topic_explain'] = 'En utilisant le formulaire ci-dessous, vous pouvez diviser un sujet en deux sujets, soit en s�lectionnant les messages individuellement, soit en divisant � partir d\'un message s�lectionn�';
$lang['Split_title'] = 'Titre du nouveau sujet';
$lang['Split_forum'] = 'Forum du nouveau sujet';
$lang['Split_posts'] = 'Diviser les messages s�lectionn�s';
$lang['Split_after'] = 'Diviser � partir des messages s�lectionn�s';
$lang['Topic_split'] = 'Le sujet s�lectionn� a �t� divis� avec succ�s';

$lang['Too_many_error'] = 'Vous avez s�lectionn� trop de messages. Vous ne pouvez s�lectionner qu\'un seul message pour diviser le sujet � partir de ce message!';

$lang['None_selected'] = 'Vous n\'avez s�lectionn� aucun sujet pour accomplir cette op�ration. Veuillez revenir en arri�re et s�lectionnez-en au moins un.';
$lang['New_forum'] = 'Nouveau forum';

$lang['This_posts_IP'] = 'Adresse IP de ce message';
$lang['Other_IP_this_user'] = 'Autres adresses IP � partir desquelles cet utilisateur a post�';
$lang['Users_this_IP'] = 'Utilisateurs postant � partir de cette adresse IP';
$lang['IP_info'] = 'Informations sur l\'adresse IP';
$lang['Lookup_IP'] = 'Chercher l\'adresse IP';


//
// Timezones ... for display on each page
//
$lang['All_times'] = 'Toutes les heures sont au format %s'; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = 'GMT - 12 Heures';
$lang['-11'] = 'GMT - 11 Heures';
$lang['-10'] = 'GMT - 10 Heures';
$lang['-9'] = 'GMT - 9 Heures';
$lang['-8'] = 'GMT - 8 Heures';
$lang['-7'] = 'GMT - 7 Heures';
$lang['-6'] = 'GMT - 6 Heures';
$lang['-5'] = 'GMT - 5 Heures';
$lang['-4'] = 'GMT - 4 Heures';
$lang['-3.5'] = 'GMT - 3,5 Heures';
$lang['-3'] = 'GMT - 3 Heures';
$lang['-2'] = 'GMT - 2 Heures';
$lang['-1'] = 'GMT - 1 Heure';
$lang['0'] = 'GMT';
$lang['1'] = 'GMT + 1 Heure';
$lang['2'] = 'GMT + 2 Heures';
$lang['3'] = 'GMT + 3 Heures';
$lang['3.5'] = 'GMT + 3,5 Heures';
$lang['4'] = 'GMT + 4 Heures';
$lang['4.5'] = 'GMT + 4,5 Heures';
$lang['5'] = 'GMT + 5 Heures';
$lang['5.5'] = 'GMT + 5,5 Heures';
$lang['6'] = 'GMT + 6 Heures';
$lang['6.5'] = 'GMT + 6.5 Heures';
$lang['7'] = 'GMT + 7 Heures';
$lang['8'] = 'GMT + 8 Heures';
$lang['9'] = 'GMT + 9 Heures';
$lang['9.5'] = 'GMT + 9,5 Heures';
$lang['10'] = 'GMT + 10 Heures';
$lang['11'] = 'GMT + 11 Heures';
$lang['12'] = 'GMT + 12 Heures';
$lang['13'] = 'GMT + 13 Heures';

// These are displayed in the timezone select box
$lang['tz']['-12'] = 'GMT - 12 Heures';
$lang['tz']['-11'] = 'GMT - 11 Heures';
$lang['tz']['-10'] = 'GMT - 10 Heures';
$lang['tz']['-9'] = 'GMT - 9 Heures';
$lang['tz']['-8'] = 'GMT - 8 Heures';
$lang['tz']['-7'] = 'GMT - 7 Heures';
$lang['tz']['-6'] = 'GMT - 6 Heures';
$lang['tz']['-5'] = 'GMT - 5 Heures';
$lang['tz']['-4'] = 'GMT - 4 Heures';
$lang['tz']['-3.5'] = 'GMT - 3:30 Heures';
$lang['tz']['-3'] = 'GMT - 3 Heures';
$lang['tz']['-2'] = 'GMT - 2 Heures';
$lang['tz']['-1'] = 'GMT - 1 Heure';
$lang['tz']['0'] = 'GMT';
$lang['tz']['1'] = 'GMT + 1 Heure';
$lang['tz']['2'] = 'GMT + 2 Heures';
$lang['tz']['3'] = 'GMT + 3 Heures';
$lang['tz']['3.5'] = 'GMT + 3:30 Heures';
$lang['tz']['4'] = 'GMT + 4 Heures';
$lang['tz']['4.5'] = 'GMT + 4:30 Heures';
$lang['tz']['5'] = 'GMT + 5 Heures';
$lang['tz']['5.5'] = 'GMT + 5:30 Heures';
$lang['tz']['6'] = 'GMT + 6 Heures';
$lang['tz']['6.5'] = 'GMT + 6:30 Heures';
$lang['tz']['7'] = 'GMT + 7 Heures';
$lang['tz']['8'] = 'GMT + 8 Heures';
$lang['tz']['9'] = 'GMT + 9 Heures';
$lang['tz']['9.5'] = 'GMT + 9:30 Heures';
$lang['tz']['10'] = 'GMT + 10 Heures';
$lang['tz']['11'] = 'GMT + 11 Heures';
$lang['tz']['12'] = 'GMT + 12 Heures';
$lang['tz']['13'] = 'GMT + 13 Heures';

$lang['datetime']['Sunday'] = 'Dimanche';
$lang['datetime']['Monday'] = 'Lundi';
$lang['datetime']['Tuesday'] = 'Mardi';
$lang['datetime']['Wednesday'] = 'Mercredi';
$lang['datetime']['Thursday'] = 'Jeudi';
$lang['datetime']['Friday'] = 'Vendredi';
$lang['datetime']['Saturday'] = 'Samedi';
$lang['datetime']['Sun'] = 'Dim';
$lang['datetime']['Mon'] = 'Lun';
$lang['datetime']['Tue'] = 'Mar';
$lang['datetime']['Wed'] = 'Mer';
$lang['datetime']['Thu'] = 'Jeu';
$lang['datetime']['Fri'] = 'Ven';
$lang['datetime']['Sat'] = 'Sam';
$lang['datetime']['January'] = 'Janvier';
$lang['datetime']['February'] = 'F�vrier';
$lang['datetime']['March'] = 'Mars';
$lang['datetime']['April'] = 'Avril';
$lang['datetime']['May'] = 'Mai';
$lang['datetime']['June'] = 'Juin';
$lang['datetime']['July'] = 'Juillet';
$lang['datetime']['August'] = 'Ao�t';
$lang['datetime']['September'] = 'Septembre';
$lang['datetime']['October'] = 'Octobre';
$lang['datetime']['November'] = 'Novembre';
$lang['datetime']['December'] = 'D�cembre';
$lang['datetime']['Jan'] = 'Jan';
$lang['datetime']['Feb'] = 'F�v';
$lang['datetime']['Mar'] = 'Mar';
$lang['datetime']['Apr'] = 'Avr';
$lang['datetime']['May'] = 'Mai';
$lang['datetime']['Jun'] = 'Juin';
$lang['datetime']['Jul'] = 'Juil';
$lang['datetime']['Aug'] = 'Ao�';
$lang['datetime']['Sep'] = 'Sep';
$lang['datetime']['Oct'] = 'Oct';
$lang['datetime']['Nov'] = 'Nov';
$lang['datetime']['Dec'] = 'D�c';

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = 'Informations';
$lang['Critical_Information'] = 'Informations Critiques';

$lang['General_Error'] = 'Erreur G�n�rale';
$lang['Critical_Error'] = 'Erreur Critique';
$lang['An_error_occured'] = 'Une Erreur est Survenue';
$lang['A_critical_error'] = 'Une Erreur Critique est Survenue';

$lang['Admin_reauthenticate'] = 'Pour administrer le forum, vous devez vous authentifier de nouveau.';

 // Added by Attached Forums MOD

   $lang['Attached_forum'] = 'SubForum';
   $lang['Attached_forums'] = 'SubForums';
   
   // End Added by Attached Forums MOD
$lang['Style'] = 'Th�me: ';
$lang['Style_theme_num'] = '(%d)';
$lang['Style_profile_error'] = 'Impossible d\'obtenir les informations du th�me';
$lang['Style_counts_error'] = 'Impossible d\'obtenir le d�compte des th�mes par utilisateur';

// Start add - Birthday Mod
$lang['Birthday'] = 'Date de naissance';
$lang['No_birthday_specify'] = 'Non sp�cifi�';
$lang['Age'] = 'Age';
$lang['Years'] = 'ans';
$lang['Wrong_birthday_format'] = 'Le format de la date de naissance a mal �t� entr�.';
$lang['Birthday_to_high'] = 'D�sol�, mais ce site n\'accepte pas les utilisateurs �g�s de plus de %d ans';
$lang['Birthday_require'] = 'Votre date de naissance est exig�e sur ce site';
$lang['Birthday_to_low'] = 'D�sol�, mais ce site n\'accepte pas les utilisateurs �g�s de moins de %d ans';
$lang['Submit_date_format'] = 'd-m-Y'; //php date() format - Note: ONLY d, m and Y may be used and SHALL ALL be used (different seperators are accepted)
$lang['Birthday_greeting_today'] = 'Nous voudrions vous souhaiter un joyeux anniversaire pour vos %s ans.<br /><br /> L\'Equipe du site';//%s is substituted with the users age
$lang['Birthday_greeting_prev'] = 'Nous voudrions vous souhaiter, avec un peu de retard, un joyeux anniversaire pour vos %s ans obtenus le %s.<br /><br /> L\'Equipe du site';//%s is substituted with the users age, and birthday
$lang['Greeting_Messaging'] = 'F�licitations';
$lang['Birthday_today'] = 'Membres f�tant leur anniversaire aujourd\'hui:';
$lang['Birthday_week'] = 'Membres f�tant leur anniversaire dans les %d prochains jours:';
$lang['Nobirthday_week'] = 'Aucun membre ne f�te son anniversaire dans les %d prochains jours'; // %d is substitude with the number of days
$lang['Nobirthday_today'] = 'Aucun membre ne f�te son anniversaire aujourd\'hui';
$lang['Birthday_Year'] = 'Ann�e';
$lang['Birthday_Month'] = 'Mois';
$lang['Birthday_Day'] = 'Jour';
$lang['day_short'] = array($lang['datetime']['Sun'], $lang['datetime']['Mon'], $lang['datetime']['Tue'], $lang['datetime']['Wed'], $lang['datetime']['Thu'], $lang['datetime']['Fri'], $lang['datetime']['Sat']);
$lang['day_long'] = array($lang['datetime']['Sunday'], $lang['datetime']['Monday'], $lang['datetime']['Tuesday'], $lang['datetime']['Wednesday'], $lang['datetime']['Thursday'], $lang['datetime']['Friday'], $lang['datetime']['Saturday']);
$lang['month_short'] = array($lang['datetime']['Jan'], $lang['datetime']['Feb'], $lang['datetime']['Mar'], $lang['datetime']['Apr'], $lang['datetime']['May'], $lang['datetime']['Jun'], $lang['datetime']['Jul'], $lang['datetime']['Aug'], $lang['datetime']['Sep'], $lang['datetime']['Oct'], $lang['datetime']['Nov'], $lang['datetime']['Dec']);
$lang['month_long'] = array($lang['datetime']['January'], $lang['datetime']['February'], $lang['datetime']['March'], $lang['datetime']['April'], $lang['datetime']['May'], $lang['datetime']['June'], $lang['datetime']['July'], $lang['datetime']['August'], $lang['datetime']['September'], $lang['datetime']['October'], $lang['datetime']['November'], $lang['datetime']['December']);
// Start add - Trophee
$lang['Winner']= 'Arcade <br> Trophee ';
//End add - Trophee
// Birthday Zodiacs Mod
$lang['Zodiac'] = 'Zodiaque';
$lang['Capricorn'] = 'Capricorne';
$lang['Aquarius'] = 'Verseau';
$lang ['Pisces'] = 'Poissons';
$lang['Aries'] = 'B�lier';
$lang['Taurus'] = 'Taureau';
$lang['Gemini'] = 'G�meaux';
$lang['Cancer'] = 'Cancer';
$lang['Leo'] = 'Lion';
$lang['Virgo'] = 'Vierge';
$lang['Libra'] = 'Balance';
$lang['Scorpio'] = 'Scorpion';
$lang['Sagittarius'] = 'Sagittaire';

// Chinese Zodiacs Mod
$lang['Chinese_zodiac']= 'Signe Chinois';
$lang['Unknown'] = 'inconnu';
$lang['Rat'] = 'Rat';
$lang['Buffalo'] = 'Buffle';
$lang['Tiger'] = 'Tigre';
$lang['Cat'] = 'Chat';
$lang['Dragon'] = 'Dragon';
$lang['Snake'] = 'Serpent';
$lang['Horse'] = 'Cheval';
$lang['Goat'] = 'Bouc';
$lang['Monkey'] = 'Singe';
$lang['Cock'] = 'Coq';
$lang['Dog'] = 'Chien';
$lang['Pig'] = 'Cochon';
// End add - Birthday Mod
// Module Advanced Quick Reply
$lang['Quick_Reply'] = 'R�ponse rapide';
$lang['Quick_quote'] = 'Citer le dernier Message';
$lang['QuoteSelelected'] = 'S�lectionnez une Citation';
$lang['QuoteSelelectedEmpty'] = 'S�lectionnez un texte o� vous voulez sur une page et essayez � nouveau.';
$lang['Quick_Reply_smilies'] = 'Tous';
$lang['Login_attempts_exceeded'] = 'Vous avez d�pass� le nombre maximal de tentatives de connexions (%s). Vous ne pourrez ainsi plus vous connecter pendant %s minutes.'; 
$lang['Please_remove_install_contrib'] = 'Afin de terminer l\'installation, veuillez supprimer les dossiers <strong>install/</strong> pr�sent � la racine de votre forum.'; 
$lang['Session_invalid'] = 'Session invalide. Veuillez soumettre de nouveau le formulaire.'; 
//d�but pm_arcade
$lang['Arcade_op'] = 'Section Arcade';
$lang['Pm_arcade'] = 'Toujours m\'avertir d�s que mon score est battu'; 
$lang['Pm_arcade_explain'] = 'Envoie un PM lorsque quelqu\'un a battu mon score � un jeu dans la section Arcade'; 
//fin allow_pm_arcade
$lang['Global_Announcements'] = 'Annonce globale';
$lang['Announcements'] = 'Annonce';
$lang['Sticky_Topics'] = 'Post it';
//
// That's all Folks!
// -------------------------------------------------
// Start add - Last visit MOD
$lang['Last_logon'] = 'Derni�re visite le'; 
$lang['Hidde_last_logon'] = 'Indisponible'; 
$lang['Never_last_logon'] = 'Aucune'; 
$lang['Users_today_zero_total'] = 'Aucun utilisateur n\'a visit� le site aujourd\'hui :: '; 
$lang['Users_today_total'] = '<b>%d</b> utilisateurs ont visit� le site aujourd\'hui :: '; 
$lang['User_today_total'] = '<b>%d</b> utilisateur a visit� le site aujourd\'hui :: '; 
$lang['Users_lasthour_explain'] = ', dont %d durant la derni�re heure.'; 
$lang['Users_lasthour_none_explain'] = ''; //showen of none have visited the last hour, fill if you like 

$lang['Years'] = 'Ann�es'; 
$lang['Year'] = 'Ann�e'; 
$lang['Weeks'] = 'Semaines'; 
$lang['Week'] = 'Semaine'; 
$lang['Day'] = 'Jour'; 
$lang['Total_online_time'] = 'Dur�e totale de&nbsp;<br />connexion'; 
$lang['Last_online_time'] = 'Dur�e de la derni�re&nbsp;<br />connexion'; 
$lang['Number_of_visit'] = 'Nombre de visites'; 
$lang['Number_of_pages'] = 'Nombre de pages&nbsp;<br />parcourues'; 
// End add - Last visit MOD
//-- mod : totally erc ---------------------------------------------------------
//-- add
$lang['Legend'] = 'L�gende';
$lang['Administrator'] = 'Administrateur';
$lang['Moderator'] = 'Mod�rateur';
$lang['User'] = 'Utilisateur';
//-- fin mod : totally erc -----------------------------------------------------

// Start add - Gender MOD
$lang['Gender'] = 'Gender';//used in users profile to display witch gender he/she is 
$lang['Male'] = 'Homme'; 
$lang['Female']='Femme'; 
$lang['No_gender_specify'] = 'Non Specifi�'; 
// End add - Gender MOD
// Start add - Mood MOD
$lang['Mood'] = 'Humeur';
$lang['Sad'] = 'Triste'; 
$lang['Happy']='Heureux'; 
$lang['Angry']='F�ch�'; 
$lang['Cool']='Cool';
$lang['Devil']='D�chain�';
$lang['Ill']='Malade';
$lang['Love']='Amoureux';
$lang['Sleep']='Fatigu�';
$lang['Surprised']='Surpris';
$lang['No_mood_specify'] = 'Non sp�cifi�'; 
// End add - Mood MOD
// Start add - Miniland MOD
$lang['Miniland'] = 'Pays';
$lang['Be'] = 'Belgique'; 
$lang['Fr']='France'; 
$lang['Ch']='Suisse'; 
$lang['Ca']='Canada';
$lang['Lu']='Luxembourg';
$lang['No_miniland_specify'] = 'Non sp�cifi�'; 
// End add - Miniland MOD
// MOD - TODAY AT - BEGIN
$lang['Today_at'] = "Aujourd'hui � %s"; // %s is the time
$lang['Yesterday_at'] = "Hier � %s"; // %s is the time
// MOD - TODAY AT - END
$lang['Col_Drt'] = 'Infos Membre';
//-- mod : bbcode box reloaded -------------------------------------------------
//-- add
// acp
$lang['BBcode_Box'] = 'BBcode Box';
$lang['bbc_box_a_settings'] = 'Configuration';
$lang['bbc_box_b_list'] = 'Liste des bbcodes';
$lang['bbc_box_c_manage'] = 'Gestion';
// spoiler
$lang['bbcbxr_spoil'] = 'Spoiler';
$lang['bbcbxr_show'] = 'voir';
$lang['bbcbxr_hide'] = 'cacher';
// code expand
$lang['bbcbxr_expand'] = 'Agrandir';
$lang['bbcbxr_expand_more'] = 'Agrandir encore';
$lang['bbcbxr_contract'] = 'R�duire';
$lang['bbcbxr_select'] = 'Tout s�lectionner';
//-- fin mod : bbcode box reloaded ---------------------------------------------
// Lottery Variables 
$lang['lottery_second'] = 'Seconde'; 
$lang['lottery_seconds'] = 'Secondes'; 
$lang['lottery_minute'] = 'Minute'; 
$lang['lottery_minutes'] = 'Minutes'; 
$lang['lottery_hour'] = 'Heure'; 
$lang['lottery_hours'] = 'Heures'; 
$lang['lottery_day'] = 'Jour'; 
$lang['lottery_days'] = 'Jours'; 
$lang['lottery_current_history'] = 'Historique'; 
$lang['lottery_no_history'] = 'Il y a actuellement aucun historique enregistr� !'; 
$lang['lottery_history_disabled'] = 'L\'historique de la Loterie est d�sactiv� sur ce forum!'; 
$lang['lottery_ticket_bought'] = 'Votre billet de la %s a �t� achet� avec succ�s.<br>- <a href="index.php">Index</a> - <a 

href="lottery.php">Loterie</a> -'; 
$lang['lottery_tickets_bought'] = 'Vos %s billets de la %s ont �t� achet�s avec succ�s.<br>- <a href="index.php">Index</a> - <a 

href="lottery.php">Loterie</a> -'; 
$lang['lottery_purchased_ticket'] = ' pour acheter un billet!'; 
$lang['lottery_purchased_tickets'] = ' pour acheter des billets de %s!'; 
$lang['lottery_purchased_ne'] = 'Vous n\'avez pas assez '; 
$lang['lottery_too_many_tickets'] = '<p align="center">Vous avez d�j� achet� le nombre maximum de billets autoris�s pour cette Loterie 

! Veuillez attendre le prochain tirage.<br> - <a href="index.php">Index</a> - <a href="lottery.php">Loterie</a> -'; 
$lang['lottery_information'] = 'Informations de '; 
$lang['lottery_actions'] = 'Actions de la Loterie '; 
$lang['lottery_disabled'] = 'La Loterie est momentan�ment ferm�e !<br /><br />Revenez plus tard. - <a href="index.php">Index</a> -'; 
$lang['lottery_ID'] = 'ID'; 
$lang['lottery_winner'] = 'Gagnant(s)'; 
$lang['lottery_amount_won'] = 'Gains gagn�s'; 
$lang['lottery_time_won'] = 'Date(s) de chaque participation'; 
$lang['lottery_total_history'] = 'Il y a un total de %s gagnant(s) sur tous les participants � la Loterie.'; 
$lang['lottery_history'] = 'Historique'; 
$lang['lottery_tickets_owned'] = 'Billets poss�d�s'; 
$lang['lottery_ticket_cost'] = 'Co�t du billet'; 
$lang['lottery_base_pool'] = 'Valeur minimum de la Loterie'; 
$lang['lottery_current_entries'] = 'Nombre de participant en cours'; 
$lang['lottery_total_pool'] = 'Prix total'; 
$lang['lottery_item_draw'] = 'Articles pour ce tirage'; 
$lang['lottery_time_draw'] = 'Temps restant jusqu\'au tirage'; 
$lang['lottery_last_winner'] = 'Dernier gagnant'; 
$lang['lottery_buy_ticket'] = 'Achetez un billet'; 
$lang['lottery_buy_tickets'] = 'Achetez des billets'; 
$lang['lottery_view_history'] = 'Voir l\'historique de la Loterie'; 
$lang['lottery_view_phistory'] = 'Voir l\'historique personelle'; 
$lang['lottery'] = 'Loterie'; 

// Lottery Error Variables 
$lang['lottery_error_updating'] = 'Erreur de mise � jour de la table %s !'; 
$lang['lottery_error_deleting'] = 'Erreur de suppression � partir de la table %s !'; 
$lang['lottery_error_selecting'] = 'Erreur pour trouver les informations de la table %s !'; 
$lang['lottery_error_inserting'] = 'Erreur pour ins�rer les informations dans la table %s !'; 
$lang['lottery_error_variable'] = 'Erreur pour lire la variable %s !'; 
$lang['lottery_invalid_command'] = 'Ce n\'est pas la bonne commande !'; 
$lang['lottery_no_history_type'] = 'Aucune historique selectionn�e !'; 
?>