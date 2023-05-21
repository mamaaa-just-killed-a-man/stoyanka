<?php
require_once("functions.php");
require_once("data.php");
require_once("init.php");

$tpl_data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST;
    $required = ["name","email", "password"];
    $errors = [];

    $rules = [
        "name" => function($value) {
            return validate_length ($value, 3, 20);
        },
        "email" => function($value) {
            return validate_email($value);
        },
        "password" => function($value) {
            return validate_length ($value, 6, 15);
        }
    ];

    $values = filter_input_array(INPUT_POST,
    [
        "name"=>FILTER_DEFAULT,
        "email"=>FILTER_DEFAULT,
        "password"=>FILTER_DEFAULT,
    ], true);

    foreach ($values as $value) {
        if (isset($rules[$value])) {
            $rule = $rules[$value];
            $errors[$value] = $rule($value);
        };
        if (in_array($value, $required) && empty($value)) {
            $errors[$value] = "Поле $value нужно заполнить";
        }
    
    }
    $errors = array_filter($errors);


    if (count($errors)) {
        $page_content = include_template("registration.php", [
            "values" => $values,
            "errors" => $errors
        ]);
    } else {
        $users_data = get_users_data ($con);
        $names = array_column($users_data, "name");
        $emails = array_column($users_data, "email");
        if (in_array($values["name"], $names)) {
            $errors["name"] = "Пользователь с таким именем уже зарегистрирован";
        }
        if (in_array($values["email"], $emails)) {
            $errors["email"] = "Пользователь с таким е-mail уже зарегистрирован";
        }
 
        if (count($errors)) {
            $errors = array_filter($errors);
            $page_content = include_template ('registration.php',["is_auth" => $is_auth,
            "errors" => $errors
            ]);
        } 
         else {
            $res = add_user_database($con, $values);
            if ($res) {
                header("Location: /login.php");
            } else {
                $error = mysqli_error($con);
            }
        }
    }
}

$page_content = include_template('registration.php',["is_auth" => $is_auth]);

print($page_content);