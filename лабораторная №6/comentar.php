<?php
session_start();
$today = getdate();
$time = $today['year'].'-'.$today['month'].'-'.$today['mday'].'-'.$today['weekday'].'-'.$today['hours'].'-'.$today['minutes'].'-'.$today['seconds'];
if( !empty($_POST['comment'])) {

    if ($_SESSION['name'] == '') {
        echo("<script> alert(' Только авторизированый пользователь может оставлять коментарии');</script>");
    }elseif( $_SESSION['name'] != 'admin')
    {


		$newCommentText = htmlspecialchars($_POST['comment']);
        $comment_file = 'new_comments.txt';
		$comment_counter = substr_count(file_get_contents($comment_file), '*');
        $newComment = $_SESSION['mail'].'|'.$_SESSION['name'].'|'.date(d.m.Y.H.i)."|".$newCommentText."|".($comment_counter+1).'*';
        $fp = fopen($comment_file, 'at');

        flock($fp, LOCK_EX);
        fwrite($fp, $newComment);
        flock($fp, LOCK_UN);
        fclose($fp);
        echo("<script> alert('Ваш коментарий находится в обработке.');</script>>");
    }
    else
    {
		$newCommentText = htmlspecialchars($_POST['comment']);
        $comment_file = 'comments.txt';
       $newComment = $_SESSION['mail'].'|'.$_SESSION['name'].'|'.date(d.m.Y.H.i)."|".$newCommentText."|".($comment_counter+1).'*';
        $fp = fopen($comment_file, 'at');

        flock($fp, LOCK_EX);
        fwrite($fp, $newComment);
        flock($fp, LOCK_UN);
        fclose($fp);

    }


}
