#
# Basic DB data for phpBB2 devel
#
# $Id: mysql_basic.sql,v 1.29.2.19 2005/07/19 20:01:17 acydburn Exp $

# -- Config
INSERT INTO phpbb_config (config_name, config_value) VALUES ('config_id','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_disable','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('sitename','Lucky Mod');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('site_desc','by Clomax');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_name','phpbb2mysql');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_path','/');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_domain','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_secure','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('session_length','3600');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_html','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_html_tags','b,i,u,pre');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_bbcode','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_smilies','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_namechange','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_theme_create','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_local','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_remote','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_upload','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('enable_confirm', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('override_user_style','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('posts_per_page','15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('topics_per_page','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('hot_threshold','25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_poll_options','10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_chars','255');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_inbox_privmsgs','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sentbox_privmsgs','25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_savebox_privmsgs','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email_sig','Thanks, The Management');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email','youraddress@yourdomain.com');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_delivery','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_host','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_username','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_password','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('sendmail_fix','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('require_activation','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('flood_interval','15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email_form','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_filesize','6144');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_max_width','80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_max_height','80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_path','images/avatars');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_gallery_path','images/avatars/gallery');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smilies_path','images/smiles');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('default_style','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('default_dateformat','D M d, Y g:i a');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_timezone','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('prune_enable','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('privmsg_disable','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('gzip_compress','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_fax', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_mail', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('record_online_users', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('record_online_date', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_name', 'www.myserver.tld');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_port', '80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('script_path', '/phpBB2/');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('version', '.0.22');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_totally_erc', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cache_erc', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('group_admin_erc', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('group_mod_erc', '1');

# -- Categories
INSERT INTO `phpbb_categories` (`cat_id`, `cat_title`, `cat_order`) VALUES (1, 'Premod\'s', 10);
INSERT INTO `phpbb_categories` (`cat_id`, `cat_title`, `cat_order`) VALUES (2, 'Jeux Arcade', 20);


# -- Forums
INSERT INTO `phpbb_forums` (`forum_id`, `cat_id`, `forum_name`, `forum_desc`, `forum_status`, `forum_order`, `forum_posts`, `forum_topics`, `forum_last_post_id`, `prune_next`, `prune_enable`, `auth_view`, `auth_read`, `auth_post`, `auth_reply`, `auth_edit`, `auth_delete`, `auth_sticky`, `auth_announce`, `auth_vote`, `auth_pollcreate`, `auth_attachments`, `attached_forum_id`, `bbcode_uid`) VALUES (1, 1, 'Presentation', 'Liste des Mod\'s installes', 0, 10, 1, 1, 1, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 3, -1, 'c4fea1cde8');
INSERT INTO `phpbb_forums` (`forum_id`, `cat_id`, `forum_name`, `forum_desc`, `forum_status`, `forum_order`, `forum_posts`, `forum_topics`, `forum_last_post_id`, `prune_next`, `prune_enable`, `auth_view`, `auth_read`, `auth_post`, `auth_reply`, `auth_edit`, `auth_delete`, `auth_sticky`, `auth_announce`, `auth_vote`, `auth_pollcreate`, `auth_attachments`, `attached_forum_id`, `bbcode_uid`) VALUES (2, 2, 'Arcade', '', 0, 10, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0, -1, '17f80b88e2');


# -- Users
INSERT INTO phpbb_users (user_id, username, user_level, user_regdate, user_password, user_email, user_icq, user_website, user_occ, user_from, user_interests, user_sig, user_viewemail, user_style, user_aim, user_yim, user_msnm, user_posts, user_attachsig, user_allowsmile, user_allowhtml, user_allowbbcode, user_allow_pm, user_notify_pm, user_allow_viewonline, user_rank, user_avatar, user_lang, user_timezone, user_dateformat, user_actkey, user_newpasswd, user_notify, user_active) VALUES ( -1, 'Anonymous', 0, 0, '', '', '', '', '', '', '', '', 0, NULL, '', '', '', 0, 0, 1, 1, 1, 0, 1, 1, NULL, '', '', 0, '', '', '', 0, 0);

# -- username: admin    password: admin (change this or remove it once everything is working!)
INSERT INTO phpbb_users (user_id, username, user_level, user_regdate, user_password, user_email, user_icq, user_website, user_occ, user_from, user_interests, user_sig, user_viewemail, user_style, user_aim, user_yim, user_msnm, user_posts, user_attachsig, user_allowsmile, user_allowhtml, user_allowbbcode, user_allow_pm, user_notify_pm, user_popup_pm, user_allow_viewonline, user_rank, user_avatar, user_lang, user_timezone, user_dateformat, user_actkey, user_newpasswd, user_notify, user_active) VALUES ( 2, 'Admin', 1, 0, '21232f297a57a5a743894a0e4a801fc3', 'admin@yourdomain.com', '', '', '', '', '', '', 1, 1, '', '', '', 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, '', 'english', 0, 'd M Y h:i a', '', '', 0, 1);


# -- Ranks
INSERT INTO phpbb_ranks (rank_id, rank_title, rank_min, rank_special, rank_image) VALUES ( 1, 'Site Admin', -1, 1, NULL);


# -- Groups
INSERT INTO phpbb_groups (group_id, group_name, group_description, group_single_user) VALUES (1, 'Anonymous', 'Personal User', 1);
INSERT INTO phpbb_groups (group_id, group_name, group_description, group_single_user) VALUES (2, 'Admin', 'Personal User', 1);


# -- User -> Group
INSERT INTO phpbb_user_group (group_id, user_id, user_pending) VALUES (1, -1, 0);
INSERT INTO phpbb_user_group (group_id, user_id, user_pending) VALUES (2, 2, 0);


# -- Demo Topic
INSERT INTO `phpbb_topics` (`topic_id`, `forum_id`, `topic_title`, `topic_poster`, `topic_time`, `topic_views`, `topic_replies`, `topic_status`, `topic_vote`, `topic_type`, `topic_first_post_id`, `topic_last_post_id`, `topic_moved_id`) VALUES (1, 1, '*** Listing des mod\'s inclus ***', 2, 972086460, 6, 0, 0, 0, 1, 1, 1, 0);


# -- Demo Post
INSERT INTO `phpbb_posts` (`post_id`, `topic_id`, `forum_id`, `poster_id`, `post_time`, `poster_ip`, `post_username`, `enable_bbcode`, `enable_html`, `enable_smilies`, `enable_sig`, `post_edit_time`, `post_edit_count`) VALUES (1, 1, 1, 2, 972086460, '7F000001', '', 1, 0, 1, 0, NULL, 0);
INSERT INTO `phpbb_posts_text` (`post_id`, `bbcode_uid`, `post_subject`, `post_text`) VALUES (1, 'e02e988e49', '*** Listing des mod''s inclus ***', '[align=center:e02e988e49][img:e02e988e49]http://www.chez-clomax.com/ezcom/luckymod/templates/subSilver/images/logo_phpBB.gif[/img:e02e988e49]\r\n\r\n[b:e02e988e49]Merci a toute l''equipe de http://www.ezcom-fr.com et de http://forum.phpbb.biz de m''avoir fait confiance,  \r\nainsi qu''aux createurs des mod''s qui ont fait que  cette premod existe\r\n© http://www.jyl.be/ pour le logo[/b:e02e988e49][/align:e02e988e49]\r\n\r\n[align=center:e02e988e49][b:e02e988e49]Cette premod axée sur les jeux d''arcades comprend les mod''s suivant [/b:e02e988e49][/align:e02e988e49]\r\n\r\n[b:e02e988e49]Cette préMOD est à base de :[/b:e02e988e49]\r\n[quote:e02e988e49][b:e02e988e49][color=red:e02e988e49]Phpbb 2.0.22[/color:e02e988e49][/b:e02e988e49][/quote:e02e988e49]\r\n\r\n[size=18:e02e988e49][color=darkred:e02e988e49][b:e02e988e49]Contenus des modifications :[/b:e02e988e49][/color:e02e988e49][/size:e02e988e49]\r\n\r\n[list:e02e988e49][*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]GfPortal[/b:e02e988e49] [/color:e02e988e49]\r\n[quote:e02e988e49]( + addon activation/ desactivation portail ) [i:e02e988e49](Ce mod installe une version du portail ''Gf-Portail'' sur votre forum phpbb.Cette version de portail est entièrement paramétrable et customisable depuis le panneau d''administration.)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Pseudo sub forum[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49][i:e02e988e49]Mod qui permet la création de sous forum[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Style Under Username [/b:e02e988e49][/color:e02e988e49]\r\n [quote:e02e988e49][i:e02e988e49]\r\n( Affiche le thème utilisé par les utilisateurs et le nombre de personnes, sur le profil et dans les messages .)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Birthday_1.5.7em[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] ( Mod qui affiche la date d''anniversaire + [b:e02e988e49]addon zodiac[/b:e02e988e49] + [b:e02e988e49]Chinese_zodiac[/b:e02e988e49] + [b:e02e988e49]cache[/b:e02e988e49] )[/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Arcade V2[/b:e02e988e49][/color:e02e988e49] \r\n[quote:e02e988e49][i:e02e988e49](Permet d''ajouter des jeux en flash sur votre forum en gérant les différents scores des membres.) [/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Last visit 1.2.8[/b:e02e988e49] [/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49]permet de voir qui a visiter le forum ( + cache )[/i:e02e988e49] [/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]User membres[/b:e02e988e49][/color:e02e988e49] \r\n\r\n[quote:e02e988e49][i:e02e988e49](Ajoute deux liens dans le profil des utilisateurs pour l''admin: Un pour gérer ses permissions l''autre pour changer ses paramètres.)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Admin Userlist[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49][i:e02e988e49] Affiche la liste des membres dans ACP[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Editeur_html_bloc_custom_gfportal[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49](ce mod. ajoute au dessus du textarea dans nouveaux  bloc custom , un lien qui ouvre une popup contenant un éditeur  Html. )[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Quick Reply[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49](Permet aux Utilisateurs d''utiliser le formulaire de Réponse rapide qui est placé au-dessous chaque sujet.)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Offline Fade Avatar[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49][i:e02e988e49](Ce Mod affiche l''avatar de vos membres avec un effet &quot;fade&quot; (transparent à 50%)  quand ceux-ci sont hors-ligne dans les sujets, dans la liste des membres, et dans viewprofil)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Send PM On User Registration[/b:e02e988e49][/color:e02e988e49] \r\n[quote:e02e988e49][i:e02e988e49]( Ce MOD enverra un PM aux nouveaux utilisateurs de bienvenue.)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Sender''s name in PM notification [/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49][i:e02e988e49] (Ce MOD permet, que lorsqu''un mp vous est envoyé, dans le notification par mail soit inclus le nom du posteur.)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]new_bbcodes_FR_1.0.2[/b:e02e988e49][/color:e02e988e49] \r\n[quote:e02e988e49][i:e02e988e49]( - BBCode Scroll/Marquee- BBCode Fade- BBCode Blur- BBCode Flip- BBCode Updown- BBCode Center- BBCode Right- BBCode Strike)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]page_generation_time_FR_v2.0.1[/b:e02e988e49][/color:e02e988e49] \r\n[quote:e02e988e49][i:e02e988e49](Ce MOD affichera les informations de génération de la page dans le pied de page\r\n Exemple: Page générée en : 0.4873s (PHP: 83% - SQL: 17%) - Requêtes SQL : 14 - GZIP activé - Debugage activé)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Zone restriction avancée[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49][i:e02e988e49] (vous permet d''ajouter des restrictions sur des zones de votre forum via le panneau d''administration. Vous pouvez ainsi limiter l''accès aux fonctions de recherche, liste des membres, etc... à une certaine catégorie de personnes (invité, membre, modérateur, etc...)\r\nLes 6 restrictions sont:\r\n- La FAQ - La zone de recherche - La zone de qui est en ligne - Le profil public - La liste des membres - Les groupes)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]BBCode et Smilies dans la description des forums[/b:e02e988e49][/color:e02e988e49] \r\n[quote:e02e988e49][i:e02e988e49](Ce MOD permet d''utiliser le BBCode et les smilies dans la description des forums )[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Cash Mod[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49](Mod Argent permettant aux utilisateurs de gagner de l''argent/des points en postant )[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Points Arcade[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49][i:e02e988e49] (Ce mod vous permet d''utiliser le points system avec le mod arcade)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Arcade Championnat[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49](Ce mod vous permet de proposer un championnat sur tous les jeux du mod arcade )[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Prune users [/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49]( suppression automatique des membres inactifs )[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Gender[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49]( ajoute une icone homme/femme)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Extend rank color[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49](Ce mod vous permet d''ajouter des couleurs dans le who is online et dans la partie utilisateurs connectés en bas de l''index. Vous pouvez créer des types d''utilisteurs via l''ACP. Il vous permet aussi de mettre en couleur vous différents groupes d''utilisateurs sur l''index et le whoisonline, ceci est désactivable depuis l''admin.)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Totally ERC [/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49](Cet addon montre des couleurs supplémentaires sur tout le forum)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Mood[/b:e02e988e49][/color:e02e988e49] [quote:e02e988e49][i:e02e988e49]( Ce mod ajoute l''humeur du moment dans le profil ainsi que dans le topic posté. (9 possibilités au choix) [/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Miniland[/b:e02e988e49][/color:e02e988e49] [quote:e02e988e49][i:e02e988e49]( Ce mod ajoute le drapeaux du pays francophone du membre dans le profil ainsi que dans le topic posté. (5 possibilités au choix)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]File Attachment Mod v2[/b:e02e988e49][/color:e02e988e49] [quote:e02e988e49][i:e02e988e49]( permet d''attacher des pieces jointes)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Garder le mouvement des smileys[/b:e02e988e49][/color:e02e988e49]  [quote:e02e988e49][i:e02e988e49]( Le mod permet aux smileys de ne pas se figer une fois que l''on a cliqué sur l''un d''eux.) [/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Overall Forums Permission[/b:e02e988e49][/color:e02e988e49] [quote:e02e988e49][i:e02e988e49]( Permet de configurer toutes les perms des forums en meme temps )[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Today At/Yesterday At[/b:e02e988e49][/color:e02e988e49] [quote:e02e988e49][i:e02e988e49](Remplace la date d''un sujet en mettant soit &quot;hier&quot;, si le message a été posté la veille, soit &quot;aujourd''hui&quot; si le message a été posté dans la journée)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n\r\n[size=18:e02e988e49][b:e02e988e49][color=#FF0000:e02e988e49]ADDON arcade[/color:e02e988e49][/b:e02e988e49][/size:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49]- [b:e02e988e49]Trophées dans viewtopic[/b:e02e988e49][/color:e02e988e49] \r\n[quote:e02e988e49][i:e02e988e49](Cet addon affiche les coupes que possède le posteur dans le viewtopic.)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49]- [b:e02e988e49]Add-on TopStat Arcade[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49](Il rajoute un entete dans la page arcade contenant des statistiques concernant le mod arcade\r\n il y 3 catégories affichés dans un tableau\r\n1)Infos générales : *Nonbre total de jeux *Nombre total de parties*Nombre de joueurs *Temps totals \r\n2)Infos Top joueur : *Premier au classement victoire (+nombre de victoires) *Pemier au classement championnat (+nombre de points) *Nom et temps du joueur ayant joué le plus de temps *Nom et nombre de partie du joueur ayant joué le plus de partie \r\n3)Vos Stats persos : *Classement par victoire(+nombre de victoire) *Classement championnat(+nombre de points)*Temps total joués *Nombre total de partie jouées )[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49][color=blue:e02e988e49][b:e02e988e49]Arcade Comments System v3.0.4[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49][i:e02e988e49] (Le champion d''un jeu peut saisir un commentaire qui sera visible par chaque personne jouant au jeu. )[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]Add-on Heading Arcade[/b:e02e988e49][/color:e02e988e49]\r\n[quote:e02e988e49] [i:e02e988e49](Le mod est un add-on pour le mod Arcade version. Il rajoute un entete dans la page arcade.)[/i:e02e988e49] [/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]ADD-ON allow pm comments system arcade[/b:e02e988e49][/color:e02e988e49] [quote:e02e988e49][i:e02e988e49]( permet d''activer/desactiver l''envoie de mp lors d''un record battu)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]ADD-ON Arcade Vote[/b:e02e988e49][/color:e02e988e49] [quote:e02e988e49][i:e02e988e49]( Cet addon permet d''ajouter un système de vote sur les jeux.)[/i:e02e988e49][/quote:e02e988e49]\r\n\r\n[*:e02e988e49] [color=blue:e02e988e49][b:e02e988e49]ADD-ON Arcade Game Restriction [/b:e02e988e49][/color:e02e988e49] [quote:e02e988e49][i:e02e988e49]( permet de desider via l''ACP a partir de combien de post le membre aura accés à l''arcade)[/i:e02e988e49][/quote:e02e988e49][/list:u:e02e988e49]\r\n\r\n[size=18:e02e988e49][b:e02e988e49][color=#FF0000:e02e988e49]Blocs supplementraires[/color:e02e988e49][/b:e02e988e49][/size:e02e988e49]\r\n\r\n[quote:e02e988e49][list:e02e988e49] [*:e02e988e49] [b:e02e988e49]last Visit[/b:e02e988e49]\r\n[*:e02e988e49] [b:e02e988e49]Birthday[/b:e02e988e49]\r\n[*:e02e988e49] [b:e02e988e49]Bloc navigation[/b:e02e988e49] &quot; arrangements personnel &quot; ...\r\n[*:e02e988e49] [b:e02e988e49]Toparcade[/list:u:e02e988e49][/b:e02e988e49][/quote:e02e988e49]\r\n\r\n[align=center:e02e988e49][b:e02e988e49][size=18:e02e988e49][color=#008000:e02e988e49]Téléchargement et Support officiel\r\n [/color:e02e988e49][color=#FF0000:e02e988e49]UNIQUEMENT[/color:e02e988e49] \r\nsur\r\n [url=http://www.ezcom-fr.com]EZcom-fr.com[/size:e02e988e49][/b:e02e988e49]\r\n[/url][/align:e02e988e49]');
# -- Themes
INSERT INTO phpbb_themes (themes_id, template_name, style_name, head_stylesheet, body_background, body_bgcolor, body_text, body_link, body_vlink, body_alink, body_hlink, tr_color1, tr_color2, tr_color3, tr_class1, tr_class2, tr_class3, th_color1, th_color2, th_color3, th_class1, th_class2, th_class3, td_color1, td_color2, td_color3, td_class1, td_class2, td_class3, fontface1, fontface2, fontface3, fontsize1, fontsize2, fontsize3, fontcolor1, fontcolor2, fontcolor3, span_class1, span_class2, span_class3) VALUES (1, 'subSilver', 'subSilver', 'subSilver.css', '', 'E5E5E5', '000000', '006699', '5493B4', '', 'DD6900', 'EFEFEF', 'DEE3E7', 'D1D7DC', '', '', '', '98AAB1', '006699', 'FFFFFF', 'cellpic1.gif', 'cellpic3.gif', 'cellpic2.jpg', 'FAFAFA', 'FFFFFF', '', 'row1', 'row2', '', 'Verdana, Arial, Helvetica, sans-serif', 'Trebuchet MS', 'Courier, \'Courier New\', sans-serif', 10, 11, 12, '444444', '006600', 'FFA34F', '', '', '');

INSERT INTO phpbb_themes_name (themes_id, tr_color1_name, tr_color2_name, tr_color3_name, tr_class1_name, tr_class2_name, tr_class3_name, th_color1_name, th_color2_name, th_color3_name, th_class1_name, th_class2_name, th_class3_name, td_color1_name, td_color2_name, td_color3_name, td_class1_name, td_class2_name, td_class3_name, fontface1_name, fontface2_name, fontface3_name, fontsize1_name, fontsize2_name, fontsize3_name, fontcolor1_name, fontcolor2_name, fontcolor3_name, span_class1_name, span_class2_name, span_class3_name) VALUES (1, 'The lightest row colour', 'The medium row color', 'The darkest row colour', '', '', '', 'Border round the whole page', 'Outer table border', 'Inner table border', 'Silver gradient picture', 'Blue gradient picture', 'Fade-out gradient on index', 'Background for quote boxes', 'All white areas', '', 'Background for topic posts', '2nd background for topic posts', '', 'Main fonts', 'Additional topic title font', 'Form fonts', 'Smallest font size', 'Medium font size', 'Normal font size (post body etc)', 'Quote & copyright text', 'Code text colour', 'Main table header text colour', '', '', '');


# -- Smilies
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 1, ':D', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 2, ':-D', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 3, ':grin:', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 4, ':)', 'icon_smile.gif', 'Smile');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 5, ':-)', 'icon_smile.gif', 'Smile');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 6, ':smile:', 'icon_smile.gif', 'Smile');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 7, ':(', 'icon_sad.gif', 'Sad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 8, ':-(', 'icon_sad.gif', 'Sad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 9, ':sad:', 'icon_sad.gif', 'Sad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 10, ':o', 'icon_surprised.gif', 'Surprised');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 11, ':-o', 'icon_surprised.gif', 'Surprised');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 12, ':eek:', 'icon_surprised.gif', 'Surprised');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 13, ':shock:', 'icon_eek.gif', 'Shocked');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 14, ':?', 'icon_confused.gif', 'Confused');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 15, ':-?', 'icon_confused.gif', 'Confused');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 16, ':???:', 'icon_confused.gif', 'Confused');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 17, '8)', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 18, '8-)', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 19, ':cool:', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 20, ':lol:', 'icon_lol.gif', 'Laughing');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 21, ':x', 'icon_mad.gif', 'Mad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 22, ':-x', 'icon_mad.gif', 'Mad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 23, ':mad:', 'icon_mad.gif', 'Mad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 24, ':P', 'icon_razz.gif', 'Razz');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 25, ':-P', 'icon_razz.gif', 'Razz');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 26, ':razz:', 'icon_razz.gif', 'Razz');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 27, ':oops:', 'icon_redface.gif', 'Embarassed');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 28, ':cry:', 'icon_cry.gif', 'Crying or Very sad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 29, ':evil:', 'icon_evil.gif', 'Evil or Very Mad');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 30, ':twisted:', 'icon_twisted.gif', 'Twisted Evil');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 31, ':roll:', 'icon_rolleyes.gif', 'Rolling Eyes');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 32, ':wink:', 'icon_wink.gif', 'Wink');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 33, ';)', 'icon_wink.gif', 'Wink');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 34, ';-)', 'icon_wink.gif', 'Wink');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 35, ':!:', 'icon_exclaim.gif', 'Exclamation');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 36, ':?:', 'icon_question.gif', 'Question');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 37, ':idea:', 'icon_idea.gif', 'Idea');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 38, ':arrow:', 'icon_arrow.gif', 'Arrow');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 39, ':|', 'icon_neutral.gif', 'Neutral');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 40, ':-|', 'icon_neutral.gif', 'Neutral');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 41, ':neutral:', 'icon_neutral.gif', 'Neutral');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 42, ':mrgreen:', 'icon_mrgreen.gif', 'Mr. Green');

