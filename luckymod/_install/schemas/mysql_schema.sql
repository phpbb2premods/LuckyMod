#
# phpBB2 - MySQL schema
-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_arcade`
-- 

CREATE TABLE `phpbb_arcade` (
  `arcade_name` varchar(255) NOT NULL default '',
  `arcade_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`arcade_name`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_arcade_categories`
-- 

CREATE TABLE `phpbb_arcade_categories` (
  `arcade_catid` mediumint(8) unsigned NOT NULL auto_increment,
  `arcade_cattitle` varchar(100) NOT NULL default '',
  `arcade_nbelmt` mediumint(8) unsigned NOT NULL default '0',
  `arcade_catorder` mediumint(8) unsigned NOT NULL default '0',
  `arcade_catauth` tinyint(2) NOT NULL default '0',
  KEY `arcade_catid` (`arcade_catid`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_auth_access`
-- 

CREATE TABLE `phpbb_auth_access` (
  `group_id` mediumint(8) NOT NULL default '0',
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `auth_view` tinyint(1) NOT NULL default '0',
  `auth_read` tinyint(1) NOT NULL default '0',
  `auth_post` tinyint(1) NOT NULL default '0',
  `auth_reply` tinyint(1) NOT NULL default '0',
  `auth_edit` tinyint(1) NOT NULL default '0',
  `auth_delete` tinyint(1) NOT NULL default '0',
  `auth_sticky` tinyint(1) NOT NULL default '0',
  `auth_announce` tinyint(1) NOT NULL default '0',
  `auth_vote` tinyint(1) NOT NULL default '0',
  `auth_pollcreate` tinyint(1) NOT NULL default '0',
  `auth_attachments` tinyint(1) NOT NULL default '0',
  `auth_mod` tinyint(1) NOT NULL default '0',
  KEY `group_id` (`group_id`),
  KEY `forum_id` (`forum_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_auth_arcade_access`
-- 

CREATE TABLE `phpbb_auth_arcade_access` (
  `group_id` mediumint(8) NOT NULL default '0',
  `arcade_catid` mediumint(8) unsigned NOT NULL default '0',
  KEY `group_id` (`group_id`),
  KEY `arcade_catid` (`arcade_catid`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_banlist`
-- 

CREATE TABLE `phpbb_banlist` (
  `ban_id` mediumint(8) unsigned NOT NULL auto_increment,
  `ban_userid` mediumint(8) NOT NULL default '0',
  `ban_ip` varchar(8) NOT NULL default '',
  `ban_email` varchar(255) default NULL,
  PRIMARY KEY  (`ban_id`),
  KEY `ban_ip_user_id` (`ban_ip`,`ban_userid`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_categories`
-- 

CREATE TABLE `phpbb_categories` (
  `cat_id` mediumint(8) unsigned NOT NULL auto_increment,
  `cat_title` varchar(100) default NULL,
  `cat_order` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_order` (`cat_order`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_config`
-- 

CREATE TABLE `phpbb_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_confirm`
-- 

CREATE TABLE `phpbb_confirm` (
  `confirm_id` char(32) NOT NULL default '',
  `session_id` char(32) NOT NULL default '',
  `code` char(6) NOT NULL default '',
  PRIMARY KEY  (`session_id`,`confirm_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_disallow`
-- 

CREATE TABLE `phpbb_disallow` (
  `disallow_id` mediumint(8) unsigned NOT NULL auto_increment,
  `disallow_username` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`disallow_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_forum_prune`
-- 

CREATE TABLE `phpbb_forum_prune` (
  `prune_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `prune_days` smallint(5) unsigned NOT NULL default '0',
  `prune_freq` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`prune_id`),
  KEY `forum_id` (`forum_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_forums`
-- 

CREATE TABLE `phpbb_forums` (
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `cat_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_name` varchar(150) default NULL,
  `forum_desc` text,
  `forum_status` tinyint(4) NOT NULL default '0',
  `forum_order` mediumint(8) unsigned NOT NULL default '1',
  `forum_posts` mediumint(8) unsigned NOT NULL default '0',
  `forum_topics` mediumint(8) unsigned NOT NULL default '0',
  `forum_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `prune_next` int(11) default NULL,
  `prune_enable` tinyint(1) NOT NULL default '0',
  `auth_view` tinyint(2) NOT NULL default '0',
  `auth_read` tinyint(2) NOT NULL default '0',
  `auth_post` tinyint(2) NOT NULL default '0',
  `auth_reply` tinyint(2) NOT NULL default '0',
  `auth_edit` tinyint(2) NOT NULL default '0',
  `auth_delete` tinyint(2) NOT NULL default '0',
  `auth_sticky` tinyint(2) NOT NULL default '0',
  `auth_announce` tinyint(2) NOT NULL default '0',
  `auth_vote` tinyint(2) NOT NULL default '0',
  `auth_pollcreate` tinyint(2) NOT NULL default '0',
  `auth_attachments` tinyint(2) NOT NULL default '0',
  `attached_forum_id` mediumint(8) NOT NULL default '-1',
  `bbcode_uid` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`forum_id`),
  KEY `forums_order` (`forum_order`),
  KEY `cat_id` (`cat_id`),
  KEY `forum_last_post_id` (`forum_last_post_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_gamehash`
-- 

CREATE TABLE `phpbb_gamehash` (
  `gamehash_id` char(32) NOT NULL default '',
  `game_id` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `hash_date` int(11) NOT NULL default '0'
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_games`
-- 

CREATE TABLE `phpbb_games` (
  `game_id` mediumint(8) NOT NULL auto_increment,
  `game_pic` varchar(50) NOT NULL default '',
  `game_desc` varchar(255) NOT NULL default '',
  `game_highscore` int(11) NOT NULL default '0',
  `game_highdate` int(11) NOT NULL default '0',
  `game_highuser` mediumint(8) NOT NULL default '0',
  `game_name` varchar(50) NOT NULL default '',
  `game_swf` varchar(50) NOT NULL default '',
  `game_scorevar` varchar(20) NOT NULL default '',
  `game_type` tinyint(4) NOT NULL default '0',
  `game_width` mediumint(5) NOT NULL default '550',
  `game_height` varchar(5) NOT NULL default '380',
  `game_order` mediumint(8) NOT NULL default '0',
  `game_set` mediumint(8) NOT NULL default '0',
  `arcade_catid` mediumint(8) unsigned NOT NULL default '1',
  KEY `game_id` (`game_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_groups`
-- 

CREATE TABLE `phpbb_groups` (
  `group_id` mediumint(8) NOT NULL auto_increment,
  `group_type` tinyint(4) NOT NULL default '1',
  `group_name` varchar(40) NOT NULL default '',
  `group_description` varchar(255) NOT NULL default '',
  `group_moderator` mediumint(8) NOT NULL default '0',
  `group_single_user` tinyint(1) NOT NULL default '1',
  `group_color` smallint(8) NOT NULL default '0',
  PRIMARY KEY  (`group_id`),
  KEY `group_single_user` (`group_single_user`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_hackgame`
-- 

CREATE TABLE `phpbb_hackgame` (
  `user_id` mediumint(8) NOT NULL default '0',
  `game_id` mediumint(8) NOT NULL default '0',
  `date_hack` int(11) NOT NULL default '0'
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_newshr_config`
-- 

CREATE TABLE `phpbb_newshr_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_portal`
-- 

CREATE TABLE `phpbb_portal` (
  `portal_name` varchar(255) NOT NULL default '',
  `portal_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`portal_name`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_portal_links`
-- 

CREATE TABLE `phpbb_portal_links` (
  `link_id` mediumint(8) NOT NULL auto_increment,
  `link_url` varchar(100) NOT NULL default '',
  `link_text` varchar(100) NOT NULL default '',
  `link_img` varchar(100) NOT NULL default '',
  `link_imgwidth` varchar(4) NOT NULL default '',
  `link_imgheight` varchar(4) NOT NULL default '',
  `link_active` tinyint(1) NOT NULL default '0',
  UNIQUE KEY `link_id` (`link_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_portal_mod`
-- 

CREATE TABLE `phpbb_portal_mod` (
  `mod_id` mediumint(11) NOT NULL auto_increment,
  `mod_name` varchar(100) NOT NULL default '',
  `mod_auth` tinyint(1) unsigned NOT NULL default '0',
  `mod_type` tinyint(1) NOT NULL default '0',
  `mod_table` tinyint(1) NOT NULL default '0',
  `mod_title` varchar(100) NOT NULL default '',
  `mod_source` text NOT NULL,
  KEY `mod_id` (`mod_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_portal_page`
-- 

CREATE TABLE `phpbb_portal_page` (
  `page_id` mediumint(8) NOT NULL auto_increment,
  `page_desc` varchar(100) NOT NULL default '',
  `page_defaultsize` tinyint(1) NOT NULL default '1',
  `page_col1width` varchar(10) NOT NULL default '',
  `page_col1unit` varchar(10) NOT NULL default '',
  `page_col2width` varchar(10) NOT NULL default '',
  `page_col2unit` varchar(10) NOT NULL default '',
  `page_col3width` varchar(10) NOT NULL default '',
  `page_col3unit` varchar(10) NOT NULL default '',
  KEY `page_id` (`page_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_portal_struct`
-- 

CREATE TABLE `phpbb_portal_struct` (
  `struct_id` mediumint(11) NOT NULL auto_increment,
  `page_id` mediumint(8) NOT NULL default '0',
  `mod_id` mediumint(11) NOT NULL default '0',
  `struct_col` tinyint(1) NOT NULL default '0',
  `struct_order` mediumint(8) NOT NULL default '0',
  KEY `struct_id` (`struct_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_portal_welcome`
-- 

CREATE TABLE `phpbb_portal_welcome` (
  `welcome_msg` text NOT NULL,
  `bbcode_uid` varchar(10) NOT NULL default ''
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_posts`
-- 

CREATE TABLE `phpbb_posts` (
  `post_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `poster_id` mediumint(8) NOT NULL default '0',
  `post_time` int(11) NOT NULL default '0',
  `poster_ip` varchar(8) NOT NULL default '',
  `post_username` varchar(25) default NULL,
  `enable_bbcode` tinyint(1) NOT NULL default '1',
  `enable_html` tinyint(1) NOT NULL default '0',
  `enable_smilies` tinyint(1) NOT NULL default '1',
  `enable_sig` tinyint(1) NOT NULL default '1',
  `post_edit_time` int(11) default NULL,
  `post_edit_count` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `post_time` (`post_time`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_posts_text`
-- 

CREATE TABLE `phpbb_posts_text` (
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `bbcode_uid` varchar(10) NOT NULL default '',
  `post_subject` varchar(60) default NULL,
  `post_text` text,
  PRIMARY KEY  (`post_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_privmsgs`
-- 

CREATE TABLE `phpbb_privmsgs` (
  `privmsgs_id` mediumint(8) unsigned NOT NULL auto_increment,
  `privmsgs_type` tinyint(4) NOT NULL default '0',
  `privmsgs_subject` varchar(255) NOT NULL default '0',
  `privmsgs_from_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_to_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_date` int(11) NOT NULL default '0',
  `privmsgs_ip` varchar(8) NOT NULL default '',
  `privmsgs_enable_bbcode` tinyint(1) NOT NULL default '1',
  `privmsgs_enable_html` tinyint(1) NOT NULL default '0',
  `privmsgs_enable_smilies` tinyint(1) NOT NULL default '1',
  `privmsgs_attach_sig` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`privmsgs_id`),
  KEY `privmsgs_from_userid` (`privmsgs_from_userid`),
  KEY `privmsgs_to_userid` (`privmsgs_to_userid`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_privmsgs_text`
-- 

CREATE TABLE `phpbb_privmsgs_text` (
  `privmsgs_text_id` mediumint(8) unsigned NOT NULL default '0',
  `privmsgs_bbcode_uid` varchar(10) NOT NULL default '0',
  `privmsgs_text` text,
  PRIMARY KEY  (`privmsgs_text_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_ranks`
-- 

CREATE TABLE `phpbb_ranks` (
  `rank_id` smallint(5) unsigned NOT NULL auto_increment,
  `rank_title` varchar(50) NOT NULL default '',
  `rank_min` mediumint(8) NOT NULL default '0',
  `rank_special` tinyint(1) default '0',
  `rank_image` varchar(255) default NULL,
  PRIMARY KEY  (`rank_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_scores`
-- 

CREATE TABLE `phpbb_scores` (
  `game_id` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `score_game` int(11) NOT NULL default '0',
  `score_date` int(11) NOT NULL default '0',
  `score_time` int(11) NOT NULL default '0',
  `score_set` mediumint(8) NOT NULL default '0',
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`),
  KEY `game_id_2` (`game_id`),
  KEY `user_id_2` (`user_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_search_results`
-- 

CREATE TABLE phpbb_search_results (
  search_id int(11) UNSIGNED NOT NULL default '0',
  session_id char(32) NOT NULL default '',
  search_time int(11) DEFAULT '0' NOT NULL,
  search_array text NOT NULL,
  PRIMARY KEY  (search_id),
  KEY session_id (session_id)
);


-- --------------------------------------------------------

# --------------------------------------------------------
#
# Table structure for table `phpbb_search_wordlist`
#
CREATE TABLE phpbb_search_wordlist (
  word_text varchar(50) binary NOT NULL default '',
  word_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  word_common tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY (word_text),
  KEY word_id (word_id)
);

# --------------------------------------------------------
#
# Table structure for table `phpbb_search_wordmatch`
#
CREATE TABLE phpbb_search_wordmatch (
  post_id mediumint(8) UNSIGNED NOT NULL default '0',
  word_id mediumint(8) UNSIGNED NOT NULL default '0',
  title_match tinyint(1) NOT NULL default '0',
  KEY post_id (post_id),
  KEY word_id (word_id)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_sessions`
-- 

CREATE TABLE `phpbb_sessions` (
  `session_id` char(32) NOT NULL default '',
  `session_user_id` mediumint(8) NOT NULL default '0',
  `session_start` int(11) NOT NULL default '0',
  `session_time` int(11) NOT NULL default '0',
  `session_ip` char(8) NOT NULL default '0',
  `session_page` int(11) NOT NULL default '0',
  `session_logged_in` tinyint(1) NOT NULL default '0',
  `session_admin` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`session_id`),
  KEY `session_user_id` (`session_user_id`),
  KEY `session_id_ip_user_id` (`session_id`,`session_ip`,`session_user_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_smilies`
-- 

CREATE TABLE `phpbb_smilies` (
  `smilies_id` smallint(5) unsigned NOT NULL auto_increment,
  `code` varchar(50) default NULL,
  `smile_url` varchar(100) default NULL,
  `emoticon` varchar(75) default NULL,
  PRIMARY KEY  (`smilies_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_themes`
-- 

CREATE TABLE `phpbb_themes` (
  `themes_id` mediumint(8) unsigned NOT NULL auto_increment,
  `template_name` varchar(30) NOT NULL default '',
  `style_name` varchar(30) NOT NULL default '',
  `head_stylesheet` varchar(100) default NULL,
  `body_background` varchar(100) default NULL,
  `body_bgcolor` varchar(6) default NULL,
  `body_text` varchar(6) default NULL,
  `body_link` varchar(6) default NULL,
  `body_vlink` varchar(6) default NULL,
  `body_alink` varchar(6) default NULL,
  `body_hlink` varchar(6) default NULL,
  `tr_color1` varchar(6) default NULL,
  `tr_color2` varchar(6) default NULL,
  `tr_color3` varchar(6) default NULL,
  `tr_class1` varchar(25) default NULL,
  `tr_class2` varchar(25) default NULL,
  `tr_class3` varchar(25) default NULL,
  `th_color1` varchar(6) default NULL,
  `th_color2` varchar(6) default NULL,
  `th_color3` varchar(6) default NULL,
  `th_class1` varchar(25) default NULL,
  `th_class2` varchar(25) default NULL,
  `th_class3` varchar(25) default NULL,
  `td_color1` varchar(6) default NULL,
  `td_color2` varchar(6) default NULL,
  `td_color3` varchar(6) default NULL,
  `td_class1` varchar(25) default NULL,
  `td_class2` varchar(25) default NULL,
  `td_class3` varchar(25) default NULL,
  `fontface1` varchar(50) default NULL,
  `fontface2` varchar(50) default NULL,
  `fontface3` varchar(50) default NULL,
  `fontsize1` tinyint(4) default NULL,
  `fontsize2` tinyint(4) default NULL,
  `fontsize3` tinyint(4) default NULL,
  `fontcolor1` varchar(6) default NULL,
  `fontcolor2` varchar(6) default NULL,
  `fontcolor3` varchar(6) default NULL,
  `span_class1` varchar(25) default NULL,
  `span_class2` varchar(25) default NULL,
  `span_class3` varchar(25) default NULL,
  `img_size_poll` smallint(5) unsigned default NULL,
  `img_size_privmsg` smallint(5) unsigned default NULL,
  PRIMARY KEY  (`themes_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_themes_name`
-- 

CREATE TABLE `phpbb_themes_name` (
  `themes_id` smallint(5) unsigned NOT NULL default '0',
  `tr_color1_name` char(50) default NULL,
  `tr_color2_name` char(50) default NULL,
  `tr_color3_name` char(50) default NULL,
  `tr_class1_name` char(50) default NULL,
  `tr_class2_name` char(50) default NULL,
  `tr_class3_name` char(50) default NULL,
  `th_color1_name` char(50) default NULL,
  `th_color2_name` char(50) default NULL,
  `th_color3_name` char(50) default NULL,
  `th_class1_name` char(50) default NULL,
  `th_class2_name` char(50) default NULL,
  `th_class3_name` char(50) default NULL,
  `td_color1_name` char(50) default NULL,
  `td_color2_name` char(50) default NULL,
  `td_color3_name` char(50) default NULL,
  `td_class1_name` char(50) default NULL,
  `td_class2_name` char(50) default NULL,
  `td_class3_name` char(50) default NULL,
  `fontface1_name` char(50) default NULL,
  `fontface2_name` char(50) default NULL,
  `fontface3_name` char(50) default NULL,
  `fontsize1_name` char(50) default NULL,
  `fontsize2_name` char(50) default NULL,
  `fontsize3_name` char(50) default NULL,
  `fontcolor1_name` char(50) default NULL,
  `fontcolor2_name` char(50) default NULL,
  `fontcolor3_name` char(50) default NULL,
  `span_class1_name` char(50) default NULL,
  `span_class2_name` char(50) default NULL,
  `span_class3_name` char(50) default NULL,
  PRIMARY KEY  (`themes_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_topics`
-- 

CREATE TABLE `phpbb_topics` (
  `topic_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` smallint(8) unsigned NOT NULL default '0',
  `topic_title` char(60) NOT NULL default '',
  `topic_poster` mediumint(8) NOT NULL default '0',
  `topic_time` int(11) NOT NULL default '0',
  `topic_views` mediumint(8) unsigned NOT NULL default '0',
  `topic_replies` mediumint(8) unsigned NOT NULL default '0',
  `topic_status` tinyint(3) NOT NULL default '0',
  `topic_vote` tinyint(1) NOT NULL default '0',
  `topic_type` tinyint(3) NOT NULL default '0',
  `topic_first_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_moved_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_moved_id` (`topic_moved_id`),
  KEY `topic_status` (`topic_status`),
  KEY `topic_type` (`topic_type`),
  KEY `topic_last_post_id` (`topic_last_post_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_topics_watch`
-- 

CREATE TABLE `phpbb_topics_watch` (
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `notify_status` tinyint(1) NOT NULL default '0',
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_status` (`notify_status`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_user_group`
-- 

CREATE TABLE `phpbb_user_group` (
  `group_id` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `user_pending` tinyint(1) default NULL,
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_users`
-- 

CREATE TABLE `phpbb_users` (
  `user_id` mediumint(8) NOT NULL default '0',
  `user_active` tinyint(1) default '1',
  `username` varchar(25) NOT NULL default '',
  `user_password` varchar(32) NOT NULL default '',
  `user_session_time` int(11) NOT NULL default '0',
  `user_session_page` smallint(5) NOT NULL default '0',
  `user_lastvisit` int(11) NOT NULL default '0',
  `user_regdate` int(11) NOT NULL default '0',
  `user_level` tinyint(4) default '0',
  `user_posts` mediumint(8) unsigned NOT NULL default '0',
  `user_timezone` decimal(5,2) NOT NULL default '0.00',
  `user_style` tinyint(4) default NULL,
  `user_lang` varchar(255) default NULL,
  `user_dateformat` varchar(14) NOT NULL default 'd M Y H:i',
  `user_new_privmsg` smallint(5) unsigned NOT NULL default '0',
  `user_unread_privmsg` smallint(5) unsigned NOT NULL default '0',
  `user_last_privmsg` int(11) NOT NULL default '0',
  `user_emailtime` int(11) default NULL,
  `user_viewemail` tinyint(1) default NULL,
  `user_attachsig` tinyint(1) default NULL,
  `user_allowhtml` tinyint(1) default '1',
  `user_allowbbcode` tinyint(1) default '1',
  `user_allowsmile` tinyint(1) default '1',
  `user_allowavatar` tinyint(1) NOT NULL default '1',
  `user_allow_pm` tinyint(1) NOT NULL default '1',
  `user_allow_viewonline` tinyint(1) NOT NULL default '1',
  `user_notify` tinyint(1) NOT NULL default '1',
  `user_notify_pm` tinyint(1) NOT NULL default '0',
  `user_popup_pm` tinyint(1) NOT NULL default '0',
  `user_rank` int(11) default '0',
  `user_avatar` varchar(100) default NULL,
  `user_avatar_type` tinyint(4) NOT NULL default '0',
  `user_email` varchar(255) default NULL,
  `user_icq` varchar(15) default NULL,
  `user_website` varchar(100) default NULL,
  `user_from` varchar(100) default NULL,
  `user_sig` text,
  `user_sig_bbcode_uid` varchar(10) default NULL,
  `user_aim` varchar(255) default NULL,
  `user_yim` varchar(255) default NULL,
  `user_msnm` varchar(255) default NULL,
  `user_occ` varchar(100) default NULL,
  `user_interests` varchar(255) default NULL,
  `user_actkey` varchar(32) default NULL,
  `user_newpasswd` varchar(32) default NULL,
  `user_birthday` int(11) NOT NULL default '999999',
  `user_next_birthday_greeting` int(11) NOT NULL default '0',
  `user_lastlogon` int(11) NOT NULL default '0',
  `user_totaltime` int(11) default '0',
  `user_totallogon` int(11) default '0',
  `user_totalpages` int(11) default '0',
  `user_unread_topics` text,
  `user_gender` tinyint(4) NOT NULL default '0',
  `user_whosonline_color` int(11) NOT NULL default '0',
  `user_points` decimal(11,0) NOT NULL default '100',
  PRIMARY KEY  (`user_id`),
  KEY `user_session_time` (`user_session_time`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_vote_desc`
-- 

CREATE TABLE `phpbb_vote_desc` (
  `vote_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_text` text NOT NULL,
  `vote_start` int(11) NOT NULL default '0',
  `vote_length` int(11) NOT NULL default '0',
  PRIMARY KEY  (`vote_id`),
  KEY `topic_id` (`topic_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_vote_results`
-- 

CREATE TABLE `phpbb_vote_results` (
  `vote_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_option_id` tinyint(4) unsigned NOT NULL default '0',
  `vote_option_text` varchar(255) NOT NULL default '',
  `vote_result` int(11) NOT NULL default '0',
  KEY `vote_option_id` (`vote_option_id`),
  KEY `vote_id` (`vote_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_vote_voters`
-- 

CREATE TABLE `phpbb_vote_voters` (
  `vote_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_user_id` mediumint(8) NOT NULL default '0',
  `vote_user_ip` char(8) NOT NULL default '',
  KEY `vote_id` (`vote_id`),
  KEY `vote_user_id` (`vote_user_id`),
  KEY `vote_user_ip` (`vote_user_ip`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_words`
-- 

CREATE TABLE `phpbb_words` (
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word` char(100) NOT NULL default '',
  `replacement` char(100) NOT NULL default '',
  PRIMARY KEY  (`word_id`)
);

-- --------------------------------------------------------

-- 
-- Structure de la table `phpbb_zone_restriction`
-- 

CREATE TABLE `phpbb_zone_restriction` (
  `ZR_ID` int(11) NOT NULL auto_increment,
  `ZR_zone` varchar(20) NOT NULL default '',
  `ZR_value` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ZR_ID`)
);

CREATE TABLE phpbb_arcade_championnat ( 
  game_id mediumint(8) NOT NULL default '0', 
  one_userid  mediumint(8) NOT NULL default '0', 
  two_userid mediumint(8) NOT NULL default '0', 
  three_userid mediumint(8) NOT NULL default '0', 
  four_userid mediumint(8) NOT NULL default '0', 
  five_userid mediumint(8) NOT NULL default '0',
  KEY game_id (`game_id`) 
) ;

CREATE TABLE phpbb_cash (
  cash_id smallint(6) NOT NULL auto_increment,
  cash_order smallint(6) NOT NULL default '0',
  cash_settings smallint(4) NOT NULL default '3313',
  cash_dbfield varchar(64) NOT NULL default '',
  cash_name varchar(64) NOT NULL default 'GP',
  cash_default int(11) NOT NULL default '0',
  cash_decimals tinyint(2) NOT NULL default '0',
  cash_imageurl varchar(255) NOT NULL default '',
  cash_exchange int(11) NOT NULL default '1',
  cash_perpost int(11) NOT NULL default '25',
  cash_postbonus int(11) NOT NULL default '2',
  cash_perreply int(11) NOT NULL default '25',
  cash_maxearn int(11) NOT NULL default '75',
  cash_perpm int(11) NOT NULL default '0',
  cash_perchar int(11) NOT NULL default '20',
  cash_allowance tinyint(1) NOT NULL default '0',
  cash_allowanceamount int(11) NOT NULL default '0',
  cash_allowancetime tinyint(2) NOT NULL default '2',
  cash_allowancenext int(11) NOT NULL default '0',
  cash_forumlist varchar(255) NOT NULL default '',
  PRIMARY KEY  (cash_id)
);

 
CREATE TABLE phpbb_cash_events (
  event_name varchar(32) NOT NULL default '',
  event_data varchar(255) NOT NULL default '',
  PRIMARY KEY  (event_name)
);

 
CREATE TABLE phpbb_cash_exchange (
  ex_cash_id1 int(11) NOT NULL default '0',
  ex_cash_id2 int(11) NOT NULL default '0',
  ex_cash_enabled int(1) NOT NULL default '0',
  PRIMARY KEY  (ex_cash_id1,ex_cash_id2)
);


CREATE TABLE phpbb_cash_groups (
  group_id mediumint(6) NOT NULL default '0',
  group_type tinyint(2) NOT NULL default '0',
  cash_id smallint(6) NOT NULL default '0',
  cash_perpost int(11) NOT NULL default '0',
  cash_postbonus int(11) NOT NULL default '0',
  cash_perreply int(11) NOT NULL default '0',
  cash_perchar int(11) NOT NULL default '0',
  cash_maxearn int(11) NOT NULL default '0',
  cash_perpm int(11) NOT NULL default '0',
  cash_allowance tinyint(1) NOT NULL default '0',
  cash_allowanceamount int(11) NOT NULL default '0',
  cash_allowancetime tinyint(2) NOT NULL default '2',
  cash_allowancenext int(11) NOT NULL default '0',
  PRIMARY KEY  (group_id,group_type,cash_id)
);

 
CREATE TABLE phpbb_cash_log (
  log_id int(11) NOT NULL auto_increment,
  log_time int(11) NOT NULL default '0',
  log_type smallint(6) NOT NULL default '0',
  log_action varchar(255) NOT NULL default '',
  log_text varchar(255) NOT NULL default '',
  PRIMARY KEY  (log_id)
);


CREATE TABLE `phpbb_arcade_comments` (
  `game_id` mediumint(8) NOT NULL default '0',
  `message` text NOT NULL
) ;

CREATE TABLE `phpbb_whosonline_ranks` (
  `whosonline_rank_id` tinyint(4) NOT NULL auto_increment,
  `whosonline_rank_name` varchar(50) NOT NULL default '',
  `whosonline_rank_color` varchar(9) NOT NULL default '',
  `whosonline_lang_key` smallint(1) unsigned NOT NULL default '0',
  `whosonline_rank_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`whosonline_rank_id`)
) AUTO_INCREMENT=20 ;


CREATE TABLE phpbb_sessions_keys (
	key_id varchar(32) DEFAULT '0' NOT NULL,
	user_id mediumint(8) DEFAULT '0' NOT NULL,
	last_ip varchar(8) DEFAULT '0' NOT NULL,
	last_login int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (key_id, user_id),
	KEY last_login (last_login)
);

ALTER TABLE phpbb_themes ADD erc_admincolor VARCHAR( 6 ) DEFAULT NULL;
ALTER TABLE phpbb_themes ADD erc_modcolor VARCHAR( 6 ) DEFAULT NULL;
ALTER TABLE phpbb_themes ADD erc_usercolor VARCHAR( 6 ) DEFAULT NULL;
ALTER TABLE phpbb_users ADD COLUMN user_login_tries smallint(5) UNSIGNED DEFAULT '0' NOT NULL; 
ALTER TABLE phpbb_users ADD COLUMN user_last_login_try int(11) DEFAULT '0' NOT NULL; 


ALTER  TABLE phpbb_users  ADD user_mood TINYINT not null DEFAULT '0';
ALTER  TABLE phpbb_users  ADD user_miniland TINYINT not null DEFAULT '0';

#
# phpBB2 - attach_mod schema
#
# $Id: attach_mysql_schema.sql,v 1.1 2005/11/05 18:50:21 acydburn Exp $
#

#
# Table structure for table 'phpbb_attachments_config'
#
CREATE TABLE phpbb_attachments_config (
  config_name varchar(255) NOT NULL,
  config_value varchar(255) NOT NULL,
  PRIMARY KEY (config_name)
);

#
# Table structure for table 'phpbb_forbidden_extensions'
#
CREATE TABLE phpbb_forbidden_extensions (
  ext_id mediumint(8) UNSIGNED NOT NULL auto_increment, 
  extension varchar(100) NOT NULL, 
  PRIMARY KEY (ext_id)
);

#
# Table structure for table 'phpbb_extension_groups'
#
CREATE TABLE phpbb_extension_groups (
  group_id mediumint(8) NOT NULL auto_increment,
  group_name char(20) NOT NULL,
  cat_id tinyint(2) DEFAULT '0' NOT NULL, 
  allow_group tinyint(1) DEFAULT '0' NOT NULL,
  download_mode tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
  upload_icon varchar(100) DEFAULT '',
  max_filesize int(20) DEFAULT '0' NOT NULL,
  forum_permissions varchar(255) default '' NOT NULL,
  PRIMARY KEY group_id (group_id)
);

#
# Table structure for table 'phpbb_extensions'
#
CREATE TABLE phpbb_extensions (
  ext_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  extension varchar(100) NOT NULL,
  comment varchar(100),
  PRIMARY KEY ext_id (ext_id)
);

#
# Table structure for table 'phpbb_attachments_desc'
#
CREATE TABLE phpbb_attachments_desc (
  attach_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  physical_filename varchar(255) NOT NULL,
  real_filename varchar(255) NOT NULL,
  download_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  comment varchar(255),
  extension varchar(100),
  mimetype varchar(100),
  filesize int(20) NOT NULL,
  filetime int(11) DEFAULT '0' NOT NULL,
  thumbnail tinyint(1) DEFAULT '0' NOT NULL,
  PRIMARY KEY (attach_id),
  KEY filetime (filetime),
  KEY physical_filename (physical_filename(10)),
  KEY filesize (filesize)
);

#
# Table structure for table 'phpbb_attachments'
#
CREATE TABLE phpbb_attachments (
  attach_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL, 
  post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL, 
  privmsgs_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  user_id_1 mediumint(8) NOT NULL,
  user_id_2 mediumint(8) NOT NULL,
  KEY attach_id_post_id (attach_id, post_id),
  KEY attach_id_privmsgs_id (attach_id, privmsgs_id),
  KEY post_id (post_id),
  KEY privmsgs_id (privmsgs_id)
); 

#
# Table structure for table 'phpbb_quota_limits'
#
CREATE TABLE phpbb_quota_limits (
  quota_limit_id mediumint(8) unsigned NOT NULL auto_increment,
  quota_desc varchar(20) NOT NULL default '',
  quota_limit bigint(20) unsigned NOT NULL default '0',
  PRIMARY KEY  (quota_limit_id)
);

#
# Table structure for table 'phpbb_attach_quota'
#
CREATE TABLE phpbb_attach_quota (
  user_id mediumint(8) unsigned NOT NULL default '0',
  group_id mediumint(8) unsigned NOT NULL default '0',
  quota_type smallint(2) NOT NULL default '0',
  quota_limit_id mediumint(8) unsigned NOT NULL default '0',
  KEY quota_type (quota_type)
);

CREATE TABLE `phpbb_lottery`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT (20) NOT NULL,
	PRIMARY KEY(`id`),
	INDEX(`user_id`)
);

CREATE TABLE `phpbb_lottery_history`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	`user_id` INT (20) NOT NULL, 
	`amount` INT (20) NOT NULL, 
	`currency` CHAR (32) NOT NULL, 
	`time` INT (20) NOT NULL,
	PRIMARY KEY(`id`),
	INDEX(`user_id`)
);

#
# Table structure for table 'phpbb_bbc_box'
#

CREATE TABLE phpbb_bbc_box (
	bbc_id smallint(5) unsigned NOT NULL auto_increment,
	bbc_name varchar(255) NOT NULL,
	bbc_value varchar(255) NOT NULL,
	bbc_auth varchar(255) NOT NULL,
	bbc_before varchar(255) NOT NULL,
	bbc_after varchar(255) NOT NULL,
	bbc_helpline varchar(255) NOT NULL,
	bbc_img varchar(255) NOT NULL,
	bbc_divider varchar(255) NOT NULL,
	bbc_order mediumint(8) DEFAULT '1' NOT NULL,
	PRIMARY KEY (bbc_id)
);

#
#-----[ arcade_cheater_tracker ]------------------------------------------
#

CREATE TABLE phpbb_games_time (
   `game_sessid` char(32) NOT NULL,
   `user_id` mediumint(8) NOT NULL default '0',
   `game_id` mediumint(8) NOT NULL,
   `date_enreg` int(11) NOT NULL default '0',
   PRIMARY KEY  (`game_sessid`)
);

CREATE TABLE phpbb_arcade_cheater_file (
   `cheater_id` int(11) NOT NULL auto_increment,
   `user_id` mediumint(8) NOT NULL default '0',
   `game_id` mediumint(8) NOT NULL default '0',
   `score_game` bigint(20) NOT NULL default '0',
   `date_cheat` int(11) NOT NULL default '0',
   `flashtime` int(11) NOT NULL default '0',
   `realtime` int(11) NOT NULL default '0',
   `cheattype` tinyint(1) NOT NULL default '0',
   PRIMARY KEY  (`cheater_id`)
);


#
#------[ arcade favoris ]----------------------------------------------------
#

CREATE TABLE `phpbb_arcade_fav` (
  `order_fav` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `game_id` mediumint(8) NOT NULL default '0'
) ;


#
#------[modo_admin_record ]-------------------------------------------------
#

CREATE TABLE `phpbb_modo_record` (
  `modo_record_id` mediumint(6) NOT NULL auto_increment,
  `jeu` varchar(60) NOT NULL default '',
  `moderateur` varchar(50) NOT NULL default '',
  `champion` varchar(50) NOT NULL default '',
  `score` varchar(50) NOT NULL default '',
  `commentaire` text NOT NULL,
  `date_effacement` int(11) NOT NULL default '0',
  PRIMARY KEY  (`modo_record_id`)
) AUTO_INCREMENT=0 ;

#
#------[Arcade Vote ]-------------------------------------------------
#

CREATE TABLE phpbb_arcade_vote_results ( 
  rating_id mediumint(8) unsigned NOT NULL auto_increment,
  user_id mediumint(8) unsigned NOT NULL default '0',
  game_id mediumint(8) unsigned NOT NULL default '0',
  rating mediumint(8) unsigned NOT NULL default '0',
  rating_time int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (rating_id),
  KEY game_id (game_id)
)  ;
