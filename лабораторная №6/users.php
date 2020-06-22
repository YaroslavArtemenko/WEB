<?php

$user_file = "users.txt";
$user_counter = substr_count(file_get_contents($user_file), '*');

$list = explode("*", file_get_contents($user_file));
$userok = array();
$counter = 0;
for($i=0; $i<$user_counter; $i++){
    array_push($userok, explode("|", $list[$i]));
}
for($j=0; $j<$user_counter; $j++){
	echo '<ul class="indented"><li><a>';
    echo 'Login :'.$userok[$j][0].', Password: '.$userok[$j][1].', '.$userok[$j][2].
        ', Email :'.$userok[$j][3].', Name: '.$userok[$j][4].'<form method="post"><input type="hidden" name="index" value="'.$j.'"><input type="submit" value="Ban/unban " name="banunban">
            </form> '.'';
			echo '</a></li></ul>';
}