<?php
include 'config.php';
if(isset($_GET['dir'])) {
	$dirParam = $_GET['dir'];

	if(strlen($dirParam) > 0) 
	{
		if(substr($dirParam,0,1)=='/') 
			$IMG_ROOT .= $dirParam;		
		else
			$IMG_ROOT = $dirParam;			
	}	
}

$refresh_dirs = false;
$clearUploads = false;
if(strrpos($IMG_ROOT, '/')!= strlen($IMG_ROOT)-1) 
	$IMG_ROOT .= '/';
function num_files($dir) {
	$total = 0;

	if(is_dir($dir)) 
	{
		$d = @dir($dir);

		while (false !== ($entry = $d->read())) 
		{
			if(substr($entry,0,1) != '.') {
				$total++;
			}
		}
		$d->close();
	}
	return $total;
}
function dirs($dir,$abs_path) {
	$d = dir($dir);
		$dirs = array();
		while (false !== ($entry = $d->read())) {
			if(is_dir($dir.'/'.$entry) && substr($entry,0,1) != '.') 
			{
				$path['path'] = $dir.'/'.$entry;
				$path['name'] = $entry;
				$dirs[$entry] = $path;
			}
		}
		$d->close();
	
		ksort($dirs);
		for($i=0; $i<count($dirs); $i++) 
		{
			$name = key($dirs);
			$current_dir = $abs_path.'/'.$dirs[$name]['name'];
			echo ", \"$current_dir\"\n";
			dirs($dirs[$name]['path'],$current_dir);
			next($dirs);
		}
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

function show_dir($path, $dir) 
{
	global $newPath, $BASE_DIR, $BASE_URL;
	$num_files = num_files($BASE_DIR.$path);
	$show_d = $dir;
	$show_d = substr($show_d,0,10);
	$show_d = strtolower($show_d);
	$show_d = str_replace( " ", "_", $show_d);
	if(strlen($dir) > 10){
	    $show_d = substr_replace($show_d, '...',strlen($show_d)-3,strlen($show_d));
	} 
?>
<td>
<table width="45" height="45" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <a href="javascript:;" onClick="javascript:catSelected('<? echo $dir; ?>','<? echo $path; ?>');"> 
    <td align="center" class="bordeOFF">
		<img name="id1" id="id1" class="imgOFF" src="img/folder.gif" width="50" height="50" border="0" alt="<? echo $dir; ?>" onClick="pviiClassNew(this,'imgON');" onMouseOver="pviiClassNew(this,'imgON');" onMouseOut="pviiClassNew(this,'imgOFF');">
	</td>
	<tr>
	<td class="tinyborder" align="center">
	   <font color="#ffffec" face="Arial" size="1"><b><? echo $show_d; ?></b></font>
	</td>
	</tr>
 </a>
  </tr>
</table>
</td>
<?	
}

function draw_no_results() 
{
?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" style="font-size:large;font-weight:bold;color:#CCCCCC;font-family: Helvetica, sans-serif;">No Folders Found</div></td>
  </tr>
</table>
<?	
}
function draw_no_dir() 
{
	global $BASE_DIR, $BASE_ROOT;
?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" style="font-size:small;font-weight:bold;color:#CC0000;font-family: Helvetica, sans-serif;">Configuration Problem: &quot;<? echo $BASE_DIR.$BASE_ROOT; ?>&quot; does not exist.</div></td>
  </tr>
</table>
<?	
}

function draw_table_header() 
{
	echo '<table border="0" cellpadding="0" cellspacing="2">';
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--

body {
   filter: progid:DXImageTransform.Microsoft.Gradient(gradientType=0,startColorStr=white,endColorStr=#666666);
   width : 100%;
   scrollbar-face-color:#ButtonFace;
   scrollbar-highlight-color:#cccccc;
   scrollbar-3dlight-color:#cccccc;
   scrollbar-darkshadow-color:#cccccc;
   scrollbar-shadow-color:#cccccc;
   scrollbar-arrow-color:#999999;
   scrollbar-track-color:ButtonFace;
}

.bordeOFF {
	height: 45px;
	border: 0px solid ButtonFace;
	vertical-align: top;
}

.imgON {
	border: 0px;
	padding: 10px 0px 0px 0px;
        filter: Chroma(Color = #000000)glow(color=#666666, Strength=4);
	cursor: hand; 	
}

.imgOFF {
	border: 0px;
    filter: alpha(opacity = 30);
    -moz-opacity: 0.3;	
}

body {
   filter: progid:DXImageTransform.Microsoft.Gradient(gradientType=0,startColorStr=white,endColorStr=#666666);
   width : 100%;
}

-->
</style>
<?
	$dirPath = eregi_replace($BASE_ROOT,'',$IMG_ROOT);
	$paths = explode('/', $dirPath);
	$upDirPath = '/';
	for($i=0; $i<count($paths)-2; $i++) 
	{
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
<script type="text/javascript" src="../../popups/popup.js"></script>
<script type="text/javascript" src="../../dialog.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function pviiClassNew(obj, new_style) { //v2.6 by PVII
  obj.className=new_style;
}

function catSelected(filename, source) {
	var topDoc   = window.top.document.forms[0];
	var Redirect = "smiles.php?dir="+source; //here the path to 
	topDoc.selectDir.value = filename;
	window.top.document.getElementById("smileManager").src = Redirect;	
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

function changeLoadingStatus(state) 
{
	var statusText = null;
	if(state == 'load') {
		statusText = 'Loading Images';	
	}
	else if(state == 'upload') {
		statusText = 'Uploading Files';
	}
	if(statusText != null) {
		var obj = MM_findObj('loadingStatus', window.top.document);
		//alert(obj.innerHTML);
		if (obj != null && obj.innerHTML != null)
			obj.innerHTML = statusText;
		MM_showHideLayers('loading','','show')		
	}
}
//-->
</script>
</head>
<body>
<?
$d = @dir($BASE_DIR.$IMG_ROOT);
if($d) {
	$images = array();
	$folders = array();
	while (false !== ($entry = $d->read())) {
		$img_file = $IMG_ROOT.$entry; 
		if(is_file($BASE_DIR.$img_file) && substr($entry,0,1) != '.') {
			$image_info = @getimagesize($BASE_DIR.$img_file);
			if(is_array($image_info)) {
				$file_details['file'] = $img_file;
				$file_details['img_info'] = $image_info;
				$file_details['size'] = filesize($BASE_DIR.$img_file);
				$images[$entry] = $file_details;
			}
		}
		else if(is_dir($BASE_DIR.$img_file) && substr($entry,0,1) != '.') {
			$folders[$entry] = $img_file;
		}
	}
	$d->close();	
	if(count($folders) > 0) {	
		ksort($folders);
		draw_table_header();
		for($i=0; $i<count($folders); $i++) {
			$folder_name = key($folders);		
			show_dir($folders[$folder_name], $folder_name);
			next($folders);
		}
		draw_table_footer();
	}
	else{
		draw_no_results();
	}
}
else{
	draw_no_dir();
}
if (count($folders) > 0){
	reset($folders);
	ksort($folders);
	$folder_name = key($folders);
	$source_ =$folders[$folder_name]
	?>
	<script language="JavaScript" type="text/JavaScript">
	    var topDoc   = window.top.document.forms[0];
	    var Redirect = "smiles.php?dir="+"<? echo $source_ ?>";
	    topDoc.selectDir.value = "<? echo $folder_name ?>";
	    window.top.document.getElementById("smileManager").src = Redirect;
	</script>
	<?
}
?>
</table>
</html>