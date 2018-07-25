<!-- BEGIN quick_reply -->
<script language='JavaScript'><!--
	function openAllSmiles(){
		smiles = window.open('{U_MORE_SMILIES}', '_phpbbsmilies', 'HEIGHT=300,resizable=yes,scrollbars=yes,WIDTH=250');
		smiles.focus();
		return false;
	}

        function quoteSelection() {
		
		theSelection = false;
		if (navigator.appName=="Netscape") theSelection = document.getSelection();
		else if (navigator.appName=="Microsoft Internet Explorer")
		theSelection = document.selection.createRange().text; // Get text selection

		if (theSelection) {
			// Add tags around selection
			emoticon('[quote]' + theSelection + '[/quote]');
			document.post.message.focus();
			theSelection = '';
			return;
		}else{
			alert('{L_NO_TEXT_SELECTED}');
		}
	}

        function storeCaret(textEl) {
                if (textEl.createTextRange) textEl.caretPos = document.selection.createRange().duplicate();
        }

        function emoticon(text) {
		var txtarea = document.post.message;
		text = ' ' + text + ' ';
		if (txtarea.createTextRange && txtarea.caretPos) {
			var caretPos = txtarea.caretPos;
			caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? caretPos.text + text + ' ' : caretPos.text + text;
			txtarea.focus();
		} else
		if (txtarea.selectionEnd && (txtarea.selectionStart | txtarea.selectionStart == 0))
		{ 
			mozInsert(txtarea, text, "");
			return;
		} else {
			txtarea.value  += text;
			txtarea.focus();
		}
        }

	function checkForm() {
		formErrors = false;
		if (document.post.message.value.length < 2) {
			formErrors = '{L_EMPTY_MESSAGE}';
		}
		if (formErrors) {
			alert(formErrors);
			return false;
		} else {
			if (document.post.quick_quote.checked) {
				document.post.message.value = document.post.last_msg.value + document.post.message.value;
			} 
			document.post.quick_quote.checked = false;
			return true;
		}
	}

	function mozInsert(txtarea, openTag, closeTag)
	{
	        if (txtarea.selectionEnd > txtarea.value.length) { txtarea.selectionEnd = txtarea.value.length; } 
	       
	        var startPos = txtarea.selectionStart; 
	        var endPos = txtarea.selectionEnd+openTag.length; 
	       
	        txtarea.value=txtarea.value.slice(0,startPos)+openTag+txtarea.value.slice(startPos); 
	        txtarea.value=txtarea.value.slice(0,endPos)+closeTag+txtarea.value.slice(endPos); 
	         
	        txtarea.selectionStart = startPos+openTag.length; 
	        txtarea.selectionEnd = endPos; 
	        txtarea.focus(); 
	}
//-->
</script>
<form action="{quick_reply.POST_ACTION}" method="post" name="post" onsubmit="return checkForm(this)">
  <input type="hidden" name="sid" value="{quick_reply.SID}">
	<table class="forumline" width="100%" cellspacing="1" cellpadding="3" border="0">
	  <tr>
		<th class="thLeft" colspan="2" height="25">{L_QUICK_REPLY}</th>
	  </tr>
	  <!-- BEGIN user_logged_out -->
	  <tr>
		<td class="row2" align="left"><span class="gen"><b>{L_USERNAME}:</b></span></td>
		<td class="row2" width="100%"><span class="genmed"><input type="text" class="post" tabindex="1" name="username" size="25" maxlength="25" value="" /></span></td>
	  </tr>
	  <!-- END user_logged_out -->
	  <tr>
		<td class="row1" valign="top" align="center" width="40%">
		<table width="40%" border="0" cellspacing="0" cellpadding="5">
		  <tr align="center"> 
			<td colspan="{S_SMILIES_COLSPAN}" class="gensmall"><b>{L_EMOTICONS}</b></td>
		  </tr>
		  <tr align="center" valign="middle"> 
			<td>
			<!-- BEGIN smilies -->
			<img src="{quick_reply.smilies.URL}" border="0" onmouseover="this.style.cursor='hand';" onclick="emoticon(' {quick_reply.smilies.CODE} ');" alt="{quick_reply.smilies.DESC}" title="{quick_reply.smilies.DESC}" />
			<!-- END smilies -->
			<br /><input type="button" class="liteoption" name="SmilesButt" value="{L_ALL_SMILIES}" onclick="openAllSmiles();">
			</td>
		  </tr>
		</table>
		</td>
		<td class="row1" align="center"><table width="60%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  	<td colspan="2"><textarea name="message" rows="10" cols="80" wrap="virtual" tabindex="3" class="post" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);"></textarea></td>
		  </tr>
		  <tr>
		  	<td><input type='checkbox' name='quick_quote'></td>
		  	<td><span class="gensmall">{L_QUOTE_LAST_MESSAGE}</span></td>
		  </tr>
		  <!-- BEGIN user_logged_in -->
		  <tr>
			<td><input type='checkbox' name='attach_sig' {quick_reply.user_logged_in.ATTACH_SIGNATURE}></td>
			<td><span class="gensmall">{L_ATTACH_SIGNATURE}</span></td>
		  </tr>
		  <tr>
			<td><input type='checkbox' name='notify' {quick_reply.user_logged_in.NOTIFY_ON_REPLY}></td>
			<td><span class="gensmall">{L_NOTIFY_ON_REPLY}</span></td>
		  </tr>
		  <!-- END user_logged_in -->
		</table></td>
	  </tr>
	  <tr>
		<td class="catBottom" align="center" height="28" colspan="2"> 
		<input type="hidden" name="mode" value="reply">
		<input type="hidden" name="t" value="{quick_reply.TOPIC_ID}">
		<input type='hidden' name='last_msg' value='{quick_reply.LAST_MESSAGE}'>
		<input type="submit" tabindex="4" name="post" class="mainoption" value="{L_SUBMIT}">
		<input type="submit" tabindex="5" name="preview" class="liteoption" value="{L_PREVIEW}">
		<input type="button" tabindex="6" name="quoteselected" class="liteoption" value="{L_QUOTE_SELECTED}" onclick="javascript:quoteSelection()">
		</td>
	  </tr>
	</table>
</form>
</div>
<!-- END quick_reply -->
