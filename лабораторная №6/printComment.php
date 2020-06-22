<?php

$comment_file = 'comments.txt';
$comment_counter = substr_count(file_get_contents($comment_file), '*');

$comment_list = explode("*", file_get_contents($comment_file));
    $comments = array();
    for($i=0; $i<$comment_counter; $i++){
        array_push($comments, explode("|", $comment_list[$i]));
    }
    if($_SESSION['name']!="admin") {
        for ($j = 0; $j < $comment_counter; $j++) {
            $time = substr($comments[$j][2], 0, 2) . '.' . substr($comments[$j][2], 2, 2) . '.' .
                substr($comments[$j][2], 4, 4) . ' ' . substr($comments[$j][2], 8, 2) .
                ':' . substr($comments[$j][2], 10, 2);
            echo '<ul class="indented"><li><a>';
            echo '['.$time.'] &nbsp;&nbsp;&nbsp;&nbsp;'.$comments[$j][1].' : &nbsp;&nbsp;&nbsp;&nbsp;'.$comments[$j][3].'';
			echo '</a></li></ul>';
        }
    }
    else{
        for ($j = 0; $j < $comment_counter; $j++) {
            $time = substr($comments[$j][2], 0, 2) . '.' . substr($comments[$j][2], 2, 2) . '.' .
                substr($comments[$j][2], 4, 4) . ' ' . substr($comments[$j][2], 8, 2) .
                ':' . substr($comments[$j][2], 10, 2);
				echo '<ul class="indented"><li><a>';
            echo '['.$time.'] &nbsp;&nbsp;&nbsp;&nbsp;'.$comments[$j][1].' : &nbsp;&nbsp;&nbsp;&nbsp;'.$comments[$j][3].'';
			echo '</a></li></ul>';
        }
    }
    if((!$_SESSION['ban']) && ($_SESSION['name']!="")){
        echo ' </div>
		<p></p>
                <form id="add_com" >
                    <label>
                        <textarea name="comment" id="comment" rows="7" cols="93" placeholder="Добавить коментраий " ></textarea><br>
                    </label>
                   <input onclick="FormClick(); return false" type="button" value="Отправить" style="margin-bottom:2%;">
                </form>';

    } elseif(($_SESSION['ban']) || ($_SESSION['name']=="")){
        echo '</div>';
    }
    ?>
