<?php
/**
 * Created by PhpStorm.
 * User: mabraham
 * Date: 23.02.16
 * Time: 15:16
 * Wintermarathon Wordpress Gallery Download
 */
$datei=$_GET['datei'];
$filename=$_GET['filename'];
$fileere = $datei."_backup";
#echo $fileere;
#die();
header('Content-disposition:attachment; filename="'.$filename.'"');
header('Content-type: image/jpeg');
readfile($fileere);
?>