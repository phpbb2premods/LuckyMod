 
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
  </tr>
</table>

<table class="forumline" width="100%" cellspacing="1" cellpadding="3" border="0" align="center">
  <tr> 
	<th class="thHead" colspan="2" height="25" nowrap="nowrap">{L_VIEWING_PROFILE}</th>
  </tr>
  <tr> 
	<td class="catLeft" width="40%" height="28" align="center"><b><span class="gen">{L_AVATAR}</span></b></td>
	<td class="catRight" width="60%"><b><span class="gen">{L_ABOUT_USER}</span></b> 
    <!-- BEGIN switch_user_admin --> 
    <span class="gen"> (<a target="_admin" href="{U_ADMIN_PROFILE}" class="gen">{L_USER_ADMIN_FOR}</a> - <a target="_admin" href="{U_PERM_PROFILE}" class="gen">{L_USER_PERM_FOR}</a>)</span> 
    <!-- END switch_user_admin --> 
</td> 
  </tr>
  <tr> 
	<td class="row1" height="6" valign="top" align="center">{AVATAR_IMG}<br /><span class="postdetails">{POSTER_RANK}</span></td>
	<td class="row1" rowspan="3" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
		<tr> 
		  <td valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_JOINED}:�</span></td>
		  <td width="100%"><b><span class="gen">{JOINED}</span></b></td>
		</tr>
<!-- Start add - Last visit MOD -->
<tr> 
	<td valign="middle" align="right"><span class="gen">{L_LOGON}:&nbsp;</span></td> 
	<td width="100%"><b><span class="gen">{LAST_LOGON}</span></b></td> 
</tr>
<!-- BEGIN switch_user_is_moderator -->
<tr> 
  <td valign="middle" align="right"><span class="gen">{L_TOTAL_ONLINE_TIME}:&nbsp;</span></td> 
  <td width="100%"><b><span class="gen">{TOTAL_ONLINE_TIME}</span></b></td> 
</tr> 
<tr> 
  <td valign="middle" align="right"><span class="gen">{L_LAST_ONLINE_TIME}:&nbsp;</span></td> 
  <td width="100%"><b><span class="gen">{LAST_ONLINE_TIME}</span></b></td> 
</tr> 
<tr> 
  <td valign="middle" align="right"><span class="gen">{L_NUMBER_OF_VISIT}:&nbsp;</span></td> 
  <td width="100%"><b><span class="gen">{NUMBER_OF_VISIT}</span></b></td> 
</tr> 
<tr> 
<td valign="middle" align="right"><span class="gen">{L_NUMBER_OF_PAGES}:&nbsp;</span></td> 
<td width="100%"><b><span class="gen">{NUMBER_OF_PAGES}</span></b></td> 
</tr> 
<!-- END switch_user_is_moderator -->
<!-- End add - Last visit MOD -->
		<tr> 
		  <td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_TOTAL_POSTS}:�</span></td>
		  <td valign="top"><b><span class="gen">{POSTS}</span></b><br /><span class="genmed">[{POST_PERCENT_STATS} / {POST_DAY_STATS}]</span> <br /><span class="genmed"><a href="{U_SEARCH_USER}" class="genmed">{L_SEARCH_USER_POSTS}</a></span></td>
		</tr>
		<tr> 
		  <td valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_LOCATION}:�</span></td>
		  <td><b><span class="gen">{LOCATION}</span></b></td>
		</tr>
		<tr> 
		  <td valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_WEBSITE}:�</span></td>
		  <td><span class="gen"><b>{WWW}</b></span></td>
		</tr>
		<tr> 
		  <td valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_OCCUPATION}:�</span></td>
		  <td><b><span class="gen">{OCCUPATION}</span></b></td>
		</tr>
		<tr> 
		  <td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_INTERESTS}:</span></td>
		  <td> <b><span class="gen">{INTERESTS}</span></b></td>
		</tr>
		<!-- BEGIN switch_upload_limits -->
		<tr> 
			<td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_UPLOAD_QUOTA}:</span></td>
			<td> 
				<table width="175" cellspacing="1" cellpadding="2" border="0" class="bodyline">
				<tr> 
					<td colspan="3" width="100%" class="row2">
						<table cellspacing="0" cellpadding="1" border="0">
						<tr> 
							<td bgcolor="{T_TD_COLOR2}"><img src="templates/subSilver/images/spacer.gif" width="{UPLOAD_LIMIT_IMG_WIDTH}" height="8" alt="{UPLOAD_LIMIT_PERCENT}" /></td>
						</tr>
						</table>
					</td>
				</tr>
				<tr> 
					<td width="33%" class="row1"><span class="gensmall">0%</span></td>
					<td width="34%" align="center" class="row1"><span class="gensmall">50%</span></td>
					<td width="33%" align="right" class="row1"><span class="gensmall">100%</span></td>
				</tr>
				</table>
				<b><span class="genmed">[{UPLOADED} / {QUOTA} / {PERCENT_FULL}]</span> </b><br />
				<span class="genmed"><a href="{U_UACP}" class="genmed">{L_UACP}</a></span></td>
			</td>
		</tr>
