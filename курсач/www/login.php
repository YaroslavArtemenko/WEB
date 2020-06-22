<?php

session_start();
$incorrect_login_js = "";

if (!empty($_POST)) {
    $user_file = "users.txt";
    $user_counter = substr_count(file_get_contents($user_file), '*');

    $list = explode("*", file_get_contents($user_file));
    $userok = array();
    $counter = 0;
    for ($i = 0; $i < $user_counter; $i++) {
        array_push($userok, explode("|", $list[$i]));
    }
    for ($j = 0; $j < $user_counter; $j++) {
        if ($_POST['logn'] == "admin" && $_POST['pass'] == "admin") {
            $_SESSION["name"] = "admin";
            $_SESSION['ban'] = false;
            $_SESSION['mail'] = $userok[$j][3];
            break;
        } elseif ($userok[$j][0] == $_POST['logn'] && $userok[$j][1] == $_POST['pass']) {
            if ($userok[$j][2] == "banned") {
                $_SESSION['ban'] = true;
            } else {
                $_SESSION["name"] = $_POST['logn'];
                $_SESSION['ban'] = false;
                $_SESSION['mail'] = $userok[$j][3];
            }
            break;
        }
        $counter += 1;
    }

    if (($counter == $user_counter) && (isset($_POST['logn']))) {
        $incorrect_login_js = '<script style="text/javascript">alert("Пользователь с таким логином или паролем не зарегистрован")</script>';
    }


    if (!empty($_POST['action'])) {
        if ($_POST['submit'] == "Выход") {
            $_SESSION["name"] = "";
            $_SESSION['ban'] = false;
            $_SESSION['mail'] = "";
        }
        if ($_POST['submit'] == "Редактирование") {
            header("Location: admin.php");
            exit;
        }
    }
}
