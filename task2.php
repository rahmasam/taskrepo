<!-- Write a PHP function to print the next character of a specific character.
input : 'a'
Output : 'b'
input : 'z'
Output : 'a' -->
<?php
function nextChar($input){

$alphacha=range("a","z");
foreach ($alphacha as $key => $value) {
    # code...
    if ($value==$input&&$input!='z') {
        echo $alphacha[$key+1].'<br>';
        # code...
        break;
    }
    elseif ($input=='z') {
        # code...
        echo 'a'.'<br>';
        break;
    }
}
    
}

nextChar('b') ;

//////////////////////////////////////////
//another answer
function getNextChar($cha){

$next_cha = ++$cha; 
//The following if condition prevent you to go beyond 'z' or 'Z' and will reset to 'a' or 'A'.
if (strlen($next_cha) > 1) 
{
 $next_cha = $next_cha[0];
 }
echo $next_cha."\n";
}
 getNextChar('z');
 
?>