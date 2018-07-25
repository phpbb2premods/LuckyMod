<h1>{L_RANKS_TITLE}</h1>

<p>{L_RANKS_TEXT}</p>

<form action="{S_RANK_ACTION}" method="post" name="poster"><table class="forumline" cellpadding="4" cellspacing="1" border="0" align="center">
	<tr>
		<th class="thTop" colspan="2">{L_RANKS_TITLE}</th>
	</tr>
	<tr>
		<td class="row1" width="38%"><span class="gen">{L_RANK_TITLE}:</span></td>
		<td class="row2"><input class="post" type="text" name="rank_name" size="35" maxlength="40" value="{RANK}" /></td>
	</tr>
	<tr>
		<td class="row1" width="38%"><span class="gen">{L_USE_LANG_KEY}:</span><br /><span class="gensmall">{L_USE_LANG_KEY_EXPLAIN}</span></td>
		<td class="row2"><input type="radio" name="lang_key" value="1" {S_LANG_KEY_YES} /> {L_YES}&nbsp;&nbsp;<input type="radio" name="lang_key" value="0" {S_LANG_KEY_NO} /> {L_NO}
		</td>
	</tr>
	<tr>
		<td class="row1" width="38%"><span class="gen">{L_RANK_COLOR}:</span><br /><span class="gensmall">{L_USE_COLOR_EXPLAIN}</span></td>
		<td class="row2">
		<select name="select_color" onchange="document.poster.rank_color.value=document.poster.select_color.value">
			<option selected>{L_RANK_COLOR} :</option>
			<option style="color:darkred" value="darkred" class="genmed">{L_COLOR_DARK_RED}</option>
			<option style="color:red" value="red" class="genmed">{L_COLOR_RED}</option>
			<option style="color:orange" value="orange" class="genmed">{L_COLOR_ORANGE}</option>
			<option style="color:brown" value="brown" class="genmed">{L_COLOR_BROWN}</option>
			<option style="color:yellow" value="yellow" class="genmed">{L_COLOR_YELLOW}</option>
			<option style="color:green" value="green" class="genmed">{L_COLOR_GREEN}</option>
			<option style="color:olive" value="olive" class="genmed">{L_COLOR_OLIVE}</option>
			<option style="color:cyan" value="cyan" class="genmed">{L_COLOR_CYAN}</option>
			<option style="color:blue" value="blue" class="genmed">{L_COLOR_BLUE}</option>
			<option style="color:darkblue" value="darkblue" class="genmed">{L_COLOR_DARK_BLUE}</option>
			<option style="color:indigo" value="indigo" class="genmed">{L_COLOR_INDIGO}</option>
			<option style="color:violet" value="violet" class="genmed">{L_COLOR_VIOLET}</option>
			<option style="color:white" value="white" class="genmed">{L_COLOR_WHITE}</option>
			<option style="color:black" value="black" class="genmed">{L_COLOR_BLACK}</option>
		</select>
		 &nbsp;<input class="post" type="text" name="rank_color" size="10" maxlength="9" value="{RANK_COLOR}" /></td>
	</tr>
	<tr>
		<td class="catBottom" colspan="2" align="center"><input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="liteoption" /></td>
	</tr>
</table>
{S_HIDDEN_FIELDS}</form>
