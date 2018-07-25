<?
switch($upload) {
default:
include "config_upload.php";
echo "
<html>
<head>
<title>Up</title>
</head>
<body topmargin=\"10\" leftmargin=\"10\" bgcolor=\"#D4D0C8\" link=\"#818EA0\" vlink=\"#5C697A\" alink=\"#818EA0\" text=\"#FFFFFF\" style=\"font-family: Verdana; font-size: 8pt; color: #000000\">

<div align=\"center\">
  <center>
  <table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"300\" id=\"AutoNumber1\">
    <tr>
      <td bgcolor=\"#9B9B9B\" height=\"25\">
      <p align=\"center\"><font size=\"2\"><font color=\"#FFFFFF\"><b>Formulaire d'upload</b></font></td>
    </tr>
    <tr>
      <td bgcolor=\"#D4D0C8\"><font size=\"2\">Les restrictions suivantes s'appliquent:</font><ul type=\"square\">
        <li><font size=\"2\">Extention supporté<b>";
        if (($extensions == "") or ($extensions == " ") or ($ext_count == "0") or ($ext_count == "") or ($limit_ext != "yes") or ($limit_ext == "")) {
           echo "";
        } else {
        $ext_count2 = $ext_count+1;
        for($counter=0; $counter<$ext_count; $counter++) {
            echo "&nbsp; $extensions[$counter]";
        }
        }
        if (($limit_size == "") or ($size_limit != "yes")) {
            $limit_size = "any size";
        } else {
            $limit_size .= " bytes";
        }
        echo"</b></font></li>
        <li><font size=\"2\">Les fichiers sont limité à (voir config)</font></li>
        <li><font size=\"2\">Pas d'espace dans les nom de fichier</font></li>
        <li><font size=\"2\">Pas de caractères du style (/,*,\,etc)</font><BR>
        </li>
      </ul>
      <form method=\"POST\" action=\"$PHP_SELF?upload=doupload\" enctype=\"multipart/form-data\">
<p align=\"center\">
<input type=file name=file size=30 style=\"font-family: v; font-size: 10pt; color: #5E6A7B; border: 1px solid #5E6A7B; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\"><br>
<br>
<button name=\"submit\" type=\"submit\" style=\"font-family: v; font-size: 10pt; color: #5E6A7B; border: 1px solid #5E6A7B; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1\"><b>envoyer</b></button>
</p>
</form>
      <p>
</td>
    </tr>
    <tr>
      <td bgcolor=\"#9B9B9B\" height=\"25\" width=\"100%\" border=\"1\">
      <p align=\"center\"><font size=\"2\">
      <a href=\"insert_flash.php\" style=\"text-decoration: none\"><font color=\"#FFFFFF\"><b>Fermer</b></font></a>
      </font></td>
    </tr>
  </table>
  </center>
</div>

</body>
</html>";

break;
case "doupload":
include "config_upload.php";
$endresult = "<font size=\"2\"><font color=\"#000000\">Le fichier a bien été up-loader</font>";
if ($file_name == "") {
$endresult = "<font size=\"2\"><font color=\"#000000\">Sélectionner un fichier</font>";
}else{
if(file_exists("$absolute_path/$file_name")) {
$endresult = "<font size=\"2\"><font color=\"#000000\">Le fichier existe déja</font>";
} else {
if (($size_limit == "yes") && ($limit_size < $file_size)) {
$endresult = "<font size=\"2\"><font color=\"#000000\">Le fichier est trop gros</font>";
} else {
$ext = strrchr($file_name,'.');
if (($limit_ext == "yes") && (!in_array($ext,$extensions))) {
$endresult = "<font size=\"2\">le fichier n'est pas un .swf</font>";
}else{
@copy($file, "$absolute_path/$file_name") or $endresult = "<font size=\"2\">le fichier a été up-loader</font>";
}
}
}
}
echo "
<html>
<head>
<title>Upload</title>
</head>

<body topmargin=\"10\" leftmargin=\"0\" bgcolor=\"#D4D0C8\" link=\"#818EA0\" vlink=\"#5C697A\" alink=\"#818EA0\" text=\"#FFFFFF\" style=\"font-family: Verdana; font-size: 8pt; color: #FFFFFF\">

<div align=\"center\">
  <center>
  <table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"300\" id=\"AutoNumber1\">
    <tr>
      <td bgcolor=\"#818EA0\" height=\"25\">
      <p align=\"center\"><font size=\"2\"><b>Confirmation</b></font></td>
    </tr>
    <tr>
      <td bgcolor=\"#D4D0C8\">
      <center><font color=\"#000000\"> $endresult </center>
	</td>
    </tr>
    <tr>
      <td bgcolor=\"#9B9B9B\" height=\"25\" width=\"100%\">
      <p align=\"center\"><font size=\"2\">

      <a href=\"insert_flash.php\" style=\"text-decoration: none\"><font color=\"#FFFFFF\"><b>Fermer</b></font></a>
</font></td>
    </tr>
  </table>
  </center>
</div>
</body>
</html>";
break;
}
?>
