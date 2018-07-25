<?

/*************************************************** 
 *  Ci votre forum ce trouve dans un repertoire 
 *  Ex: forum 
 *  Vous devez changer la ligne en dessous en 
 * $BASE_ROOT = 'forum/editeur/upload';   
 ***************************************************/ 
$BASE_ROOT = 'cook_time/editeur/upload'; 



$BASE_DIR = $_SERVER['DOCUMENT_ROOT'];
$BASE_ILR = $_SERVER['SCRIPT_NAME'];
$BASE_URL = '/';
$BASE_ILR=substr_replace($BASE_ILR, '',0,1);
$BASE_ILR=strrev($BASE_ILR);
$BASE_ILR=strstr($BASE_ILR,'/');
$BASE_ILR=strrev($BASE_ILR);   
$BASE_ILR=$BASE_ILR."categories"; 
$BASE_ROOT = $BASE_ILR; 
$SAFE_MODE = false;
$IMG_ROOT = $BASE_ROOT;
    if(strrpos($BASE_DIR, '/')!= strlen($BASE_DIR)-1) 
	    $BASE_DIR .= '/';
    if(strrpos($BASE_URL, '/')!= strlen($BASE_URL)-1) 
	    $BASE_URL .= '/';
	function dir_name($dir) {
        $lastSlash = intval(strrpos($dir, '/'));
		if($lastSlash == strlen($dir)-1){
		    return substr($dir, 0, $lastSlash);
		} else	return dirname($dir);
	}
?>