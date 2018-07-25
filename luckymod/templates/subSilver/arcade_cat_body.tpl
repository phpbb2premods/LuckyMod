 <!-- affichage de la phrase d'index -->
  <table width="100%" cellspacing="2" cellpadding="2" border="0">
    <tr>
	  <td align="left" valign="middle" width="100%">
		<span class="nav">
			<a href="{U_INDEX}" class="nav">{L_INDEX}</a>
		</span>
		<span class="nav">> Arcade</span>
	  </td>
    </tr>
  </table>
  {HEADINGARCADE}
<br />
{TOPSTATARCADE}
<br />
{CHAMPIONNATARCADE}
<br />
{CHAMPIONNATEQUIPE}
<br />
<table width="100%" cellpadding="2" cellspacing="3" border="0">
	<tr>
	<td width="100%">
		<table width="100%" cellpadding="2" cellspacing="1" border="0" class="bodyline">
		{ARCADE_FAVORIS}
		</table>
	</td></tr>
	</table>
  <table width="100%" cellpadding="2" cellspacing="3" border="0">
<!-- BEGIN cat_row -->
    <tr>
	<td>
	  <table width="100%" cellpadding="2" cellspacing="1" border="0" class="bodyline">
	  <tr>
	    <td class="cat" colspan="{ARCADE_COL}"><span class="cattitle">{cat_row.CATTITLE}</span></td>
	  </tr>
<!-- BEGIN game_row -->
	  <tr>
	    <td class="row1" width="35">{cat_row.game_row.GAMEPIC}</td>
	    <td class="row1" width="100" align="center">
		<span class='genmed'>{cat_row.game_row.GAMELINK}</span><br />
		<span class='gensmall'>{cat_row.game_row.GAMESET}</span>
		</td>
	<td class="row1" width="150" align="center" valign="center" >
		<span class='gen'>
		{cat_row.game_row.NORECORD}
	  <!-- BEGIN recordrow -->
	<b>{cat_row.game_row.HIGHSCORE}</b></span><span class='gensmall'>  {cat_row.game_row.HIGHUSER}<br/>{cat_row.game_row.DATEHIGH}
	   <!-- END recordrow -->
	    </span>
	   
	</td>
	<td class="row1" width="150" align="center" valign="center" >
	<span class='gen'>
		{cat_row.game_row.NOSCORE}
	  <!-- BEGIN yourrecordrow -->
	<b>{cat_row.game_row.YOURHIGHSCORE}{cat_row.game_row.IMGFIRST}</b></span><span class='gensmall'><br/>{cat_row.game_row.YOURDATEHIGH}
	   <!-- END yourrecordrow -->
	    </span>   
	</td>
	<td class="row1" align="center" valign="center">
		<table width="100%">
		<tr>
		 <td align="center">
		<span class="name">{cat_row.game_row.GAMEDESC}</span>
		 </td>
<td width="15%" align="center">{cat_row.game_row.URL_SCOREBOARD}</td>
     <td width="10%" align="center" valign="center">
<!-- BEGIN no_fav -->
{cat_row.game_row.no_fav.DELFAVORI}
<!-- END no_fav -->
<!-- BEGIN fav -->
{cat_row.game_row.fav.ADD_FAV}
<!-- END fav -->
</span>
      </td>
	    </tr>
		</table>
	  </td>
	  </tr>
<!-- END game_row -->
	  <tr>
	    <td class="row2" colspan="{ARCADE_COL}" align="{cat_row.LINKCAT_ALIGN}"><span class="gensmall"><a href="{cat_row.U_ARCADE}">{cat_row.L_ARCADE}</a></span></td>
	  </tr>
	  </table>
	</TD>  
	</tr>
<!-- END cat_row -->
    </table>
{WHOISPLAYING}
  <table width="100%" cellpadding="5" cellspacing="1" border="0">
   <tr>
	<td align="center">[ {URL_ARCADE}] - [ {URL_BESTSCORES}] - [ {MANAGE_COMMENTS}]</td>
   </tr>
  </table>
