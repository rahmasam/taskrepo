<?php
$id=$_GET['id'];
$file= fopen('text.txt','r')or die('unable to open file');
$finalText='';
while(!feof($file)){
    $line=fgets($file);
    $data=explode('|',$line);
    if ($data[0]==$id) {
        continue;
    }else {
        $finalText .=$line."\n";
    }

}
fclose($file);

?>