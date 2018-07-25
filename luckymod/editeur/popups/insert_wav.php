<!DOCTYPE HTML PUBLIC "-//W3C//DTD W3 HTML 3.2//EN">
<HTML id=imadmin STYLE="width: 400px; height: 350px;">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Insertion modules mp3/wav</TITLE>
<style>
  html, body, button, div, input, select, fieldset { font-family: MS Shell Dlg; font-size: 8pt; position: absolute; };
</style>
<script language='JavaScript'>
function annuler() {
window.close();
}
function wav_insert() {
	var text1="</embed>";
		var param="hidden=false autostart=false height=20 width=120  loop=false border=0 TYPE=\"audio/x-wav\" ";
		var img = window.event.srcElement;
	if (img) {
		var src = img.src.replace(/^[a-z]*:[/][/][^/]*/, "");
			
		text='<embed src=' + src +' '+ param +'>'+text1;
		window.returnValue = text;
	window.close();
	
	}
}



</script>
<?

function listeFichiers($rep)
{
        $handle=opendir($rep);
                while ($fic = readdir($handle)) {
                        if ($fic=="." or $fic=="..") {
                        } else {
                        $tabFichiers[]="$fic";
                        };
                };
        return $tabFichiers;
	};
?>
<STYLE>
<!--
.noir {color : #000000; font-family : Verdana, Arial, Helvetica, sans-serif; font-size : 11px; margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px}
A:link {font-size: 9px; color: #330000; font-weight: bold; font-family: Verdana, Arial, Helvetica}
A:visited {font-size: 9px; color: #9900FF; font-weight: bold; font-family: Verdana, Arial, Helvetica}
A:hover {font-size: 9px; color: darkblue; font-weight: bold; font-family: Verdana, Arial, Helvetica}
-->
</STYLE>
</HEAD>

<BODY style="background: threedface; color: windowtext;" scroll=no>
 <!--<BUTTON ID=annuler style="left: 25.10em; top: 42.5504em; height: 2.4em; " onClick="annuler();">Fermer</BUTTON> -->
<fieldset id=fldLayout style='left: 0.50em; top: 0.5em; width: 30.0em; height: 2.2000em;'> 
  </fieldset> 
  <div id=divFileName style='left: 1.50em; top: 0.8em; width: 42em; height: 1.2168em;'>Pour écouter : cliquer sur le nom. Insérer, cliquer sur le carré bleu</div>
<fieldset id=fldLayout style='left: 0.50em; top: 3.19em; width: 30.0em; height: 20.5000em;'> 
  </fieldset> 
<br>

<br>
<?

//paramètres à définir en fonction de la taille du popup (voir balise html ligne 2
$compt=0;//initialisation compteur
$pictline=1;// nombre d'images par ligne / number of images per line
$nline=0;//initialisation 
$maxline=20;//nombre de ligne max/maximum number of lines to fit the popup
$folder='./media/mp3/';//repertoire à lister / folder to read

$tab=listeFichiers($folder);
$nbelem=count($tab);
echo "<table border='0' cellspacing=0 cellpadding=0 ><tr><td bgcolor=\"\" width=100%>";

for($i=0;$i<$nbelem;$i++)
{
$compt++;

$image=substr($tab[$i],0,-4);



echo "<a href='$folder$tab[$i]'  target=\"visionner\">$image</a><td bgcolor=\"#0000FF\" width=10 align=\"center\"><img  onclick='wav_insert()' src=\"$folder$tab[$i]\" width=\"10\" height=\"10\"></td><td bgcolor=\"\" width=60></td></td> ";

   if ($compt%$pictline=="0") { 
   $nline=$nline+1;
  if ($nline == $maxline)
{break;
}

   echo "</td></tr><tr><td bgcolor=\"\" width=100%>";  
   }                                                                                                                                   
}



echo "</table>";

?>

<fieldset id=fldLayout style='left: 0.50em; top: 24.19em; width: 30.0em; height: 7.000em;'> 
</fieldset> 
  <div id=divFileName style='left: 1.00em; top: 24.5em; width: 30em; height: 4.58em;'> 
<p>Pour lire ces fichiers, vous aurez certainement besoin de ces logiciels : QuickTime, Real Player ou Windows Media Player. Cliquez sur le logo correspondant au logiciel que vous voulez télécharger, puis installez le logiciel sur votre machine.
En cliquant sur une vidéo, le programme associé s'ouvrira avec la vidéo.</p>
</div>
<fieldset id=fldLayout style='left: 0.50em; top: 31.6em; width: 30.0em; height: 4.5000em;'> 
</fieldset> 
 <div id=divFileName style='left: 0.40em; top: 32.3em; width: 30em; height: 4.58em;'> 
<p align="center"><a href="http://www.apple.com/quicktime/download" target="_blank"><img src="../images/qt.gif" border="0" alt="QuickTime"></a>&nbsp;
<a href="http://www.real.com/player/index.html?lang=fr&src=downloadr&hts=yes" target="_blank"><img src="../images/rp.gif" border="0" alt="Real Player"></a>&nbsp;
<a href="http://www.microsoft.com/windows/windowsmedia/en/download/default.asp" target="_blank"><img src="../images/wmp.gif" border="0" alt="Windows Media Player"></a></p>
</div>
<fieldset id=fldLayout style='left: 0.50em; top: 36.6em; width: 30.0em; height: 2.2000em;'> 
<form name="form1" method="post" action="upload_wav.php" enctype="multipart/form-data">

    <input type="submit" name="Submit" value="Uploader un Fichier audio" class="bouton">
</form>
  </fieldset> 



</BODY>
</HTML>



