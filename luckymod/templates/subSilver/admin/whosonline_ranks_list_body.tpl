
<h1>{L_RANKS_TITLE}</h1>

<p>{L_RANKS_TEXT}</p>
<form method="post" action="{S_RANKS_ACTION}"><table cellspacing="1" cellpadding="4" border="0" align="center" class="forumline">
	<tr>
		<th class="thCornerL">{L_RANK}</th>
		<th class="thTop">{L_COLOR}</th>
		<th class="thTop">{L_EDIT}</th>
		<th class="thCornerR">{L_DELETE}</th>
		<th class="thCornerR">{L_PRIORITY}</th>
	</tr>
	<!-- BEGIN ranks -->
	<tr>
		<td class="{ranks.ROW_CLASS}" align="center">{ranks.RANK}</td>
		<td class="{ranks.ROW_CLASS}" align="center">{ranks.RANK_COLOR}</td>
		<td class="{ranks.ROW_CLASS}" align="center"><a href="{ranks.U_RANK_EDIT}">{L_EDIT}</a></td>
		<td class="{ranks.ROW_CLASS}" align="center"><a href="{ranks.U_RANK_DELETE}">{L_DELETE}</a></td>
		<td class="{ranks.ROW_CLASS}" align="center"><span class="gen"><a href="{ranks.U_RANK_MOVE_UP}">{L_MOVE_UP}</a><br /><a href="{ranks.U_RANK_MOVE_DOWN}">{L_MOVE_DOWN}</a></span></td>
	</tr>
	<!-- END ranks -->			
	<tr>
		<td class="catBottom" align="center" colspan="6"><input type="submit" class="mainoption" name="add" value="{L_ADD_RANK}" /></td>
	</tr>
</table></form>
