<?
include 'config.php';
?>
<script type="text/javascript" src="../../popups/popup.js"></script>
<script type="text/javascript" src="../../dialog.js"></script>
<script type="text/javascript">
function onCancel() {
  __dlg_close(null);
  return false;
};

function onSelect(imgUrl){
   var param = new Object();
   //var el = MM_findObj("imgUrl");
   param["imgUrl"] = "<? echo 'http://'.$_SERVER['SERVER_NAME']; ?>" + imgUrl;
   __dlg_close(param);
   return false;
};
</script>
<?
if(isset($_GET['dir'])) {
	$dirParam = $_GET['dir'];
	if(strlen($dirParam) > 0) {
		if(substr($dirParam,0,1)=='/'){ 
			$IMG_ROOT .= $dirParam;
		} else {
			$IMG_ROOT = $dirParam;
		}			
	}	
}

$refresh_dirs = false;
$clearUploads = false;
if(strrpos($IMG_ROOT, '/')!= strlen($IMG_ROOT)-1) 
	$IMG_ROOT .= '/';
	
function num_files($dir) {
	$total = 0;
	if(is_dir($dir)) {
		$d = @dir($dir);
		while (false !== ($entry = $d->read())) {
			//echo $entry."<br>";
			if(substr($entry,0,1) != '.') {
				$total++;
			}
		}
		$d->close();
	}
	return $total;
}

function parse_size($size) {
	if($size < 1024) 
		return $size.' btyes';	
	else if($size >= 1024 && $size < 1024*1024) 
	{
		return sprintf('%01.2f',$size/1024.0).' Kb';	
	}
	else
	{
		return sprintf('%01.2f',$size/(1024.0*1024)).' Mb';	
	}
}

function show_image($img, $file, $info, $size) {
	global $BASE_DIR, $BASE_URL, $newPath;

	$img_path = dir_name($img);
	$img_file = basename($img);
	$img_url = $BASE_URL.$img_path.'/'.$img_file;
	$filesize = parse_size($size);
?>
    <a href="javascript:" onClick="javascript:onSelect('<? echo $img_url; ?>');" onMouseOver="javascript:imagePreview('<? echo $img_url; ?>','<? echo $file; ?>',<? echo $info[0];?>, <? echo $info[1]; ?>);" onMouseOut="javascript:imagePreviewOUT();">
    <td valign="center" valign="middle" align="center" class="imgBorder" onMouseOver="pviiClassNew(this,'imgBorderHover')" onMouseOut="pviiClassNew(this,'imgBorder')">
	<img src="<? echo $img_url; ?>" alt="<? echo $file.' - '.$info[0].'x'.$info[1].'px'; ?> - <? echo $filesize; ?>" border="0">
    </td>	
    </a>
<?
}

function draw_no_results(){
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><br><br>
	 <div align="center" style="filter:dropshadow(color=#000000,offx=1, offy=1, positive=1)glow(color=#000000, strength=0);font-size:large;font-weight:bold;color:#CCCCCC;font-family: Helvetica, sans-serif;">No Images Found</div>
	 <br><? echo $dir; ?>
	</td>
  </tr>
</table>
<?	
}

