		  <!-- BEGIN switch_user_logged_in -->
		  <table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline" >
		   <tr>
			<{PORTAL_CLASS_BALISE} class="{PORTAL_CLASS_TITLE}" height="25"><span class="genmed"><b>{L_STYLE}</b></span></{PORTAL_CLASS_BALISE}>
		   </tr>
		   <tr>
		    <td class="row1" align="center">
			<form method="post" name="chgstyle" action="{S_ACTION}">	
			<br />	   
			<select name='cstyle' class="option" onchange="document.chgstyle.submit()">
			{S_STYLES}
			</select>
			<br /><br />
			<input type="submit" name="change" value="{L_CHG_STYLE}" class="liteoption" />
			</form>
			<br />
		   </td>
		   </tr>
		  </table>
		 <!-- END switch_user_logged_in -->