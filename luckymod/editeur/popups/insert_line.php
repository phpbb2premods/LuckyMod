<html style='width:350px; Height: 140px;'>
<head>
<title>Rule</title>
<style> html, body, button, div, input, select, fieldset { font-family: MS Shell Dlg; font-size: 8pt; position: absolute; }; </style>
<SCRIPT defer>
function _CloseOnEsc() {
  if (event.keyCode == 27) { window.close(); return; }
}
window.onerror = HandleError
function HandleError(message, url, line) {
  var std = "An error has occurred in this dialog." + "\n\n"
  + "Error: " + line + "\n" + message;
  alert(std);
  window.close();
  return true;
}


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
//  if (insert) {
     var text = '<hr size="' +document.set.size.value+ '"'
  		  + ' align="' +document.set.alignment.value+ '"'
                  + ' color="' +background.style.backgroundColor + '"'
                  + ' width="' +document.set.width.value+document.set.eenheid.value+ '"'         
		  + ' ' +document.set.shade.value+ ' >';
     window.returnValue = text;
 // } else {
 //    ruleControl.item(0).size = document.set.size.value;
 //    ruleControl.item(0).align = document.set.alignment.value;
 //    ruleControl.item(0).color = background.style.backgroundColor;
 //    ruleControl.item(0).width = document.set.width.value + document.set.eenheid.value;
 //    if (document.set.shade.value == 'noshade'){
 //       ruleControl.item(0).noShade = true;
 //    } else {
 //       ruleControl.item(0).noShade = false;
 //    }
 //    window.returnValue = null;
 // }
  window.close();
}


</script>
</head>
<body style='background: threedface; color: windowtext; margin: 10px; BORDER-STYLE: none' ;' scroll=no>
<form method=post name=set>
  <fieldset id=fldLayout style="LEFT: 0.47em; WIDTH: 24.93em; TOP: 0.47em; HEIGHT: 8.84em"> 
  <div id=divFileName style="LEFT: 0.38em; WIDTH: 5em; TOP: 3.12em; HEIGHT: 1.21em">Height:</div>
  <SELECT style="LEFT: 58px; WIDTH: 68px; TOP: 29px" name="size">
    <option value=1>1 pt</option>
    <option selected value=2>2 pt</option>
    <option value=3>3 pt</option>
    <option value=4>4 pt</option>
    <option value=5>5 pt</option>
    <option value=6>6 pt</option>
    <option value=7>7 pt</option>
    <option value=8>8 pt</option>
    <option value=9>9 pt</option>
    <option value=10>10 pt</option>
  </SELECT>
  <div id=divFileName style="LEFT: 0.47em; WIDTH: 5em; TOP: 0.66em; HEIGHT: 1.21em">Width:</div>
  <div id=divFileName style="LEFT: 17.34em; WIDTH: 7em; TOP: 1.4em; HEIGHT: 1.21em"> 
    <input ID=width name=width value=100 size=6 style="LEFT: -127px; WIDTH: 30px; TOP: -11px; HEIGHT: 19px">
  </div>
  <div id=divFileName style='left: 12.50em; top: 0.66em; width: 5.0em; height: 1.2168em;'>Alignment</div>
  <div id=divFileName style='left: 17.00em; top: 0.50em; width: 7.0em; height: 1.2168em;'> 
    <select style="WIDTH: 68px" name=alignment>
      <option value="left">Left 
      <option value="center">Center 
      <option value="right">Right 
    </select>
  </div>
  <div id=divFileName style='left: 12.50em; top: 3.12em; width: 5.0em; height: 1.2168em;'>Color:</div>
  <DIV name=background id=background style="BORDER-RIGHT: thin outset; BORDER-TOP: thin outset; LEFT: 17.00em; BORDER-LEFT: thin outset; WIDTH: 6.52em; BORDER-BOTTOM: thin outset; TOP: 2.82em; HEIGHT: 1.85em" onclick=setColors(this);>Choisir</DIV>
  <SELECT name="eenheid" style="LEFT: 90px; TOP: 4px">
    <option value="">pt</option>
    <option selected value="%" >%</option>
  </SELECT>
  <br>
  <br>
  <br>
  <br>
  <HR style="LEFT: 0px; WIDTH: 253px; TOP: 4.81em; HEIGHT: 2px" SIZE=2>
  <div id=shade style="LEFT: 0.38em; WIDTH: 4.81em; TOP: 6.30em; HEIGHT: 1.21em">Shade:</div>
  <SELECT name="shade" style="LEFT: 59px; TOP: 64px"">
    <option value=shade "selected">Shade</option>
    <option value=noshade "selected">No shade</option>
  </SELECT>
  <input style='LEFT: 25.03em; WIDTH: 6em; TOP: 0.0em; HEIGHT: 2.2em' value=OK  type=button onClick='returnSelected()'>
  <input style='LEFT: 25.03em; WIDTH: 6em; TOP: 3.0em; HEIGHT: 2.2em' value=Cancel type=button onClick='window.close()'>
</form>
</body>
</html>


