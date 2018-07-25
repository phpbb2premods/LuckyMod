<!-- BEGIN favrow -->
<tr>
	<td class="cat" colspan="6"><span class="cattitle">{FAV}</span></td>
</tr>
	  
	  <!-- BEGIN fav_row -->
	  <tr>
			<td class="row1" width="35">{favrow.fav_row.GAMEPICF}</td>
			
			<td class="row1" width="100" align="center"><span class='genmed'>{favrow.fav_row.GAMELINKF}</span><br /><span class='gensmall'>{favrow.fav_row.GAMESETF}</span>
			</td>
			
			<td class="row1" width="150" align="center" valign="center" >
				<span class='gen'>{favrow.fav_row.NORECORDF}
				<!-- BEGIN recordrow -->
				<b>{favrow.fav_row.HIGHSCOREF}</b></span><span class='gensmall'>   {favrow.fav_row.HIGHUSERF}<br/>{favrow.fav_row.DATEHIGHF}
				<!-- END recordrow -->
			 	</span>
			</td>
			
			<td class="row1" width="150" align="center" valign="center" >
				<span class='gen'>{favrow.fav_row.NOSCOREF}
				<!-- BEGIN yourrecordrow -->
				<b>{favrow.fav_row.YOURHIGHSCOREF}{favrow.fav_row.IMGFIRSTF}</b></span><span class='gensmall'><br/>{favrow.fav_row.YOURDATEHIGHF}
				<!-- END yourrecordrow -->
				</span>   
			</td>
			
			<td class="row1" align="center" valign="center">
				<table width="100%">
					<tr>
						 <td align="center">
							<span class="name">{favrow.fav_row.GAMEDESCF}<br />{favrow.fav_row.COUTF}<br />{favrow.fav_row.PRIZEF}</span>
						 </td>
						<td width="25">{favrow.fav_row.URL_SCOREBOARDF}</td>
					</tr>
				</table>
			  </td>
			  
		  
			 <td class="row1" align="center" valign="center">
			 {favrow.fav_row.DELFAVORI}
			 </td>
</tr>		 
<!-- END fav_row -->
<br>
<tr>
	<td class="cat" colspan="6" align="{LINKCAT_ALIGN}"><span class="gensmall"><a href="{U_FAVORIS}" class="nav">{L_FAVORIS}</a></span></td>
</tr>
<!-- END favrow -->