# -- ajout premod
INSERT INTO phpbb_config (config_name, config_value) VALUES ('version1', '<a href="http://www.ezcom-fr.com">LuckyMod v 1.7.7</a>');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('hidde_last_logon', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('birthday_cache', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('lastvisit_cache', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('activeportail','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ("birthday_required", "0");
INSERT INTO phpbb_config (config_name, config_value) VALUES ('birthday_greeting', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_user_age', '100');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('min_user_age', '5');  
INSERT INTO phpbb_config (config_name, config_value) VALUES ('birthday_check_day', '7');

INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('welcome_text', 'Bienvenue sur la version de portail : <b>Gf-Portail</b>.<br/>Vous pouvez changer ce message dans la configuration générale du portail.<br/>Ce portail est entièrement <b>paramétrable</b> depuis l\'ACP.<br/>J\'espère qu\'il vous plaîra.<br/><i>Giefca</i>');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('number_of_news', '4');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('news_length', '200');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('news_forum', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('poll_id', '');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('forum_header', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('space_row', '3');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('space_col', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col1_size', '20');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col1_unit', 'percent');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col2_size', '60');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col2_unit', 'percent');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col3_size', '20');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('col3_unit', 'percent');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('bodyline', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('head_out_bodyline', '0');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('foot_out_bodyline', '0');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('simple_welcome', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('number_recent_topics', '10');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scrolling_topics', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scroll_height', '200');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scroll_up', '1');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scroll_delay', '100');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES ('scroll_step', '2');
INSERT INTO phpbb_portal (portal_name, portal_value) VALUES('default_struct', '1') ;

INSERT INTO `phpbb_portal_links` (`link_id`, `link_url`, `link_text`, `link_img`, `link_imgwidth`, `link_imgheight`, `link_active`) VALUES (3, 'http://www.ezcom-fr.com/index.php', '', 'images/mini1.gif', '', '', 1);
INSERT INTO `phpbb_portal_links` (`link_id`, `link_url`, `link_text`, `link_img`, `link_imgwidth`, `link_imgheight`, `link_active`) VALUES (4, 'http://forum.phpbb.biz/index.php', '', 'images/banner_phpbbbiz.png', '', '', 1);

INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (1, 'bienvenue', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (2, 'liens', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (3, 'login', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (4, 'navigation', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (5, 'news', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (6, 'sondage', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (7, 'statistiques', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (8, 'welcome', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (9, 'whoisonline', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (10, 'entete', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (11, 'change_style', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (12, 'recent_topics', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (13, 'birthday', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (14, 'championnat', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (15, 'lastvisite', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (16, 'toparcade', 0, 0, 0, '', '');
INSERT INTO `phpbb_portal_mod` (`mod_id`, `mod_name`, `mod_auth`, `mod_type`, `mod_table`, `mod_title`, `mod_source`) VALUES (17, 'arcade_online', 0, 0, 0, '', '');

INSERT INTO phpbb_portal_page (page_id, page_desc) VALUES(1, 'page principale');

INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (1, 1, 1, 2, 1);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (2, 1, 2, 1, 2);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (3, 1, 3, 3, 2);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (4, 1, 4, 1, 1);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (5, 1, 5, 2, 2);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (6, 1, 6, 1, 4);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (7, 1, 7, 1, 3);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (8, 1, 8, 3, 1);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (9, 1, 9, 3, 9);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (10, 1, 10, 0, 1);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (11, 1, 11, 1, 7);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (12, 1, 12, 3, 8);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (13, 1, 13, 1, 5);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (14, 1, 14, 2, 3);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (15, 1, 16, 3, 10);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (16, 1, 15, 1, 6);
INSERT INTO `phpbb_portal_struct` (`struct_id`, `page_id`, `mod_id`, `struct_col`, `struct_order`) VALUES (19, 1, 17, 0, 3);

INSERT INTO phpbb_arcade_categories(  arcade_catid,  arcade_cattitle,  arcade_catorder  )
VALUES ( 1,  'Les jeux du forums', 1  );

INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_category_mod','1');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('category_preview_games','2');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('games_par_page','10');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('game_order','Fixed');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('display_winner_avatar','1');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('stat_par_page','10');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('winner_avatar_position','left');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('maxsize_avatar','200');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('linkcat_align','2');

INSERT INTO `phpbb_zone_restriction` VALUES (1, 'FAQ', -1);
INSERT INTO `phpbb_zone_restriction` VALUES (2, 'Recherche', -1);
INSERT INTO `phpbb_zone_restriction` VALUES (3, 'Groupes', -1);
INSERT INTO `phpbb_zone_restriction` VALUES (4, 'Profil_public', -1);
INSERT INTO `phpbb_zone_restriction` VALUES (5, 'Liste_des_membres', -1);
INSERT INTO `phpbb_zone_restriction` VALUES (6, 'Qui_est_en_ligne', -1);

INSERT INTO phpbb_arcade values('championnat_points_one','10');
INSERT INTO phpbb_arcade values('championnat_points_two','6');
INSERT INTO phpbb_arcade values('championnat_points_three','3');
INSERT INTO phpbb_arcade values('championnat_points_four','2');
INSERT INTO phpbb_arcade values('championnat_points_five','1');
INSERT INTO phpbb_arcade values('use_cagnotte_mod','0');
INSERT INTO phpbb_arcade values('use_points_cagnotte','0');
INSERT INTO phpbb_arcade values('cagnotte','0');
INSERT INTO phpbb_arcade values('championnat_cat','');
INSERT INTO phpbb_arcade values('championnat_taux_un','40');
INSERT INTO phpbb_arcade values('championnat_taux_deux','20');
INSERT INTO phpbb_arcade values('championnat_taux_trois','10');
INSERT INTO phpbb_arcade values('championnat_taux_quatre','9');
INSERT INTO phpbb_arcade values('championnat_taux_cinq','6');
INSERT INTO phpbb_arcade values('championnat_taux_six','5');
INSERT INTO phpbb_arcade values('championnat_taux_sept','4');
INSERT INTO phpbb_arcade values('championnat_taux_huit','3');
INSERT INTO phpbb_arcade values('championnat_taux_neuf','2');
INSERT INTO phpbb_arcade values('championnat_taux_dix','1');
INSERT INTO phpbb_arcade values('cat_use','0');
INSERT INTO phpbb_arcade values('day_distrib','0');
INSERT INTO phpbb_arcade values('date_distribcagnotte','0');
INSERT INTO phpbb_arcade values('use_auto_distrib','0');
INSERT INTO phpbb_arcade values('championnat_use','1');

INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_disable',0);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_display_after_posts',1);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_post_message','Vous avez gagné %s pour ce post');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_disable_spam_num',10);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_disable_spam_time',24);
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_disable_spam_message','Vous avez excédé la quantité de post et ne gagnerez rien pour votre post');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_installed','yes');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_version','2.2.3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_adminbig','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cash_adminnavbar','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('points_name','Points');

INSERT INTO `phpbb_whosonline_ranks` VALUES (1, 'Test', 'red', 0, 10);
INSERT INTO `phpbb_config` VALUES ('allow_group_index', '0');

INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_mod','0'); 
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_pay_mod','0'); 
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_win_mod','0'); 
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_pay_charging','0'); 
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('use_points_pay_submit','0'); 
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('points_winner','0'); 
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES('points_pay','0');

INSERT INTO `phpbb_cash` (`cash_id`, `cash_order`, `cash_settings`, `cash_dbfield`, `cash_name`, `cash_default`, `cash_decimals`, `cash_imageurl`, `cash_exchange`, `cash_perpost`, `cash_postbonus`, `cash_perreply`, `cash_maxearn`, `cash_perpm`, `cash_perchar`, `cash_allowance`, `cash_allowanceamount`, `cash_allowancetime`, `cash_allowancenext`, `cash_forumlist`) VALUES (1, 1, 3313, 'user_points', 'Lucky', 100, 0, '', 1, 25, 2, 25, 75, 0, 20, 0, 0, 2, 0, '');

INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_autologin','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_autologin_time','0');

UPDATE phpbb_themes SET erc_admincolor = 'FFA34F';
UPDATE phpbb_themes SET erc_modcolor = '006600';
UPDATE phpbb_themes SET erc_usercolor = '006699';

INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_login_attempts', '5'); 
INSERT INTO phpbb_config (config_name, config_value) VALUES ('login_reset_time', '30');
ALTER TABLE `phpbb_users` ADD `user_pmarcade` TINYINT( 1 ) DEFAULT '1' NOT NULL ;

#
# Basic DB data for Attachment Mod
#
# $Id: attach_mysql_basic.sql,v 1.4 2006/04/22 16:21:09 acydburn Exp $
# 

# -- attachments_config
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('upload_dir','files');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('upload_img','images/icon_clip.gif');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('topic_icon','images/icon_clip.gif');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('display_order','0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_filesize','262144');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attachment_quota','52428800');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_filesize_pm','262144');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_attachments','3');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_attachments_pm','1');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('disable_mod','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('allow_pm_attach','1');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attachment_topic_review','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('allow_ftp_upload','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('show_apcp','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attach_version','2.4.3');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('default_upload_quota', '0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('default_pm_quota', '0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_server','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_path','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('download_path','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_user','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_pass','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_pasv_mode','1');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_display_inlined','1');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_max_width','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_max_height','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_link_width','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_link_height','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_create_thumbnail','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_min_thumb_filesize','12000');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_imagick', '');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('use_gd2','0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('wma_autoplay','0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('flash_autoplay','0');

# -- forbidden_extensions
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (1,'php');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (2,'php3');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (3,'php4');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (4,'phtml');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (5,'pl');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (6,'asp');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (7,'cgi');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (8,'php5');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (9,'php6'); 

# -- extension_groups
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (1,'Images',1,1,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (2,'Archives',0,1,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (3,'Plain Text',0,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (4,'Documents',0,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (5,'Real Media',0,0,2,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (6,'Streams',2,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (7,'Flash Files',3,0,1,'',0,'');

# -- extensions
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (1, 1,'gif', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (2, 1,'png', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (3, 1,'jpeg', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (4, 1,'jpg', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (5, 1,'tif', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (6, 1,'tga', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (7, 2,'gtar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (8, 2,'gz', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (9, 2,'tar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (10, 2,'zip', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (11, 2,'rar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (12, 2,'ace', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (13, 3,'txt', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (14, 3,'c', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (15, 3,'h', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (16, 3,'cpp', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (17, 3,'hpp', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (18, 3,'diz', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (19, 4,'xls', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (20, 4,'doc', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (21, 4,'dot', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (22, 4,'pdf', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (23, 4,'ai', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (24, 4,'ps', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (25, 4,'ppt', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (26, 5,'rm', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (27, 6,'wma', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (28, 7,'swf', '');

# -- default quota limits
INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (1, 'Low', 262144);
INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (2, 'Medium', 2097152);
INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (3, 'High', 5242880);

ALTER TABLE phpbb_forums ADD auth_download TINYINT(2) DEFAULT '0' NOT NULL;  
ALTER TABLE phpbb_auth_access ADD auth_download TINYINT(1) DEFAULT '0' NOT NULL;  
ALTER TABLE phpbb_posts ADD post_attachment TINYINT(1) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_topics ADD topic_attachment TINYINT(1) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_privmsgs ADD privmsgs_attachment TINYINT(1) DEFAULT '0' NOT NULL;

INSERT INTO `phpbb_config` VALUES ('reason', 'votre raison'); 

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_cost', '1');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_ticktype', 'single');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_length', '500000');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_name', 'Lottery');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_base', '50');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_start', '0');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_reset', '0');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_status', '0');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_items', '0');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_win_items', '');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_show_entries', '0');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_mb', '0');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_mb_amount', '1');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_history', '1');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_currency', '');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_item_mcost', '1');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_item_xcost', '500');

INSERT INTO `phpbb_config` (config_name, config_value) VALUES ('lottery_random_shop', '');

#
# -- bbc box config
#

INSERT INTO phpbb_bbc_box VALUES (1, 'strike', '1', '0', 's', 's', 'strike', 'strike', '0', '10');
INSERT INTO phpbb_bbc_box VALUES (2, 'spoiler', '1', '0', 'spoil', 'spoil', 'spoiler', 'spoiler', '0', '20');
INSERT INTO phpbb_bbc_box VALUES (3, 'fade', '1', '0', 'fade', 'fade', 'fade', 'fade', '0', '30');
INSERT INTO phpbb_bbc_box VALUES (4, 'rainbow', '1', '0', 'rainbow', 'rainbow', 'rainbow', 'rainbow', '1', '40');
INSERT INTO phpbb_bbc_box VALUES (5, 'justify', '1', '0', 'align=justify', 'align', 'justify', 'justify', '0', '50');
INSERT INTO phpbb_bbc_box VALUES (6, 'right', '1', '0', 'align=right', 'align', 'right', 'right', '0', '60');
INSERT INTO phpbb_bbc_box VALUES (7, 'center', '1', '0', 'align=center', 'align', 'center', 'center', '0', '70');
INSERT INTO phpbb_bbc_box VALUES (8, 'left', '1', '0', 'align=left', 'align', 'left', 'left', '1', '80');
INSERT INTO phpbb_bbc_box VALUES (9, 'link', '1', '0', 'link=', 'link', 'link', 'alink', '0', '90');
INSERT INTO phpbb_bbc_box VALUES (10, 'target', '1', '0', 'target=', 'target', 'target', 'atarget', '1', '100');
INSERT INTO phpbb_bbc_box VALUES (11, 'marqd', '1', '0', 'marq=down', 'marq', 'marqd', 'marqd', '0', '110');
INSERT INTO phpbb_bbc_box VALUES (12, 'marqu', '1', '0', 'marq=up', 'marq', 'marqu', 'marqu', '0', '120');
INSERT INTO phpbb_bbc_box VALUES (13, 'marql', '1', '0', 'marq=left', 'marq', 'marql', 'marql', '0', '130');
INSERT INTO phpbb_bbc_box VALUES (14, 'marqr', '1', '0', 'marq=right', 'marq', 'marqr', 'marqr', '1', '140');
INSERT INTO phpbb_bbc_box VALUES (15, 'email', '1', '0', 'email', 'email', 'email', 'email', '0', '150');
INSERT INTO phpbb_bbc_box VALUES (16, 'flash', '1', '0', 'flash width=250 height=250', 'flash', 'flash', 'flash', '0', '160');
INSERT INTO phpbb_bbc_box VALUES (17, 'video', '1', '0', 'video width=400 height=350', 'video', 'video', 'video', '0', '170');
INSERT INTO phpbb_bbc_box VALUES (18, 'stream', '1', '0', 'stream', 'stream', 'stream', 'stream', '0', '180');
INSERT INTO phpbb_bbc_box VALUES (19, 'real', '1', '0', 'ram width=220 height=140', 'ram', 'real', 'real', '0', '190');
INSERT INTO phpbb_bbc_box VALUES (20, 'quick', '1', '0', 'quick width=480 height=224', 'quick', 'quick', 'quick', '1', '200');
INSERT INTO phpbb_bbc_box VALUES (21, 'sup', '1', '0', 'sup', 'sup', 'sup', 'sup', '0', '210');
INSERT INTO phpbb_bbc_box VALUES (22, 'sub', '1', '0', 'sub', 'sub', 'sub', 'sub', '1', '220');

#
#-----[ SQL ]-------------------------------------------------
#
# -- config
#

INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_box_on', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_advanced', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_per_row', '14');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_time_regen', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_style_path', 'default');


#
#-----[ arcade_cheater_tracker ]------------------------------------------
#

INSERT INTO `phpbb_arcade` VALUES ('games_time_tolerance', '10');
INSERT INTO `phpbb_arcade` VALUES ('games_cheater_submit', '1');
ALTER TABLE `phpbb_games` ADD `game_cheat_control` TINYINT(1) DEFAULT '0' NOT NULL ;


#
#------[ arcade favoris ]----------------------------------------------------
#

INSERT INTO `phpbb_arcade` ( `arcade_name` , `arcade_value` ) 
VALUES (
'use_fav_category', '1'
);
INSERT INTO `phpbb_arcade` ( `arcade_name` , `arcade_value` ) 
VALUES (
'nbr_games_fav', '-1'
);
INSERT INTO `phpbb_arcade` ( `arcade_name` , `arcade_value` ) 
VALUES (
'use_hide_fav', '1'
);
INSERT INTO `phpbb_arcade` ( `arcade_name` , `arcade_value` ) 
VALUES (
'fav_nbr_in_page', '10'
);

#
#------[ Arcade Game Restriction ]----------------------------------------------------
#

INSERT INTO `phpbb_arcade` VALUES ('limit_by_posts', '0'); 
INSERT INTO `phpbb_arcade` VALUES ('limit_type', 'date'); 
INSERT INTO `phpbb_arcade` VALUES ('posts_needed', '15'); 
INSERT INTO `phpbb_arcade` VALUES ('days_limit', '4'); 

#
#------[Arcade Vote ]-------------------------------------------------
#

INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES ('rating_max', '10');
INSERT INTO phpbb_arcade (arcade_name, arcade_value) VALUES ('use_arcade_vote', '1');