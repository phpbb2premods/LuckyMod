
<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr> 
	<td align="left" valign="bottom" colspan="3"><a class="maintitle" href="{U_VIEW_TOPIC}">{TOPIC_TITLE}</a><br />
	  <span class="gensmall"><b>{PAGINATION}</b><br />
	    </span></td>
  </tr>
</table>

<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr> 
	<td align="left" valign="bottom" nowrap="nowrap"><span class="nav"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" align="middle" /></a>   <a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" border="0" alt="{L_POST_REPLY_TOPIC}" align="middle" /></a></span></td>
	<td align="left" valign="middle" width="100%"><span class="nav">   <a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
	 
	  	  <!-- BEGIN switch_parent_link -->
 -> <a class="nav" href="{PARENT_URL}">{PARENT_NAME}</a>
	  	  <!-- END switch_parent_link -->
 -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td>
  </tr>
</table>

<table class="forumline" width="100%" cellspacing="1" cellpadding="3" border="0">
	<tr align="right">
		<td class="catHead" colspan="3" height="28"><span class="nav"><a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> :: <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a>  </span></td>
	</tr>
	{POLL_DISPLAY} 
	<tr>
		<th class="thLeft" width="150" height="26" nowrap="nowrap">{L_AUTHOR}</th>
		<th class="thCenter" nowrap="nowrap">{L_MESSAGE}</th>
		<th class="thRight" width="150" height="26" nowrap="nowrap">{L_COL_DRT}</th>
	</tr>
	<!-- BEGIN postrow -->
	<tr> 
		<td width="150" align="center" valign="top" class="{postrow.ROW_CLASS}"><span class="name"><a name="{postrow.U_POST_ID}"></a><br /><br />{postrow.POSTER_NAME}</span><br /><span class="postdetails"><b>{postrow.POSTER_RANK}</b><br />{postrow.RANK_IMAGE}<br /><br /><br />{postrow.POSTER_AVATAR}<br /><br /><br /><b>{postrow.POSTER_MINILAND}</b><br /><br /><br /><b>{postrow.POSTER_MOOD}</b><br />{postrow.POSTER_FROM}<br />{postrow.CASH}</span><br /></td>
		<td class="{postrow.ROW_CLASS}" width="100%" height="28" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="100%"><a href="{postrow.U_MINI_POST}"><img src="{postrow.MINI_POST_IMG}" width="12" height="9" alt="{postrow.L_MINI_POST_ALT}" title="{postrow.L_MINI_POST_ALT}" border="0" /></a><span class="postdetails">{L_POSTED}: {postrow.POST_DATE}<span class="gen"> </span>   {L_POST_SUBJECT}: {postrow.POST_SUBJECT}</span></td>
				<td valign="top" nowrap="nowrap">{postrow.QUOTE_IMG} {postrow.EDIT_IMG} {postrow.DELETE_IMG} {postrow.IP_IMG}</td>
			</tr>
			<tr> 
				<td colspan="3"><hr /></td>
			</tr>
			<tr>
				<td colspan="3"><span class="postbody">{postrow.MESSAGE}</span>{postrow.ATTACHMENTS}<span class="postbody">{postrow.SIGNATURE}</span><span class="gensmall">{postrow.EDITED_MESSAGE}</span></td>
			</tr>		
		</table></td>
		<td width="150" align="left" valign="top" class="{postrow.ROW_CLASS}"><span class="postdetails"><br /><br /><br />{postrow.POSTER_JOINED}<br /><br />{postrow.POSTER_POSTS}<br /><b>{postrow.L_STYLE}</b>{postrow.STYLE_NAME} {postrow.THEME_NUM}<br /><b>{postrow.POSTER_GENDER}</b><br />{postrow.POSTER_AGE}<br /><b>{postrow.L_ZODIAC}</b>{postrow.ZODIAC_IMG}<br /><b>{postrow.L_CHINESE}</b>{postrow.CHINESE_IMG}<br /><br />
		<!-- BEGIN num -->
		<b>{postrow.num.L_WINNER} {postrow.num.NUM_WIN}</b> <img src="images/couronne.gif"><br />
		<!-- END num -->
		<!-- BEGIN trophee --> 
		 <a href={postrow.trophee.U_GAME} class="nav" title="{postrow.trophee.L_SCORE} : {postrow.trophee.GAME_SCORE}">{postrow.trophee.GAME_PIC} {postrow.trophee.GAME_NAME}</a><br />
		<!-- END trophee -->
		<br /><br /></span></td>
	</tr>
	<tr> 
		<td class="{postrow.ROW_CLASS}" width="150" align="center" valign="middle"><span class="nav"><a href="#top" class="nav">{L_BACK_TO_TOP}</a></span></td>
		<td class="{postrow.ROW_CLASS}" width="100%" height="28" valign="bottom" nowrap="nowrap"><table cellspacing="0" cellpadding="0" border="0" height="18" width="18"align="center">
			<tr> 
				<td valign="middle" nowrap="nowrap">{postrow.PROFILE_IMG} {postrow.PM_IMG} {postrow.EMAIL_IMG} {postrow.WWW_IMG} {postrow.AIM_IMG} {postrow.YIM_IMG} {postrow.MSN_IMG}<script language="JavaScript" type="text/javascript"><!-- 

	if ( navigator.userAgent.toLowerCase().indexOf('mozilla') != -1 && navigator.userAgent.indexOf('5.') == -1 && navigator.userAgent.indexOf('6.') == -1 )
		document.write(' {postrow.ICQ_IMG}');
	else
		document.write('</td><td>&nbsp;</td><td valign="top" nowrap="nowrap"><div style="position:relative"><div style="position:absolute">{postrow.ICQ_IMG}</div><div style="position:absolute;left:3px;top:-1px">{postrow.ICQ_STATUS_IMG}</div></div>');
				
				//--></script><noscript>{postrow.ICQ_IMG}</noscript></td>
			</tr>
		</table></td>
