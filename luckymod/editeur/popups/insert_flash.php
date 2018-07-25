<!DOCTYPE HTML PUBLIC "-//W3C//DTD W3 HTML 3.2//EN">
<HTML id=flashadmin STYLE="width: 350px; height: 300px;">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<TITLE>Insertion modules flash</TITLE>
<style>
  html, body, button, div, input, select, fieldset { font-family: MS Shell Dlg; font-size: 8pt; position: absolute; };
</style>
<script language='JavaScript'>
function annuler() {
window.close();
}

function flash_insert() {
  var idx  = document.all.align.selectedIndex;
  var option = document.all.align[idx].value;

  var idx1  = document.all.quality.selectedIndex;
  var option1 = document.all.quality[idx1].value;

  var idx2  = document.all.jouer.selectedIndex;
  var option2 = document.all.jouer[idx2].value;

  var idx3  = document.all.boucler.selectedIndex;
  var option3 = document.all.boucler[idx3].value;

  var option4 = document.all.width.value;

  var option5 = document.all.height.value;

	var alignement="align="+option;
	var qualite="quality="+option1;
	var joue="play"+option2;
	var boucle="loop="+option3;
	var largeur="width="+option4;
	var hauteur="height="+option5;

	var fin="></embed></p>";

	var plugin=" pluginspage=http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash";
		var param=joue+' '+boucle+' '+largeur +' '+hauteur+' '+qualite+' ';
		var img = window.event.srcElement;
	if (img) {
		var src = img.src.replace(/^[a-z]*:[/][/][^/]*/, "");

		text='<embed src=' + src+' '+ param +' '+alignement +' '+plugin+fin;
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
  <div id=divFileName style='left: 1.50em; top: 0.8em; width: 42em; height: 1.2168em;'>Pour voir : cliquer sur le nom. Insérer, cliquer sur le carré bleu</div>
<br>
<fieldset id=fldLayout style='left: 0.50em; top: 3.1em; width: 30.0em; height: 5.000em;'>
  </fieldset>


<div id=divFileName style='left: 1.00em; top:4.0em; width: 42em; height: 1.2168em;'>Aligner :</div>
<select name="align" style='left: 5.5em; top: 3.70em; width: 5.7em; height: 1.0em;'>
   <option value="left">gauche</option>
  <option value="center">centré</option>
  <option value="right">droite</option>
</select>



<div id=divFileName style='left: 1.00em; top:5.9em; width: 42em; height: 1.2168em;'>Qualité :</div>
<select name="quality" style='left: 5.5em; top: 5.70em; width: 5.7em; height: 1.0em;' >
   <option value="high">Haute</option>
  <option value="best">Meilleure</option>
  <option value="low">Basse</option>
  <option value="Autolow">AutoBasse</option>
  <option value="Autohigh">AutoHaute</option>
  <option value="medium">Moyenne</option>
</select>





<div id=divFileName style='left: 12.0em; top:4.0em; width: 42em; height: 1.2168em;'>jouer</div>
<select name="jouer"style='left: 15.8em; top: 3.70em; width: 4.5em; height: 1.0em;' >
   <option value="true">oui</option>
  <option value="false">non</option>

</select>


<div id=divFileName style='left: 12.00em; top:5.9em; width: 42em; height: 1.2168em;'>Boucle :</div>
<select name="boucler" style='left: 15.8em; top: 5.70em; width: 4.5em; height: 1.5000em;'>
    <option value="false">non</option>
   <option value="true">oui</option>

</select>

<div id=divFileName style='left: 21.0em; top:5.9em; width: 42em; height: 1.2168em;'>largeur :</div>
<input name="width" type="text" value="190" size="4" maxlength="5" style='left: 25.3em; top: 5.70em; width: 4.5em; height: 1.7em;'>

<div id=divFileName style='left: 21.00em; top:4.0em; width: 42em; height: 1.2168em;'>Hauteur :</div>
<input name="height" type="text" value="190" size="4" maxlength="5" style='left: 25.3em; top: 3.70em; width: 4.5em; height: 1.7em;'>


<br><br><br><br><br><br>
<fieldset id=fldLayout style='left: 0.50em; top: 8.5em; width: 30.0em; height: 27.5000em;'>
  </fieldset>
<?

//paramètres à définir en fonction de la taille du popup (voir balise html ligne 2
$compt=0;//initialisation compteur
$pictline=1;// nombre d'images par ligne / number of images per line
$nline=0;//initialisation
$maxline=9;//nombre de ligne max/maximum number of lines to fit the popup
$folder='./media/flash/';//repertoire à lister / folder to read

$tab=listeFichiers($folder);
$nbelem=count($tab);
echo "<table border='0' cellspacing=0 cellpadding=0 ><tr><td bgcolor=\"\" width=50%>";

for($i=0;$i<$nbelem;$i++)
{
$compt++;

$image=substr($tab[$i],0,-4);

echo "<a href='$folder$tab[$i]'  target=\"visionner\">$image</a></td><td bgcolor=\"#0000FF\" width=10 align=\"center\"><img  onclick='flash_insert()' src=\"$folder$tab[$i]\" width=\"10\" height=\"10\"></td><td bgcolor=\"\" width=60></td> ";

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
<fieldset id=fldLayout style='left: 0.50em; top: 36.6em; width: 30.0em; height: 2.2000em;'>
<form name="form1" method="post" action="upload_flash.php" enctype="multipart/form-data">

    <input type="submit" name="Submit" value="Uploader un Fichier .swf" class="bouton">
</form>
</fieldset>
</BODY>
</HTML>