function draw_no_dir() 
{
	global $BASE_DIR, $BASE_ROOT;
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" style="filter:dropshadow(color=#000000,offx=1, offy=1, positive=1), glow(color=#000000, strength=0) ;font-size:small;font-weight:bold;color:#CC0000;font-family: Helvetica, sans-serif;">Configuration Problem: &quot;<? echo $BASE_DIR.$BASE_ROOT; ?>&quot; does not exist.</div></td>
  </tr>
</table>
<?	
}


function draw_table_header() 
{
	echo '<table border="0" cellpadding="0" cellspacing="0">';
	echo '<tr>';
}

function draw_table_footer() 
{
	echo '</tr>';
	echo '</table>';
}

?>
<html>
<head>
<title>Image Browser</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body {
   background : ButtonFace;
   width : 100%;
   scrollbar-face-color:#ButtonFace;
   scrollbar-highlight-color:#cccccc;
   scrollbar-3dlight-color:#cccccc;
   scrollbar-darkshadow-color:#cccccc;
   scrollbar-shadow-color:#cccccc;
   scrollbar-arrow-color:#999999;
   scrollbar-track-color:ButtonFace;
}

.loadmsg {
   filter: progid:DXImageTransform.Microsoft.dropShadow( Color=666666,offX=6,offY=7,positive=true)alpha(opacity = 40);
   -moz-opacity: 0.4;
}
.imgBorder {
	border: 1px solid ButtonFace;
	vertical-align: middle;
}
.imgBorderHover {
	border: 1px solid #cccccc;
	vertical-align: middle;
	background: ButtonHighlight;
	cursor: hand;
	z-index:1;
}

.imgCaption {
	font-size: 9pt;
	font-family: "MS Shell Dlg", Helvetica, sans-serif;
	text-align: center;
}
.dirField {
	font-size: 9pt;
	font-family: "MS Shell Dlg", Helvetica, sans-serif;
	width:110px;
}
</style>
<?
	$dirPath = eregi_replace($BASE_ROOT,'',$IMG_ROOT);
	$paths = explode('/', $dirPath);
	$upDirPath = '/';
	for($i=0; $i<count($paths)-2; $i++) {
		$path = $paths[$i];
		if(strlen($path) > 0) 
		{
			$upDirPath .= $path.'/';
		}
	}

	$slashIndex = strlen($dirPath);
	$newPath = $dirPath;
	if($slashIndex > 1 && substr($dirPath, $slashIndex-1, $slashIndex) == '/')
	{
		$newPath = substr($dirPath, 0,$slashIndex-1);
	}
?>
<script type="text/javascript" src="../popup.js"></script>
<script type="text/javascript" src="../../dialog.js"></script>
<script language="JavaScript" type="text/JavaScript">

function pviiClassNew(obj, new_style) { //v2.6 by PVII
  obj.className=new_style;
}

function imagePreviewOUT(){
	var topDoc = window.top.document.forms[0];
	var imgOut = "img/imgpreview.gif";
	topDoc.prevName.value = "Nothing";
	window.top.document.getElementById("prevUrl").src = imgOut;
}

function imagePreview(filename, name, width, height){
	var topDoc = window.top.document.forms[0];
	topDoc.prevName.value = name;
	window.top.document.getElementById("prevUrl").width = 95;
	window.top.document.getElementById("prevUrl").height = 76;
	window.top.document.getElementById("prevUrl").src = filename;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i],window.top.document))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

function changeLoadingStatus(state) {
	if(state != null) {
		var obj = MM_findObj('loadingStatus', window.top.document);
		if (obj != null && obj.innerHTML != null)
			obj.innerHTML = state;
	}
}

</script>
</head>
<body>
<script language="JavaScript" type="text/JavaScript">
    MM_showHideLayers('loading','','show')
</script>
<?
$d = @dir($BASE_DIR.$IMG_ROOT);
if($d) {
	$images = array();
	$imagescount = 0;
	while (false !== ($entry = $d->read())) {
		$img_file = $IMG_ROOT.$entry; 
		if(is_file($BASE_DIR.$img_file) && substr($entry,0,1) != '.') {
			$image_info = @getimagesize($BASE_DIR.$img_file);
			if(is_array($image_info)) {
				$file_details['file'] = $img_file;
				$file_details['img_info'] = $image_info;
				$file_details['size'] = filesize($BASE_DIR.$img_file);
				$images[$entry] = $file_details;
				$imagescount++;
			}
		} else if(is_dir($BASE_DIR.$img_file) && substr($entry,0,1) != '.') {
			$folders[$entry] = $img_file;	
		}
	}
	$d->close();		
	if(count($images) > 0) {	
		ksort($images);
		draw_table_header();
		$widthCount = 0;
		$porcentaje= 0;
		$total=count($images);
		echo "<table>";
		for($i=0; $i<count($images); $i++){
			$image_name = key($images);
			$imgsize=$images[$image_name]['img_info'];
			$widthCount += $imgsize[1];
			$porcentaje = round(($i * 100)/$total);
			if( $widthCount > 250){
			    echo "</table><table>";
			    $widthCount=0;
			}
			show_image($images[$image_name]['file'], $image_name, $images[$image_name]['img_info'], $images[$image_name]['size']);
			next($images);
			?><script language="JavaScript" type="text/JavaScript">
    			   changeLoadingStatus('<font size="2" face="Arial" color="#0000FF"><b><? echo $porcentaje; ?> %</b></font>');
			</script><?			
		}
		echo "</table>";
		draw_table_footer();
		?>
		 <script language="JavaScript" type="text/JavaScript">
		     var topDoc   = window.top.document.forms[0];
		     var find = " "+<? echo $imagescount; ?>+" smiles.";
		     topDoc.selectDir.value += find;
		 </script>
		<?
	} else {
		draw_no_results();
	}
} else {
	draw_no_dir();
}
?>
<script language="JavaScript" type="text/JavaScript">
    MM_showHideLayers('loading','','hide')
</script>
</body>
</html>
