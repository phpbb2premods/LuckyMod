<html style='width:425px; Height: 230px;'>
<head>
<title>Marquee Editor</title>
<style> html, body, button, div, input, select, fieldset { font-family: MS Shell Dlg; font-size: 8pt; position: absolute; }; </style>
<script language='javascript'>
document.title = "Marquee Editor";


function setColors (but) {
   but.style.borderStyle = 'inset';
   var color=showModalDialog('set_color.html',but.style.backgroundColor,'resizable:no;help:no;status:no;scroll:no;');
   if (color == '' || color == null){
     but.innerText = '';
     but.style.background = '';
   } else {
     but.innerText = ' #' + color.toUpperCase();
     but.style.background =  color;
   }
   but.style.borderStyle = 'outset';
   return;
}

function returnSelected() {
//<marquee width="100%" scrollamount="1" scrolldelay="2" bgcolor="#9dff2e" height="1"><font color="#931a00">123</font></marquee>
//<marquee width="100%" bgcolor="#ffe83e" height="1"><font color="#FF0000">reel</font></marquee> 
//<marquee width="100%" bgcolor="#27ffbf" height="1"><font color="#e80e00" ?="" 
	  var text = '<marquee' + ' direction="' +document.set.direction.value+ '"'
              + ' behavior="' +document.set.behavior.value+ '"'
              + ' bgcolor="' +background.style.backgroundColor+ '"'
  			  + 'scrollamount="' +document.set.scrollamount.value+ '"'
			  + ' scrolldelay="' +document.set.scrolldelay.value+ '"'
			  + ' width="' +document.set.width.value + document.set.widthExt.value+ '"'
              + ' height="' +document.set.height.value + document.set.heightExt.value+ '"'
			  +  '><font color=' +backgroundd.style.backgroundColor+'>'
			  
 	         		if (document.set.text.value != "") {
			text = text + ( document.set.text.value );
		}
		else {
		alert("Insérer un text"); return true;
			}
		
  	     	  text += '</marquee>\n';

	window.returnValue = text;
	window.close();
}



</script>
<SCRIPT defer>

function _CloseOnEsc() {
  if (event.keyCode == 27) { window.close(); return; }
}
 document.body.onkeypress = _CloseOnEsc;
 </SCRIPT>
</head>
<body style='background: threedface; color: windowtext; margin: 10px; BORDER-STYLE: none' ;' scroll=no>
<form method=post name=set>
  <fieldset id=fldLayout style='left: 0.50em; top: 0.5em; width: 31.5em; height: 16.4000em;'> 
  </fieldset> 
  <div id=divLabel style='left: 1.50em; top: 1.5em; width: 5.0em; height: 1.2168em;'>Direction</div>
  <div id=divLabel style='left: 7.00em; top: 1.4em; width: 7.0em; height: 1.2168em;'> 
    <select name=direction>
      <option value="">Left 
      <option value="right">Right 
    </select>
  </div>
  <div id=divLabel style='left: 17.00em; top: 1.5em; width: 5.0em; height: 1.2168em;'>Behavior</div>
  <div id=divLabel style='left: 23.40em; top: 1.4em; width: 7.0em; height: 1.2168em;'> 
    <select name=behavior>
      <option value="">Continuous 
      <option value="slide">Slide 
      <option value="alternate">Alternate 
    </select>
  </div>
  <div id=divLabel style='left: 1.50em; top: 4.1em; width: 5em; height: 1.2168em;'>Marquee</div>
  <input style='left: 7.00em; top: 3.8em; width: 23.80em; height: 2.0000em;' name=text type=text value="" size=30>
  <div id=divLabel style='left: 1.50em; top: 6.6em; width: 5.0em; height: 1.2168em;'>Bgcolor:</div>
  <DIV name=background id=background style="BORDER-RIGHT: thin outset; BORDER-TOP: thin outset; LEFT: 7.00em; BORDER-LEFT: thin outset; WIDTH: 4.52em; BORDER-BOTTOM: thin outset; TOP: 6.4em; HEIGHT: 1.85em" onclick=setColors(this);>BgColor</DIV>
  <div id=divLabell style='left: 16.50em; top: 6.6em; width: 5.0em; height: 1.2168em;'>Textcolor:</div>
  <DIV name=backgroundd id=backgroundd style="BORDER-RIGHT: thin outset; BORDER-TOP: thin outset; LEFT:22.00em; BORDER-LEFT: thin outset; WIDTH: 4.52em; BORDER-BOTTOM: thin outset; TOP: 6.4em; HEIGHT: 1.85em" onclick=setColors(this);>TextColor</DIV>
  <div id=divLabel style='left: 1.50em; top: 9.1em; width: 10.0em; height: 1.2168em;'>Width:</div>
  <input type="text" name="width" value="100" style='left: 7.00em; top: 8.9em; width: 3.0em; height: 2.0000em;' maxlength=4>
  <div id=divLabel style='left: 10.5em; top: 9.0em; width: 7.0em; height: 1.2168em;'> 
    <select name="widthExt">
      <option value="">Pixels</option>
      <option value="%" selected>Percent</option>
    </select>
  </div>
  <div id=divLabel style='left: 17.00em; top: 9.1em; width: 10.0em; height: 1.2168em;'>Height:</div>
  <input type="text" name="height" value="" style='left: 21.0em; top: 8.9em; width: 3.0em; height: 2.0000em;' maxlength=4>
  <div id=divLabel style='left: 25.0em; top: 9.0em; width: 7.0em; height: 1.2168em;'> 
    <select name="heightExt">
      <option value="" selected>Pixels</option>
      <option value="%">Percent</option>
    </select>
  </div>
  <div id=divLabel style='left: 1.50em; top: 12.0em; width: 30.0em; height: 1.2168em;'> 
    <HR>
    Speed Control 
    <HR>
  </div>
  <div id=divLabel style='left: 10.80em; top: 13.3em; width: 10.0em; height: 1.2168em;'>Scroll 
    Amount:</div>
  <input type="text" name="scrollamount" value="" style='left: 18.00em; top: 13.1em; width: 3.0em; height: 2.0000em;' maxlength=4>
  <div id=divLabel style='left: 21.6em; top: 13.3em; width: 10.0em; height: 1.2168em;'>Scroll 
    Delay:</div>
  <input type="text" name="scrolldelay" value="" style='left: 27.80em; top: 13.1em; width: 3.0em; height: 2.0000em;' maxlength=4>
  <input style='left: 32.50em; top: 7.0em; width: 6em; height: 2.2000em;' value=OK  type=button onClick='returnSelected()'>
  <input style='left: 32.50em; top: 9.5em; width: 6em; height: 2.2000em;' value=Cancel type=button onClick='window.close()'>
</form>
</body>
</html>



