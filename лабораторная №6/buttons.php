<?php

$new_comment_file = "new_comments.txt";
$comment_file = "comments.txt";

if (filesize($new_comment_file)==0) {
	$f=" "; 
	file_put_contents($new_comment_file, $f);
}
if (!empty($_POST['del1']) || !empty($_POST['del2'])) {
    $file = (!empty($_POST['del1'])) ? $new_comment_file : $comment_file;
    $comment_list = explode("*", file_get_contents($file));
    array_splice($comment_list, (int)$_POST['index'], 1);
    $result = implode('*', $comment_list);

    $handle = fopen($file, "w+");
    //flock($handle, LOCK_SH);
    fwrite($handle, $result);
    //flock($handle, LOCK_UN);
    fclose($handle);
}
if (!empty($_POST['add'])) {
    $file = $new_comment_file;
    $comment_counter = substr_count(file_get_contents($file), '*');
    $comment_list = explode("*", file_get_contents($file));
    $commaray = array();
    for ($j = 0; $j < $comment_counter; $j++) {
        array_push($commaray, explode("|", $comment_list[$j]));
    }
    $comm = $commaray[$_POST['index']][3];
	$name = $commaray[$_POST['index']][1];
    array_splice($comment_list, (int)$_POST['index'], 1);
    $result = implode('*', $comment_list);

    $handle = fopen($file, "w+");
    //flock($handle, LOCK_SH);
    fwrite($handle, $result);
    //flock($handle, LOCK_UN);
    fclose($handle);

    $file = $comment_file;
    $comment_counter = substr_count(file_get_contents($file), '*');
    $handle = fopen($file, "at");
    flock($handle, LOCK_SH);
    $newComment = $_SESSION['mail'] . '|' . $name . '|' . date(d . m . Y . H . i) . "|" . $comm . "|" . ($comment_counter + 1) . '*';
    fwrite($handle, $newComment);
    flock($handle, LOCK_UN);
    fclose($handle);
    $comment_counter += 1;
}
if (!empty($_POST['banunban'])) {
    $file = 'users.txt';
    $user_counter = substr_count(file_get_contents($file), '*');
    $user_list = explode("*", file_get_contents($file));
    $user_array = array();
    for ($i = 0; $i < $user_counter; $i++) {
        array_push($user_array, explode("|", $user_list[$i]));
    }
    if (in_array("notbanned", $user_array[$_POST['index']])) {
        $user_array[$_POST['index']][2] = "banned";
    } else {
        $user_array[$_POST['index']][2] = "notbanned";
    }
    $result ="";
    for($j=0; $j<$user_counter; $j++){
        $result = $result.implode("|", $user_array[$j]).'*';
    }

    $handle = fopen($file, "w");
    fwrite($handle, $result);
    fclose($handle);
}