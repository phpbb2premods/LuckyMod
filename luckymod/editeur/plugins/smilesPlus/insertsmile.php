<?
	include 'config.php';		
	$no_dir = false;
	if(!is_dir($BASE_DIR.$BASE_ROOT)) {
		$no_dir = true;
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html style="width: 500; height: 410">
<head>
<title>Insert/Inserte Emoticon</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../../popups/popup.js"></script>
<script type="text/javascript" src="../../dialog.js"></script>
<style type="text/css">
@import url(smilesplus.css);
</style>
<script type="text/javascript">
var preview_window = null;
function Init() {
  __dlg_init();
  var doc = MM_findObj("imgUrl");
  if(doc != null) {
  	doc.focus();
  }
};

function onCancel() {
  __dlg_close(null);
  return false;
};

</script>
<script language="JavaScript" type="text/JavaScript">
function pviiClassNew(obj, new_style) { //v2.6 by PVII
  obj.className=new_style;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function P7_Snap() { //v2.62 by PVII
  var x,y,ox,bx,oy,p,tx,a,b,k,d,da,e,el,args=P7_Snap.arguments;a=parseInt(a);
  for (k=0; k<(args.length-3); k+=4)
   if ((g=MM_findObj(args[k]))!=null) {
    el=eval(MM_findObj(args[k+1]));
    a=parseInt(args[k+2]);b=parseInt(args[k+3]);
    x=0;y=0;ox=0;oy=0;p="";tx=1;da="document.all['"+args[k]+"']";
    if(document.getElementById) {
     d="document.getElementsByName('"+args[k]+"')[0]";
     if(!eval(d)) {d="document.getElementById('"+args[k]+"')";if(!eval(d)) {d=da;}}
    }else if(document.all) {d=da;} 
    if (document.all || document.getElementById) {
     while (tx==1) {p+=".offsetParent";
      if(eval(d+p)) {x+=parseInt(eval(d+p+".offsetLeft"));y+=parseInt(eval(d+p+".offsetTop"));
      }else{tx=0;}}
     ox=parseInt(g.offsetLeft);oy=parseInt(g.offsetTop);var tw=x+ox+y+oy;
     if(tw==0 || (navigator.appVersion.indexOf("MSIE 4")>-1 && navigator.appVersion.indexOf("Mac")>-1)) {
      ox=0;oy=0;if(g.style.left){x=parseInt(g.style.left);y=parseInt(g.style.top);
      }else{var w1=parseInt(el.style.width);bx=(a<0)?-5-w1:-10;
      a=(Math.abs(a)<1000)?0:a;b=(Math.abs(b)<1000)?0:b;
      x=document.body.scrollLeft + event.clientX + bx;
      y=document.body.scrollTop + event.clientY;}}
   }else if (document.layers) {x=g.x;y=g.y;var q0=document.layers,dd="";
    for(var s=0;s<q0.length;s++) {dd='document.'+q0[s].name;
     if(eval(dd+'.document.'+args[k])) {x+=eval(dd+'.left');y+=eval(dd+'.top');break;}}}
   if(el) {e=(document.layers)?el:el.style;
   var xx=parseInt(x+ox+a),yy=parseInt(y+oy+b);
   if(navigator.appName=="Netscape" && parseInt(navigator.appVersion)>4){xx+="px";yy+="px";}
   if(navigator.appVersion.indexOf("MSIE 5")>-1 && navigator.appVersion.indexOf("Mac")>-1){
    xx+=parseInt(document.body.leftMargin);yy+=parseInt(document.body.topMargin);
    xx+="px";yy+="px";}e.left=xx;e.top=yy;}}
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

function changeLoadingStatus(state) {

	if(state != null) {
		var obj = MM_findObj('loadingStatus');
		if (obj != null && obj.innerHTML != null)
			obj.innerHTML = state;
	}
}
</script>
</head>
<body onload="Init();">
   <div class="title"><font class="shadowt">Insert Emoticon</font></div>
   <!-- Loading Box ,,, cuadro de carga-->
   <div class="loadmsg" id="loading" style="position:absolute; left:150px; top:140px; width:200px; height:80px; z-index:1">
   <table width="100%" height="100%" border="2" cellpadding="4" cellspacing="0">
   <td bgcolor="#ffffff">
   <center><font size="3" face="Arial" color="#800000"><b>Loading...</b></font><br>
   <span id="loadingStatus">
   <font size="2" face="Arial" color="#0000FF"><b>0 %</b></font>
   </span>
   </center>
   </td>
   </table>
   </div>   
   <!-- fin cuadro de carga,, end loading box -->
   <form action="smiles.php" name="form1" method="post" target="smileManager" enctype="multipart/form-data">
   <fieldset width="100%" align="center"><legend>Select Category</legend>
      <table bgcolor="ButtonFace" width="99%" align="center" border="0" cellspacing="2" cellpadding="2" height="121">
      <tr>
        <td align="center" bgcolor="ButtonFace" width="75%">
          <iframe src="folders.php" name="folderManager" id="folderManager" width="100%" height="100" marginwidth="0" marginheight="0" valign="top" align="center" scrolling="auto" frameborder="1" hspace="0" vspace="0" background="ButtonFace"></iframe>
           </td>
	    <td>
		<td width="25%" height="100%">
		   <table border="0" bordercolor="#111111" width="100%" cellpadding="0" cellspacing="0">
		      <tr>
    		  	<td width="100%">
			  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="100%">
  			  <tr>
    			  <td align="center" width="100%">
    			  <input type="text" id="prevName" name="prevName" value="Nothing" width="100%" style="font-family: Arial; font-size: 10px; color: #800000; font-weight: bold; border: 1px solid #999999; padding: 1; background-color: #CCCCCC;" disabled onChange="">			
			  </td>
  			  </tr>
			  </table>			  
			  </td>
  			  </tr>
  			  <tr>
    		  	  <td valign="top" align="center" width="100%" height="100%">
			  <span style="background-color:white;overflow:auto;width:100%;height:80px;border-width:1px; border-style: dotted;border-color: #999999";">
			  <IMG ID="prevUrl" NAME="prevUrl" src="img/imgpreview.gif" alt="Preview" border="0">
			  </span>
  			  </tr>
		   </table>
		</td>
		</td> 		  
            </tr>
	  </table>
	<table width="100%">
	<tr>
        <td width="100%">
            <fieldset><legend>Select Emoticon</legend>
              <table align="center" border="0" cellpadding="2" cellspacing="1" width="100%">
                <tr>
                  <td width="100%">
                  <iframe src="smiles.php" name="smileManager" id="smileManager" width="100%" height="161" marginwidth="0" marginheight="0" valign="top" align="center" scrolling="auto" frameborder="0" hspace="0" vspace="0" background="ButtonFace"></iframe>
                  </td>
                </tr>
              </table>          
          </fieldset>
         </td>
      </tr>      
      </table>
      <table width="100%" cellspacing="0" cellpadding="2" border="0">
       <tr><!-- Row 1 -->
        <td>
	   <b><font face="Arial">Selected : </font></b>
	   <input type="text" id="selectDir" name="catDirectory" value="Nothing" style="font-family: Arial; font-size: 12px; color: #800000; font-weight: bold; border: 1px solid ButtonFace; padding: 1; background-color: ButtonFace;" disabled onChange="">
	</td>
        <td>
	   <div style="text-align: right;"><button type="button" name="cancel" onclick="return onCancel();">Cancel</button></div>
	</td>
       </tr>
      </table>
   </fieldset>
  </form>
 </body>
</html>