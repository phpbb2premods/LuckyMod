<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline" >
      <tr>
         <{PORTAL_CLASS_BALISE} class="{PORTAL_CLASS_TITLE}" height="25" colspan="5">
         <span class="genmed"><b>Championnat Arcade</b></span></{PORTAL_CLASS_BALISE}>
     </tr>
     <tr>
     <td class="row1" align="center" height="20" width="30%" colspan="5">
                <p align="center"><span class="gensmall">{CAT_TITLE}</span></td>
     </tr>
     <tr>
     <td class="row2" align="center" height="20" width="30%" colspan="5">
                <p align="center"><span class="gensmall">{CAGNOTTE}</span></td>
     </tr>
     <tr>
     <td class="row1" align="center" height="20" width="30%" colspan="5">
                <p align="center"><span class="gensmall">{TPS_RESTANT}</span></td>
     </tr>
<!-- BEGIN championnat_use -->
     	  <tr>
		<td class="row2" align="center" height="20" width="10%">
                  <p align="center"><span class="gen">Place</span></td>
                <td class="row2" align="center" height="20" width="15%">
                  <p align="center"><span class="gen">Taux</span></td>
                <td class="row2" align="center" height="20" width="20%">
                  <p align="center"><span class="gen">Cagnotte</span></td>
		<td class="row2" align="center" height="20" width="40%">
                  <p align="center"><span class="gen">Pseudo</span></td>
		<td class="row2" align="center" height="20" width="15%">
                  <p align="center"><span class="gen">Points</span></td>
  	  </tr>
<!-- END championnat_use -->
<!-- BEGIN championnat_row -->
         <tr>
         <td class="{championnat_row.CLASS}" align="center" height="20" width="10%" class="gen">
         <span class="gensmall">{championnat_row.CHAMPIONNAT_PLACE}</span>
         </td>
         <td class="{championnat_row.CLASS}" align="center" height="20" width="15%" class="gen">
         <span class="gensmall">{championnat_row.TAUX}%</span>
         </td>
         <td class="{championnat_row.CLASS}" align="center" height="20" width="20%" class="gen">
         <span class="gensmall">{championnat_row.PCAGNOTTE}</span>
         </td>
         <td class="{championnat_row.CLASS}" align="center" height="20" width="40%" class="gen">
         <span class="gensmall">{championnat_row.CHAMPIONNAT_USER}</span>
         </td>
             <td class="{championnat_row.CLASS}" align="center" height="20" width="15%" class="gen">
         <span class="gensmall">{championnat_row.CHAMPIONNAT_VICTORY}</span></td>
         </tr>
<!-- END championnat_row -->
</table>