<!-- END switch_upload_limits -->
		<!-- Start add - Miniland  MOD --> 
<tr> 
	<td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_MINILAND}:</span></td>
	<td> <b><span class="gen">{MINILAND}</span></b></td>
</tr>
<!-- End add - Miniland  MOD -->
		<!-- Start add - Mood  MOD --> 
		<tr> 
		  	<td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_MOOD}:</span></td>
		  	<td> <b><span class="gen">{MOOD}{MOOD_IMG}</span></b></td>
		</tr>
	
<!-- Start add - Gender MOD --> 
<tr> 
	<td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_GENDER}:</span></td>
	<td> <b><span class="gen">{GENDER}</span></b></td>
</tr>
<!-- End add - Gender MOD -->
{CASH}
<tr>
		  <td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_ARCADE}:</span></td>
		  <td><span class="gen">{URL_STATS}</span></b></td>
		</tr>
		<!-- Start add - Birthday MOD -->
		<tr>
		  <td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_BIRTHDAY}:</span></td>
		  <td><b><span class="gen">{BIRTHDAY}</span></b></td>
		</tr>
        <!-- End add - Birthday MOD -->
		<tr>
		  <td valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_ZODIAC}:�</span></td>
		  <td><b><span class="gen">{ZODIAC}�{ZODIAC_IMG}</b></span></td>
		</tr>
		<tr>
		  <td valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_CHINESE}:�</span></td>
		  <td><b><span class="gen">{CHINESE}�{CHINESE_IMG}</b></span></td>
		</tr>
       <tr>
			<td valign="top" align="right" nowrap="nowrap"><span class="gen">{L_USER_STYLE}</span></td>
			<td><span class="gen"><b>{USER_STYLE} {STYLE_NUM}</b></span></td>
		</tr>
	  </table>
	</td>
  </tr>
  <tr> 
	<td class="catLeft" align="center" height="28"><b><span class="gen">{L_CONTACT} {USERNAME} </span></b></td>
  </tr>
  <tr> 
	<td class="row1" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
		<tr> 
		  <td valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_EMAIL_ADDRESS}:</span></td>
		  <td class="row1" valign="middle" width="100%"><b><span class="gen">{EMAIL_IMG}</span></b></td>
		</tr>
		<tr> 
		  <td valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_PM}:</span></td>
		  <td class="row1" valign="middle"><b><span class="gen">{PM_IMG}</span></b></td>
		</tr>
		<tr> 
		  <td valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_MESSENGER}:</span></td>
		  <td class="row1" valign="middle"><span class="gen">{MSN}</span></td>
		</tr>
		<tr> 
		  <td valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_YAHOO}:</span></td>
		  <td class="row1" valign="middle"><span class="gen">{YIM_IMG}</span></td>
		</tr>
		<tr> 
		  <td valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_AIM}:</span></td>
		  <td class="row1" valign="middle"><span class="gen">{AIM_IMG}</span></td>
		</tr>
		<tr> 
		  <td valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_ICQ_NUMBER}:</span></td>
		  <td class="row1"><script language="JavaScript" type="text/javascript"><!-- 

		if ( navigator.userAgent.toLowerCase().indexOf('mozilla') != -1 && navigator.userAgent.indexOf('5.') == -1 && navigator.userAgent.indexOf('6.') == -1 )
			document.write(' {ICQ_IMG}');
		else
			document.write('<table cellspacing="0" cellpadding="0" border="0"><tr><td nowrap="nowrap"><div style="position:relative;height:18px"><div style="position:absolute">{ICQ_IMG}</div><div style="position:absolute;left:3px;top:-1px">{ICQ_STATUS_IMG}</div></div></td></tr></table>');
		  
		  //--></script><noscript>{ICQ_IMG}</noscript></td>
		</tr>
	  </table>
	</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
	<td align="right"><span class="nav"><br />{JUMPBOX}</span></td>
  </tr>
</table>