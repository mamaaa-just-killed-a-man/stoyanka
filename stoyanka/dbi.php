<?php
require_once("functions.php");
require_once("data.php");
require_once("init.php");

$comments=  get_comments($con);
$page_content = include_template("dubai.php", [
    "comments" => $comments,
    "is_auth" => $is_auth
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST;


    $values = filter_input_array(INPUT_POST,
    [
        "content"=>FILTER_DEFAULT,
    ], true);

            if (empty($form['content'])) {
                $errors['content'] = "Сначала введите комментарий :)";
            }
        
    

    $errors = array_filter($errors);
    if (count($errors)) {
        $page_content = include_template("dubai.php", ["comments" => $comments,
        "is_auth" => $is_auth,
            'values' => $values,
            'errors' => $errors
        ]);
    } else {
        $res = add_comment_db($con, $values);

        if ($res) {
            $page_content = include_template("dubai.php", ["comments" => $comments,
            "is_auth" => $is_auth,
                'values' => $values]);
        } else {
            $error = mysqli_error($con);
        }
    }
}
        
$page_content = include_template("dubai.php", ["comments" => $comments,
"is_auth" => $is_auth]);

print($page_content);
