<?php
session_start();

$_SESSION = [];

header("Location: /layout.php");