<td class="{postrow.ROW_CLASS}" width="150" align="center" valign="middle"><span class="nav"><a href="#top" class="nav">{L_BACK_TO_TOP}</a></span></td>

	</tr>
	<tr> 
		<td class="spaceRow" colspan="3" height="1"><img src="templates/subSilver/images/spacer.gif" alt="" width="1" height="1" /></td>
	</tr>
	<!-- END postrow -->
<tr align="center"> 
		<center><td class="row1" colspan="3" >
			{QUICKREPLY_OUTPUT}
		</td>
	</tr></center>
	<tr align="center"> 
		<td class="catBottom" colspan="3" height="28"><table cellspacing="0" cellpadding="0" border="0">

			<tr><form method="post" action="{S_POST_DAYS_ACTION}">
				<td align="center"><span class="gensmall">{L_DISPLAY_POSTS}: {S_SELECT_POST_DAYS} {S_SELECT_POST_ORDER} <input type="submit" value="{L_GO}" class="liteoption" name="submit" /></span></td>
			</form></tr>
		</table></td>
	</tr>
</table>

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" align="middle" /></a>   <a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" border="0" alt="{L_POST_REPLY_TOPIC}" align="middle" /></a></span></td>
	<td align="left" valign="middle" width="100%"><span class="nav">   <a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
	  	  <!-- BEGIN switch_parent_link -->
	  -> <a class="nav" href="{PARENT_URL}">{PARENT_NAME}</a>
	  	  <!-- END switch_parent_link -->
	  -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td> 
	<td align="right" valign="top" nowrap="nowrap"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span> 
	  </td>
  </tr>
  <tr>
	<td align="left" colspan="3"><span class="nav">{PAGE_NUMBER}</span></td>
  </tr>
</table>

<table width="100%" cellspacing="2" border="0" align="center">
  <tr> 
	<td width="40%" valign="top" nowrap="nowrap" align="left"><span class="gensmall">{S_WATCH_TOPIC}</span><br />
	   <br />
	  {S_TOPIC_ADMIN}</td>
	<td align="right" valign="top" nowrap="nowrap">{JUMPBOX}<span class="gensmall">{S_AUTH_LIST}</span></td>
  </tr>
</table>
