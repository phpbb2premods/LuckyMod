<form method="post" action="{S_MODE_ACTION}">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="left"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
	  <td align="right" nowrap="nowrap"><span class="genmed">{L_SELECT_SORT_METHOD}: {S_MODE_SELECT}  {L_ORDER} {S_ORDER_SELECT}   
		<input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />
		</span></td>
	</tr>
  </table>
  <table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
	<tr> 
	  <th height="25" class="thCornerL" nowrap="nowrap">#</th>
	  <th class="thTop" nowrap="nowrap">&nbsp;</th>
	  <th class="thTop" nowrap="nowrap">{L_USERNAME}</th>
	  <th class="thTop" nowrap="nowrap">{L_EMAIL}</th>
	  <th class="thTop" nowrap="nowrap">{L_FROM}</th>
	  <th class="thTop" nowrap="nowrap">{L_MINILAND}</th>
      <th class="thTop" nowrap="nowrap">{L_GENDER}</th>
	  <th class="thTop" nowrap="nowrap">{L_JOINED}</th>
<!-- début mod : Add-on pour Birthday -->
<!-- ajouter -->
<th>{L_AGE}</th>
<!-- fin mod : Add-on pour Birthday -->
	  <th class="thTop" nowrap="nowrap">{L_POSTS}</th>
<!-- BEGIN cashrow -->
	  <th class="thTop" nowrap="nowrap">{cashrow.NAME}</th>
	  <!-- END cashrow -->
<!-- Start add - Last visit MOD -->
<th class="thTop" nowrap="nowrap">{L_LOGON}</th> 
<!-- End add - Last visit MOD -->
	  <th class="thCornerR" nowrap="nowrap">{L_WEBSITE}</th>
	</tr>
	<!-- BEGIN memberrow -->
	<tr> 
	  <td class="{memberrow.ROW_CLASS}" align="center"><span class="gen"> {memberrow.ROW_NUMBER} </span></td>
	  <td class="{memberrow.ROW_CLASS}" align="center"> {memberrow.PM_IMG} </td>
	  <td class="{memberrow.ROW_CLASS}" align="center"><span class="gen"><a href="{memberrow.U_VIEWPROFILE}" class="gen">{memberrow.USERNAME}</a></span></td>
	  <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"> {memberrow.EMAIL_IMG} </td>
	  <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gen">{memberrow.FROM}</span></td>
	  <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gensmall">{memberrow.MINILAND}</span></td>
      <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gensmall">{memberrow.GENDER}</span></td> 
	  <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gensmall">{memberrow.JOINED}</span></td>
<!-- début mod : Add-on pour Birthday -->
<!-- ajouter -->
<td class="{memberrow.ROW_CLASS}" align="center"><span class="gensmall">{memberrow.POSTER_AGE} {memberrow.ZODIAC_IMG} {memberrow.CHINESE_IMG}</span></td>
<!-- fin mod : Add-on pour Birthday -->
	  <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gen">{memberrow.POSTS}</span></td>
<!-- BEGIN cashrow -->
	  <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gen">{memberrow.cashrow.CASH_DISPLAY}</span></td>
	  <!-- END cashrow -->
<!-- Start add - Last visit MOD -->
<td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gensmall">{memberrow.LAST_LOGON}</span></td> 
<!-- End add - Last visit MOD -->
	  <td class="{memberrow.ROW_CLASS}" align="center"> {memberrow.WWW_IMG} </td>

	</tr>
	<!-- END memberrow -->
	<tr> 
	  <td class="catBottom" colspan="{NUM_COLUMNS}" height="28">&nbsp;</td>
	</tr>
  </table>
  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="right" valign="top"></td>
	</tr>
  </table>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tr> 
	<td><span class="nav">{PAGE_NUMBER}</span></td>
	<td align="right"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span></td>
  </tr>
</table></form>

<table width="100%" cellspacing="2" border="0" align="center">
  <tr> 
	<td valign="top" align="right">{JUMPBOX}</td>
  </tr>
</table>
