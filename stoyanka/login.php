<?php
require_once("functions.php");
require_once("data.php");
require_once("init.php");
$page_content = include_template("main-login.php", [
    'is_auth' => $is_auth,
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $values = $_POST;
    $req_fields = ['email', 'password'];
    $errors = [];

    $rules = [
        'email' => function($value) {
            return validate_email($value);
        },
        'password' => function($value) {
            return validate_length ($value, 6, 8);
        }
    ];

    $values = filter_input_array(INPUT_POST,
    [
        'email'=>FILTER_DEFAULT,
        'password'=>FILTER_DEFAULT
    ], true);

    foreach ($values as $field => $value) {
        if (isset($rules[$field])) {
            $rule = $rules[$field];
            $errors[$field] = $rule($value);
        }
        foreach ($req_fields as $field) {
            if (empty($values[$field])) {
                $errors[$field] = "Не заполнено поле " . $field;
            }
        }
    }

    $errors = array_filter($errors);


    if (count($errors)) {
        $page_content = include_template("main-login.php", [
            'values' => $values,
            'is_auth' => $is_auth,
            'errors' => $errors
        ]);
    } else {
        $users_data = get_login ($con, $values['email']);
        if ($users_data) {
            if (password_verify($values['password'], $users_data['password'])) {$_SESSION['user'] = $users_data;
} 
                else {
                $errors['password'] = "Вы ввели неверный пароль";
                return $errors['password'];
            }
        } else {
            $errors['email'] = "Пользователь с таким е-mail не зарегестрирован";
            return $errors['email'];
        }
        if (isset($_SESSION['user'])) {header('Location: http://localhost/stoyanka/layout.php');die(); }
    if (count($errors)) {
        $page_content = include_template("main-login.php", ["is_auth" => $is_auth,
        "errors" => $errors,
            'values' => $values,
        ]);
        }
    }
}

print($page_content);

