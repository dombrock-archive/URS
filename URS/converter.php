<?php
/*
Converts word lists seperated by '\n'
Supply your own $list and it will be exported to the '/word_bank' dir
*/
$your_file = "Directories_Common.txt";

$list = file_get_contents($your_file);
$new_array = explode("\n", $list);
$new_list = "";
foreach ($new_array as &$value) {
    echo $value.",";
    $new_list .= $value.",";
}


$new_file = fopen("word_bank/".$your_file, "w") or die("Unable to open file!");
fwrite($new_file, $new_list);
fclose($new_file);
?>