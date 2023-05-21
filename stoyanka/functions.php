<?php 
function is_date_valid(string $date) : bool {
    $format_to_check = 'Y-m-d';
    $dateTimeObj = date_create_from_format($format_to_check, $date);

    return $dateTimeObj !== false && array_sum(date_get_last_errors()) === 0;
}
function get_arrow ($result_query) {
    $row = mysqli_num_rows($result_query);
    if ($row === 1) {
        $arrow = mysqli_fetch_assoc($result_query);
    } else if ($row > 1) {
        $arrow = mysqli_fetch_all($result_query, MYSQLI_ASSOC);
    }

    return $arrow;
}
function get_users_data($con) {
    if (!$con) {
        $error = mysqli_connect_error();
        return $error;
    }
    $sql = "SELECT name, email FROM users;";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $users_data= get_arrow($result);
        return $users_data;
    }
    $error = mysqli_error($con);
    return $error;
}

function db_get_prepare_stmt_version($link, $sql, $data = []) {
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt === false) {
        $errorMsg = 'Не удалось инициализировать подготовленное выражение: ' . mysqli_error($link);
        die($errorMsg);
    }

    if ($data) {
        $types = '';
        $stmt_data = [];

        foreach ($data as $key => $value) {
            $type = 's';

            if (is_int($value)) {
                $type = 'i';
            }
            else if (is_double($value)) {
                $type = 'd';
            }

            if ($type) {
                $types .= $type;
                $stmt_data[] = $value;
            }
        }

        $values = array_merge([$stmt, $types], $stmt_data);
        mysqli_stmt_bind_param(...$values);

        if (mysqli_errno($link) > 0) {
            $errorMsg = 'Не удалось связать подготовленное выражение с параметрами: ' . mysqli_error($link);
            die($errorMsg);
        }
    }

    return $stmt;
}
function validate_email ($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "E-mail должен быть корректным";
    }
}
function validate_length ($value, $min, $max) {
    if ($value) {
        $len = strlen($value);
        if ($len < $min or $len > $max) {
            return "Значение должно быть от $min до $max символов";
        }
    }
}
function get_query_create_user() {
    return "INSERT INTO users (role_name, name, email, password) VALUES ('user', ?, ?, ?);";
}
function add_user_database($link, $data = []) {
    $sql = "INSERT INTO users (role_name, name, email, password) VALUES ('user', ?, ?, ?);";
    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

    $stmt = db_get_prepare_stmt_version($link, $sql, $data);
    $res = mysqli_stmt_execute($stmt);
    return $res;
}
function get_login($con, $email) {
    if (!$con) {
    $error = mysqli_connect_error();
    return $error;
    }
    $sql = "SELECT id, role_name, name, email, password FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $users_data= get_arrow($result);
        return $users_data;
    }
    $error = mysqli_error($con);
    return $error;
}
function include_template($name, array $data = []) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}