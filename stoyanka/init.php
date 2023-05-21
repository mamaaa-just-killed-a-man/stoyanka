<?php

define('CACHE_DIR', basename(__DIR__ . DIRECTORY_SEPARATOR . 'cache'));
define('UPLOAD_PATH', basename(__DIR__ . DIRECTORY_SEPARATOR . 'uploads'));

$con = mysqli_connect("localhost", "root", "", "stoyanka");
mysqli_set_charset($con, "utf8");
