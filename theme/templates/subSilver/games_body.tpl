<script language="JavaScript">
function resize_avatar(image)
{
  if ({MAXSIZE_AVATAR}>0)
  {
	if (image.width > {MAXSIZE_AVATAR} ) image.width={MAXSIZE_AVATAR} ;
  }
}
</script>
  <!-- affichage de la phrase d'index -->
  <table width="100%" cellspacing="2" cellpadding="2" border="0">
    <tr>
	  <td align="left" valign="middle" width="100%">
		<span class="nav">
			<a href="{U_INDEX}" class="nav">{L_INDEX}</a>
			{NAV_DESC} >
		</span>
		<span class="nav">{L_GAME}</span>
	  </td>
    </tr>
  </table>
  <br />
{HEADINGARCADE}
<br />
{CHAMPIONNATARCADE}
<br />
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
  <tr> 
	<th class="thTop" height="28" align="center">{L_GAME}</th>
  </tr>
<tr>
 	<td align="center">
		<table width="100%">
			<tr>
				<!-- BEGIN avatar_best_player_left -->
			  <td valign="top">
               <table width="100%" class="bodyline" cellpadding="2" cellspacing="1"> 
   	           <tr> 
       	          <td class="row2" align="center" colspan="3"><span class="cattitle">{L_ACTUAL_WINNER}</span></td> 
            	</tr> 
          	   <tr> 
             	  <td class="row1" align="center" colspan="3">{FIRST_AVATAR}</td> 
               </tr>			    
   	           <tr> 
       	          <td class="row1" align="center" colspan="3"><span class="genmed"><b>{BEST_USER_NAME}</b></span></td> 
           	   </tr>
			    
                <tr> 
                  <td class="row1" align="center" colspan="3"><span class="genmed">{COMMENTS}</span></td> 
               </tr>
<tr>
                  <td align="center" colspan="3">{MODOADMINRECORD}</td>
                </tr>  
			   </table>
			  </td>
			  <!-- END avatar_best_player_left -->			
                          <td class="bodyline" align="center">
						  <!-- BEGIN fav -->
{fav.ADD_FAV}<br /><br />
<!-- END fav -->
<!-- BEGIN game_type_V1 --> 
       <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="{GAME_WIDTH}" height="{GAME_HEIGHT}">
         <param name="movie" value="games/{SWF_GAME}?location={SCRIPT_PATH}&username={USER_NAME}&highscore={HIGHSCORE}&gamehash={GAMEHASH}&settime={SETTIME}&gid={GID}{SID}&bbtitle={BBTITLE}"/>
                        <param name="type" value="application/x-shockwave-flash" />
                        <param name="pluginspage" value="http://www.macromedia.com/go/getflashplayer/" />
                        <param name="menu" value="false" />
         <embed src="games/{SWF_GAME}?location={SCRIPT_PATH}&username={USER_NAME}&highscore={HIGHSCORE}&gamehash={GAMEHASH}&settime={SETTIME}&gid={GID}{SID}&bbtitle={BBTITLE}" width="{GAME_WIDTH}" height="{GAME_HEIGHT}" menu="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash">
         </embed>
      </object>
<!-- END game_type_V1 -->
<!-- BEGIN game_type_V2 -->
       <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="{GAME_WIDTH}" height="{GAME_HEIGHT}">
         <param name="movie" value="games/{SWF_GAME}"/>
                        <param name="type" value="application/x-shockwave-flash" />
                        <param name="pluginspage" value="http://www.macromedia.com/go/getflashplayer/" />
                        <param name="menu" value="false" />
						<param name="FlashVars" value="gamesessid={GSID}&gid={GID}" />
         <embed src="games/{SWF_GAME}" menu="false" type="application/x-shockwave-flash" FlashVars="gamesessid={GSID}&gid={GID}" width="{GAME_WIDTH}" height="{GAME_HEIGHT}" pluginspage="http://www.macromedia.com/go/getflashplayer">
		 </embed>
      </object>
<!-- END game_type_V2 -->
<!-- BEGIN no_fav -->
<br /><br /><span class="gensmall"><font color="FF0000"><b>{no_fav.ADD_FAV}</b></font></span>
<!-- END no_fav -->
				</td>
				<td align="left" valign="top">
				<!-- BEGIN avatar_best_player_right -->
	               <table width="100%" class="bodyline" cellpadding="2" cellspacing="1"> 
    	           <tr> 
        	          <td class="row2" align="center" colspan="3"><span class="cattitle">{L_ACTUAL_WINNER}</span></td> 
            	   </tr> 
               		<tr> 
                  		<td class="row1" align="center" colspan="3">{FIRST_AVATAR}</td> 
	               </tr> 
    	           <tr> 
        	          <td class="row1" align="center" colspan="3"><span class="genmed"><b>{BEST_USER_NAME}</b></span></td> 
            	   </tr>
				    <tr>
                  <td align="center" colspan="3">{MODOADMINRECORD}</td>
                </tr> 
<tr> 
                  <td class="row1" align="center" colspan="3"><span class="genmed">{COMMENTS}</span></td> 
               </tr> 
               	</table>
				<table><tr><td></td></tr></table> 
				<!-- END avatar_best_player_right -->

					<table width="100%" class="bodyline" cellpadding="2" cellspacing="1" >
					<tr>
						<td class="row2" align="center" colspan="3"><span class="cattitle">{L_TOP}</span></td>
					</tr>
  <!-- BEGIN scorerow -->
					<tr>
					<td class="row1" align="center"><span class="gensmall">{scorerow.POS}</span></td>
					<td class="row1" align="center">
						    <table width="100%" cellspacing="0" cellpadding="0">
							<tr>
							 <td align=center><span class="gensmall">{scorerow.USERNAME}</span></td>
							 <td width="25" align="center">{scorerow.URL_STATS}</td>
							</tr>
							</table>
					</td>
					<td class="row1" align="center"><span class='gensmall'>{scorerow.SCORE}</span></td>
					</tr>
  <!-- END scorerow -->
					</table>
				</td>
			</tr>
		</table>
	 </td>
 </tr>
</table>
<!-- BEGIN use_arcade_vote -->
<br />
{ARCADE_VOTE}
<!-- END use_arcade_vote -->
{WHOISPLAYING}
  <table width="100%" cellpadding="5" cellspacing="1" border="0">
   <tr>
	<td align="center">[{URL_ARCADE}] - [{URL_BESTSCORES}] - [{URL_SCOREBOARD}] - [ {MANAGE_COMMENTS}] - [<span class="cattitle"> {URL_STATS}</span>]</td>
   </tr>
  </table>
  
