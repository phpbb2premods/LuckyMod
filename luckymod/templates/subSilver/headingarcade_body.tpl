<script language="JavaScript">
function resize_avatar(image)
{
  if ({MAXSIZE_AVATAR}>0)
  {
	if (image.width > {MAXSIZE_AVATAR} ) image.width={MAXSIZE_AVATAR} ;
  }
}
</script>
 <table width="100%" cellpadding="2" cellspacing="3" border="0">

    <tr>
	<td width="100%">
	  <table width="100%" cellpadding="2" cellspacing="1" border="0" class="bodyline">
	  <tr>
	    <td class="cat" width="25%">            <p align="center"><span class="cattitle">Top 10</span></p>
</td>
	    <td class="cat" width="60%">            <p align="center"><span class="cattitle">Infos</span></p>
</td>
	    <td class="cat" width="15%">            <p align="center"><span class="cattitle">Bienvenue</span></p>
</td>
	  </tr>

	  <tr>
	    <td class="row1" width="25%" rowspan="2" height="93">
<table width="100%" cellpadding="0" cellspacing="1" border="0" class="forumline" align="center">
		   <tr>
		    <td class="rowpic" align="center" width="25%">
                                    <p align="center"><span class="gensmall">#</span></td>
			<td class="rowpic" align="center" width="50%">
                                    <p align="center"><span class="gensmall">Pseudo</span></td>
			<td class="rowpic" align="center" width="25%">
                                    <p align="center"><span class="gensmall">Victoires</span></td>
                    
		   </tr>
   		   <!-- BEGIN player_row -->
		   <tr>
			<td class="row2" align="center" height="2" width="25%" class="gensmall">
			<p align="center"><span class="gensmall">{player_row.CLASSEMENT}</span>
			</td>
		    <td class="row1" align="center" height="2" class="gensmall" width="50%">
			<p align="center"><span class="gensmall">{player_row.USERNAME}</span>
  		    </td>
			<td class="row2" height="2" align="center" width="25%">
			<p align="center"><span class="gensmall">{player_row.VICTOIRES}</span>
			</td>
                   
		   </tr>
   		   <!-- END player_row -->
		  </table>

</td>
	    <td class="row1" align="center" height="20%">




 <table width="99%" cellpadding="2" cellspacing="3" border="0">

    <tr>
	<td width="99%">
	  <table width="99%" cellpadding="2" cellspacing="1" border="0" class="bodyline">
	  <tr>
	    <td class="cat" width="722">            <p align="center"><span class="cattitle">Les derniers 
                        records</span></p>
</td>
	  </tr>

	  <tr>
	    <td class="row1" width="722" height="44">
 <table width="100%" cellpadding="0" cellspacing="1" border="0" class="">
	    <!-- BEGIN arcaderow2 -->
              <TBODY>
              <TR>
                <TD vAlign=top  width="100%">
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
		    <!-- BEGIN bestscore2 -->
                    <TR>
                      <TD class="{arcaderow2.bestscore2.CLASS}"  align=left 
                        width="85%" valign="top">                        <p>&nbsp;<SPAN class=smallfont>• </SPAN><span class="gensmall">{arcaderow2.bestscore2.LAST_SCOREUSER} est devenu champion de {arcaderow2.bestscore2.LAST_SCOREGAME}</span></p>
 </TD>
                      <TD class="{arcaderow2.bestscore2.CLASS}"  noWrap align=right 
                      width="15%" valign="top">                        <p><span class="gensmall">{arcaderow2.bestscore2.LAST_SCOREDATE}</span><FONT 
                                size=1> </FONT></p>

		      </TD>
		     </TR>
		 <!-- END bestscore2 --> 
		 </TBODY>
	   </TABLE>
		</TD>
	</TR>
</TBODY>
  <!-- END arcaderow2 --> 
</TABLE>
                    
</td>
	  </tr>
	  </table>
	</TD>  
	</tr>

    </table>	</td>
	<td class="row1" align="center" valign="center" width="15%" rowspan="2" height="93">
<p align="center"><span class="cattitle">{USERNAME}<br />{POSTER_RANK}<br></span><span class="text">{AVATAR_IMG}</span><br /><span class="gensmall">Vous avez {ARCADE_VICTOIRES} <img scr="images/couronne.gif" src="images/couronne.gif"></span></p>	  </td>
	  </tr>
	  <tr>
	    <td class="row1" width="60%" height="80%" align="center">
 
 <TABLE cellSpacing=0 cellPadding=0 width="100%" vAlign=top align=center border=0>
		<tr>
	<td>
	</td>
		</tr>
  <!-- BEGIN arcaderow3 -->
              <TBODY>
              <TR>
                <TD vAlign=top  width="100%" valign="top">
                  <TABLE vAlign=top cellSpacing=1 cellPadding=2 width="100%" border=0>
                    <TBODY>
		    <!-- BEGIN score3 -->
                    <TR>
                      <TD class=alt1 vAlign=top align=left 
                        width="85%">                        <p><span class="gensmall"><SPAN class=smallfont>• </SPAN><span class="gensmall">{arcaderow3.score3.LAST_SCOREUSER} a renouvelé son score ({arcaderow3.score3.LAST_SCORE}) à {arcaderow3.score3.LAST_SCOREGAME}</span></span></p>
 </TD>
                      <TD class=alt1 vAlign="top" noWrap align=right 
                      width="15%">                        <p><span class="gensmall">{arcaderow3.score3.LAST_SCOREDATE}</span><FONT 
                                size=1> </FONT></p>

		      </TD>
		     </TR>
		 <!-- END score3 --> 
		 </TBODY>
	   </TABLE>
		</TD>
	</TR>
</TBODY>
  <!-- END arcaderow3 --> 
</TABLE>



		</td>
	  </tr>

	  </table>
	</TD>  
	</tr>

    </table>