
<h1>{L_ZR_TITLE}</h1>

<p>{L_ZR_EXPLAIN}</p>

<form action="" method="post">
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
	<tr>
		<th class="thHead" colspan="2">{L_GENERAL_TITLE}</th>
	</tr>
	<!-- BEGIN line -->
	<tr>
		<td class="row1" width="150">&nbsp;{line.L_ZR_NAME}</td>
		<td class="row2">&nbsp;
			<select name="{line.L_ZR_FORM_NAME}[]">
				<option value="-1" {line.VALUE_NONE}>{L_NONE}</option>
				<option value="0" {line.VALUE_MEMBER}>{L_MEMBER}</option>
				<option value="2" {line.VALUE_MODO}>{L_MODO}</option>
				<option value="1" {line.VALUE_ADMIN}>{L_ADMIN}</option>
			</select>
		</td>
	</tr>
	<!-- END line -->
	<tr>
		<td align="center" class="row1" colspan="2"><input type="submit" class="mainoption" name="submit_ZR" value="{L_SUBMIT}" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" class="liteoption" />
	</tr>
</table>
</form>